<?php
session_start();
require_once("../php/connessione.php");
if(isset($_SESSION['session_id'])){
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Alfatecnica - Lista Anagrafica</title>
    <link rel="icon" href="../img/logo.png">
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
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="confirmedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: darkred" id="confirmedModalLabel">È stato riscontrato un problema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Le modifiche non sono state applicate. È stato riscontrato un errore durante il caricamento dei dati.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Company Modal -->
    <div class="modal fade" id="addCompanyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCompanyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCompanyModalLabel">Aggiungi azienda</h5>
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
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addCompanyNotesLabel">Note aziendali</span>
                            <input class="form-control" type="text" id="companyNotes" aria-describedby="addCompanyNotesLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addClientNotesLabel">Note per cliente</span>
                            <input class="form-control" type="text" id="clientNotes" aria-describedby="addClientNotesLabel">
                        </div>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button id="addButton" type="button" class="btn btn-primary" onclick="insertInDatabase();">
                        Aggiungi
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- AGGIUNTA E RICERCA -->

    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addCompanyModal"><i class="fa-solid fa-user-plus"></i>Aggiungi</button>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome azienda" aria-label="Nome azienda">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Sede" aria-label="Sede">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Data ultima prestazione" aria-label="Data ultima prestazione">
            </div>
            <div class="col searchIcon">
                <button type="button" class="btn btn-outline-success"><i class="fa-solid fa-magnifying-glass"></i>Cerca</button>
                <button type="button" class="btn btn-outline-success selected change_cards verde" id="cards"><i class="fa-solid fa-table-list bianco"></i></button>
                <button type="button" class="btn btn-outline-success change_table verde" id="table"><i class="fa-solid fa-border-all bianco"></i></button>
            </div>
        </div>
    </div>

    <br>
    <hr>

    <!-- CARDS -->

    <div class="container anagrafiche" style="display: none;">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-12">
                    <h4>Anagrafiche Aziende</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="container anagrafiche_cards" style="margin-top: 20px; display: none;">

        <div id="cardContainer" class="row">

        </div>

    </div>

    <!-- Tabella -->

    <div class="container table_anagrafiche">
        <div class="row row-tabella">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">Nome azienda</th>
                                <th scope="col">Gestione</th>
                            </tr>
                        </thead>
                        <tbody id="tabella-ajax">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- PAGINATOR -->

    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item ">
                <a class="page-link " href="# " aria-label="Previous ">
                    <span aria-hidden="true ">&laquo;</span>
                </a>
            </li>
            <li class="page-item "><a class="page-link " href="# ">1</a></li>
            <li class="page-item "><a class="page-link " href="# ">2</a></li>
            <li class="page-item "><a class="page-link " href="# ">3</a></li>
            <li class="page-item ">
                <a class="page-link " href="# " aria-label="Next ">
                    <span aria-hidden="true ">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- FOOTER -->

    <hr>

    <footer class="py-3 my-4">
        <p class="text-center text-muted ">© 2022 Alfatecnica, Inc</p>
    </footer>
</body>
<script>
    $(document).ready(function () {
        $(".change_cards").click(function () {
            $(".anagrafiche").css("display", "none");
            $(".anagrafiche_cards").css("display", "none");
            $(".table_anagrafiche").css("display", "block");
        });

        $(".change_table").click(function () {
            $(".anagrafiche").css("display", "block");
            $(".anagrafiche_cards").css("display", "block");
            $(".table_anagrafiche").css("display", "none");
        });

        $.post("../php/viewAnagr.php",{},function(resp){
          const cards = document.getElementById("cardContainer");//prendere l'elemento con quel determinato id
          const tabella = document.getElementById('tabella-ajax');
          for(let i=0;i<resp.length;i++){
            cards.innerHTML+='<div class="col">'+
            '<div class="card text-center">'+
            '<img src="../' + resp[i].path_logo + '" class="card-img-top">'+
            '<div class="card-body">'+
            '<h4 class="card-title">' + resp[i].nome + '</h4>'+
            '<p class="card-text">' + resp[i].sede + '</p>'+
                    '<a href="#"><i class="fa-solid fa-trash-can trash" style="float: left;"></i></a>'+
                    '<button type="button" class="btn btn-outline-dark" onclick="window.location.href=\'dettaglio-anagrafica.php?id_ana=' + resp[i].id + '\'">Guarda</button>'+
                    '<a href="#"><i class="fa-solid fa-pen-to-square edit"'+
                    'style="float: right; vertical-align: middle;"></i></a>'+
                    '</div>'+
                    '</div>'+
                    '</div>';
            tabella.innerHTML += '<tr>'+
            '<th style="text-align: center;">' + resp[i].nome + '</th>'+
              '<td style="text-align: center;">'+
               '<button class="btn btn-outline-success" onclick="window.location.href=\'modifica-azienda.php?id_ana=' + resp[i].id + '\'"><i class="fa-solid fa-pen"></i></button>'+
               '<button class="btn btn-outline-info" onclick="window.location.href=\'dettaglio-anagrafica.php?id_ana=' + resp[i].id + '\'"><i class="fa-solid fa-circle-info"></i></button>'+
               '<button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>'+
              '</td>'+
            '</tr>';
          }
        },"json");

        $( "#table" ).click(function() {
           $("#cards").removeClass("selected");
           $("#table").addClass("selected");
        });
        $( "#cards" ).click(function() {
           $("#cards").addClass("selected");
           $("#table").removeClass("selected");
        });
    });

    function insertInDatabase() {
        document.getElementById("addButton").setAttribute("disabled", "");
        document.getElementById("addButton").innerHTML = '<div class="spinner-border spinner-border-sm" role="status"/>';

        let name = $('#name').val();
        let site = $('#site').val();
        let address = $('#address').val();
        let CAP = $('#CAP').val();
        let city = $('#city').val();
        let province = $('#province').val();
        let phoneNumber = $('#phoneNumber').val();
        let emailAddress = $('#emailAddress').val();
        let personalReference = $('#personalReference').val();
        let phoneNumber2 = $('#phoneNumber2').val();
        let cellPhoneNumber = $('#cellPhoneNumber').val();
        let emailAddress2 = $('#emailAddress2').val();
        let companyNotes = $('#companyNotes').val();
        let clientNotes = $('#clientNotes').val();

        $.post('../php/addCompany.php', {
            name: name,
            site: site,
            address: address,
            CAP: CAP,
            city: city,
            province: province,
            phoneNumber: phoneNumber,
            emailAddress: emailAddress,
            personalReference: personalReference,
            phoneNumber2: phoneNumber2,
            cellPhoneNumber: cellPhoneNumber,
            emailAddress2: emailAddress2,
            companyNotes: companyNotes,
            clientNotes: clientNotes
        })
        .done(function(response){
            document.getElementById("addButton").removeAttribute("disabled");
            document.getElementById("addButton").innerHTML = 'Aggiungi';
            $("#addCompanyModal").modal('hide');
            if (response == 'invalidInsert') {
                $("#errorModal").modal('show');
            } else {
                $("#confirmedModal").modal('show');
            }
        })
        .fail(function() {
            document.getElementById("addButton").removeAttribute("disabled");
            document.getElementById("addButton").innerHTML = 'Aggiungi';
            $("#addCompanyModal").modal('hide');
            $("#errorModal").modal('show');
        });
    }
</script>

</html>
<?php
} else {
  include_once('404.html');
}
 ?>
