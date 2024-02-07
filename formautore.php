<?php

require_once 'config.php';
include_once('functions.php');
include_once('header.php');
include_once('navbar.php');


?>
<h2 class="text-center text-white">Aggiungi Autore</h2>
<p class="text-secondary text-center">ATTENZIONE: Tutti i campi sono obbligatori.</p>
<div class="container">
    <form class="text-white" method="post" action="controller.php?action=addAutore">
        <div class="form-group">
            <label for="pseudonimo">Pseudonimo</label>
            <input type="text" class="form-control" id="titolo" placeholder="Inserisci lo pseudonimo dell'autore" name="pseudonimo">
            <small id="pseudohelp" class="form-text text-secondary">Lo pseudonimo non può superare i 255 caratteri.</small>
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Inserisci il nome dell'autore" name="nome">
            <small id="nomehelp" class="form-text text-secondary">Il nome dell'autore non può superare i 255 caratteri.</small>
        </div>
        <div class="form-group">
            <label for="Cognome">Cognome</label>
            <input type="text" class="form-control" id="cognome" placeholder="Inserisci il cognome dell'autore" name="cognome">
            <small id="cognomehelp" class="form-text text-secondary">Il cognome dell'autore non può superare i 255 caratteri.</small>
        </div>
        <div class="form-group">
            <label for="citta">Città</label>
            <input type="text" class="form-control" id="citta" placeholder="Inserisci la città dove vive/è nato l'autore" name="citta">
            <small id="cittahelp" class="form-text text-secondary">La città dell'autore non può superare i 255 caratteri.</small>
        </div>
        <button type="submit" class="btn btn-outline-success mt-5">Aggiungi Autore</button>
    </form>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "<p class='bg-danger text-center mt-4 text-white'>Errore: Non hai inserito correttamente tutti i dati.</p>";
    }
    ?>
</div>
<div class="text-center text-white my-4"><h4>Non sei sicuro se l'autore che vuoi aggiungere è già presente? Controlla la tabella qua sotto!</h4></div>
<?php
include_once('tabellaautori.php');
?>

<!-- <input type="number" class="form-control" id="anno" placeholder="Inserisci l'anno di pubblicazione dell'opera" name="anno">
    <small id="annohelp" class="form-text text-secondary"> L'anno di pubblicazione dell'opera deve essere scitto in aaaa</small> -->