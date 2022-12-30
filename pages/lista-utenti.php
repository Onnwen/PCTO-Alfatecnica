<?php
session_start();
require_once('../php/connessione.php');

if (isset($_SESSION['session_id'])) {


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
        <title>Alfatecnica - Lista Utenti</title>
        <link rel="icon" href="img/logo.png">
    </head>

    <body>
    <?php require_once("navbar.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h4 class="text-center">Utenti</h4>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <div class="container-fluid">
        <div class="row w-100">
            <div class="col-1">
                <button style="float: right" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                    <i class="bi bi-person-plus-fill"></i></button>
            </div>
            <div class="col-7 d-inline-flex">
                <input style="margin-right: 5px" type="text" id="companyName" class="form-control w-50" placeholder="Nome e/o cognome utente" aria-label="Nome azienda">
                <input type="text" id="companyName" class="form-control w-50" placeholder="Nome azienda" aria-label="Nome azienda">
            </div>
            <div class="col-2 text-center">
                <button type="button" class="btn btn-outline-success w-50" onclick="search();"><i class="fa-solid fa-magnifying-glass"></i>Cerca</button>
                <button type="button" class="btn btn-outline-success selected change_cards verde" id="cards"><i class="fa-solid fa-table-list bianco"></i></button>
                <button type="button" class="btn btn-outline-success change_table verde" id="table"><i class="bi bi-view-list bianco"></i></i></button>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-outline-warning w-100" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                    <i class="bi bi-person-fill-exclamation"></i>&nbsp;&nbsp;Conferma utenti</button>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="container">
        <div class="row row-tabella">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center;">
                            <th scope="col">Nome</th>
                            <th scope="col">Tipologia</th>
                            <th scope="col" style="width: 200px">Gestione</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!-- Footer -->
    <?php require_once("footer.php"); ?>
    <!-- Fine -->
    </body>

    </html>

    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>