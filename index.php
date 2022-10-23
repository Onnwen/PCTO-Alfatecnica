<?php
session_start();
require_once('php/connessione.php');
if(isset($_SESSION['session_id'])){
  header('location: pages/lista-anagrafica.php');
} else {
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://www.myersdaily.org/joseph/javascript/md5.js"></script>
    <title>Alfatecnica - Login</title>
    <link rel="icon" href="img/logo.png">
    <style>
        html,
        body {
            height: 100%;
            background-image: linear-gradient(azure, moccasin);
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
    </style>
</head>

<body class="text-center login">

    <main class="form-signin">
        <div class="d-flex justify-content-center">
            <img class="mb-4" src="img/Immagine 2022-05-07 154137.png" alt="" width="auto" height="200" style="margin-right: 20px;">
        </div>
        <form id="form-login">
            <h1 class="h3 mb-3 fw-normal">Log In</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="Email" autocomplete="email">
                <label for="floatingInput" id="label-email">Indirizzo Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="current-password">
                <label for="floatingPassword" id="label-pw">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                        <input type="checkbox" value="remember-me"> Ricorda
                        questo dispositivo
                    </label>
            </div>
            <button class="w-100 btn btn-lg btn-dark" type="button" id="signin">Accedi</button>
            <p id="msgErr" style="margin-top: 7px; color: red;"></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2022 - Alfatecnica</p>
        </form>
    </main>
    <script type="text/javascript">
    $('#show').click(function(){
      var pass = document.getElementById('floatingPassword');
      if(pass.type == 'password')
        pass.type = 'text';
      else
        pass.type = 'password';
    });

    $('#signin').click(function(){
      var email = $('#floatingInput').val();
      var pw = $('#floatingPassword').val();

      if(email == ''){
        $('#msgErr').html('Email non inserita');
        $('#floatingInput').addClass('is-invalid');
        $('#label-email').attr('for', 'floatingInputInvalid');
        $('#label-email').html('Invalid Email');
      } else if(pw == ''){
        $('#msgErr').html('Password non inserita');
        $('#floatingPassword').addClass('is-invalid');
        $('#label-pw').attr('for', 'floatingInputInvalid');
        $('#label-pw').html('Invalid Password');
      } else {
        var pwMd5 = md5(md5(pw));
        console.log(pwMd5);
        $.post('php/login/login.php', {email:email, pw:pwMd5}, function(resp){
          if(resp == 'userWrong'){
            $('#msgErr').html('Credenziali errate');
            $('#floatingPassword, #floatingInput').addClass('is-invalid');
            $('#label-pw').attr('for', 'floatingInputInvalid');
            $('#label-pw').html('Invalid Password');
            $('#label-email').attr('for', 'floatingInputInvalid');
            $('#label-email').html('Invalid Email');
          } else {
            window.location.href="pages/lista-anagrafica.php";
          }
        });
      }
    });
    </script>
</body>

</html>
<?php
}
 ?>
