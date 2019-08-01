<?php
/* License key - Is obtained from the user license area */
$license='PMDGL-b5daf0698f03';

/* Administrator area folder name. Default: cp */
$ADMIN_DIRECTORY = 'cp';

/*******************************************************************
* URL Path - NO TRAILING SLASH
* This is the full URL web path to phpMyDirectory
* Example: http://www.domain.com
*******************************************************************/
$BASE_URL = 'http://fierrospruebab2b.local/guia';

/*******************************************************************
* SSL URL Path - NO TRAILING SLASH
* This is the full URL web path to phpMyDirectory for use with a SSL certificate.
* Example: https://www.domain.com (Notice: https://)
*******************************************************************/
$BASE_URL_SSL = '';

/*******************************************************************
* Database Settings
********************************************************************/
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'fierros_guia2');
define('DB_TABLE_PREFIX', 'pmd_');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

/*******************************************************************
* Root Path (absolute path to script) - NO TRAILING SLASH
* This is the full server path to the phpMyDirectory install directory.
* Example: /home/username/public_html/phpmydirectory
* NOTE: This path is usually automatically set by the script.
*******************************************************************/
$PMDROOT = '';

$PMDROOT = !empty($PMDROOT) ? $PMDROOT : dirname(str_replace('\\','/',__FILE__));
include($PMDROOT.'/defaults_setup.php');
?>