<?php
session_start();
require_once('../php/connessione.php');

if (isset($_SESSION['session_id'])) {
    $productsCategorySql = "select product_category_id, name from Product_Category;";
    $productsCategory = array();
    $pre = $pdo->prepare($productsCategorySql);
    $pre->execute();
    while ($productCategory = $pre->fetch(PDO::FETCH_ASSOC)) {
        $productsCategory[] = $productCategory;
    }

    ?>

    <!DOCTYPE html>
    <html lang="it">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title>Alfatecnica - Lista Prodotti</title>
        <link rel="icon" href="img/logo.png">
    </head>

    <body>
    <?php require_once("navbar.php"); ?>

    <hr>
    <br>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmedModal" tabindex="-1" aria-labelledby="confirmedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: darkgreen" id="confirmedModalLabel">Effettuato con successo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    L'operazione è avvenuta con successo.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: darkred" id="errorModalLabel">È stato riscontrato un problema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    È stato riscontrato un errore durante il caricamento dei dati. Nessuna modifica è stata applicata.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Modal -->
    <div class="modal fade" id="loadingModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loadingModalLabel">Attendi</h5>
                    <div class="spinner-border spinner-border-sm" role="status"></div>
                </div>
                <div class="modal-body">
                    Caricamento dei dati in corso.
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Company Modal -->
    <div class="modal fade" id="companyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Aggiungi prodotto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="basic-url" class="form-label">Dati generali</label>
                        <div class="row gx-2">
                            <div class="col me-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="addNameLabel">Nome</span>
                                    <input class="form-control" type="text" id="name" aria-describedby="addNameLabel">
                                </div>
                            </div>
                            <div class="col-2">
                                <input type="radio" class="btn-check" name="form" id="isProduct" autocomplete="off" checked>
                                <label class="btn btn-outline-secondary w-100"  for="isProduct">Prodotto</label>
                            </div>
                            <div class="col-2">
                                <input type="radio" class="btn-check" name="form" id="isForm" autocomplete="off">
                                <label class="btn btn-outline-secondary w-100" for="isForm">Formulario</label>
                            </div>
                        </div>
                        <label for="basic-url" class="form-label">Campi</label>
                        <div id="modalFields">
                        </div>
                        <div id="filesInput">
                            <label for="basic-url" class="form-label">Icona</label>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input class="form-control" type="file" id="icon" aria-describedby="addIconLabel">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="companyModalCloseButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button id="companyModalConfirmButton" type="button" class="btn btn-success" onclick="insertInDatabase();">Aggiungi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Aggiunta e ricerca -->
    <div class="container">
        <div class="row w-100">
            <div class="col">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#companyModal" data-bs-whatever="addCompany" id="openProductModal">
                    <i class="bi bi-box-fill"></i>&nbsp;&nbsp;Aggiungi prodotto
                </button>
            </div>
        </div>
    </div>

    <br>

    <!-- Lista prodotti -->
    <div class="container">
        <div class="row row-tabella">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center;">
                            <th scope="col">Nome</th>
                            <th scope="col" style="width: 200px">Gestione</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="text-align: center;">
                            <?php
                            foreach ($productsCategory as $productCategory) {
                                echo "<tr>";
                                echo "<th>{$productCategory['name']}</th>";
                                echo '<td style="text-align: center"><button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button><button class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></button><button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button></td>';
                                echo "</tr>";
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <!-- FOOTER -->

    <hr>
    <footer class="py-3 my-4">
        <p class="text-center text-muted ">© 2022 Alfatecnica, Inc</p>
    </footer>
    </body>

    <script>
        let newProductFieldNames = ["Peso", "Marchio", "Colore", "Scadenza"];

        $("#isProduct").on('click', function () {
            $("#productModalLabel").text("Aggiungi prodotto")
        });

        $("#isForm").on('click', function () {
            $("#productModalLabel").text("Aggiungi formulario")
        });

        $("#openProductModal").on('click', function () {
            loadNewProductFields();
        });

        function loadNewProductFields() {
            let fieldsHtml = "";
            newProductFieldNames.forEach((field, index) => {
                fieldsHtml += '<div class="input-group mb-2"> ' +
                    `<span class="input-group-text" id="addNameLabel" style="min-width: 100px;">Campo ${index+1}</span> ` +
                    `<input class="form-control" type="text" id="name" aria-describedby="addNameLabel" value="${field}" placeholder="Nome campo">`;
                if (newProductFieldNames.length > 1) {
                    fieldsHtml += `<button class="btn btn-outline-danger removeField" type="button" onclick="removeField(${index})"><i class="bi bi-trash3"></i></button> `;
                }
                if (index === newProductFieldNames.length - 1) {
                    fieldsHtml += `<button class="btn btn-outline-primary" type="button" onclick="addField()"><i class="bi bi-plus-circle"></i></button> `;
                }
                fieldsHtml += `</div>`;
            })
            fieldsHtml += `<div class="mb-3"></div>`;
            $("#modalFields").html(fieldsHtml);
        }

        function addField() {
            newProductFieldNames.push("");
            loadNewProductFields();
        }

        function removeField(id) {
            newProductFieldNames.splice(id, 1);
            loadNewProductFields();
        }

    </script>

    </html>

    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>
