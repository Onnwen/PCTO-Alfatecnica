<?php
    $error = $_SERVER['REDIRECT_STATUS'];
    $error_title = '';
    $error_message = '';
    $error_title = 'Error '.$error;
    $error_message = 'Unknown error';
?>

<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://www.myersdaily.org/joseph/javascript/md5.js"></script>
    <title>Error 404</title>
    <link rel="icon" href="../img/LogoBlack.png">
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
                <img class="mb-4" src="../img/LogoBlack.png" alt="" width="250" height="200" style="margin-right: 20px;">
            </div>
            <h1><?php  $error_title;  ?> </h1>
            <p><?php  $error_title;  ?></p>
        </main>
  </body>
</html>
