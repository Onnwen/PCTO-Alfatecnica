<?php
session_start();
require_once("../php/connessione.php");
if(isset($_SESSION['session_id'])){
  $idAnagrafica=isset($_GET['id_ana']) ? $_GET['id_ana'] : '';
  if($idAnagrafica !== '' || $idAnagrafica !== "undefined"){
    $selectAna = "SELECT name, address, CAP, city, province, phoneNumber1, emailAddress1, personalReference, phoneNumber2, cellPhoneNumber, emailAddress2, companyNotes, clientNotes
                  FROM Companies WHERE id = :id";
    $pre = $pdo->prepare($selectAna);
    $pre->bindParam(':id', $idAnagrafica, PDO::PARAM_INT);
    $pre->execute();
    while($row = $pre->fetch(PDO::FETCH_ASSOC)){
      $arrayAna = [
        'nomeAzienda' => $row['name'],
        'indirizzo' => $row['address'],
        'cap' => $row['CAP'],
        'citta' => $row['city'],
        'provincia' => $row['province'],
        'telefono1' => $row['phoneNumber1'],
        'email1' => $row['emailAddress1'],
        'rp' => $row['personalReference'],
        'telefono2' => $row['phoneNumber2'],
        'cellulare' => $row['cellPhoneNumber'],
        'email2' => $row['emailAddress2'],
        'na' => $row['companyNotes'],
        'nc' => $row['clientNotes']
      ];
    }
 ?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/konva@8.3.5/konva.min.js"
        charset="utf-8"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
        integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Alfatecnica - Dettaglio Anagrafica</title>
</head>

<body>
    <!-- Navbar -->
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
                        <a class="nav-link" href="lista-anagrafica.php">Anagrafica</a>
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
                <button type="button" class="btn btn-outline-danger">Logout</button>
            </div>
        </div>
    </nav>
    <!-- Fine -->

    <!-- Cards -->
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center nome-azienda">
                <div class="row">
                    <div class="col-12">
                        <h4><?php echo $arrayAna['nomeAzienda']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-house fa-2xs"
                                style="margin-right: 10px;"></i>Indirizzo:
                            </h5>
                            <p class="card-text"><?php echo $arrayAna['indirizzo']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-city fa-2xs" style="margin-right: 10px;"></i>Città
                            - Cap:</h5>
                            <p class="card-text"><?php echo $arrayAna['citta'] . " - " . $arrayAna['cap']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-building fa-2xs"
                                style="margin-right: 10px;"></i>Provincia:</h5>
                            <p class="card-text"><?php echo $arrayAna['provincia']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-phone fa-2xs"
                                style="margin-right: 10px;"></i>Telefono/i:</h5>
                            <p class="card-text"><?php echo $arrayAna['telefono1']; ?></p>
                    </div>
                </div>
            </div>


            <div class="col" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-envelope fa-2xs"
                                style="margin-right: 10px;"></i>Email:</h5>
                            <p class="card-text"><?php echo $arrayAna['email1']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-user fa-2xs"
                                style="margin-right: 10px;"></i>Riferimento/i personale/i:</h5>
                            <p class="card-text"><?php echo $arrayAna['rp']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-phone fa-2xs"
                                style="margin-right: 10px;"></i>Telefono/i:</h5>
                            <p class="card-text"><?php echo $arrayAna['telefono2']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-phone fa-2xs"
                                style="margin-right: 10px;"></i>T.Cellulare:</h5>
                            <p class="card-text"><?php echo $arrayAna['cellulare']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-envelope fa-2xs"
                                style="margin-right: 10px;"></i>Email:</h5>
                            <p class="card-text"><?php echo $arrayAna['email2']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-industry fa-2xs"
                                style="margin-right: 10px;"></i>Note aziendali:</h5>
                            <p class="card-text"><?php echo $arrayAna['na']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-image-portrait fa-2xs"
                                style="margin-right: 10px;"></i>Note per cliente:</h5>
                            <p class="card-text"><?php echo $arrayAna['nc']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col" >
                <button class="stampa">Stampa</button>
            </div>
        </div>


    </div>

    <!-- Fine -->

    <hr>

    <!-- Immagine -->
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center nome-azienda">
                <div class="row">
                    <div class="col-12">
                        <h4>Planimetria</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-immagine">
            <div class="div-immagine prova" id="planimetria">

            </div>
            <button class="stampa" id="viewAll">Visualizza tutti i prodotti</button>
            <button class="stampa" id="stampaPDFPlan"><i class="fa-solid fa-print"></i></button>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center bottone-mappa">
                <div class="col-12">
                    <button class="btn btn-outline-info">Visualizza la mappa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Fine -->

    <hr>

    <!-- Tabella -->
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center nome-azienda">
                <div class="row">
                    <div class="col-12">
                        <h4>Lista voci</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-outline-info">Aggiungi</button>
            </div>
        </div>
        <div class="row row-tabella">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col"><a href="Mdl-Imp-Sprinkler-a-secco.php" style="color: black; text-decoration: none;">Impianti</a></th>
                                <th scope="col">Quantità</th>
                                <th scope="col">Data ultima manutenzione</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><button class="btn" id="vista">Estintore</button></th>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>

                                <td style="text-align: center;">
                                    <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-outline-info"><a href="Mdl_Estintori.php"
                                            style="text-decoration-color: none;"><i
                                                class="fa-solid fa-circle-info"></i></a></button>
                                    <button class="btn btn-outline-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                    <button class="btn btn-outline-success"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><button class="btn" id="vista2">Idrante</button></th>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>

                                <td style="text-align: center;">
                                    <button class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-outline-info"><a href="Mdl_Idranti.php"
                                            style="text-decoration-color: none;"><i
                                                class="fa-solid fa-circle-info"></i></a></button>
                                    <button class="btn btn-outline-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                    <button class="btn btn-outline-success"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Fine -->

    <!-- Footer -->
    <footer class="py-3 my-4 border-top ">
        <p class="text-center text-muted ">© 2022 Alfatecnica</p>
    </footer>
    <!-- Fine -->

    <script type="text/javascript">
    var idAnag = <?php echo $idAnagrafica; ?>;
    var sfondo = new Image();
    var div = document.getElementById('planimetria');
    var stage = new Konva.Stage({
      container: 'planimetria',
      width: div.clientWidth,
      height: div.clientHeight
    });

    var layerSfondo = new Konva.Layer({
      scaleX: 1,
      scaleY: 1,
      draggable: true
    });
    stage.add(layerSfondo);
    var layer = new Konva.Layer({
      scaleX: 1,
      scaleY: 1,
      draggable: true
    });
    stage.add(layer);

    var groupSfondo = new Konva.Group({
      scaleX: 1
    });
    layer.add(groupSfondo);
    var group = new Konva.Group({
      scaleX: 1
    });
    layer.add(group);
    var sfondoImg = new Konva.Image({
      image: sfondo,
      width: div.clientWidth,
      height: div.clientHeight,
      draggable: false
    });
    groupSfondo.add(sfondoImg);

    var srcSfondo = "";
    $(window).on('load', function(){
      $.post('../php/viewPlan.php', {idAnag:idAnag}, function(resp){
          if(resp != ''){
            srcSfondo = resp[0].pathSfondo;
            for(let i = 0; i < resp.length; i++){
              console.log(((resp[i].posX * sfondoImg.attrs.width) / resp[i].w).toPrecision(10));
              var nome_prod = resp[i].nome_prod;
              var posX = parseFloat(((resp[i].posX * sfondoImg.attrs.width) / resp[i].w).toPrecision(10));
              var posY = parseFloat(((resp[i].posY * sfondoImg.attrs.height) / resp[i].h).toPrecision(10));
              var src = "";
              var imageObj = new Image();
              imageObj.src = "../" + resp[i].pathProd;
              var image = new Konva.Image({
                x: posX,
                y: posY,
                image: imageObj,
                width: (20 * sfondoImg.attrs.width) / resp[i].w,
                height: (25 * sfondoImg.attrs.height) / resp[i].h,
                draggable: false,
                id: resp[i].id_prod,
                name: nome_prod
              });
              group.add(image);
            }
            sfondo.src = "../" + srcSfondo;
          } else {
            var text = new Konva.Text({
              align: 'center',
              verticalAlign: 'middle',
              fontSize: 40,
              text: 'Nessun dato trovato',
              width: div.clientWidth,
              height: div.clientHeight
            });
            layer.add(text);
          }
      }, 'json');

    });
    var scaleBy = 1.05;
    stage.on('wheel', (e) => {
      e.evt.preventDefault();

      var oldScale = stage.scaleX();
      var pointer = stage.getPointerPosition();

      var mousePointTo = {
        x: (pointer.x - stage.x()) / oldScale,
        y: (pointer.y - stage.y()) / oldScale,
      };
      let direction = e.evt.deltaY > 0 ? 1 : -1;
      if (e.evt.ctrlKey) {
        direction = -direction;
      }
      var newScale = direction > 0 ? oldScale * scaleBy : oldScale / scaleBy;
      stage.scale({ x: newScale, y: newScale });
      var newPos = {
        x: pointer.x - mousePointTo.x * newScale,
        y: pointer.y - mousePointTo.y * newScale,
      };
      stage.position(newPos);
    });

    $('#vista').click(function(){
      for(let i = 0; i < group.children.length; i++){
        var prova = group.children[i];
        if(group.children[i].attrs.name != 'Estintore'){
          prova.visible(false);
        } else {
          prova.visible(true);
        }
      }
    });
    $('#vista2').click(function(){
      for(let i = 0; i < group.children.length; i++){
        var prova = group.children[i];
        if(group.children[i].attrs.name != 'Idrante'){
          prova.visible(false);
        } else {
          prova.visible(true);
        }
      }
    });
    $('#viewAll').click(function(){
      for(let i = 0; i < group.children.length; i++){
        var prova = group.children[i];
        prova.visible(true);
      }
    });

    $('#stampaPDFPlan').click(function(){
      var nomeAz = '<?php echo $arrayAna['nomeAzienda']; ?>';
      var pdf = new jsPDF('l', 'px', [stage.width(), stage.height()]);
      stage.find('Image').forEach((image) => {
        pdf.addImage(
          stage.toDataURL({ pixelRatio: 1 }),
          0,
          0,
          stage.width(),
          stage.height()
        );
      });
      pdf.save('planimetria' + nomeAz + '.pdf');
      //window.location.href = '../PDF/planimetria' + nomeAz + '.pdf';
    });
    </script>
</body>

</html>
<?php
  }
} else {
  include_once('404.html');
}
 ?>
