<?php
session_start();
require_once("../php/connessione.php");
if (isset($_SESSION['session_id'])) {
?>

    <html>

    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../img/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="../css/style.css">
        <title>Alfatecnica - Dettaglio Anagrafica</title>
    </head>

    <body>
        <?php require_once("navbar.php"); ?>

        <!-- Modal -->
        <div class="modal fade" id="revisionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="revisionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="revisionModalLabel">Registra Revisione</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label for="basic-url" class="form-label">Revisione</label>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="companyNameLabel">Azienda</span>
                                        <input class="form-control" type="text" id="companyName" aria-describedby="companyNameLabel" disabled="">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="productNameLabel">Prodotto</span>
                                        <input class="form-control" type="text" id="productName" aria-describedby="productNameLabel" disabled="">
                                    </div>
                                </div>
                            </div>

                            <label for="basic-url" class="form-label">Data Revisione</label>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="addDateLabel">Data</span>
                                        <input class="form-control" type="date" id="revisionDate" aria-describedby="addDateLabel">
                                    </div>
                                </div>
                            </div>

                            <input type="text" hidden id="companyId">
                            <input type="text" hidden id="productId">

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="revisionModalCloseButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <button id="revisionModalConfirmButton" type="button" class="btn btn-success" onclick="makeNewRevision()">Conferma</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabella -->
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center nome-azienda">
                    <div class="row">
                        <div class="col-12">
                            <h4>Revisioni</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            </div>
            <div class="row row-tabella">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">
                                        Nome Azienda
                                    </th>
                                    <th scope="col">
                                        Categoria Prodotto
                                    </th>
                                    <th scope="col">
                                        Data Ultima Revisione
                                    </th>
                                    <th scope="col">
                                        Data Scadenza Revisione
                                    </th>
                                    <th scope="col">
                                        Azioni
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="ToFill">
                            </tbody>
                        </table>
                        <div class="justify-content-center" style="display: flex;">
                            <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#revisionModal">Registra revisione</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fine -->

        <!-- Footer -->
        <?php require_once("footer.php"); ?>
    </body>
    <script>
        function makeNewRevision() {
            let productId = $("#productId").val();
            let companyId = $("#companyId").val();
            let revisionDate = $("#revisionDate").val();

            $.post("../php/revisions/makeRevision.php", {
                product: productId,
                company: companyId,
                revisionDate: revisionDate
            }, function(response) {

                // FIXME: Appena l'API diventa RESTful dobbiamo sistemare questo abominio
                if (response == "OK") {
                    // TODO: Mostra conferma all'utente prima di ricaricare la pagina
                    window.location.reload();
                } else {
                    // TODO: Mostra messaggio di errore all'utente
                }
            });
        }

        function setRevisionData(companyName, companyId, productName, productId) {
            $("#companyName").val(companyName);
            $("#productName").val(productName);
            $("#companyId").val(companyId);
            $("#productId").val(productId);
        }

        $(document).ready(function() {
            $.get("../php/revisions/getRevisions.php", function(response) {
                // Stampa le revisioni nella tabella

                let tableString = "";

                for (let i = 0; i < response.length; i++) { // TODO: Fare paginatore? 
                    revision = response[i];

                    let statusColor = "";

                    let DeadlineDate = new Date(revision.Deadline);
                    let today = new Date();

                    let millisecondDifference = DeadlineDate - today;
                    let monthDifference = millisecondDifference / 2592000000;

                    if (monthDifference <= 0) {
                        // Revisione scaduta
                        statusColor = "red";
                    } else if (monthDifference <= 1) { // TODO: Definire precisamente cosa vuol dire "sta per scadere"
                        // Manca circa un mese; considero come "Poco"
                        statusColor = "orange";
                    } else {
                        statusColor = "green";
                    }

                    tableString += "<tr style='text-align: center; color: " + statusColor + "'>";
                    tableString += ("<td scope='col'>" + revision.CompanyName + "</td>" + "<td scope='col'>" + revision.ProductCategoryName + "</td>" + "<td scope='col'>" + revision.LastRevision + "</td>" + "<td scope='col'>" + revision.Deadline + "</td>");
                    // FIXME: Trovare un modo migliore per passare i dati al modal; per adesso setRevisionData funziona, ma non è molto elegante
                    tableString += "<td scope='col'><a href='#' data-bs-toggle='modal' data-bs-target='#revisionModal' data-bs-whatever='' onclick='setRevisionData(\"" + revision.CompanyName + "\"," + revision.CompanyID + ",\"" + revision.ProductCategoryName + "\"," + revision.ProductCategoryID + ")'>Revisiona</a></td>";
                    tableString += "</tr>";
                }

                $("#ToFill").html(tableString);
            }, "json");
        });
    </script>

    </html>

<?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>