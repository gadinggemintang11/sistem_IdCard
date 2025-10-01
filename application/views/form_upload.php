<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ID Card Generator</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; margin: 0; }
        .container { background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center; }
        .error { color: #d93025; font-size: 0.9em; margin-top: 10px; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        input[type="submit"]:hover { background-color: #0056b3; }
        h2 { margin-top: 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sistem ID CARD</h2>
        <h2>PT. FOREVER ONE INTERNATIONAL</h2>
        <p>Upload file Excel untuk membuat ID Card secara otomatis.</p>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php echo form_open_multipart('idcard/generate'); ?>
            <p>
                <input type="file" name="file_excel" id="file_excel" required>
            </p>
            <br>
            <input type="submit" value="Generate ID Cards">
        <?php echo form_close(); ?>
    </div>
</body>
</html>