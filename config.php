<?php

$config = [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => '',
    'mysql_libreria' => 'libreria'
];

$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password']);

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}

$sql = 'CREATE DATABASE IF NOT EXISTS libreria;';

if (!$mysqli->query($sql)) {
    die($mysqli->error);
}

$mysqli->query('USE libreria;'); 

$sql = "SHOW TABLES LIKE 'autore'";
$result = $mysqli->query($sql);
if ($result->num_rows == 0) {
    $sql = 'CREATE TABLE autore (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pseudonimo VARCHAR(255) NOT NULL, 
        nome VARCHAR(255) NOT NULL, 
        cognome VARCHAR(255) NOT NULL, 
        citta VARCHAR(255) NOT NULL
    )';
    if (!$mysqli->query($sql)) {
        die($mysqli->error);
    }
}

$sql = 'CREATE TABLE IF NOT EXISTS libri ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titolo VARCHAR(255) NOT NULL, 
    autore VARCHAR(255) NOT NULL, 
    id_autore INT NOT NULL, 
    anno_pubblicazione INT NOT NULL, 
    genere VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_autore) REFERENCES autore (id) ON DELETE CASCADE ON UPDATE CASCADE
)';
if (!$mysqli->query($sql)) {
    die($mysqli->error);
} 

// Inserimento dati nella tabella autori
// $sql = "ALTER TABLE autore
//         ADD CONSTRAINT unique_autore UNIQUE (nome, cognome, citta, pseudonimo)";

// if (!$mysqli->query($sql)) {
//     die($mysqli->error);
// }

// $sql_insert_autore = "INSERT INTO autore (pseudonimo, nome, cognome, citta) VALUES
// ('Agatha Christie', 'Agatha', 'Christie', 'Torquay'),
// ('J.K. Rowling', 'Joanne', 'Rowling', 'Yate'),
// ('Fyodor Dostoevsky', 'Fyodor', 'Dostoevsky', 'Moscow'),
// ('Tolkien', 'John Ronald Reuel', 'Tolkien', 'Bloemfontein'),
// ('Gabriel García Márquez', 'Gabriel', 'García Márquez', 'Aracataca'),
// ('Leo Tolstoy', 'Leo', 'Tolstoy', 'Tula Province'),
// ('J.R.R. Martin', 'George Raymond Richard', 'Martin', 'Bayonne'),
// ('Charles Dickens', 'Charles', 'Dickens', 'Portsmouth'),
// ('Mark Twain', 'Samuel Langhorne', 'Clemens', 'Florida'),
// ('Herman Melville', 'Herman', 'Melville', 'New York')";
// if (!$mysqli->query($sql_insert_autore)) {
//     die($mysqli->error);
// }

// Inserimento dati nella tabella libri


// $sql_insert_libri = "INSERT INTO libri (titolo, autore, id_autore, anno_pubblicazione, genere) VALUES
// ('Assassinio sull\'Orient Express', 'Agatha Christie', 1, 1934, 'Giallo'),
// ('Dieci piccoli indiani', 'Agatha Christie', 1, 1939, 'Giallo'),
// ('Il segreto di Chimneys', 'Agatha Christie', 1, 1925, 'Giallo'),
// ('Harry Potter e la pietra filosofale', 'J.K. Rowling', 2, 1997, 'Fantasy'),
// ('Harry Potter e la camera dei segreti', 'J.K. Rowling', 2, 1998, 'Fantasy'),
// ('Harry Potter e il prigioniero di Azkaban', 'J.K. Rowling', 2, 1999, 'Fantasy'),
// ('Delitto e castigo', 'Fyodor Dostoevsky', 3, 1866, 'Romanzo psicologico'),
// ('I fratelli Karamazov', 'Fyodor Dostoevsky', 3, 1880, 'Romanzo'),
// ('L\'idiota', 'Fyodor Dostoevsky', 3, 1869, 'Romanzo psicologico'),
// ('Il Signore degli Anelli: La Compagnia dell\'Anello', 'Tolkien', 4, 1954, 'Fantasy'),
// ('Il Signore degli Anelli: Le due torri', 'Tolkien', 4, 1954, 'Fantasy'),
// ('Il Signore degli Anelli: Il ritorno del re', 'Tolkien', 4, 1955, 'Fantasy'),
// ('Cent\'anni di solitudine', 'Gabriel García Márquez', 5, 1967, 'Romanzo'),
// ('L\'amore ai tempi del colera', 'Gabriel García Márquez', 5, 1985, 'Romanzo'),
// ('Cronaca di una morte annunciata', 'Gabriel García Márquez', 5, 1981, 'Romanzo breve'),
// ('Guerra e pace', 'Leo Tolstoy', 6, 1869, 'Romanzo storico'),
// ('Anna Karenina', 'Leo Tolstoy', 6, 1877, 'Romanzo'),
// ('Resurrezione', 'Leo Tolstoy', 6, 1899, 'Romanzo'),
// ('Il trono di spade', 'J.R.R. Martin', 7, 1996, 'Fantasy'),
// ('La grande cospirazione', 'J.R.R. Martin', 7, 1998, 'Fantasy'),
// ('Tempesta di spade', 'J.R.R. Martin', 7, 2000, 'Fantasy'),
// ('Oliver Twist', 'Charles Dickens', 8, 1837, 'Romanzo'),
// ('Grandi speranze', 'Charles Dickens', 8, 1861, 'Romanzo'),
// ('David Copperfield', 'Charles Dickens', 8, 1850, 'Romanzo'),
// ('Le avventure di Tom Sawyer', 'Mark Twain', 9, 1876, 'Romanzo'),
// ('Le avventure di Huckleberry Finn', 'Mark Twain', 9, 1884, 'Romanzo'),
// ('Il principe e il povero', 'Mark Twain', 9, 1881, 'Romanzo'),
// ('Moby Dick', 'Herman Melville', 10, 1851, 'Romanzo'),
// ('Bartleby lo scrivano', 'Herman Melville', 10, 1853, 'Romanzo breve'),
// ('Billy Budd, marinaio', 'Herman Melville', 10, 1924, 'Romanzo breve')";

// if (!$mysqli->query($sql_insert_libri)) {
//     die($mysqli->error);
// }




