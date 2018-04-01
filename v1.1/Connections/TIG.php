<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_TIG = "mysql.hostinger.com.br";
$database_TIG = "u494260651_verdu";
$username_TIG = "u494260651_5tig";
$password_TIG = "testehost";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_set_charset( $TIG, 'utf8' );
?>
