<?php
// Definizione variabili per la connessione al database
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'university');
define('DB_PORT', 8889);

// Connessione al database
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// se la connessione è ok e c'è un messaggio di errore,
// stampa l'errore e interrompi il programma
if($conn && $conn->connect_error) {
    echo 'connection error: ' . $conn->connect_error;
    die();
}
?>