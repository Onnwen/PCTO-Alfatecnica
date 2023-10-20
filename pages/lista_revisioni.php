<?php
session_start();
require_once("../php/connection/connection.php");
if (isset($_SESSION['session_id'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../img/LogoBlack.png">
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

        <!-- Modal Revisioni-->
        <div class="modal fade" id="revisionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="revisionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="revisionModalLabel">Registra Manutenzione</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label for="basic-url" class="form-label">Manutenzione</label>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="companyNameLabel">Azienda</span>
                                        <select class="form-control" id="companyName" aria-describedby="companyNameLabel">
                                            <option disabled selected value="">Seleziona Azienda</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="productNameLabel">Prodotto</span>
                                        <select class="form-control" id="productName" aria-describedby="productNameLabel">
                                            <option disabled selected value="">Seleziona Prodotto</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <label for=" basic-url" class="form-label">Data Manutenzione</label>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="addDateLabel">Data</span>
                                        <input class="form-control" type="date" id="revisionDate" aria-describedby="addDateLabel">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="revisionModalCloseButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <button id="revisionModalConfirmButton" type="button" class="btn btn-success" onclick="makeNewRevision()">Conferma</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Errori -->
        <div class="modal fade" id="errorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-x1 modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Errore registrazione!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>La registrazione di questa Manutenzione è andata in errore!</p>
                        <p id="revisionErrorDescription"></p>
                        <p>Codice errore: <span id="revisionErrorCode"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button id="errorModalCloseButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Successo -->
        <div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-x1 modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Manutenzione registrata con successo!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>La registrazione di questa Manutenzione è andata a buon fine!</p>
                    </div>
                    <div class="modal-footer">
                        <button id="successModalCloseButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload()">Chiudi</button>
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
                            <h4>Manutenzioni programmate e controlli</h4>
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
                                        Data Ultima Manutenzione
                                    </th>
                                    <th scope="col">
                                        Data Scadenza Manutenzione
                                    </th>
                                    <th scope="col">
                                        Stato
                                    </th>
                                    <th scope="col">
                                        Azioni
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="ToFill">
                            </tbody>
                        </table>
                        <nav>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center ">
                                    <li class="page-item">
                                        <button class="page-link" id="previousPageButton" aria-label="Previous " disabled onclick="previousPage();">
                                            <span aria-hidden="true">«</span>

                                        </button>
                                    </li>
                                    <li class="page-item">
                                        <div class="page-link" aria-label="Pagina corrente">
                                            <span id="pageNumber"></span>
                                        </div>
                                    </li>
                                    <li class="page-item">
                                        <button class="page-link" id="nextPageButton" aria-label="Next " onclick="nextPage();">
                                            <span aria-hidden="true">»</span>
                                        </button>
                                    </li>
                                </ul>
                            </nav>
                            <div class="justify-content-center" style="display: flex;">
                                <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#revisionModal" onclick="clearDataFromModal()">Registra Manutenzione</button>
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
        let preselectedProduct = null;
        let revisionsPerPage = 5; // TODO: Trovare il valore ottimale in base alla dimensione dello schermo
        let maxPageNumber = 0;
        let currentPage = 0;
        let allRevisions = [];

        function makeNewRevision() {
            let productId = $("#productName").val();
            let companyId = $("#companyName").val();
            let revisionDate = $("#revisionDate").val();

            $.post("../php/revisions/addRevision.php", {
                product: productId,
                company: companyId,
                revisionDate: revisionDate
            }, function(response) {
                $("#revisionModal").modal("hide");
                $("#successModal").modal("show");
            }).fail(function(response) {

                $("#revisionErrorCode").html(response.status);
                let errorDescriptionString = "";

                switch (response.status) {
                    case 400:
                        errorDescriptionString = "Il modulo della registrazione non è stato compilato correttamente!";
                        break;
                    case 500:
                        errorDescriptionString = "Il server ha un problema tecnico!";
                        break;
                    default:
                        errorDescriptionString = "Errore non riconosciuto; Comunicare il codice errore qua sotto agli sviluppatori!";
                        break;
                }

                $("#revisionErrorDescription").html(errorDescriptionString);

                $("#revisionModal").modal("hide");
                $("#errorModal").modal('show');
            });
        }

        function setRevisionData(companyId, productId) {
            preselectedProduct = productId;

            $("#companyName").val(companyId);
            $("#companyName").change();
        }

        function clearDataFromModal() {
            $("#companyName").val("");
            $("#productName").val("");

            changeSelectedCompany();

            preselectedProduct = null;
        }

        function changeSelectedCompany() {
            // Fai in modo che quando seleziono un'azienda vengono automaticamente aggiornate le opzioni per i prodotti
            let selectedCompany = $("#companyName").val();

            let generatedOptions = "<option disabled selected value=''>Seleziona Prodotto</option>";

            if (selectedCompany === null) {
                // Non è necessario fare una chiamata se stiamo deselezionando l'azienda
                $("#productName").html(generatedOptions);
            } else {
                $.post("../php/getCategories.php", {
                    idAnag: selectedCompany
                }, function(response) {
                    let receivedProducts = JSON.parse(response);

                    receivedProducts.forEach(product => {
                        generatedOptions += ("<option value='" + product.idCategoria + "'>" + product.nomeCategoria + "</option>");
                    });

                    $("#productName").html(generatedOptions);

                    // Per fare in modo che il bottone "Manutenzione rapida" possa richiedere di settare un prodotto in anticipo
                    if (preselectedProduct !== null) {
                        $("#productName").val(preselectedProduct);
                    }
                });
            }

        }

        function loadRevisions(pageNumber) {
            // Stampa le revisioni nella tabella

            let tableString = "";

            for (let i = revisionsPerPage * pageNumber; i < revisionsPerPage * (pageNumber + 1) && i < allRevisions.length; i++) {
                revision = allRevisions[i];

                let statusColor = "";
                let statusText = "";

                let DeadlineDate = new Date(revision.Deadline);
                let today = new Date();

                let millisecondDifference = DeadlineDate - today;
                let monthDifference = millisecondDifference / 2592000000;

                if (monthDifference <= 0) {
                    // Manutenzione scaduta
                    statusColor = "red";
                    statusText = "Scaduta";
                } else if (monthDifference <= 1) { // TODO: Definire precisamente cosa vuol dire "sta per scadere"
                    // Manca circa un mese; considero come "Poco"
                    statusColor = "orange";
                    statusText = "In Scadenza";
                } else {
                    statusColor = "green";
                    statusText = "Regolare";
                }

                tableString += "<tr style='text-align: center;'>";
                tableString += ("<td scope='col'>" + revision.CompanyName + "</td>" + "<td scope='col'>" + revision.ProductCategoryName + "</td>" + "<td scope='col'>" + revision.LastRevision + "</td>" + "<td scope='col'>" + revision.Deadline + "</td><td style='color:" + statusColor + "'>" + statusText + "</td>");
                // FIXME: Trovare un modo migliore per passare i dati al modal; per adesso setRevisionData funziona, ma non è molto elegante
                tableString += "<td scope='col'><button class='btn btn-sm btn-outline-success' data-bs-toggle='modal' data-bs-target='#revisionModal' onclick='setRevisionData(" + revision.CompanyID + "," + revision.ProductCategoryID + ")'>Manutenzione Rapida</button></td>";
                tableString += "</tr>";
            }

            $("#ToFill").html(tableString);
        }

        function nextPage() {
            if (currentPage + 1 < maxPageNumber) {
                currentPage++;
                loadCurrentPage();
            }
        }

        function previousPage() {
            if (currentPage > 0) {
                currentPage--;
                loadCurrentPage();
            }
        }

        function loadCurrentPage() {
            let shouldDisablePreviousPageButton = currentPage == 0;
            let shouldDisableNextPageButton = currentPage + 1 == maxPageNumber;

            $("#previousPageButton").prop("disabled", shouldDisablePreviousPageButton);
            $("#nextPageButton").prop("disabled", shouldDisableNextPageButton);

            $("#pageNumber").html((currentPage + 1) + "/" + Math.ceil(maxPageNumber));
            loadRevisions(currentPage);
        }

        $(document).ready(function() {
            $("#companyName").change(changeSelectedCompany);

            $.getJSON("../php/revisions/getRevisions.php", function(response) {
                allRevisions = response;

                maxPageNumber = response.length / revisionsPerPage;

                loadCurrentPage();
            });

            $.getJSON("../php/getCompany.php", function(response) {
                let generatedCompanyOptions = "<option disabled selected value=''>Seleziona Azienda</option>";

                response.forEach(company => {
                    generatedCompanyOptions += ("<option value='" + company.id + "'>" + company.nome + "</option>");
                });

                $("#companyName").html(generatedCompanyOptions);
            });
        });
    </script>

    </html>

<?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>
