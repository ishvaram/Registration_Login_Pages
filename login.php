<?php
session_start(); /*Starta la sessione dello script */
$DB_host = 'localhost';
$DB_user = 'root';
$DB_password = '';
$DB_name = 'wordcombine';

$username = $_POST['username'];
$password = $_POST['password'];

$connection = mysqli_connect($DB_host, $DB_user, $DB_password);

$db_select = mysqli_select_db($DB_name, $connection);
$sql = "SELECT * FROM utenti WHERE username='$username' AND password='$password'"; /* Query SQL per controllare se sono presenti utenti con quei dati nelle tabelle */
$result = mysqli_query($sql);
$count = mysqli_num_rows($result);
$_SESSION['username'] = $username;

if($count == 1){
	session_register('username');
	session_register('password');
	echo 'Benvenuto $username'
}
else{
	echo 'Login fallito.'
}
?>