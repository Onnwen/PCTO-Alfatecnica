<?php
session_start();
require_once("../php/connection/connection.php");
if(isset($_SESSION['session_id'])) {
    $productCategoryID = $_GET['product_category_id'];
    $companyID = $_GET['company_id'];
    $categoryNameSql = "SELECT `name` FROM `Product_Category` WHERE `product_category_id` = :productId;";
    $pre = $pdo->prepare($categoryNameSql);
    $pre->bindParam(':productId', $productCategoryID, PDO::PARAM_INT);
    $pre->execute();
    $categoryName = $pre->fetch(PDO::FETCH_ASSOC)['name'];
    $lowerCategoryName = strtolower($categoryName);

    $selectFieldsNamesSql = "SELECT name AS field_name, field_id FROM Product_Fields WHERE Product_Fields.product_category_id = :productId;";
    $fieldsNames = array();
    $pre = $pdo->prepare($selectFieldsNamesSql);
    $pre->bindParam(':productId', $productCategoryID, PDO::PARAM_INT);
    $pre->execute();
    while ($field = $pre->fetch(PDO::FETCH_ASSOC)) {
        array_push($fieldsNames, $field);
    }

    $selectDataSql = "SELECT Product_Data.field_id, Product_Data.value, Sold_Products.sold_product_id FROM Sold_Products INNER JOIN Product_Data ON Product_Data.sold_product_id = Sold_Products.sold_product_id WHERE Sold_Products.product_category_id = :productId AND Sold_Products.company_id = :companyId ORDER BY `Sold_Products`.`sold_product_id` ASC, Product_Data.field_id;;";
    $data = array();
    $pre = $pdo->prepare($selectDataSql);
    $pre->bindParam(':productId', $productCategoryID, PDO::PARAM_INT);
    $pre->bindParam(':companyId', $companyID, PDO::PARAM_INT);
    $pre->execute();
    while ($dataResponseRow = $pre->fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $dataResponseRow);
    }
    $soldProducts = array();
    $soldProduct = array();
    for ($i = 0; $i < count($data); $i++) {
        if ($i < 1 || $data[$i]['sold_product_id'] == $data[$i - 1]['sold_product_id']) {
            array_push($soldProduct, $data[$i]);
        } else {
            array_push($soldProducts, $soldProduct);
            $soldProduct = [];
            array_push($soldProduct, $data[$i]);
        }
        if ($i == count($data) - 1) {
            array_push($soldProducts, $soldProduct);
        }
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/LogoBlack.png">
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
    <link rel="stylesheet" href="../css/style.css">
    <title>Alfatecnica - Dettaglio Anagrafica</title>
</head>
<body>

<?php require_once("navbar.php"); ?>

<!-- Deleting confirmation Modal -->
<div class="modal fade" id="deletingModal" tabindex="-1" aria-labelledby="deletingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: red" id="confirmedModalLabel">Conferma eliminazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di eliminare l'apparato selezionato ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="button" id="deletingConfirmationButton" class="btn btn-danger" onclick="deleteProduct()">Conferma</button>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmedModal" tabindex="-1" aria-labelledby="confirmedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: darkgreen" id="confirmedModalLabel">Effettuato con successo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                L'operazione è avvenuta con successo. La pagina sarà ricaricata per applicare le modifiche.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload()">Ok</button>
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


<!-- Tabella -->
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center nome-azienda">
            <div class="row">
                <div class="col-12">
                    <h4><?php echo $categoryName; ?></h4>
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
                        <?php
                        echo "<th scope='col'>N°</th>";
                        foreach ($fieldsNames as $fieldName) {
                            echo "<th scope='col'>{$fieldName['field_name']}</th>";
                        }
                        echo "<th scope='col'>Modifica</th>";
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($soldProductIndex = 0; $soldProductIndex < count($soldProducts); $soldProductIndex++) {
                        echo "<tr>";
                        echo "<th>$soldProductIndex</th>";
                        foreach ($soldProducts[$soldProductIndex] as $field) {
                            echo "<th scope='col'><input id='field{$field['field_id']}-{$soldProducts[$soldProductIndex][0]["sold_product_id"]}' class='form-control' type='text' value='{$field['value']}' onchange='dataChanged({$soldProducts[$soldProductIndex][0]["sold_product_id"]}, {$field['field_id']})'></th>";
                        }
                        echo "<th scope='col' style='text-align: center; min-width: 250px; display: inline-block;'><button id='saveButton{$soldProducts[$soldProductIndex][0]["sold_product_id"]}' type='button' class='btn btn-success' disabled style='margin-right: 5px;' onclick='updateProduct({$soldProducts[$soldProductIndex][0]["sold_product_id"]})'>Salva</button><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deletingModal' data-bs-whatever='{$soldProducts[$soldProductIndex][0]["sold_product_id"]}'>Elimina $lowerCategoryName</button></th>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Fine -->

<!-- Footer -->
<?php require_once("footer.php"); ?>

<script>
    var changedFields = [];

    let id = 0;
    const deletingModal = document.getElementById('deletingModal');
    deletingModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        id = button.getAttribute('data-bs-whatever');
        console.log(id);
    });

    function deleteProduct() {
        $.post("../php/deleteProduct.php", {id: id})
            .done(function() {
                modalConfirm(true);
                modalDeleting(false);
                console.log("Prodotto " + id  + " cancellato.");
            })
            .fail(function() {
                modalDeleting(false);
                modalError(false);
            });
    }

    function dataChanged(productId, fieldId) {
        document.getElementById("saveButton" + productId).removeAttribute("disabled");
        changedFields.push([productId, fieldId]);
    }

    function updateProduct(productId) {
        document.getElementById("saveButton" + productId).setAttribute("disabled", "");
        changedFields.forEach(changedField => {
            changedFields.indexOf(changedField) === 0 ? changedFields = [] : changedFields = changedFields.slice(changedFields.indexOf(changedField), 1);
            if (changedField[0] === productId) {
                $.post("../php/updateProductFieldValue.php", {product_id: productId, field_id: changedField[1], value: document.getElementById("field" + changedField[1] + "-" + changedField[0]).value})
                    .done(function() {
                        modalConfirm(true);
                        console.log("Campo " + changedField[1]  + " del prodotto " + changedField[0] + " aggiornato col valore " + document.getElementById("field" + changedField[1] + "-" + changedField[0]).value + ".");
                    })
                    .fail(function() {
                        modalError(false);
                        console.log("Errore nell'aggiornamento del campo " + changedField[1]  + " del prodotto " + changedField[0] + " col valore " + document.getElementById("field" + changedField[1] + "-" + changedField[0]).value + ".");
                    });

            }
        });
    }

    function modalConfirm(confirmed) {
        $("#confirmedModal").modal(!confirmed ? 'hide' : 'show');
    }
    function modalError(error) {
        $("#errorModal").modal(!error ? 'hide' : 'show');
    }
    function modalDeleting(deleting) {
        $("#deletingModal").modal(!deleting ? 'hide' : 'show');
    }
</script>

</body>
</html>
    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>
