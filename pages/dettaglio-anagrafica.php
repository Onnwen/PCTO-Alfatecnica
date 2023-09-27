<?php
session_start();
require_once("../php/connessione.php");
if (isset($_SESSION['session_id'])) {
    $idAnagrafica = isset($_GET['id_ana']) ? $_GET['id_ana'] : '';
    if ($idAnagrafica !== '' || $idAnagrafica !== "undefined") {
        $selectAna = "SELECT name, address, CAP, city, province, phoneNumber1, emailAddress1, personalReference, phoneNumber2, cellPhoneNumber, emailAddress2, companyNotes, clientNotes
                  FROM Companies WHERE id = :id";
        $pre = $pdo->prepare($selectAna);
        $pre->bindParam(':id', $idAnagrafica, PDO::PARAM_INT);
        $pre->execute();
        while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
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
                  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
                  crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
                    crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                    crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
                  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
                  crossorigin="anonymous" referrerpolicy="no-referrer"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js"
                    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/konva@8.3.5/konva.min.js" charset="utf-8"></script>
            <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
                    integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/"
                    crossorigin="anonymous"></script>
            <link rel="stylesheet" href="../css/style.css">
            <title>Alfatecnica - Dettaglio Anagrafica</title>
        </head>

        <body onresize="onResize()">
        <?php require_once("navbar.php"); ?>

        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmedModal" tabindex="-1" aria-labelledby="confirmedModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: darkgreen" id="confirmedModalLabel">Effettuato con
                            successo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        L'operazione è avvenuta con successo.
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="location.reload()" class="btn btn-primary"
                                data-bs-dismiss="modal">Ok
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Error Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: darkred" id="errorModalLabel">È stato riscontrato un
                            problema</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        È stato riscontrato un errore durante il caricamento dei dati. Nessuna modifica è stata
                        applicata.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Modal -->
        <div class="modal fade" id="loadingModal" data-bs-backdrop="static" tabindex="-1"
             aria-labelledby="loadingModalLabel" aria-hidden="true">
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
                            <h5 class="card-title"><i class="fa-solid fa-house fa-2xs" style="margin-right: 10px;"></i>Indirizzo:
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
                            <h5 class="card-title"><i class="fa-solid fa-phone fa-2xs" style="margin-right: 10px;"></i>Telefono/i:
                            </h5>
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
                            <h5 class="card-title"><i class="fa-solid fa-user fa-2xs" style="margin-right: 10px;"></i>Riferimento/i
                                personale/i:</h5>
                            <p class="card-text"><?php echo $arrayAna['rp']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col" style="margin-top: 20px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-solid fa-phone fa-2xs" style="margin-right: 10px;"></i>Telefono/i:
                            </h5>
                            <p class="card-text"><?php echo $arrayAna['telefono2']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col" style="margin-top: 20px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-solid fa-phone fa-2xs" style="margin-right: 10px;"></i>T.Cellulare:
                            </h5>
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
                <div class="col">
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
            <!-- FIXME: Manca il parametro! -->
            <div class="row row-immagine" onresize="loadPlanimetry()">
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
                            <h4>Lista apparati</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn btn-outline-warning" data-bs-toggle="modal"
                            data-bs-target="#modalSelectCategory" data-bs-whatever="selectCategory">Aggiungi
                    </button>
                </div>
            </div>
            <div class="row row-tabella">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr style="text-align: center;">
                                <th scope="col"><a href="Mdl-Imp-Sprinkler-a-secco.php"
                                                   style="color: black; text-decoration: none;">Impianti</a></th>
                                <th scope="col">Quantità</th>
                                <th scope="col">Data ultima manutenzione</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="tabellaCategorie">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal cancellazione-->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cancellazioneLabel">Cancellazione </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="textDeleteModal" class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <button id="deleteButton" type="button" class="btn btn-primary">Cancella</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal update-->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateLabel">Aggiornamento posizione </h1>
                        <button id="x" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div id="textUpdateModal" class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <button id="updateButton" type="button" class="btn btn-primary">Modifica</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal scelta categoria prodotto-->
        <div class="modal fade bd-example-modal" id="modalSelectCategory" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Aggiunta prodotto</h5>
                        <button id="closeModalCategories1" type="button" class="btn-close"
                                data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <form>
                                    <select style="width: 100%" onchange="onSelectCategoriesChange()"
                                            id="chooseCategory"></select>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button id="closeModalCategories1" type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Annulla
                        </button>
                        <button id="selectCategory" type="button" class=" btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#addProduct" data-bs-whatever="addProduct">Seleziona
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal aggiunta prodotto-->
        <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true"
             onresize="">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="addTitle" class="modal-title">Aggiunta </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-5">
                                    <form id="formAddProduct">
                                    </form>
                                </div>
                                <div class="col-7">
                                    <h4>Planimetria: </h4>
                                    <div class="div-immagine prova" id="planimetry-addProduct"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="closeAddProductModal" onclick="clearInterval(myInterval)" type="button"
                                class="btn btn-secondary" data-bs-dismiss="modal">Annulla
                        </button>
                        <button id="addProductButton" onclick="addProductToDB(value)" value="" type="button"
                                class="btn btn-warning" disabled>Aggiungi
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <!-- Footer -->
        <?php require_once("footer.php"); ?>
        <!-- Fine -->

        <script type="text/javascript">
            var idAnag = <?php echo $idAnagrafica; ?>;

            //PLANIMETRIA PAGINA PRINCIPALE
            var productsToShow;
            var sfondo;
            var div;
            var stage;
            var layerSfondo;
            var layer;
            var groupSfondo;
            var group;
            var sfondoImg;
            var srcSfondo;
            var tooltipLayer;

            function loadPlanimetry(resp) {
                sfondo = new Image();
                div = document.getElementById('planimetria');
                stage = new Konva.Stage({
                    container: 'planimetria',
                    width: div.clientWidth,
                    height: div.clientHeight
                });
                layerSfondo = new Konva.Layer({
                    scaleX: 1,
                    scaleY: 1,
                    draggable: false
                });
                stage.add(layerSfondo);
                layer = new Konva.Layer({
                    scaleX: 1,
                    scaleY: 1,
                    draggable: false
                });
                stage.add(layer);
                groupSfondo = new Konva.Group({
                    scaleX: 1
                });
                layer.add(groupSfondo);
                group = new Konva.Group({
                    scaleX: 1
                });
                layer.add(group);
                sfondoImg = new Konva.Image({
                    image: sfondo,
                    width: div.clientWidth,
                    height: div.clientHeight,
                    draggable: false
                });
                groupSfondo.add(sfondoImg);
                srcSfondo = "";
                tooltipLayer = new Konva.Layer()
                tooltipLayer = new Konva.Layer();

                var tooltip = new Konva.Label({
                    opacity: 0.75,
                    visible: false,
                    listening: false,
                });

                tooltip.add(
                    new Konva.Tag({
                        fill: 'black',
                        pointerDirection: 'down',
                        pointerWidth: 10,
                        pointerHeight: 10,
                        lineJoin: 'round',
                        shadowColor: 'black',
                        shadowBlur: 10,
                        shadowOffsetX: 10,
                        shadowOffsetY: 10,
                        shadowOpacity: 0.2,
                    })
                );

                tooltip.add(
                    new Konva.Text({
                        text: '',
                        fontFamily: 'Calibri',
                        fontSize: 18,
                        padding: 5,
                        fill: 'white',
                    })
                );

                tooltipLayer.add(tooltip);
                stage.add(tooltipLayer);
                if (resp !== '') {
                    srcSfondo = resp[0].pathSfondo;
                    for (let i = 0; i < resp.length; i++) {
                        let nome_prod = resp[i].nome_prod;
                        let nome_cat = resp[i].id_Categoria;
                        let posX = parseFloat(((resp[i].posX * sfondoImg.attrs.width) / resp[i].w).toPrecision(10));
                        let posY = parseFloat(((resp[i].posY * sfondoImg.attrs.height) / resp[i].h).toPrecision(10));
                        let src = "";
                        let imageObj = new Image();
                        imageObj.src = "../" + resp[i].pathProd;
                        let image = new Konva.Image({
                            x: posX,
                            y: posY,
                            image: imageObj,
                            width: (20 * sfondoImg.attrs.width) / resp[i].w,
                            height: (25 * sfondoImg.attrs.height) / resp[i].h,
                            draggable: true,
                            id: resp[i].id_prod,
                            category: nome_prod,
                            idCategory: nome_cat

                        });
                        image.on('mouseover tap', function (evt) {
                            var node = evt.target;
                            document.body.style.cursor = 'pointer';
                            tooltip.position({
                                x: image.attrs.x + (image.attrs.width / 2),
                                y: image.attrs.y - 5
                            });
                            tooltip
                                .getText()
                                .text('Categoria: ' + image.attrs.category + '\nIdentificativo: ' + image.attrs.id);
                            tooltip.show();
                            tooltipLayer.batchDraw();
                            stage.add(tooltipLayer);
                        });
                        image.on('mouseout', function () {
                            document.body.style.cursor = 'default';
                            tooltip.hide();
                            tooltipLayer.draw();
                        });
                        let isFailed = false;
                        image.on('dragend', function () {
                            $('#textUpdateModal').html('Sei sicuro di voler modificare la posizione di <b>' + image.attrs.category + '</b> con identificativo ' + image.attrs.id + '?');
                            $('#updateModal').modal('show');
                            $('#updateButton').click(function () {
                                $.post('../php/updateProduct.php', {
                                    id: image.getId(),
                                    newPosX: parseFloat(((image.x() * resp[i].w) / sfondoImg.attrs.width).toPrecision(10)),
                                    newPosY: parseFloat(((image.y() * resp[i].h) / sfondoImg.attrs.height).toPrecision(10))
                                })
                                    .done(function (response) {
                                        $('#updateModal').modal('hide');
                                        if (response === '1') {
                                            modalConfirmation(true);
                                        } else {
                                            modalError(true);
                                            image.x(posX);
                                            image.y(posY);
                                        }
                                    })
                                    .fail(function () {
                                        isFailed = true;
                                        $('#updateModal').modal('hide');
                                        modalError(true);
                                        image.x(posX);
                                        image.y(posY);
                                    })
                            })
                            $("#updateModal").on('hide.bs.modal', function () {
                                if (isFailed !== true) {
                                    image.x(posX);
                                    image.y(posY);
                                }
                            });
                        });
                        image.on('click dbltap', function () {
                            window.location.assign('dettaglio-categoria.php?product_category_id=' + image.attrs.idCategory + '&company_id=' + idAnag + '&productId=' + image.getId());
                        });
                        group.add(image);
                    }
                    sfondo.src = "../" + srcSfondo;
                } else {
                    let text = new Konva.Text({
                        align: 'center',
                        verticalAlign: 'middle',
                        fontSize: 40,
                        text: 'Nessun dato trovato',
                        width: div.clientWidth,
                        height: div.clientHeight
                    });
                    layer.add(text);
                }
                let scaleBy = 1.05;
                stage.on('wheel', (e) => {
                    e.evt.preventDefault();
                    let oldScale = stage.scaleX();
                    let center = {
                        x: stage.width() / 2,
                        y: stage.height() / 2,
                    };
                    let relatedTo = {
                        x: (center.x - stage.x()) / oldScale,
                        y: (center.y - stage.y()) / oldScale,
                    };
                    let newScale =
                        e.evt.deltaY > 0 ? oldScale * scaleBy : oldScale / scaleBy;
                    stage.scale({
                        x: newScale,
                        y: newScale
                    });
                    let newPos = {
                        x: center.x - relatedTo.x * newScale,
                        y: center.y - relatedTo.y * newScale,
                    };
                    stage.position(newPos);
                    stage.batchDraw();
                });
            }

            $(window).on('load', function () {
                $.post('../php/viewPlan.php', {
                    idAnag: idAnag
                }, function (resp) {
                    productsToShow = resp;
                    loadPlanimetry(resp);
                }, 'json');
            });

            function onResize() {
                loadPlanimetry(productsToShow);
            }


            //TABELLA PRODOTTI

            function printData(startDate) {
                var convertedStartDate = new Date(startDate);
                var minutes = convertedStartDate.getMinutes();
                var hours = convertedStartDate.getHours();
                var day = convertedStartDate.getDate();
                var month = convertedStartDate.getMonth() + 1;
                var year = convertedStartDate.getFullYear();
                return day + "/" + month + "/" + year + " " + hours + ":" + minutes;
            }

            $(window).on('load', function () {
                $.post('../php/viewCategories.php', {
                    idAnag: idAnag
                }, function (resp) {
                    const tabella = document.getElementById('tabellaCategorie');
                    if (resp.length !== 0) {
                        for (let i = 0; i < resp.length; i++) {
                            console.log(resp);
                            tabella.innerHTML +=
                                '<tr style= "text-align: center">' +
                                '<th scope="row"><button class="btn" onclick="vistaCategoria(value)" value="' + resp[i].nomeCategoria + '">' + resp[i].nomeCategoria + '</button></th>' +
                                '<td>' + resp[i].quantita + '</td>' +
                                '<td>' + printData(resp[i].dataUltimaManutenzione) + '</td>' +
                                '<td style="text-align: center;">' +
                                '<button style="margin: 2" class="btn btn-outline-success" onclick="window.location.href=\'modifica-categoria.php?product_category_id=' + resp[i].idCategoria + '&company_id=' + idAnag + '\'"><i class="fa-solid fa-pen"></i></button>' +
                                '<button style="margin: 2" class="btn btn-outline-info" onclick="window.location.href=\'dettaglio-categoria.php?product_category_id=' + resp[i].idCategoria + '&company_id=' + idAnag + '\'"><i class="fa-solid fa-circle-info"></i></button>' +
                                '<button style="margin: 2" class="btn btn-outline-danger" onclick="onDeleteClick(' + resp[i].idCategoria + ',value)" value="' + resp[i].nomeCategoria + '"><i class="fa-solid fa-trash-can"></i></button>' +
                                '<button style="margin: 2" class="btn btn-outline-success" onclick="onPrintClick(value)" value="' + resp[i].nomeCategoria + '"><i class="fa-solid fa-print"></i></button>' +
                                '</td>' +
                                '</tr>';
                        }
                    } else {
                        tabella.innerHTML +=
                            '<tr style="height: 40px;text-align: center">' +
                            '<td colspan="3"><b>Nessun dato trovato</b></td>' +
                            '</tr>'
                    }

                }, "json");
            });

            function onDeleteClick(idCategoria, nomeCategoria) {
                document.getElementById('textDeleteModal').innerHTML = 'Sei sicuro di voler cancellare la categoria <b>' + nomeCategoria + '</b> dalla tua anagrafica, in questo modo rimuoverai tutti i prodotti appartenenti ad essa e ne cancellerai le revisioni fatte.';
                document.getElementById('cancellazioneLabel').innerHTML = 'Cancellazione ' + nomeCategoria;
                $('#deleteModal').modal('show');
                $('#deleteButton').click(function () {
                    $.post('../php/deleteCategory.php', {
                        idCategory: idCategoria,
                        idCompany: idAnag
                    }, function (resp) {
                    });
                    location.reload()
                })
            }

            function onPrintClick(categoria) {
                for (let i = 0; i < group.children.length; i++) {
                    let prova = group.children[i];
                    if (group.children[i].attrs.name !== categoria) {
                        prova.visible(false);
                    } else {
                        prova.visible(true);
                    }
                }
                var nomeAz = '<?php echo $arrayAna['nomeAzienda']; ?>';
                var dataURL = stage.toDataURL({
                    pixelRatio: 3
                });
                downloadURI(dataURL, 'planimetria' + nomeAz + categoria + '.png');
                for (let i = 0; i < group.children.length; i++) {
                    let prova = group.children[i];
                    prova.visible(true);
                }
            }


            //AGGIUNTA PRODOTTI

            //SCELTA CATEGORIA PRODOTTO
            const selectCategoryModal = document.getElementById('modalSelectCategory');
            var idCategoria = null;

            function fillSelectProductModal(categoriesName) {
                if (categoriesName) {
                    const select = document.getElementById('chooseCategory');
                    select.innerHTML =
                        '<div class="form-group">' +
                        '<label>Categoria:</label>' +
                        '<select class="form-select">' +
                        '<option selected value=0>Seleziona una categoria</option>';
                    for (var category of categoriesName) {
                        select.innerHTML += '<option value=' + category.idCategory + '>' + category.productCategoryName + '</option>'
                    }
                    select.innerHTML +=
                        '</select>' +
                        '</div>';
                } else {
                    selectCategoryModal.querySelector('form').reset();
                    document.getElementById('selectCategory').setAttribute("disabled", ""); //reset button seleziona
                }
            }

            selectCategoryModal.addEventListener('show.bs.modal', function (event) {
                fillSelectProductModal();

                $.get('../php/getProductsCategories.php')
                    .always(function () {
                        //modalLoading
                    })
                    .done(function (response) {
                        const companyInformations = JSON.parse(response);
                        fillSelectProductModal(companyInformations);
                    })
                    .fail(function () {
                        //modalError;
                    })
            })

            function onSelectCategoriesChange() {
                const select = document.getElementById('chooseCategory');
                if (select.value === 0) {
                    document.getElementById('selectCategory').setAttribute("disabled", "");
                } else {
                    document.getElementById('selectCategory').removeAttribute("disabled");
                }
            }

            $('#selectCategory').on('click', function () {
                debugger;
                idCategoria = document.getElementById('chooseCategory').value;
                console.log(idCategoria);
            })


            //Aggiunta del prodotto

            const addPrdocuctModal = document.getElementById("addProduct");
            var myInterval;

            function fillAddProductModal(attributesNames) {
                if (attributesNames) {
                    const form = document.getElementById('formAddProduct');
                    myInterval = setInterval(function () {
                        const formInputs = form.getElementsByTagName('input');
                        let flagger = true;
                        for (let input of formInputs) {
                            let inputContent = $("#" + input.id).val();
                            if (inputContent === "") {
                                flagger = false;
                            }
                        }
                        if (flagger) {
                            document.getElementById('addProductButton').removeAttribute("disabled");
                        } else {
                            document.getElementById('addProductButton').setAttribute("disabled", "");
                        }
                    }, 500);
                    form.innerHTML = '';
                    for (let i = 0; i < attributesNames.length; i++) {
                        form.innerHTML += '<div class="form-group">' +
                            '<label>' + attributesNames[i].field_name + '</label>' +
                            '<input type="text" class="form-control" id="' + attributesNames[i].field_id + '" placeholder="Inserisci ' + attributesNames[i].field_name + '">' +
                            '</div>'
                    }
                    form.innerHTML +=
                        '<div class="form-group"' +
                        '<label>Data revisione</label>' +
                        '   <div class="form-row">' +
                        '       <div class="row">' +
                        '           <div class="col">' +
                        '               <input type="datetime-local" id="date" class="form-control" value="">' +
                        '           </div>' +
                        '       </div>' +
                        '   </div>' +
                        '</div>' +
                        '<div class="form-group"' +
                        '<label>Posizione (clicca l\'icona sulla planimetria per ottenerla)</label>' +
                        '   <div class="form-row">' +
                        '       <div class="row">' +
                        '           <div class="col">' +
                        '               <input type="number" id="cX" class="form-control" placeholder="Pos. X" disabled>' +
                        '           </div>' +
                        '           <div class="col">' +
                        '               <input type="number" id="cY" class="form-control" placeholder="Pos. Y" disabled>' +
                        '           </div>' +
                        '       </div>' +
                        '   </div>' +
                        '</div>';
                    console.log($("#date").val());
                    $('#addProductButton').attr("value", idCategoria);
                    let risposta;
                    let nomeCategoria;
                    $.post('../php/getProductIcon.php', {
                        idCategoria: idCategoria,
                        idCompagnia: idAnag
                    }, function (resp) {
                        if (resp.length === 1) {
                            risposta = resp[0];
                        }
                        nomeCategoria = risposta.categoryName;
                        document.getElementById('addTitle').innerHTML = nomeCategoria;
                        //fill the layer and the stage with the planimetry
                        let sfondo = new Image();
                        let div = document.getElementById('planimetry-addProduct');
                        let stage = new Konva.Stage({
                            container: 'planimetry-addProduct',
                            width: div.clientWidth,
                            height: div.clientHeight
                        });
                        let layerSfondo = new Konva.Layer({
                            scaleX: 1,
                            scaleY: 1,
                            draggable: true
                        });
                        stage.add(layerSfondo);
                        let layer = new Konva.Layer({
                            scaleX: 1,
                            scaleY: 1,
                            draggable: false
                        });
                        stage.add(layer);
                        let groupSfondo = new Konva.Group({
                            scaleX: 1
                        });
                        layer.add(groupSfondo);
                        let group = new Konva.Group({
                            scaleX: 1
                        });
                        layer.add(group);
                        let widthRatio = (div.clientWidth) / risposta.w;
                        let heightRatio = (div.clientHeight) / risposta.h;
                        let bestRatio = Math.min(widthRatio, heightRatio);
                        let newWidth = risposta.w * bestRatio;
                        let newHeight = risposta.h * bestRatio;
                        let sfondoImg = new Konva.Image({
                            image: sfondo,
                            width: newWidth,
                            height: newHeight,
                            y: (div.clientHeight - newHeight) / 2,
                            draggable: false
                        });
                        groupSfondo.add(sfondoImg);

                        //canvas to move on the stage
                        let nome_prod = nomeCategoria;
                        let imageObj = new Image();
                        imageObj.src = "../" + risposta.productIcon;
                        nuovoProdotto = new Konva.Image({
                            y: (div.clientHeight - newHeight) / 2,
                            image: imageObj,
                            width: (20 * sfondoImg.attrs.width) / risposta.w,
                            height: (25 * sfondoImg.attrs.height) / risposta.h,
                            draggable: true,
                            name: nome_prod
                        });
                        group.add(nuovoProdotto);

                        //responsive map
                        sfondo.src = "../" + srcSfondo;
                        let scaleBy = 1.05;
                        stage.on('wheel', (e) => {
                            e.evt.preventDefault();
                            let oldScale = stage.scaleX();
                            let center = {
                                x: stage.width() / 2,
                                y: stage.height() / 2,
                            };
                            let relatedTo = {
                                x: (center.x - stage.x()) / oldScale,
                                y: (center.y - stage.y()) / oldScale,
                            };
                            let newScale =
                                e.evt.deltaY > 0 ? oldScale * scaleBy : oldScale / scaleBy;
                            stage.scale({
                                x: newScale,
                                y: newScale
                            });
                            let newPos = {
                                x: center.x - relatedTo.x * newScale,
                                y: center.y - relatedTo.y * newScale,
                            };
                            stage.position(newPos);
                            stage.batchDraw();
                        });
                        stage.addEventListener('dragend', function () {
                            debugger;
                            document.getElementById("cX").value = parseInt(((nuovoProdotto.getX() * risposta.w) / sfondoImg.attrs.width).toPrecision(10));
                            document.getElementById("cY").value = parseInt(((nuovoProdotto.getY() * risposta.h) / sfondoImg.attrs.height) - ((div.clientHeight - newHeight) / 2) + (((25 * sfondoImg.attrs.height) / risposta.h) / 2));
                        });
                    }, "json");

                } else {
                    clearInterval(myInterval);
                    addPrdocuctModal.querySelector('form').reset();
                    document.getElementById('addProductButton').setAttribute("disabled", ""); //reset button aggiungi
                }
            }

            addPrdocuctModal.addEventListener('show.bs.modal', function (event) {
                debugger;
                idCategoria = document.getElementById('chooseCategory').value;
                if (idCategoria != null && idCategoria !== 0) {
                    fillAddProductModal();

                    $.post('../php/getProductFields.php', {
                        idCategoria: idCategoria
                    })
                        .always(function () {
                            modalLoading();
                        })
                        .done(function (response) {
                            const categoryAttributes = JSON.parse(response);
                            fillAddProductModal(categoryAttributes);
                        })
                        .fail(function () {
                            modalError();
                        })
                }
            })


            function addProductToDB(productType) {
                clearInterval(myInterval);
                suspendAddProductButton(true);
                const formInputs = document.getElementById('formAddProduct').getElementsByTagName('input');
                var fields = {};
                for (let input of formInputs) {
                    if (input.id === 'date') {
                        fields[input.id] = $("#" + input.id).val();
                    } else {
                        fields[input.id] = $("#" + input.id).val();
                    }
                }
                fields['company_id'] = idAnag;
                fields['product_category_id'] = productType;
                console.log(fields);
                $.post('../php/addProduct.php', fields)
                    .always(function (response) {
                        modalLoading();
                        if (response.status === 400) {
                            modalError(true);
                        }
                    })
                    .done(function (response) {
                        suspendAddProductButton(false);
                        if (response === 'invalidInsert') {
                            modalError(true);
                        } else {
                            modalConfirmation(true);
                            console.log("ciao");
                            console.log(response);
                        }
                    })
                    .fail(function () {
                        suspendAddProductButton(false);
                        modalError(true);
                    })
            }

            function suspendAddProductButton(suspended) {
                if (suspended) {
                    $('#closeAddProductModal').prop('disabled', true);
                    const confirmButton = $('#addProductButton');
                    confirmButton.prop('disabled', true);
                    confirmButton.html('<div class="spinner-border spinner-border-sm" role="status"/>');
                } else {
                    $('#closeAddProductModal').removeAttr('disabled');
                    const confirmButton = $('#addProductButton');
                    confirmButton.removeAttr('disabled');
                    confirmButton.html("Aggiungi");
                }
            }

            function modalError(error) {
                $("#addProduct").modal(error ? 'hide' : 'show');
                $("#errorModal").modal(!error ? 'hide' : 'show');
            }

            function modalLoading(loading) {
                $("#addProduct").modal(loading ? 'hide' : 'show');
                $("#loadingModal").modal(!loading ? 'hide' : 'show');
            }

            function modalConfirmation(confirmed) {
                $("#addProduct").modal(confirmed ? 'hide' : 'show');
                $("#confirmedModal").modal(!confirmed ? 'hide' : 'show');
            }


            //VISUALIZZAZIONE CONDIZIONATA DELLA PLANIMETRIA PRINCIPALE E STAMPA

            function vistaCategoria(categoria) {
                debugger;
                for (let i = 0; i < group.children.length; i++) {
                    var prova = group.children[i];
                    if (group.children[i].attrs.category === categoria) {
                        prova.visible(true);
                    } else {
                        prova.visible(false);
                    }
                }
            }

            $('#viewAll').click(function () {
                for (let i = 0; i < group.children.length; i++) {
                    var prova = group.children[i];
                    prova.visible(true);
                }
            });
            //STAMPA DELLA PLANIMETRIA
            $('#stampaPDFPlan').click(function () {
                var nomeAz = '<?php echo $arrayAna['nomeAzienda']; ?>';
                var dataURL = stage.toDataURL({
                    pixelRatio: 3
                });
                downloadURI(dataURL, 'planimetria' + nomeAz + '.png');
            });

            function downloadURI(uri, name) {
                var link = document.createElement('a');
                link.download = name;
                link.href = uri;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                delete link;
            }

        </script>
        </body>

        </html>
        <?php
    }
} else {
    include_once('404.html');
}
?>
