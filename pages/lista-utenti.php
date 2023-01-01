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
        <title>Alfatecnica - Lista Utenti</title>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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
                <button id="table" type="button" class="btn btn-outline-success selected change_cards verde" id="cards"><i class="fa-solid fa-table-list bianco"></i></button>
                <button id="collapse" type="button" class="btn btn-outline-success change_table verde" id="table"><i class="bi bi-view-list bianco"></i></i></button>
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
    <div class="container" id="listTable">
        <div class="row row-tabella">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center;">
                            <th scope="col">Nome e Cognome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Azienda</th>
                            <th scope="col">Tipologia</th>
                            <th scope="col" style="width: 125px"></th>
                        </tr>
                        </thead>
                        <tbody >
                        <tr>
                            <td>Nome Cognome</td>
                            <td>
                                <a href="mailto:">email</a>
                            </td>
                            <td>Nome Azienda</td>
                            <td>Tipologia</td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                                    <i class="bi bi-person-check-fill"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                                    <i class="bi bi-person-x-fill"></i></button>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="listCollapse">
        <div class="row">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            AMINISTRATORI
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="bi bi-chevron-down"></i>
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col">Nome e Cognome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Azienda</th>
                                        <th scope="col">Tipologia</th>
                                        <th scope="col" style="width: 125px"></th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    <tr>
                                        <td>Nome Cognome</td>
                                        <td>
                                            <a href="mailto:">email</a>
                                        </td>
                                        <td>Nome Azienda</td>
                                        <td>Tipologia</td>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                                                <i class="bi bi-person-check-fill"></i></button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                                                <i class="bi bi-person-x-fill"></i></button>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            TECNICI
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="bi bi-chevron-down"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col">Nome e Cognome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Azienda</th>
                                        <th scope="col">Tipologia</th>
                                        <th scope="col" style="width: 125px"></th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    <tr>
                                        <td>Nome Cognome</td>
                                        <td>
                                            <a href="mailto:">email</a>
                                        </td>
                                        <td>Nome Azienda</td>
                                        <td>Tipologia</td>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                                                <i class="bi bi-person-check-fill"></i></button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                                                <i class="bi bi-person-x-fill"></i></button>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            DALLARA
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="bi bi-chevron-down"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col">Nome e Cognome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Azienda</th>
                                        <th scope="col">Tipologia</th>
                                        <th scope="col" style="width: 125px"></th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    <tr>
                                        <td>Nome Cognome</td>
                                        <td>
                                            <a href="mailto:">email</a>
                                        </td>
                                        <td>Nome Azienda</td>
                                        <td>Tipologia</td>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                                                <i class="bi bi-person-check-fill"></i></button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                                                <i class="bi bi-person-x-fill"></i></button>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!-- Footer -->
    <?php require_once("footer.php"); ?>
    <!-- Fine -->
    <script>
        $(document).ready(function () {
            $("#listCollapse").attr("hidden", true );
        });
        $("#table").click(function () {
            $("#listCollapse").attr("hidden", true);
            $("#listTable").removeAttr("hidden");
        });
        $("#collapse").click(function () {
            console.log("ciao");
            $("#listTable").attr("hidden", true);
            $("#listCollapse").removeAttr("hidden");
        });
    </script>
    </body>

    </html>

    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>