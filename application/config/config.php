<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Base Site URL
| -------------------------------------------------------------------
| URL to your CodeIgniter root.
| WARNING: You MUST set this value!
*/
$config['base_url'] = 'http://localhost/idcard/';

/*
| -------------------------------------------------------------------
|  Index File
| -------------------------------------------------------------------
| Typically this will be your index.php file, unless you've renamed it.
| If you are using mod_rewrite to remove the page, set this variable to blank.
*/
$config['index_page'] = 'index.php';

/*
| -------------------------------------------------------------------
|  URI PROTOCOL
| -------------------------------------------------------------------
| The default setting of 'REQUEST_URI' works for most servers.
*/
$config['uri_protocol']	= 'REQUEST_URI';

/*
| -------------------------------------------------------------------
|  URL suffix
| -------------------------------------------------------------------
| This option allows you to add a suffix to all URLs generated.
*/
$config['url_suffix'] = '';

/*
| -------------------------------------------------------------------
|  Default Language
| -------------------------------------------------------------------
*/
$config['language']	= 'english';

/*
| -------------------------------------------------------------------
|  Default Character Set
| -------------------------------------------------------------------
*/
$config['charset'] = 'UTF-8';

/*
| -------------------------------------------------------------------
|  Enable/Disable System Hooks
| -------------------------------------------------------------------
*/
$config['enable_hooks'] = FALSE;

/*
| -------------------------------------------------------------------
|  Class Extension Prefix
| -------------------------------------------------------------------
*/
$config['subclass_prefix'] = 'MY_';

/*
| -------------------------------------------------------------------
|  Composer auto-loading
| -------------------------------------------------------------------
| The path to Composer's autoload file.
*/
$config['composer_autoload'] = FCPATH . 'vendor/autoload.php';

/*
| -------------------------------------------------------------------
|  Allowed URL Characters
| -------------------------------------------------------------------
*/
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
| 0 = Disables logging
| 1 = Error Messages (including PHP errors)
| 2 = Debug Messages
| 3 = Informational Messages
| 4 = All Messages
*/
$config['log_threshold'] = 0;

/*
| -------------------------------------------------------------------
|  Session Variables
| -------------------------------------------------------------------
*/
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_samesite'] = 'Lax';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

/*
| -------------------------------------------------------------------
|  Cookie Related Variables
| -------------------------------------------------------------------
*/
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;
$config['cookie_samesite'] 	= 'Lax';

/*
| -------------------------------------------------------------------
|  Cross-Site Request Forgery
| -------------------------------------------------------------------
*/
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

/*
| -------------------------------------------------------------------
|  Output Compression
| -------------------------------------------------------------------
*/
$config['compress_output'] = FALSE;

/*
|--------------------------------------------------------------------------
| Other necessary configs can remain default for this project
|--------------------------------------------------------------------------
*/
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';
$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['allow_get_array'] = TRUE;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = '';