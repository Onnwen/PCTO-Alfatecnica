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
                <button disabled style="float: right" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addUserModal" data-bs-whatever="addUser" id="openAddUser">
                    <i class="bi bi-person-plus-fill"></i></button>
            </div>
            <div class="col-7 d-inline-flex">
                <input id="searchUser" style="margin-right: 5px" type="text" class="form-control w-50" placeholder="Nome e/o cognome utente" aria-label="Nome e/o cognome utente">
                <input id="searchCompany" type="text" class="form-control w-50" placeholder="Nome azienda" aria-label="Nome azienda">
            </div>
            <div class="col-2 text-center">
                <button type="button" class="btn btn-outline-success w-50" onclick="search();"><i class="fa-solid fa-magnifying-glass"></i>Cerca</button>
                <button disabled id="table" type="button" class="btn btn-outline-success selected change_cards verde" id="cards"><i class="fa-solid fa-table-list bianco"></i></button>
                <button disabled id="collapse" type="button" class="btn btn-outline-success change_table verde" id="table"><i class="bi bi-view-list bianco"></i></i></button>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-warning w-100 position-relative" data-bs-toggle='modal' data-bs-target='#activationInfoModal' data-bs-whatever='activationInfoModal'>
                    <i class="bi bi-person-fill-exclamation"></i>&nbsp;&nbsp;Attiva utenti
                    <span id="badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span></span></button>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="container" >
        <div class="row row-tabella">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="listTable" class="table table-bordered" style="text-align: center">
                        <thead>
                        <tr>
                            <th scope="col">Nome e Cognome</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Email</th>
                            <th scope="col">Azienda</th>
                            <th scope="col">Tipologia</th>
                            <th scope="col">Attivazione/Elimina</th>
                        </tr>
                        </thead>
                        <tbody>

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

    <!-- DeleteUser Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: darkred" id="deleteUserModalLabel">Elimina utente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare l'utente
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="location.reload()" class="btn btn btn-secondary"
                            data-bs-dismiss="modal">Annulla
                    </button>
                    <button type="button" class="btn btn-danger" id="deleteModalButton">Conferma</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AddUser Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: darkgreen" id="addUserModalLabel">Aggiungi utente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addNameLabel">Nome</span>
                            <input class="form-control" type="text" id="name" aria-describedby="addNameLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addSurnameLabel">Cognome</span>
                            <input class="form-control" type="text" id="surname" aria-describedby="addSurnameLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addEmailLabel">Email</span>
                            <input class="form-control" type="email" id="email" aria-describedby="addEmailLabel">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addRoleLabel">Ruolo</span>
                            <select id="role" class="form-select" aria-label="addRoleLabel">
                                <option></option>
                                <option value="0">Utente</option>
                                <option value="1">Amministratore</option>
                                <option value="2">Tecnico</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addCompanyLabel">Azienda</span>
                            <select id="selectCompany" class="form-select" aria-label="addCompanyLabel" onchange="selectionRoleChange()">
                                <!-- companies -->
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="location.reload()" class="btn btn btn-secondary"
                            data-bs-dismiss="modal">Annulla
                    </button>
                    <button id="addUserButton" type="button" onclick="addUser()" class="btn btn-success">Aggiungi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Active or not Modal -->
    <div class="modal fade" id="activationModal" tabindex="-1" aria-labelledby="activationModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activationModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalContent">

                </div>
                <div class="modal-footer" id="confirmationFooter">

                </div>
            </div>
        </div>
    </div>

    <!-- Active or not INFO Modal -->
    <div class="modal fade" id="activationInfoModal" tabindex="-1" aria-labelledby="activationInfoModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activationModalInfoLabel">Attivazione utenti - Informazioni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    All'interno della tabella utenti puoi osservare che sono presenti due varianti di riga, le prime dove in fondo c'è la possibilità
                    di eliminare direttamente l'utente rappresentano tutte le credenziali già attivati e funzionanti. Il resto della tabella invece
                    rappresenta tutti gli utenti che devono ancora essere attivati da lei. Nell'ultima colonna infatti è possibile confermare l'utente
                    o rifiutare e di conseguenza eliminare del tutto le credenziale dell'utente. Sul bottone che hai appena premuto è presente un badge che indica
                    numero di credenziali ancora da attivare. Si ricordi che finchè l'account non è attivo l'utente associato non può utilizzare i servizi che forniamo.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Ho capito</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal successo -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="doneLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: darkgreen" id="doneLabel">Operazione eseguita con
                        successo</h5>
                </div>
                <div class="modal-body">
                    L'operazione è avvenuta con successo e tutte le comunicazioni del caso sono state inviate.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="window.location.reload()">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal errore -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: darkred" id="errorModalLabel">È stato riscontrato un
                        problema</h5>
                </div>
                <div class="modal-body">
                    L'operazione non è avvenuta con successo, ci scusiamo per l'inconveniente, contatti in supporto per risorvere il problema.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="window.location.reload()">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var statusPage;
        $(document).ready(function () {
            loadDatas();
        });

        function loadDatas(company, userNameSurname){
            if((company)&&(userNameSurname)){
                $.post("../php/getUsers.php", {company: company, userNameSurname: userNameSurname} ,function (response) {
                    if(response.length !== 0){
                        datas = response;
                        loadPrincipalTable(datas);
                        loadBadgeHeader();
                    } else {
                        loadPrincipalTable();
                    }
                }, "json")
            } else if(company && !userNameSurname){
                $.post("../php/getUsers.php", {company: company} ,function (response) {
                    if(response.length !== 0){
                        datas = response;
                        loadPrincipalTable(datas);
                        loadBadgeHeader();
                    } else {
                        loadPrincipalTable();
                    }
                }, "json")
            } else if(userNameSurname && !company){
                $.post("../php/getUsers.php", {userNameSurname: userNameSurname} ,function (response) {
                    if(response.length !== 0){
                        datas = response;
                        loadPrincipalTable(datas);
                        loadBadgeHeader();
                    } else {
                        loadPrincipalTable();
                    }
                }, "json")
            } else {
                $.post("../php/getUsers.php", function (response) {
                    if(response.length !== 0){
                        datas = response;
                        loadPrincipalTable(datas);
                        loadBadgeHeader();
                    } else {
                        loadPrincipalTable();
                    }
                }, "json")
            }

        }

        function loadBadgeHeader(){
            $.post("../php/getUserToBeActived.php", function (response) {
                if(response !== "error"){
                    $("#badge").html(response[0].countUsers);
                }
            }, "json")
        }

        function loadPrincipalTable(datas) {
            var table = document.getElementById("listTable");
            var tbody = table.getElementsByTagName("tbody")[0];
            if (datas) {
                tbody.innerHTML = "";
                for( var i= 0; i < datas.length; i++){
                    var tr = document.createElement("tr");
                    var td = document.createElement("td");
                    td.innerHTML = datas[i].first_name + " " + datas[i].last_name;
                    tr.appendChild(td);
                    var td = document.createElement("td");
                    if(datas[i].active === 1){
                        td.innerHTML = "Confermato";
                    }else {
                        td.innerHTML = "Non confermato";
                    }
                    tr.appendChild(td);
                    var td = document.createElement("td");
                    var a = document.createElement("a");
                    a.href = "mailto:" + datas[i].email;
                    a.innerHTML = datas[i].email;
                    td.appendChild(a);
                    tr.appendChild(td);
                    var td = document.createElement("td");
                    td.innerHTML = datas[i].company;
                    tr.appendChild(td);
                    var td = document.createElement("td");
                    td.innerHTML = getUserType(datas[i].role);
                    tr.appendChild(td);
                    var td = document.createElement("td");
                    td.style.textAlign = "center";
                    if(datas[i].activedByCompany === 1){
                        td.innerHTML = "<button type='button' style='margin-right: 5px' class='btn btn-outline-danger' onclick='deleteUser(" + datas[i].user_id + ")' id='openDeleteModal'>" +
                            "<i class='bi bi-trash3-fill'></i></i>&nbsp;Elimina</button>";
                    }else {
                        tr.setAttribute("class", "toBeActived");
                        tr.setAttribute("style","background-color: lightYellow;");
                        td.innerHTML =
                            "<button id='activationButton' type='button' style='margin-right: 10px' class='btn btn-outline-success' onclick='onActivationClick(" + datas[i].user_id + ")' id='openActivationModal'>" +
                            "<i class='bi bi-person-check-fill'></i>" +
                            "</button>" +
                            "<button id='negationButton' type='button' class='btn btn-outline-danger' onclick='onNegationClick(" + datas[i].user_id + ")' id='openRefuseModal'>"+
                            "<i class='bi bi-person-x-fill'>" +
                            "</i></button>";
                    }
                    tr.appendChild(td);
                    tbody.appendChild(tr);
                }
                table.appendChild(tbody);
            } else {
                tbody.innerHTML = "";
                tbody.innerHTML +=
                    '<tr style="height: 40px;text-align: center">' +
                    '<td colspan="6"><b>Nessun dato trovato</b></td>' +
                    '</tr>'
            }


        }

        function getUserType(role){
            if(role === 1){
                return "Amministratore";
            }else if(role === 0){
                return "Utente";
            }else if(role === 2){
                return "Tecnico";
            }
        }

        function onActivationClick(id) {
            $.post("../php/getUserInfo.php", {user_id: id}, function (response) {
                response = response[0];
                $("#activationModalLabel").html("Attivazione utente");
                $("#modalContent").html("Si desidera confermare l'attivazione dell'utente selezionato: <br>Nominativo: <strong>" + response.first_name + " " + response.last_name + "</strong><br>Mail: <strong>" + response.email + "</strong>");
                $("#confirmationFooter").html('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button id="confirmActivation" type="button" class="btn btn-success">Conferma</button>')
                $('#activationModal').modal('show');
                const confirmButton = $("#confirmActivation");
                confirmButton.click(function () {
                    confirmButton.prop('disabled', true);
                    confirmButton.html('<div class="spinner-border spinner-border-sm" role="status"></div>');
                    $.post("../php/confirmUser.php", {user_id: id,confirmed: 1})
                        .done(function (resp) {
                            if (resp === '1') {
                                $('#activationModal').modal('hide');
                                confirmButton.removeAttr('disabled');
                                confirmButton.html('Conferma');
                                $('#successModal').modal('show');
                            } else if (resp === '0') {
                                $('#activationModal').modal('hide');
                                confirmButton.removeAttr('disabled');
                                confirmButton.html('Conferma');
                                $('#errorModal').modal('show');
                            } else {
                                $('#activationModal').modal('hide');
                                confirmButton.removeAttr('disabled');
                                confirmButton.html('Conferma');
                                $("#errorModal").modal('show');
                            }
                        })
                        .fail(function () {
                            $('#activationModal').modal('hide');
                            confirmButton.removeAttr('disabled');
                            confirmButton.html('Recupera');
                            $("#errorModal").modal('show');
                        })
                });
            }, "json");
        }
        function onNegationClick(id) {
            $.post("../php/getUserInfo.php", {user_id: id}, function (response) {
                response = response[0];
                $("#activationModalLabel").html("Attivazione utente");
                $("#modalContent").html("Si desidera <strong>non</strong> confermare l'attivazione dell'utente selezionato: <br>Nominativo: <strong>" + response.first_name + " " + response.last_name + "</strong><br>Mail: <strong>" + response.email + "</strong>");
                $("#confirmationFooter").html('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button id="confirmActivation" type="button" class="btn btn-danger">Conferma</button>')
                $('#activationModal').modal('show');
                const confirmButton = $("#confirmActivation");
                confirmButton.click(function () {
                confirmButton.prop('disabled', true);
                confirmButton.html('<div class="spinner-border spinner-border-sm" role="status"></div>');
                $.post("../php/confirmUser.php", {user_id: id,confirmed: 1})
                    .done(function (resp) {
                        if (resp === '1') {
                            $('#activationModal').modal('hide');
                            confirmButton.removeAttr('disabled');
                            confirmButton.html('Conferma');
                            $('#successModal').modal('show');
                        } else if (resp === '0') {
                            $('#activationModal').modal('hide');
                            confirmButton.removeAttr('disabled');
                            confirmButton.html('Conferma');
                            $('#errorModal').modal('show');
                        } else {
                            $('#activationModal').modal('hide');
                            confirmButton.removeAttr('disabled');
                            confirmButton.html('Conferma');
                            $("#errorModal").modal('show');
                        }
                    })
                    .fail(function () {
                        $('#activationModal').modal('hide');
                        confirmButton.removeAttr('disabled');
                        confirmButton.html('Conferma');
                        $("#errorModal").modal('show');
                    })
                });
            }, "json");
        }

        $("#addUserModal").on("show.bs.modal", function () {
            $.post("../php/getCompanies.php", function (response) {
                let toPrint = "<option></option>";
                for (let company of response){
                    toPrint += "<option value='" + company.id + "'>" + company.name +"</option>"
                }
                $("#selectCompany").html(toPrint);
            }, "json");
        })
         function selectionRoleChange(){

             let val = $("#selectCompany").val();
             if(val === "1" || val === "0"){
                 $("#role").attr("disabled", true);
             } else {
                 $("#role").removeAttr("disabled");
             }
         }


        function addUser() {
            const confirmButton = $("#addUserButton");
            confirmButton.click(function () {
                confirmButton.prop('disabled', true);
                confirmButton.html('<div class="spinner-border spinner-border-sm" role="status"></div>');
                $.post("../php/addUser.php", {})
                    .done(function (resp) {
                        if (resp === '1') {
                            $('#activationModal').modal('hide');
                            confirmButton.removeAttr('disabled');
                            confirmButton.html('Aggiungi');
                            $('#successModal').modal('show');
                        } else if (resp === '0') {
                            $('#activationModal').modal('hide');
                            confirmButton.removeAttr('disabled');
                            confirmButton.html('Aggiungi');
                            $('#errorModal').modal('show');
                        } else {
                            $('#activationModal').modal('hide');
                            confirmButton.removeAttr('disabled');
                            confirmButton.html('Aggiungi');
                            $("#errorModal").modal('show');
                        }
                    })
                    .fail(function () {
                        $('#activationModal').modal('hide');
                        confirmButton.removeAttr('disabled');
                        confirmButton.html('Aggiungi');
                        $("#errorModal").modal('show');
                    })
            })
        }

        function search() {
            let user = $("#searchUser").val();
            let company = $("#searchCompany").val();
            loadDatas(company, user);
        }

        function deleteUser(userId) {
            $.post("../php/getUserInfo.php", {user_id: userId}, function (response) {
                response = response[0];
                $('#deleteUserModal').modal('show');
                const deleteButton = $("#deleteModalButton");
                deleteButton.click(function () {
                deleteButton.prop('disabled', true);
                deleteButton.html('<div class="spinner-border spinner-border-sm" role="status"></div>');
                $.post("../php/deleteUser.php", {user_id: userId})
                    .done(function (resp) {
                        if (resp === '1') {
                            $('#deleteUserModal').modal('hide');
                            deleteButton.removeAttr('disabled');
                            deleteButton.html('Elimina');
                            $('#successModal').modal('show');
                        } else if (resp === '0') {
                            $('#deleteUserModal').modal('hide');
                            deleteButton.removeAttr('disabled');
                            deleteButton.html('Elimina');
                            $('#errorModal').modal('show');
                        } else {
                            $('#deleteUserModal').modal('hide');
                            deleteButton.removeAttr('disabled');
                            deleteButton.html('Elimina');
                            $("#errorModal").modal('show');
                        }
                    })
                    .fail(function () {
                        $('#deleteUserModal').modal('hide');
                        deleteButton.removeAttr('disabled');
                        deleteButton.html('Elimina');
                        $("#errorModal").modal('show');
                    })
                });
            }, "json");
        }
    </script>
    </body>

    </html>

    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>
