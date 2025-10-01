<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Composer's autoloader handles library loading automatically.
use PhpOffice\PhpSpreadsheet\IOFactory;

class IdCard extends CI_Controller {

    public function index() {
        // Fungsi ini hanya untuk menampilkan halaman form upload
        $this->load->view('form_upload');
    }

    public function generate() {
        // --- PROSES UPLOAD FILE EXCEL ---
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'xlsx';
        $config['file_name']     = 'data_karyawan_' . time();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_excel')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('form_upload', $error);
            return;
        }
        $file_path = $this->upload->data('full_path');

        // --- BACA DATA DARI EXCEL ---
        $spreadsheet = IOFactory::load($file_path);
        $worksheet = $spreadsheet->getActiveSheet();
        $data_karyawan = [];
        foreach ($worksheet->getRowIterator(2) as $row) { // Mulai dari baris ke-2
            $cells = [];
            foreach ($row->getCellIterator() as $cell) {
                $cells[] = $cell->getValue();
            }
            if (empty($cells[0])) continue; // Lewati baris kosong
            $data_karyawan[] = [
                'no_id' => $cells[0],
                'nama' => $cells[1],
                'departemen' => $cells[2],
                'posisi' => $cells[3],
                'level' => $cells[4]  // Kolom E
            ];
        }
        unlink($file_path); // Hapus file excel setelah dibaca

        // --- PROSES PEMBUATAN PDF ---
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        
        // Definisikan ukuran kartu yang benar (lebar 55mm, tinggi 80mm)
        $card_width = 55;
        $card_height = 80;
        $margin_x = 15;
        $margin_y = 15;
        $gutter = 10; // Jarak antar kartu

        $x = $margin_x;
        $y = $margin_y;
        $card_count = 0;

        foreach ($data_karyawan as $karyawan) {
            // Jika halaman penuh (3x3=9 kartu), buat halaman baru
            if ($card_count > 0 && $card_count % 9 == 0) {
                $pdf->AddPage();
                $x = $margin_x;
                $y = $margin_y;
            }

            // 1. Tentukan dan letakkan gambar template berdasarkan level
            $template_path = 'assets/templates/id_operator.png'; // Default template
            if (isset($karyawan['level']) && strtolower($karyawan['level']) == 'leader') {
                $template_path = 'assets/templates/id_leader.png';
            }
            $pdf->Image($template_path, $x, $y, $card_width, $card_height);

            // Tambahkan border tipis untuk panduan potong
            $pdf->SetLineWidth(0.1);
            $pdf->SetDrawColor(150, 150, 150); // Warna abu-abu
            $pdf->Rect($x, $y, $card_width, $card_height);
            
            // 2. Tulis teks di atas template dengan koordinat yang sudah disesuaikan
            $pdf->SetTextColor(0, 0, 0); // Warna teks hitam
            $pdf->SetFont('Arial', '', 8); // Atur font dan ukuran

            // Atur posisi awal teks (X dan Y) dan jarak antar baris
            $text_start_x = $x + 20; // Jarak dari sisi kiri kartu (disesuaikan)
            $text_start_y = $y + 55; // Jarak dari sisi atas kartu
            $line_height  = 6;    // Jarak vertikal antar baris teks

            // Tulis data karyawan ke PDF
            // Baris NO ID (dinaikkan sedikit)
            $pdf->SetXY($text_start_x, $text_start_y - 0.5);
            $pdf->Cell(40, 0, $karyawan['no_id']);

            // Baris NAMA
            $pdf->SetXY($text_start_x, $text_start_y + $line_height);
            $pdf->Cell(40, 0, $karyawan['nama']);

            // Baris DEPARTEMEN
            $pdf->SetXY($text_start_x, $text_start_y + ($line_height * 2.2));
            $pdf->Cell(40, 0, $karyawan['departemen']);

            // Baris POSISI
            $pdf->SetXY($text_start_x, $text_start_y + ($line_height * 3.2));
            $pdf->Cell(40, 0, $karyawan['posisi']);

            // Hitung posisi untuk kartu berikutnya
            $x += $card_width + $gutter;
            if (($card_count + 1) % 3 == 0) { // Setelah 3 kartu, pindah ke baris baru di bawah
                $x = $margin_x;
                $y += $card_height + $gutter;
            }
            $card_count++;
        }

        $pdf->Output('D', 'hasil_id_cards.pdf');
    }
}