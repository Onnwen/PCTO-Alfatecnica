<?php
session_start();
require_once('../php/connessione.php');
if(isset($_SESSION['session_id'])){
 ?>
<!DOCTYPE html>
<body lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
  <title>Alfatecnica - Dettaglio Prodotti</title>
  <link rel="icon" href="img/logo.png">
</head>

<body>
<?php require_once("navbar.php"); ?>

<!-- Scheda Prodotto -->

<div class="container anagrafiche">
  <div class="d-flex justify-content-center">
    <div class="row">
      <div class="col-12">
        <h4>Prodotto</h4>
      </div>
    </div>
  </div>
</div>

<div class="container" style="margin-top: 20px;">

  <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 g-4">

    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Modello</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Marca</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Data</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Data</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>

  </div>

</body>

<br>
<br>
<hr>


<!-- ultima revisione -->

<div class="container anagrafiche">
  <div class="d-flex justify-content-center">
    <div class="row">
      <div class="col-12">
        <h4>Ultima revisione</h4>
      </div>
    </div>
  </div>
</div>

<div class="container" style="margin-top: 20px;">

  <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 g-4">

    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Modello</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Amministrazione</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Data</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Ora</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Nome tecnico</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="col-11">
              <h4 class="card-title">Tempo impiegato</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit auctor convallis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

  </div>


</div>

<br>
<br>

<!--lista revisioni-->

<div class="container anagrafiche" style="margin-top:30px; margin-bottom:20px;">
  <div class="d-flex justify-content-center">
    <div class="row">
      <div class="col-12">
        <h4>Lista revisioni</h4>
      </div>
    </div>
  </div>
</div>

<div class="container">
<div class="row row-tabella">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">Nome prodotto</th>
                                <th scope="col">Data</th>
                                <th scope="col">Gestione</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">&nbsp;</th>
                                <td>&nbsp;</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-outline-info"><i
                                            class="fa-solid fa-circle-info"></i></button>
                                    <button class="btn btn-outline-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">&nbsp;</th>
                                <td>&nbsp;</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-outline-info"><i
                                            class="fa-solid fa-circle-info"></i></button>
                                    <button class="btn btn-outline-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">&nbsp;</th>
                                <td>&nbsp;</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-outline-info"><i
                                            class="fa-solid fa-circle-info"></i></button>
                                    <button class="btn btn-outline-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">&nbsp;</th>
                                <td>&nbsp;</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-outline-info"><i
                                            class="fa-solid fa-circle-info"></i></button>
                                    <button class="btn btn-outline-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

    <br>
    <br>
    <hr>

    <!--Ultimo questionario-->

    <div class="container anagrafiche">
      <div class="d-flex justify-content-center">
        <div class="row">
          <div class="col-12">
            <h4>Ultimo questionario</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="container" style="margin-top: 20px;">

      <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 g-4">

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Domanda</h4>
              <p class="card-text">Risposta</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Domanda</h4>
              <p class="card-text">Risposta</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Domanda</h4>
              <p class="card-text">Risposta</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Domanda</h4>
              <p class="card-text">Risposta</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Domanda</h4>
              <p class="card-text">Risposta</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Domanda</h4>
              <p class="card-text">Risposta</p>
            </div>
          </div>
        </div>
        </div>

      </div>

    </div>

    <!--Tutti i questionari-->

    <div class="container anagrafiche" style="margin-top: 30px; margin-bottom:20px;">
      <div class="d-flex justify-content-center">
        <div class="row">
          <div class="col-12">
            <h4>Tutti i questionari</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
    <div class="row row-tabella">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">Nome prodotto</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Gestione</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">&nbsp;</th>
                                    <td>&nbsp;</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-outline-info"><i
                                                class="fa-solid fa-circle-info"></i></button>
                                        <button class="btn btn-outline-danger"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">&nbsp;</th>
                                    <td>&nbsp;</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-outline-info"><i
                                                class="fa-solid fa-circle-info"></i></button>
                                        <button class="btn btn-outline-danger"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">&nbsp;</th>
                                    <td>&nbsp;</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-outline-info"><i
                                                class="fa-solid fa-circle-info"></i></button>
                                        <button class="btn btn-outline-danger"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">&nbsp;</th>
                                    <td>&nbsp;</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-outline-info"><i
                                                class="fa-solid fa-circle-info"></i></button>
                                        <button class="btn btn-outline-danger"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        <br>
        <br>
        <hr>

        <!-- FOOTER -->

<?php require_once("footer.php"); ?>
    </body>
</html>
    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>
