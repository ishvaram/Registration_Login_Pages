/* Creazione tabella per utenti adibita alla registrazione al login di un utente*/
CREATE TABLE utenti(
id INT(11) NOT NULL AUTO_INCREMENT,
user TEXT(33) NOT NULL, /* Ho preferito usare TEXT(33) invece di VARCHAR(32) */
password TEXT(33) NOT NULL,
PRIMARY KEY (id)
);

/* Queste righe sono solo utili per registrare un utente direttamente senza passare per le pagine HTML/PHP che ho costruito */
INSERT INTO utenti (username, password) VALUES
 ('username', sha512('password')); /* Utilizzo la protezione SHA512 invece di MD5, molto piu' sicura ;-) /*