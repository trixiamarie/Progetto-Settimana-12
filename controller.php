<?php

require_once 'config.php';
include_once('functions.php');


//LIBRI
if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'addLibro') {
    if (!empty($_POST['titolo']) && !empty($_POST['autore']) && !empty($_POST['genere']) && !empty($_POST['anno']) && !empty($_POST['id_autore'])) {
        if (strlen(trim($_POST['titolo'])) > 0 && strlen(trim($_POST['autore'])) > 0 && strlen(trim($_POST['genere'])) > 0) {
            if (is_numeric($_POST['anno']) && $_POST['anno'] > 0) {
                addLibro($mysqli, $_POST['titolo'], $_POST['autore'], $_POST['genere'], $_POST['anno'], $_POST['id_autore']);
            } else {
                exit(header("Location: form.php?error=1"));
                // echo "<p class='bg-danger'>Errore: L'anno di pubblicazione deve essere un numero maggiore di 0.</p>";
            }
        } else {
            exit(header("Location: form.php?error=1"));
            // echo "<p class='bg-danger'>Errore: Non hai inserito correttamente tutti i dati.</p>";
        }
    } else {
        exit(header("Location: form.php?error=1"));
        // echo "<p class='bg-danger'>Errore: Non hai inserito correttamente tutti i dati.</p>";
    }
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] === 'editLibro') {
    if (!empty($_REQUEST['titolo']) && !empty($_REQUEST['autore']) && !empty($_REQUEST['genere']) && !empty($_REQUEST['anno']) && !empty($_REQUEST['id']) && !empty($_REQUEST['id_autore'])) {
        if (strlen(trim($_REQUEST['titolo'])) > 0 && strlen(trim($_REQUEST['autore'])) > 0 && strlen(trim($_REQUEST['genere'])) > 0) {
            if (is_numeric($_REQUEST['anno']) && $_REQUEST['anno'] > 0) {
                editLibro($mysqli, $_REQUEST['titolo'], $_REQUEST['autore'], $_REQUEST['genere'], $_REQUEST['anno'], $_REQUEST['id'], $_REQUEST['id_autore']);
            } else {
                exit(header("Location: updatebook.php?id={$_REQUEST['id']}&edit=notsuccess"));
                // echo "<p class='bg-danger'>Errore: L'anno di pubblicazione deve essere un numero maggiore di 0.</p>";
            }
        } else {
            exit(header("Location: updatebook.php?id={$_REQUEST['id']}&edit=notsuccess"));
            // echo "<p class='bg-danger'>Errore: Non hai inserito correttamente tutti i dati.</p>";
        }
    } else {
        exit(header("Location: updatebook.php?id={$_REQUEST['id']}&edit=notsuccess"));
        // echo "<p class='bg-danger'>Errore: Non hai inserito correttamente tutti i dati.</p>";
    }
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] === 'delLibro') {
    if (!empty($_REQUEST['id'])) {
        delLibro($mysqli, $_REQUEST['id']);
    } else {
        exit(header("Location: form.php?error=1"));
        // echo "<p class='bg-danger'>Errore: Non hai specificato l'ID del libro da eliminare.</p>";
    }
}

else {
    echo "<p>Nessuna azione specificata o non hai inserito correttamente tutti i dati.</p>";
}



//AUTORI
if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'addAutore') {
    if (!empty($_POST['pseudonimo']) && !empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['citta'])) {
        addAutore($mysqli, $_POST['pseudonimo'], $_POST['nome'], $_POST['cognome'], $_POST['citta']);
    } else {
        exit(header("Location: formautore.php?error=1"));
    }
}elseif (isset($_REQUEST['action']) && $_REQUEST['action'] === 'delAutore') {
    delAutore($mysqli, $_REQUEST['id']);
}