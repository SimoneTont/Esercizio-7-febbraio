<?php
require_once 'config.php';
require_once 'funzioni.php';

$libri = getAllBooks($mysqli);

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria - BackEnd settimana 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>

<body>

    <button type="button" class="btn btn-success mt-4 d-flex mx-auto" data-bs-toggle="modal" data-bs-target="#modaleAdd">
    <i class="bi bi-patch-plus-fill mx-2"></i>
        Aggiungi un libro
    </button>

    <table class="table table-hover container mt-4 border">
        <thead>
            <tr class="text-center">
                <th class="myThead" scope="col">ID</th>
                <th class="myThead" scope="col">Titolo</th>
                <th class="myThead" scope="col">Autore</th>
                <th class="myThead" scope="col">Anno</th>
                <th class="myThead" scope="col">Genere</th>
                <th class="myThead" scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($libri as $key => $libro) { ?>
                <tr class="text-center">
                    <th class="myTbody" scope="row"><?= $libro['id'] ?></th>
                    <td class="myTbody"><?= $libro['titolo'] ?></td>
                    <td class="myTbody"><?= $libro['autore'] ?></td>
                    <td class="myTbody"><?= $libro['anno'] ?></td>
                    <td class="myTbody"><?= $libro['genere'] ?></td>
                    <th class="myTbody2">
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a role="button" class="btn btn-warning px-2 py-1" data-bs-toggle="modal" data-bs-target="#modaleUpdate_<?= $libro['id'] ?>"><i class="bi bi-pencil-square"></i></a>
                            <a role="button" class="btn btn-danger px-2 py-1" href="funzioni.php?action=remove&id=<?= $libro['id'] ?>"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </th>
                </tr>
                <div class="modal fade" id="modaleUpdate_<?= $libro['id'] ?>" tabindex="-1" aria-labelledby="modaleUpdate<?= $libro['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Modifica i dati</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="funzioni.php">
                                    <input type="hidden" name="id" value="<?= $libro['id'] ?>">
                                    <div class="mb-3">
                                        <label for="titoloLibroUp" class="form-label">Titolo</label>
                                        <input type="text" class="form-control" id="titoloLibroUp" aria-describedby="titoloLibroUp" name="titoloUp" value="<?= $libro['titolo'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="autoreLibroUp" class="form-label">Autore</label>
                                        <input type="text" class="form-control" id="autoreLibroUp" name="autoreUp" value="<?= $libro['autore'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="annoLibroUp" class="form-label">Anno di pubblicazione</label>
                                        <input type="number" step="1" min="1" max="2024" class="form-control" id="annoLibroUp" name="annoUp" value="<?= $libro['anno'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="genereLibroUp" class="form-label">Genere</label>
                                        <input type="text" class="form-control" id="genereLibroUp" name="genereUp" value="<?= $libro['genere'] ?>">
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                        <button type="submit" class="btn btn-primary" name="action" value="update">Aggiorna libro</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<!-- Modale per l'aggiunta di un libro -->
<div class="modal fade" id="modaleAdd" tabindex="-1" aria-labelledby="modaleAdd" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Dati del libro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="funzioni.php">
                    <div class="mb-3">
                        <label for="titoloLibro" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="titoloLibro" aria-describedby="titoloLibro" name="titolo">
                    </div>
                    <div class="mb-3">
                        <label for="autoreLibro" class="form-label">Autore</label>
                        <input type="text" class="form-control" id="autoreLibro" name="autore">
                    </div>
                    <div class="mb-3">
                        <label for="annoLibro" class="form-label">Anno di pubblicazione</label>
                        <input type="number" step="1" min="1" max="2024" class="form-control" id="annoLibro" name="anno">
                    </div>
                    <div class="mb-3">
                        <label for="genereLibro" class="form-label">Genere</label>
                        <input type="text" class="form-control" id="genereLibro" name="genere">
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <button type="submit" class="btn btn-primary" name="action" value="add">Aggiungi il libro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>