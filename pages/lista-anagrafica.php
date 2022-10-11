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

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a href="#"><img src="../img/logo.png" width="55px" height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse header" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Anagrafica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Revisione</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Prodotti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Utenti</a>
                    </li>
                    </li>
                </ul>
                <button type="button" class="btn btn-outline-danger" onclick="window.location.href='../php/login/logout.php'">Logout</button>
            </div>
        </div>
    </nav>

    <hr>
    <br>

    <!-- AGGIUNTA E RICERCA -->

    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-outline-success" onclick="window.location.href='aggiungi-azienda.php'"><i class="fa-solid fa-user-plus"></i>Aggiungi</button>
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



</script>

</html>
<?php
} else {
  include_once('404.html');
}
 ?>
