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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
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
    <div class="modal fade" id="companyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="companyModalLabel">Aggiungi prodotto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="basic-url" class="form-label">Informazioni generali</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addNameLabel">Nome</span>
                            <input class="form-control" type="text" id="name" aria-describedby="addNameLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addCiteLabel">Sede</span>
                            <input class="form-control" type="text" id="site" aria-describedby="addCiteLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addAddressLabel">Indirizzo</span>
                            <input class="form-control" type="text" id="address" aria-describedby="addAddressLabel">
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="addCityLabel">Città</span>
                                    <input class="form-control" type="text" id="city" aria-describedby="addCityLabel">
                                    <span class="input-group-text" id="addCapLabel">CAP</span>
                                    <input class="form-control" type="text" id="CAP" aria-describedby="addCapLabel">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="addProvinceLabel">Provincia</span>
                                    <input class="form-control" type="text" id="province" aria-describedby="addProvinceLabel">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <label for="basic-url" class="form-label">Recapiti</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addPersonalReferenceLabel">Riferimento personale</span>
                            <input class="form-control" type="text" id="personalReference" aria-describedby="addPersonalReferenceLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addCellPhoneNumberLabel">Numero di cellulare</span>
                            <input class="form-control" type="text" id="cellPhoneNumber" aria-describedby="addCellPhoneNumberLabel">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="addPhoneNumberLabel">Numero di telefono</span>
                                    <input class="form-control" type="text" id="phoneNumber" aria-describedby="addPhoneNumberLabel">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="addEmailAddressLabel">Indirizzo email</span>
                                    <input class="form-control" type="text" id="emailAddress" aria-describedby="addEmailAddressLabel">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="addPhoneNumber2Label">Numero di telefono 2</span>
                                    <input class="form-control" type="text" id="phoneNumber2" aria-describedby="addPhoneNumber2Label">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="addEmailAddress2Label">Indirizzo email 2</span>
                                    <input class="form-control" type="text" id="emailAddress2" aria-describedby="addEmailAddress2Label">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <label for="basic-url" class="form-label">Note</label>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="addCompanyNotesLabel">Note aziendali</span>
                                    <textarea class="form-control" type="text" id="companyNotes" aria-describedby="addCompanyNotesLabel"></textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="addClientNotesLabel">Note per cliente</span>
                                    <textarea class="form-control" type="text" id="clientNotes" aria-describedby="addClientNotesLabel"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="filesInput">
                            <br/>
                            <label for="basic-url" class="form-label">File</label>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="addPlanimetryLabel">Planimetria</span>
                                        <input class="form-control" type="file" id="planimetry_image" aria-describedby="addPlanimetryLabel">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="addLogoLabel">Logo</span>
                                        <input class="form-control" type="file" id="logo" aria-describedby="addLogoLabel">
                                    </div>
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
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#companyModal" data-bs-whatever="addCompany">
                    <i class="bi bi-box-fill"></i> Aggiungi prodotto
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
    </html>

    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>
