<?php
session_start();
require_once("../php/connessione.php");
if(isset($_SESSION['session_id'])){
    $stringPasswordRetriver = isset($_GET['stringPasswordRetriver']) ? $_GET['stringPasswordRetriver'] : '';
    if(isset($stringPasswordRetriver)){
        $query = "SELECT user_id as idUser FROM User WHERE stringRetrivePasword = $stringPasswordRetriver";
        $result = $pdo->prepare($query);
        $result->execute();
        $result->fetchAll(PDO::FETCH_ASSOC);
        $idUser = $result;
    }
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
    </head>
    <body>
    <p>Reimposta Password</p>
    <form>
        <label for="newPassword">Nuova password:</label>
        <input type="text" value="Nuova password" id="newPassword"><br>
        <label for="confirmPassword">Conferma password:</label>
        <input type="text" value="Conferma password" id="confirmPassword"><br>
    </form>
    <button onclick="updateInDataBase()">Conferma</button>

    <script>
        updateInDataBase(){
            console.log(<?php echo $result ?>);
            console.log(<?php echo $idUser ?>);
        }
    </script>
    </body>
    </html>

    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>