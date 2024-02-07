<?php

require_once 'config.php';
include_once('functions.php');
include_once('header.php');
include_once('navbar.php');


if(isset($_GET['id']) ) {
    $libro = idLibro($mysqli);
}

function idLibro($mysqli) {     
    $sql = "SELECT * FROM libri WHERE id = " . $_GET['id']; 
    $risultato = $mysqli->query($sql); 
    if($risultato) { 
        $result = $risultato->fetch_assoc(); 
    }
    return $result;
    //var_dump($libro);
} 


?>
<h2 class="text-center text-white">Aggiorna Opera</h2>
<div class="container">
<form class="text-white" method="post" action="controller.php?action=editLibro&id=<?=$_GET['id']?>" action="controller.php?action=addLibro">
  <div class="form-group">
    <label for="titolo">Titolo</label>
    <input type="text" class="form-control" value="<?= $libro['titolo'] ?>" id="titolo" placeholder="Inserisci il titolo dell'opera" name="titolo">
    <small id="titolohelp" class="form-text text-secondary">Il titolo non può superare i 255 caratteri.</small>
  </div>
  <div class="form-group">
    <label for="autore">Autore</label>
    <input type="text" class="form-control" value="<?= $libro['autore'] ?>" id="autore" placeholder="Inserisci il nome dell'autore" name="autore">
    <small id="autorehelp" class="form-text text-secondary">Il nome dell'autore non può superare i 255 caratteri.</small>
  </div>
  <div class="form-group">
            <label for="autore">ID Autore</label>
            <input type="number" class="form-control" value="<?= $libro['id_autore'] ?>" id="idautore" placeholder="Inserisci l'id dell'autore" name="id_autore">
            <small id="autorehelp" class="form-text text-secondary">Inserisci l'id dell'autore del libro.</small>
        </div>
  <div class="form-group">
    <label for="genere">Genere</label>
    <input type="text" class="form-control" value="<?= $libro['genere'] ?>" id="genere" placeholder="Inserisci il genere dell'opera" name="genere">
    <small id="generehelp" class="form-text text-secondary">Il genere dell'opera non può superare i 255 caratteri.</small>
  </div>

  <div class="form-group">
    <label for="anno">Anno di pubblicazione</label>
    <select name="anno" id="anno" data-component="date">
        <?php 
        for ($year = 1500; $year <= date('Y'); $year++) {
            $selected = ($libro['anno_pubblicazione'] == $year) ? 'selected' : '';
            echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
        }
        ?>
    </select>
</div>

  
  <button type="submit" class="btn btn-outline-success mt-5">Aggiorna Opera</button>
</form>

<?php if (isset($_GET['edit']) && $_GET['edit'] == 'notsuccess') {
        echo "<p class='bg-danger text-center mt-4 text-white'>Non hai inserito correttamente tutti i dati.</p>";}
        ?>
</div>