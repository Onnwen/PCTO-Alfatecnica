<?php
session_start();
require_once('../php/connessione.php');
if (isset($_SESSION['session_id'])) {
    header('location: pages/lista-anagrafica.php');
} else {
    $stringPasswordRetriever = $_GET['stringpasswordretriever'];
    if (isset($stringPasswordRetriever)) {
        $query = "SELECT user_id as idUser FROM Users WHERE stringRetrievePassword = '$stringPasswordRetriever'";
        $pre = $pdo->prepare($query);
        $pre->execute();
        $check = $pre->fetch(PDO::FETCH_ASSOC);
        $idUser = $check['idUser'];
?>
    <html>

    <head>
        <title>Recupera password</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            const idUser = <?php echo $idUser?>;
            const newPassword = $('#newPassword');
            const confirmPassword = $('#confirmPassword');
            const validatePassword = (password) => {
                return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);
            };
            function updateDB() {
                valueControl = true;
                if(newPassword.val() === '' || !validatePassword(newPassword.val())){
                    newPassword.addClass('is-invalid');
                    newPassword.attr('for', 'floatingInputInvalid');
                    valueControl = false;
                } else {
                    newPassword.removeClass('is-invalid');
                }
                if (confirmPassword.val() === '' || !validatePassword(confirmPassword.val())){
                    confirmPassword.addClass('is-invalid');
                    confirmPassword.attr('for', 'floatingInputInvalid');
                    valueControl = false;
                } else {
                    confirmPassword.removeClass('is-invalid');
                }

                if(valueControl){
                    console.log("cao");
                    $.post('../php/login/changePassword.php', {idUser: idUser,newPassword: newPassword})
                    .done(function (response){
                            if(response === "correctModify"){
                                $('#justChanged').modal('show');
                            } else {
                                $('#errorModal').modal('show');
                            }
                    })
                    .fail(function (){
                            $('#errorModal').modal('show');
                        }
                    )
                }
            }
        </script>
    </head>

    <body>
        <p>Reimposta Password</p>
        <form>
            <label for="newPassword">Nuova password:</label>
            <input type="text" placeholder="Nuova password" id="newPassword"><br>
            <label for="confirmPassword">Conferma password:</label>
            <input type="text" placeholder="Conferma password" id="confirmPassword"><br>
        </form>
        <button type="submit" onclick="updateDB()">Conferma</button>

        <!-- Modal successo -->
        <div class="modal fade" id="justChanged" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: darkgreen" id="changedLabel">La password è stata reimpostata</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="afterChangedLabel">
                        Le password è stata modificata ora puoi fare il login per accedere ai nostri servizi. Premendo "Ok" verrai reinderizzato al login.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='index.php'">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal errore -->
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: darkred" id="errorModalLabel">È stato riscontrato un problema</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label id="errorRegistrationLabel">La tua password non è stata modificata correttamente. Ci scusiamo per il disagio.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='index.php'">Ok</button>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
<?php
    }
}
 ?>