<?php

/* Niente di particolare, si inseriscono i dati del proprio host e del nome del Database */
$DB_host = 'localhost';
$DB_user = 'root';
$DB_password = '';
$DB_name = 'wordcombine';

$connection = mysqli_connect($DB_host, $DB_user, $DB_password); /* Connessione al database secondo i parametri sopra stabiliti */
if($connection == 0){ /* MySQL da valore 1 alla connesione riuscita e 0 a quella fallita */
	echo 'Connessione fallita!' 
}

$db_select = mysqli_select_db($DB_name, $connection);
if($db_select == 0){ /* Stessa cosa per la selezione del database */
	echo 'Selezione del DB non riuscita!'
}

/* Qui si utilizzano i dati inseriti nella pagina HTML di registrazione e si inizializzano con la variabile che poi verrà usata successivamente */
$name = $_POST['nome'];
$surname = $_POST['cognome'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmationpass = $_POST['confermapass'];

/* Qui si controlla che le due password inserite combacino tra di loro */
if($password != $confirmationpass){
	echo 'Ricontrolla i campi della password!'
} else if{$name=='' or $surname='' or $username='' or $password=''){
	echo 'Tutti i campi sono obbligatori.'
} else{
	/* Adesso si esegue la query al database, al fine di inviare i dati inseriti nella pagina HTML di registrazione e inserirli in una nuova tabella del database */
	$query = "INSERT INTO utenti (name, surname, username, password) VALUES ($name, $surname, $username, $password)"; /* Qua in pratica si usando i comandi comuni del linguaggio SQL */
	$result = mysqli_query($query, $connection);
	if($result == 1) die 'Errore registrazione';
	header('location:registrato.php')
}
}
?>
