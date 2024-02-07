<?php

require_once 'config.php';
include_once('functions.php');
include_once('header.php');
include_once('navbar.php');

$libri = getLibri($mysqli);
?>
<div class="container">
<h3 class="text-white text-center">Libri</h3>
    <table class="contianer table table-hover table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="1">#</th>
                <th scope="col" colspan="4">Titolo</th>
                <th scope="col" colspan="4">Autore</th>
                <th scope="col" colspan="1">Anno</th>
                <th scope="col" colspan="1">Genere</th>
                <th scope="col" colspan="1" style="width:9rem">Elimina/Modifica</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($libri as $key => $libro) { ?>
                <tr>
                    <th scope="col" colspan="1"><?= $key + 1 ?></th>
                    <td scope="col" colspan="4"><?= $libro['titolo'] ?> </td>
                    <td scope="col" colspan="4"><a href="detailautore.php?autore=<?= $libro['id_autore'] ?>"><?= $libro['autore'] ?></a></td>
                    <td scope="col" colspan="1"><?= $libro['anno_pubblicazione'] ?></td>
                    <td scope="col" colspan="1"><?= $libro['genere'] ?> </td>
                    <td scope="col" colspan="1" style="text-align: center;">
                        <a class="btn btn-outline-danger" href="controller.php?action=delLibro&id=<?= $libro['id'] ?>" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                            </svg></a>
                        <a class="btn btn-outline-primary" href="updatebook.php?id=<?= $libro['id'] ?>" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 'success') {
        echo "<p class='bg-success text-center mt-4 text-white'>Hai cancellato correttamente l'opera.</p>";
    } else if (isset($_GET['added']) && $_GET['added'] == 'success') {
        echo "<p class='bg-success text-center mt-4 text-white'>Hai aggiunto correttamente l'opera.</p>";
    } else if (isset($_GET['edited']) && $_GET['edited'] == 'success') {
        echo "<p class='bg-success text-center mt-4 text-white'>Hai aggiornato correttamente l'opera.</p>";
    }
    ?>
</div>