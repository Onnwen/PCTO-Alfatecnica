<?php
session_start();
require_once('../php/connection/connection.php');

if (isset($_SESSION['session_id'])) {
    $productsCategorySql = "select product_category_id, name, type from Product_Category ORDER BY type,name;";
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

        <style>
            .removeField {
                display: none;
            }

            .input-group:hover .removeField {
                display: inline;
            }
        </style>
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
                    <button type="button" id="deletingConfirmationButton" class="btn btn-danger" onclick="deleteProductCategoryFromDatabase()">Conferma</button>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Add/Edit Product Modal -->
    <div class="modal fade" id="productModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Aggiungi apparato</h5>
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
                                <label class="btn btn-outline-secondary w-100" for="isProduct">Apparato</label>
                            </div>
                            <div class="col-2 hide-with-editing">
                                <input type="radio" class="btn-check" name="form" id="isForm" autocomplete="off">
                                <label class="btn btn-outline-secondary w-100" for="isForm">Impianto</label>
                            </div>
                        </div>
                        <label for="basic-url" class="form-label">Attributi</label>
                        <div id="modalFields">
                        </div>
                        <div id="filesInput hide-with-editing">
                            <label for="basic-url" class="form-label hide-with-editing">Icona</label>
                            <div class="col hide-with-editing">
                                <div class="input-group mb-3">
                                    <input class="form-control hide-with-editing" type="file" id="icon" aria-describedby="addIconLabel">
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

    <!-- Modal di visualizzazione formato impianto del tipo Mdl-Imp-Sprinkler-a-secco.php -->

    <!-- Aggiunta e ricerca -->
    <div class="container">
        <div class="row w-100">
            <div class="col">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="addProduct" id="openProductModal">
                    <i class="bi bi-box-fill"></i>&nbsp;&nbsp;Aggiungi apparato o impianto
                </button>
            </div>
        </div>
    </div>

    <br>
    <hr>

    <!-- Lista prodotti -->
    <div class="container">
        <div class="row row-tabella">
            <div class="col-sm-12 mb-2">
                <h4 style="text-align: center">Lista apparati</h4>
            </div>
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
                                if ($productCategory['type'] == 1) {
                                    continue;
                                }
                                echo "<tr>";
                                echo "<th class='text-center align-middle'>{$productCategory['name']}</th>";
                                echo "<th class='text-center align-middle'>" . ($productCategory['type'] == 0 ? "Apparato" : "Impianto") . "</th>";
                                echo '<td class="text-center align-middle"><button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="' . $productCategory['product_category_id'] . '"><i class="fa-solid fa-pen"></i></button>&nbsp;&nbsp;<button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deletingModal" data-bs-whatever="' . $productCategory['product_category_id'] . '" )"><i class="fa-solid fa-trash-can"></i></button></td>';
                                echo "</tr>";
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12 mb-2 mt-3">
                <h4 style="text-align: center">Lista impianti</h4>
            </div>
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
                                if ($productCategory['type'] == 0) {
                                    continue;
                                }
                                echo "<tr>";
                                echo "<th class='text-center align-middle'>{$productCategory['name']}</th>";
                                echo "<th class='text-center align-middle'>" . ($productCategory['type'] == 0 ? "Apparato" : "Impianto") . "</th>";
                                echo '<td class="text-center align-middle"><button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleImp" data-bs-whatever="' . $productCategory['product_category_id'] . '"><i class="fa-solid fa-circle-info"></i></button>&nbsp;&nbsp;<button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="' . $productCategory['product_category_id'] . '"><i class="fa-solid fa-pen"></i></button>&nbsp;&nbsp;<button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deletingModal" data-bs-whatever="' . $productCategory['product_category_id'] . '" )"><i class="fa-solid fa-trash-can"></i></button></td>';
                                echo "</tr>";
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                    <h1 style="margin-top: 3%;text-align: center;color: lightcoral;font-size: x-large">!!! Attenzione non si puo' cancellare una tipologia di apparato se questo e' presente in alcune anagrafiche !!!</h1>
                    <h1 style="margin-top: 3%;text-align: center;color: burlywood;font-size: x-large">Lavori in corso per quanto riguarda gli impianti, per vedere un esempio della conformazione di un impianto <a href="Mdl-Imp-Sprinkler-a-secco.php">clicca qui</a></h1>
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
        let modalAttributes = [];
        let modalDeletedAttributes = [];
        let modalNewAttribues = [];

        let isEditingProduct = 0;
        let modalLabelMode = "Aggiungi";
        let modalLabelType = "apparato";
        let modalLabelFieldType = "Campo";
        let modalType = "addProduct";

        const productModal = document.getElementById('productModal');
        productModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            modalType = button.getAttribute('data-bs-whatever');

            const modalTitle = productModal.querySelector('.modal-title');

            resetModal();

            if (modalType === "addProduct") {
                isEditingProduct = 0;
                modalLabelMode = "Aggiungi";
                modalLabelFieldType = "Campo";
                modalTitle.textContent = modalLabelMode + " " + modalLabelType;
                $('#productModalConfirmButton').text(modalLabelMode);

                addSection();
                addField();

                loadNewProductFields();
            } else {
                isEditingProduct = modalType;
                modalLabelMode = "Modifica";
                $('#productModalConfirmButton').text(modalLabelMode);

                $.get('../php/productCategory/getProductCategory.php', {
                    id: modalType
                })
                    .done(function(response) {
                        let fieldsNames = JSON.parse(response);

                        modalTitle.textContent = modalLabelMode + " " + modalLabelType;

                        $("#name").val(fieldsNames["product_category_name"]);
                        modalAttributes = fieldsNames["attributes"];
                        modalLabelFieldType = fieldsNames["type"] === 0 ? "Campo" : "Domanda";

                        loadNewProductFields();
                    })
                    .fail(function() {
                        dismissModal();
                        modalError(true);
                    })
            }
        });

        $("#isProduct").on('click', function() {
            modalLabelType = "apparato";
            const modalTitle = productModal.querySelector('.modal-title');
            modalTitle.textContent = modalLabelMode + " " + modalLabelType;
            modalLabelFieldType = "Campo";
            resetModal();
            addField();
            loadNewProductFields();
        });

        $("#isForm").on('click', function() {
            modalLabelType = "impianto";
            const modalTitle = productModal.querySelector('.modal-title');
            modalTitle.textContent = modalLabelMode + " " + modalLabelType;
            modalLabelFieldType = "Domanda";
            if (modalAttributes.length === 0) {
                modalAttributes.push({
                    'id': 0,
                    'name': ""
                });
            }
            resetModal();
            addSection();
            loadNewProductFields();
        });

        function resetModal() {
            modalAttributes = [];
            modalDeletedAttributes = [];
            modalNewAttribues = [];

            modalAttributes = [];
            modalDeletedAttributes = [];

            $("#name").val("");
            $("#productModalConfirmButton").prop("disabled", false);

            if (modalType === "addProduct") {
                $(".hide-with-editing").each(function() {
                    $(this).show();
                })

                $(".disabled-with-editing").each(function() {
                    $(this).prop("disabled", false);
                })
            } else {
                $(".hide-with-editing").each(function() {
                    $(this).hide();
                })

                $(".disabled-with-editing").each(function() {
                    $(this).prop("disabled", true);
                })
            }
        }

        function loadNewProductFields() {
            let fieldsHtml = "";
            if (!isForm()) {
                modalAttributes.forEach((field, fieldIndex) => {
                    fieldsHtml += '<div class="input-group mb-2"> ' +
                        `<span class="input-group-text" id="addNameLabel" style="min-width: 110px;">${modalLabelFieldType} ${fieldIndex + 1}</span> ` +
                        `<input class="form-control field-input" type="text" id="${fieldIndex}input" aria-describedby="addNameLabel" value="${field['name']}" placeholder="Nome campo" onchange="updateField(${fieldIndex})">`;
                    if (modalAttributes.length > 1) {
                        fieldsHtml += `<button class="btn btn-outline-secondary removeField" type="button" onclick="removeField(${fieldIndex})"><i class="bi bi-trash3"></i></button> `;
                    }
                    if (fieldIndex === modalAttributes.length - 1) {
                        fieldsHtml += `<button class="btn btn-outline-primary" type="button" onclick="addField()"><i class="bi bi-plus-circle"></i></button> `;
                    }
                    fieldsHtml += `</div>`;
                })
            } else {
                modalAttributes.forEach((section, sectionIndex) => {
                    fieldsHtml += '<div class="input-group mb-2"> ' +
                        `<span class="input-group-text" id="addSectionLabel" style="min-width: 110px;">Sezione ${sectionIndex + 1}</span> ` +
                        `<input class="form-control field-check" type="text" id="${sectionIndex}inputSection" aria-describedby="addSectionLabel" value="${section['name']}" placeholder="Nome sezione" onchange="updateSection(${sectionIndex})">`;
                    if (modalAttributes.length > 1) {
                        fieldsHtml += `<button class="btn btn-outline-secondary removeField" type="button" onclick="removeSection(${sectionIndex})"><i class="bi bi-trash3"></i></button> `;
                    }
                    fieldsHtml += `</div>`;
                    section['fields'].forEach((field, fieldIndex) => {
                        fieldsHtml += `<div class="input-group ${(fieldIndex === section['fields'].length - 1) ? "mb-4" : "mb-2"}"> ` +
                            `<span class="input-group-text" id="addNameLabel" style="min-width: 110px;">${modalLabelFieldType} ${fieldIndex + 1}</span> ` +
                            `<input class="form-control field-check" type="text" id="${sectionIndex}${fieldIndex}input" aria-describedby="addNameLabel" value="${field['name']}" placeholder="Nome campo" onchange="updateField('${fieldIndex}','${sectionIndex}')">`;
                        if (section['fields'].length > 1) {
                            fieldsHtml += `<button class="btn btn-outline-secondary removeField" type="button" onclick="removeField('${fieldIndex}', '${sectionIndex}')"><i class="bi bi-trash3"></i></button> `;
                        }
                        if (fieldIndex === section['fields'].length - 1) {
                            fieldsHtml += `<button class="btn btn-outline-primary" type="button" onclick="addField(${sectionIndex}, ${section['id']})"><i class="bi bi-plus-circle"></i></button> `;
                        }
                        fieldsHtml += `</div>`;
                    })
                });
                fieldsHtml += `<button class="btn btn-primary w-100 mb-2" type="button" onclick="addSection()">Nuova sezione</button> `;
            }
            fieldsHtml += `<div class="mb-3"></div>`;
            $("#modalFields").html(fieldsHtml);
        }

        function addField(sectionId, section) {
            if (sectionId === undefined) {
                modalAttributes.push({
                    'id': (modalAttributes.length + 1) * -1,
                    'name': ""
                });
            } else {
                modalAttributes[sectionId]['fields'].push({
                    'id': (modalAttributes[sectionId]['fields'].length + 1) * -1,
                    'name': "",
                    'section': section
                })
            }
            loadNewProductFields();
        }

        function addSection() {
            modalAttributes.push({
                'id': (modalAttributes.length +1) * -1 ,
                'name': "",
                'fields': [],
                'isSection': true
            });
            addField(modalAttributes.length - 1, modalAttributes.at(-1)['id']);
        }

        function removeField(fieldIndex, sectionIndex) {
            if (sectionIndex === undefined) {
                modalDeletedAttributes.push(modalAttributes[fieldIndex]);
                modalAttributes.splice(fieldIndex, 1);
            } else {
                modalDeletedAttributes.push({
                    'section': sectionIndex,
                    'field': modalAttributes[sectionIndex]['fields'][fieldIndex]
                });
                modalAttributes[sectionIndex]['fields'].splice(fieldIndex, 1);
            }
            loadNewProductFields();
        }

        function removeSection(index) {
            modalDeletedAttributes.push(modalAttributes[index]);
            modalAttributes.splice(index, 1);
            loadNewProductFields();
        }

        function updateField(fieldIndex, sectionIndex) {
            debugger;
            if (sectionIndex === undefined) {
                modalAttributes[fieldIndex]["name"] = $("#" + fieldIndex + "input").val()
                modalNewAttribues.push(modalAttributes[fieldIndex]);
            } else {
                modalAttributes[sectionIndex]["fields"][fieldIndex]["name"] = $("#" + sectionIndex + "" + fieldIndex + "input").val()
                modalNewAttribues.forEach((newField) => {
                    if (newField['id'] === modalAttributes[sectionIndex]['fields'][fieldIndex]['id'] && newField['section'] === modalAttributes[sectionIndex]['id'] && newField['isSection'] === false) {
                        modalNewAttribues.splice(modalNewAttribues.indexOf(newField), 1);
                    }
                });
                modalNewAttribues.push({
                    'name': modalAttributes[sectionIndex]["fields"][fieldIndex]["name"],
                    'id': modalAttributes[sectionIndex]["fields"][fieldIndex]["id"],
                    'section': modalAttributes[sectionIndex]["fields"][fieldIndex]["section"],
                    'isSection': false
                });
            }
        }

        function updateSection(index) {
            debugger;
            modalAttributes[index]["name"] = $("#" + index + "inputSection").val();
            modalNewAttribues.forEach((newField) => {
                if (newField['id'] === modalAttributes[index]['id'] && newField['isSection'] === true) {
                    modalNewAttribues.splice(modalNewAttribues.indexOf(newField), 1);
                }
            });
            modalNewAttribues.push({
                'name': modalAttributes[index]["name"],
                'id': modalAttributes[index]["id"],
                'isSection': true
            });
        }

        function isForm() {
            return modalLabelFieldType === "Domanda"
        }

        function checkFields() {
            let canProceed = true;
            $(this).removeClass('is-invalid');
            $(".field-input .field-check").each(function() {
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
            } else {
                updateProductCategoryInDataBase();
            }
        }

        function addProductCategoryToDatabase() {
            if (checkFields()) {
                suspendProductModal(true);
                let parameters = new FormData();

                if (isForm()) {
                    parameters.append("type", 1);
                    modalAttributes.forEach((section, sectionIndex) => {
                        parameters.append(sectionIndex + "sectionName", section["name"]);
                        section["fields"].forEach((field, fieldIndex) => {
                            parameters.append(sectionIndex + "" + fieldIndex + "fieldName", field["name"]);
                        });
                    });
                } else {
                    parameters.append("type", 0);
                }

                $(".field-input").each(function() {
                    parameters.append($(this).attr('id'), $(this).val());
                });

                // Gestisci upload immagine
                let icon_image = $('#icon').prop('files')[0];
                parameters.append('icon', icon_image);

                $.ajax({
                    url: '../php/productCategory/addProductCategory.php',
                    type: 'post',
                    data: parameters,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        suspendProductModal(false);
                        modalConfirmation(true);
                    },
                    fail: function() {
                        suspendProductModal(false);
                        modalError(true);
                    },
                });
            } else {
                alert("Per procedere è necessario compilare tutti i campi.");
            }
        }

        function updateProductCategoryInDataBase() {
            let parameters = {
                "product_category_id": isEditingProduct,
                "name": $("#name").val()
            };

            if (!isForm()) {
                parameters["type"] = 0;
                modalNewAttribues.forEach((newField, index) => {
                    if (modalDeletedAttributes.indexOf(newField) !== -1) {
                        modalNewAttribues.splice(index, 1);
                    }
                });

                let newFields = 0;
                let updatedFields = 0;
                let deletedFields = 0;

                modalNewAttribues.forEach(newField => {
                    if (newField['id'] < 0) {
                        parameters[newFields + "newFieldName"] = newField['name'];

                        newFields++;
                    } else {
                        parameters[updatedFields + "updateFieldId"] = newField['id'];
                        parameters[updatedFields + "updateFieldName"] = newField['name'];
                        updatedFields++;
                    }
                });
                modalDeletedAttributes.forEach(deletedField => {
                    parameters[deletedFields + "deleteFieldId"] = deletedField['id'];
                    deletedFields++;
                });
            } else {
                parameters["type"] = 1;
                modalNewAttribues.forEach((newField, index) => {
                    if (modalDeletedAttributes.indexOf(newField) !== -1) {
                        modalNewAttribues.splice(index, 1);
                    }
                });

                let newSections = 0;
                let updatedSections = 0;
                let deletedSections = 0;

                let newFields = 0;
                let updatedFields = 0;
                let deletedFields = 0

                console.log(modalNewAttribues);

                modalNewAttribues.forEach(newField => {
                    if (newField['isSection']) {
                        if (newField['id'] < 0) {
                            parameters[newSections + "newSectionName"] = newField['name'];
                            parameters[newSections + "newSectionId"] = newField['id'];
                            newSections++;
                        } else {
                            parameters[updatedSections + "updateSectionId"] = newField['id'];
                            parameters[updatedSections + "updateSectionName"] = newField['name'];
                            updatedSections++;
                        }
                    } else {
                        if (newField['id'] < 0) {
                            if (newField['section'] < 0) {
                                parameters[newFields + "newFieldNameWithoutSection"] = newField['name'];
                                parameters[newFields + "newFieldWithoutSection"] = newField['section'];
                            } else {
                                parameters[newFields + "newFieldName"] = newField['name'];
                                parameters[newFields + "newFieldSectionId"] = newField['section'];
                            }
                            newFields++;
                        } else {
                            parameters[updatedFields + "updateFieldId"] = newField['id'];
                            parameters[updatedFields + "updateFieldName"] = newField['name'];
                            updatedFields++;
                        }
                    }
                });
                modalDeletedAttributes.forEach(deletedField => {
                    if (deletedField['isSection']) {
                        parameters[deletedSections + "deleteSectionId"] = deletedField['id'];
                        deletedSections++;
                    } else {
                        console.log(deletedField);
                        parameters[deletedFields + "deleteFieldId"] = deletedField['field']['id'];
                        deletedFields++;
                    }
                });
            }
            console.log(parameters);

            suspendProductModal(true);
            $.post('../php/productCategory/updateProductCategory.php', parameters)
                .done(function() {
                    suspendProductModal(false);
                    modalConfirmation(true);
                })
                .fail(function() {
                    suspendProductModal(false);
                    modalError(true);
                })
        }


        let id = 0;
        const deletingModal = document.getElementById('deletingModal');
        deletingModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            id = button.getAttribute('data-bs-whatever');
        });
        function deleteProductCategoryFromDatabase() {
            modalLoading(true);
            $.post('../php/productCategory/deleteProductCategory.php', {
                id: id
            })
                .done(function() {
                    modalDeleting(false);
                    modalConfirmation(true);
                })
                .fail(function() {
                    modalDeleting(false);
                    modalError(true);
                })
            x
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

        function hideModal() {
            $("#productModal").modal('hide');
        }

        function modalLoading(loading) {
            $("#productModal").modal(loading ? 'hide' : 'show');
            $("#loadingModal").modal(!loading ? 'hide' : 'show');
        }

        function onlyModalLoading(loading) {
            $("#loadingModal").modal(!loading ? 'hide' : 'show');
        }

        function modalConfirmation(confirmed) {
            $("#productModal").modal(confirmed ? 'hide' : 'show');
            $("#confirmedModal").modal(!confirmed ? 'hide' : 'show');
        }

        function modalDeleting(deleted) {
            $("#deletingModal").modal(!deleted ? 'hide' : 'show');
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
