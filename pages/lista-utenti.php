<?php
session_start();
require_once('../php/connessione.php');

if (isset($_SESSION['session_id'])) {
    $select = "SELECT Users.user_id, first_name, last_name, email, role, active, activedByCompany, Companies.name AS company
                   FROM Users
                        INNER JOIN User_Company ON User_Company.user_id = Users.user_id
                        INNER JOIN Companies ON Companies.id = User_Company.company_id";
    $pre = $pdo->prepare($select);
    $pre->execute();
    $check = $pre->fetchAll(PDO::FETCH_ASSOC);
    if(!$check){
        $datas = "error";
    } else {
        $datas = json_encode($check);
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
                <button style="float: right" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addUserModal" data-bs-whatever="addUser" id="openAddUser">
                    <i class="bi bi-person-plus-fill"></i></button>
            </div>
            <div class="col-7 d-inline-flex">
                <input id="searchUser" style="margin-right: 5px" type="text" id="companyName" class="form-control w-50" placeholder="Nome e/o cognome utente" aria-label="Nome azienda">
                <input id="searchCompany" type="text" id="companyName" class="form-control w-50" placeholder="Nome azienda" aria-label="Nome azienda">
            </div>
            <div class="col-2 text-center">
                <button type="button" class="btn btn-outline-success w-50" onclick="search();"><i class="fa-solid fa-magnifying-glass"></i>Cerca</button>
                <button id="table" type="button" class="btn btn-outline-success selected change_cards verde" id="cards"><i class="fa-solid fa-table-list bianco"></i></button>
                <button id="collapse" type="button" class="btn btn-outline-success change_table verde" id="table"><i class="bi bi-view-list bianco"></i></i></button>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-warning w-100 position-relative">
                    <i class="bi bi-person-fill-exclamation"></i>&nbsp;&nbsp;Attiva utenti
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">5</span></span></button>
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
        <div class="modal-dialog modal-dialog-centered">
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
                    <button type="button" onclick="location.reload()" class="btn btn-danger"
                            <!--onclick="deleteUser()-->">Conferma
                    </button>
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
                            <span class="input-group-text" id="addCompanyLabel">Azienda</span>
                            <select id="role" class="form-select" aria-label="addCompanyLabel">
                                <!-- companies -->
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addRoleLabel">Ruolo</span>
                            <select id="role" class="form-select" aria-label="addRoleLabel">
                                <option value="1">Amministratore</option>
                                <option value="0">Utente</option>
                                <option value="2">Utente</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addActiveByCompanyLabel">Attivato</span>
                            <input class="form-control" type="checkbox" id="activatedByCompany" aria-describedby="addActiveByCompanyLabel">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="location.reload()" class="btn btn btn-secondary"
                            data-bs-dismiss="modal">Annulla
                    </button>
                    <button type="button" onclick="location.reload()" class="btn btn-success"
                    <!--onclick="addUser()-->">Aggiungi
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Active or not Modal -->
    <div class="modal fade" id="activationModal" tabindex="-1" aria-labelledby="activationModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Attivazione utente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Conferma</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var statusPage;
        $(document).ready(function () {
            var datas = <?php echo $datas; ?>;
            console.log(datas);
            loadPrincipalTable(datas);
        });

        function loadPrincipalTable(datas) {
            var table = document.getElementById("listTable");
            var tbody = table.getElementsByTagName("tbody")[0];
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
                    td.innerHTML = "<button type='button' style='margin-right: 5px' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#deleteUserModal' data-bs-whatever='deleteUser' id='openDeleteModal'>" +
                        "<i class='bi bi-trash3-fill'></i></i>&nbsp;Elimina</button>";
                }else {
                    td.innerHTML = "<button type='button' style='margin-right: 10px' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#activationModal' data-bs-whatever='activationModal' id='openActivationModal'>" +
                        "<i class='bi bi-person-check-fill'></i></button><button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#activationModal' data-bs-whatever='activationModal' id='openRefuseModal'>"+
                        "<i class='bi bi-person-x-fill'></i></button>";
                }
                tr.appendChild(td);
                tbody.appendChild(tr);
            }
            table.appendChild(tbody);
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
        function activeUser(action, userId){
            if (action) {
                //attiva utente
            } else {
                //elimina utente
            }
        }
        function addUser() {
        }

        function searchUsers() {
        }

        function deleteUser(userId) {
        }
    </script>
    </body>

    </html>

    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>