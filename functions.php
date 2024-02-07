<?php


//LIBRI
function getLibri(){
    global $config;

    $mysqli = new mysqli(
        $config['mysql_host'],
        $config['mysql_user'],
        $config['mysql_password'],
        $config['mysql_libreria']
    );

    if ($mysqli->connect_error) {
        die($mysqli->connect_error);
    }

    $sql = "SELECT * FROM libri";
    $result = $mysqli->query($sql);

    $books = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
    }

    $mysqli->close();
    return $books;
}

function addLibro($mysqli, $titolo, $autore, $genere, $anno, $id_autore){
    $sql = "INSERT INTO libri (titolo, autore, genere, anno_pubblicazione, id_autore) 
    VALUES ('$titolo', '$autore', '$genere', '$anno', '$id_autore');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        // echo 'Libro aggiunto con successo';
        exit(header("Location: index.php?added=success"));
    }
}

function delLibro($mysqli, $id){
    
    if (!$mysqli->query('DELETE FROM libri WHERE id = ' . $id)) {
        echo ($mysqli->connect_error);
    } else {
        // echo 'Libro eliminato con successo';
        exit(header("Location: index.php?deleted=success"));
    }
}

function editLibro($mysqli, $titolo, $autore, $genere, $anno, $id, $id_autore)
{
    $sql = "UPDATE libri SET titolo = '" . $titolo . "', autore = '" . $autore . "', genere = '" . $genere . "', anno_pubblicazione = '" . $anno . "', id_autore = '" . $id_autore . "' WHERE id = " . $id;
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        // echo 'Libro aggiornato con successo!';
        exit(header("Location: index.php?edited=success"));
    }
}


//AUTORI
function allLibriAutore($mysqli, $id_autore){
    $sql = "SELECT * FROM libri WHERE id_autore = $id_autore";
    $result = $mysqli->query($sql);
    if ($result) {
        $libri = $result->fetch_all(MYSQLI_ASSOC);
        return $libri;
    } else {
        return array();
    }
}

function getAutori(){
    global $config;

    $mysqli = new mysqli(
        $config['mysql_host'],
        $config['mysql_user'],
        $config['mysql_password'],
        $config['mysql_libreria']
    );

    if ($mysqli->connect_error) {
        die($mysqli->connect_error);
    }

    $sql = "SELECT * FROM autore";
    $result = $mysqli->query($sql);

    $autore = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $autore[] = $row;
        }
    }

    $mysqli->close();
    return $autore;
}

function addAutore($mysqli, $pseudonimo, $nome, $cognome, $citta){
    $sql = "INSERT INTO autore (pseudonimo, nome, cognome, citta) 
    VALUES ('$pseudonimo', '$nome', '$cognome', '$citta');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        exit(header("Location: tabellaautori.php?added=success"));
    }
}

function delAutore($mysqli, $id){
    
    if (!$mysqli->query('DELETE FROM autore WHERE id = ' . $id)) {
        echo ($mysqli->connect_error);
    } else {
        exit(header("Location: tabellaautori.php?deleted=success"));
    }
}