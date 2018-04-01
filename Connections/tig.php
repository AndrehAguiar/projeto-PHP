<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_TIG = "localhost";
$database_TIG = "ver_duvida";
$username_TIG = "5TIG";
$password_TIG = "testehost";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_set_charset( $TIG, 'utf8' );
 
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
?>
