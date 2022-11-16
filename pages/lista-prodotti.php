<?php
session_start();
require_once('../php/connessione.php');

if (isset($_SESSION['session_id'])) {
    $productsCategorySql = "select product_category_id, name, visualization_type from Product_Category;";
    $productsCategory = array();
    $pre = $pdo->prepare($productsCategorySql);
    $pre->execute();
    while ($productCategory = $pre->fetch(PDO::FETCH_ASSOC)) {
        $productsCategory[] = $productCategory;
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title>Alfatecnica - Lista Prodotti</title>
        <link rel="icon" href="img/logo.png">
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
                    L'operazione è avvenuta con successo. La pagina sarà ricaricata per applicare le modifiche.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="reload()">Ok</button>
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

    <!-- Loading Modal -->
    <div class="modal fade" id="loadingModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
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

    <!-- Add/Edit Product Modal -->
    <div class="modal fade" id="productModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Aggiungi prodotto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="basic-url" class="form-label">Dati generali</label>
                        <div class="row gx-2">
                            <div class="col me-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text disabled-with-editing" id="addNameLabel">Nome</span>
                                    <input class="form-control field-input" type="text" id="name" aria-describedby="addNameLabel" placeholder="Nome">
                                </div>
                            </div>
                            <div class="col-2 hide-with-editing">
                                <input type="radio" class="btn-check" name="form" id="isProduct" autocomplete="off" checked>
                                <label class="btn btn-outline-secondary w-100" for="isProduct">Prodotto</label>
                            </div>
                            <div class="col-2 hide-with-editing">
                                <input type="radio" class="btn-check" name="form" id="isForm" autocomplete="off">
                                <label class="btn btn-outline-secondary w-100" for="isForm">Formulario</label>
                            </div>
                        </div>
                        <label for="basic-url" class="form-label">Campi</label>
                        <div id="modalFields">
                        </div>
                        <div id="filesInput hide-with-editing">
                            <label for="basic-url" class="form-label hide-with-editing">Icona</label>
                            <div class="col hide-with-editing">
                                <div class="input-group mb-3">
                                    <input class="form-control hide-with-editing" type="file" id="icon_path" aria-describedby="addIconLabel">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="productModalCloseButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button id="productModalConfirmButton" type="button" class="btn btn-success" onclick="confirmModalButton();">Aggiungi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Aggiunta e ricerca -->
    <div class="container">
        <div class="row w-100">
            <div class="col">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                    <i class="bi bi-box-fill"></i>&nbsp;&nbsp;Aggiungi prodotto
                </button>
            </div>
        </div>
    </div>

    <br>
    <hr>

    <!-- Lista prodotti -->
    <div class="container">
        <div class="row row-tabella">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center;">
                            <th scope="col">Nome</th>
                            <th scope="col">Tipologia</th>
                            <th scope="col" style="width: 200px">Gestione</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="text-align: center;">
                            <?php
                            foreach ($productsCategory as $productCategory) {
                                echo "<tr>";
                                echo "<th class='text-center align-middle'>{$productCategory['name']}</th>";
                                echo "<th class='text-center align-middle'>" . ($productCategory['visualization_type'] == 0 ? "Prodotto" : "Questionario") . "</th>";
                                echo '<td class="text-center align-middle"><button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="' . $productCategory['product_category_id'] . '"><i class="fa-solid fa-pen"></i></button><button class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></button><button class="btn btn-outline-danger" onclick="deleteProductCategoryFromDatabase(' . $productCategory['product_category_id'] . ')"><i class="fa-solid fa-trash-can"></i></button></td>';
                                echo "</tr>";
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <!-- FOOTER -->

    <hr>
    <footer class="py-3 my-4">
        <p class="text-center text-muted ">© 2022 Alfatecnica, Inc</p>
    </footer>
    </body>

    <script>
        let modalFieldsNames = [];
        let isEditingProduct = 0;
        let modalLabelMode = "Aggiungi";
        let modalLabelType = "prodotto";
        let modalDeletedFieldsIds = [];
        let modalNewFieldsIds = [];
        let modalType = "addProduct";

        const productModal = document.getElementById('productModal')
        productModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            modalType = button.getAttribute('data-bs-whatever');

            const modalTitle = productModal.querySelector('.modal-title');

            modalFieldsNames = [];
            modalDeletedFieldsIds = [];
            modalNewFieldsIds = [];
            $("#name").val("");

            if (modalType === "addProduct") {
                modalFieldsNames.push({'id': 0, 'name': ""})
                isEditingProduct = 0;
                modalLabelMode = "Aggiungi";
                modalTitle.textContent = modalLabelMode + " " + modalLabelType;
                $('#productModalConfirmButton').text("Aggiunti");

                loadNewProductFields();

                $(".hide-with-editing").each(function () {
                    $(this).show();
                })

                $(".disabled-with-editing").each(function () {
                    $(this).prop("disabled", false);
                })

            } else {
                isEditingProduct = modalType;
                modalLabelMode = "Modifica";

                $(".hide-with-editing").each(function () {
                    $(this).hide();
                })

                $(".disabled-with-editing").each(function () {
                    $(this).prop("disabled", true);
                })

                $.get('../php/productCategory/getProductCategoryFields.php', {
                    id: modalType
                })
                    .done(function (response) {
                        let fieldsNames = JSON.parse(response);

                        modalTitle.textContent = modalLabelMode + " " + modalLabelType;

                        $("#name").val(fieldsNames[0]["product_category_name"])
                        fieldsNames.forEach(fieldName => {
                            modalFieldsNames.push({'name': fieldName['field_name'], 'id': fieldName['field_id']})
                        });
                        loadNewProductFields();
                    })
                    .fail(function () {
                        dismissModal();
                        modalError(true);
                    })
            }
        });

        $("#isProduct").on('click', function () {
            modalLabelType = "prodotto";
            const modalTitle = productModal.querySelector('.modal-title');
            modalTitle.textContent = modalLabelMode + " " + modalLabelType;
        });

        $("#isForm").on('click', function () {
            modalLabelType = "formulario";
            const modalTitle = productModal.querySelector('.modal-title');
            modalTitle.textContent = modalLabelMode + " " + modalLabelType;
        });

        function loadNewProductFields() {
            let fieldsHtml = "";
            modalFieldsNames.forEach((field, index) => {
                fieldsHtml += '<div class="input-group mb-2"> ' +
                    `<span class="input-group-text" id="addNameLabel" style="min-width: 100px;">Campo ${index + 1}</span> ` +
                    `<input class="form-control field-input" type="text" id="${index}input" aria-describedby="addNameLabel" value="${field['name']}" placeholder="Nome campo" onchange="updateField(${index})">`;
                if (index === modalFieldsNames.length - 1) {
                    fieldsHtml += `<button class="btn btn-outline-primary" type="button" onclick="addField()"><i class="bi bi-plus-circle"></i></button> `;
                }
                if (modalFieldsNames.length > 1) {
                    fieldsHtml += `<button class="btn btn-outline-secondary removeField" type="button" onclick="removeField(${index})"><i class="bi bi-trash3"></i></button> `;
                }
                fieldsHtml += `</div>`;
            })
            fieldsHtml += `<div class="mb-3"></div>`;
            $("#modalFields").html(fieldsHtml);
        }

        function addField() {
            modalFieldsNames.push({'id': (modalFieldsNames.length+1)*-1, 'name': ""});
            loadNewProductFields();
        }

        function removeField(index) {
            modalDeletedFieldsIds.push(modalFieldsNames[index]);
            modalFieldsNames.splice(index, 1);
            loadNewProductFields();
        }

        function updateField(index) {
            modalFieldsNames[index]["name"] = $("#" + index + "input").val()
            modalNewFieldsIds.push(modalFieldsNames[index]);
        }

        function checkFields() {
            let canProceed = true;
            $(this).removeClass('is-invalid');
            $(".field-input").each(function () {
                $(this).removeClass('is-invalid');
                if ($(this).val() === "") {
                    $(this).addClass('is-invalid');
                    canProceed = false;
                }
            });
            return canProceed;
        }

        function confirmModalButton() {
            if (modalType === "addProduct") {
                addProductCategoryToDatabase()
            }
            else {
                updateProductCategoryInDataBase();
            }
        }

        function addProductCategoryToDatabase() {
            if (checkFields()) {
                suspendProductModal(true);
                let parameters = {};
                $(".field-input").each(function () {
                    parameters[$(this).attr('id')] = $(this).val();
                });

                $.post('../php/productCategory/addProductCategory.php', parameters)
                    .done(function () {
                        suspendProductModal(false);
                        modalConfirmation(true);
                    })
                    .fail(function () {
                        suspendProductModal(false);
                        modalError(true);
                    })
            } else {
                alert("Per procedere è necessario compilare tutti i campi.");
            }
        }

        function updateProductCategoryInDataBase() {
            if (modalDeletedFieldsIds.length > 0 || modalNewFieldsIds > 0) {
                // To-Do: chiamata update
                // To-Do: accertarsi che i campi presenti in modalNewFieldsIds non siano presenti anche in modalDeletedFieldsIds
                console.log(modalDeletedFieldsIds);
                console.log(modalNewFieldsIds);
            }
        }

        function deleteProductCategoryFromDatabase(productCategoryId) {
            $.post('../php/productCategory/deleteProductCategory.php', {id: productCategoryId})
                .done(function () {
                    modalConfirmation(true);
                })
                .fail(function () {
                    modalError(true);
                })
        }

        function suspendProductModal(suspended) {
            if (suspended) {
                $('#productModalCloseButton').prop('disabled', true);
                const confirmButton = $('#productModalConfirmButton');
                confirmButton.prop('disabled', true);
                confirmButton.html('<div class="spinner-border spinner-border-sm" role="status"/>');
            } else {
                $('#productModalCloseButton').removeAttr('disabled');
                const confirmButton = $('#productModalConfirmButton');
                confirmButton.removeAttr('disabled');
                confirmButton.html("Aggiungi");
            }
        }

        function dismissModal() {
            $("#productModal").modal('hide');
        }

        function modalError(error) {
            $("#productModal").modal(error ? 'hide' : 'show');
            $("#errorModal").modal(!error ? 'hide' : 'show');
        }

        function modalLoading(loading) {
            $("#productModal").modal(loading ? 'hide' : 'show');
            $("#loadingModal").modal(!loading ? 'hide' : 'show');
        }

        function modalConfirmation(confirmed) {
            $("#productModal").modal(confirmed ? 'hide' : 'show');
            $("#confirmedModal").modal(!confirmed ? 'hide' : 'show');
        }

        function reload() {
            window.location.reload();
        }

    </script>

    </html>

    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>
