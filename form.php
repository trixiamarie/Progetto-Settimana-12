<?php

require_once 'config.php';
include_once('functions.php');
include_once('header.php');
include_once('navbar.php');


?>
<h2 class="text-center text-white">Aggiungi Opera</h2>
<p class="text-secondary text-center">ATTENZIONE: Tutti i campi sono obbligatori.</p>
<div class="container">
    <form class="text-white" method="post" action="controller.php?action=addLibro">
        <div class="form-group">
            <label for="titolo">Titolo</label>
            <input type="text" class="form-control" id="titolo" placeholder="Inserisci il titolo dell'opera" name="titolo">
            <small id="titolohelp" class="form-text text-secondary">Il titolo non può superare i 255 caratteri.</small>
        </div>
        <div class="form-group">
            <label for="autore">Autore</label>
            <input type="text" class="form-control" id="autore" placeholder="Inserisci il nome dell'autore" name="autore">
            <small id="autorehelp" class="form-text text-secondary">Il nome dell'autore non può superare i 255 caratteri.</small>
        </div>
        <div class="form-group">
            <label for="autore">ID Autore</label>
            <input type="number" class="form-control" id="idautore" placeholder="Inserisci l'id dell'autore" name="id_autore">
            <small id="autorehelp" class="form-text text-secondary">Inserisci l'id dell'autore del libro.</small>
        </div>
        <div class="form-group">
            <label for="genere">Genere</label>
            <input type="text" class="form-control" id="genere" placeholder="Inserisci il genere dell'opera" name="genere">
            <small id="generehelp" class="form-text text-secondary">Il genere dell'opera non può superare i 255 caratteri.</small>
        </div>
        <div class="form-group">
            <label for="anno">Anno di pubblicazione</label>

            <select name="anno" id="anno" data-component="date">
                <?php for ($year = 1500; $year <= date('Y'); $year++) {
                    echo '<option value="' . $year . '">' . $year . '</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-success mt-5">Aggiungi Opera</button>
    </form>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "<p class='bg-danger text-center mt-4 text-white'>Errore: Non hai inserito correttamente tutti i dati.</p>";
    }
    ?>
</div>
<div class="text-center text-white my-4"><h4>Non trovi l'id dell'autore del tuo libro? Controlla la tabella qua sotto!</h4></div>
<?php
include_once('tabellaautori.php');
?>

<!-- <input type="number" class="form-control" id="anno" placeholder="Inserisci l'anno di pubblicazione dell'opera" name="anno">
    <small id="annohelp" class="form-text text-secondary"> L'anno di pubblicazione dell'opera deve essere scitto in aaaa</small> -->