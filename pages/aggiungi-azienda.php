<?php
session_start();
require_once("../php/connessione.php");
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function insertInDatabase() {
            let name = $('#name').val();
            let site = $('#site').val();
            let address = $('#address').val();
            let CAP = $('#CAP').val();
            let city = $('#city').val();
            let province = $('#province').val();
            let phoneNumber = $('#phoneNumber').val();
            let emailAddress = $('#emailAddress').val();
            let personalReference = $('#personalReference').val();
            let phoneNumber2 = $('#phoneNumber2').val();
            let cellPhoneNumber = $('#cellPhoneNumber').val();
            let emailAddress2 = $('#emailAddress2').val();
            let companyNotes = $('#companyNotes').val();
            let clientNotes = $('#clientNotes').val();

            // console.log(name);
            // console.log(site);
            // console.log(address);
            // console.log(CAP);
            // console.log(city);
            // console.log(province);
            // console.log(phoneNumber);
            // console.log(emailAddress);
            // console.log(personalReference);
            // console.log(phoneNumber2);
            // console.log(cellPhoneNumber);
            // console.log(emailAddress2);
            // console.log(companyNotes);
            // console.log(clientNotes);

            $.post('../php/addCompany.php', {
                name: name,
                site: site,
                address: address,
                CAP: CAP,
                city: city,
                province: province,
                phoneNumber: phoneNumber,
                emailAddress: emailAddress,
                personalReference: personalReference,
                phoneNumber2: phoneNumber2,
                cellPhoneNumber: cellPhoneNumber,
                emailAddress2: emailAddress2,
                companyNotes: companyNotes,
                clientNotes: clientNotes
            }, function(response) {
                if (response == 'invalidInsert') {
                    $('#message').html('Inserimento non valido');
                } else {
                    $('#message').html(response);
                }
            });
        }
    </script>

</head>

<body>
    <p>Test</p>
    <p id="message" style="color: brown;"></p>
    <form>
        <label for="name">Nome:</label>
        <input type="text" id="name"><br>
        <label for="site">Sede:</label>
        <input type="text" id="site"><br>
        <label for="address">Indirizzo</label>
        <input type="text" id="address"><br>
        <label for="CAP">CAP:</label>
        <input type="number" id="CAP"><br>
        <label for="city">Città:</label>
        <input type="text" id="city"><br>
        <label for="province">Provincia:</label>
        <input type="text" id="province"><br>
        <label for="phoneNumber">Numero di telefono:</label>
        <input type="text" id="phoneNumber"><br>
        <label for="emailAddress">Indirizzo Email:</label>
        <input type="text" id="emailAddress"><br>
        <label for="personalReference">Riferimento personale</label>
        <input type="text" id="personalReference"><br>
        <label for="phoneNumber2">Numero di telefono 2:</label>
        <input type="text" id="phoneNumber2"><br>
        <label for="cellPhoneNumber">Numero di cellulare:</label>
        <input type="text" id="cellPhoneNumber"><br>
        <label for="emailAddress2">Indirizzo email 2:</label>
        <input type="text" id="emailAddress2"><br>
        <label for="companyNotes">Note aziendali:</label>
        <input type="text" id="companyNotes"><br>
        <label for="clientNotes">Note per cliente:</label>
        <input type="text" id="clientNotes"><br>
    </form>

    <button onclick="insertInDatabase()">Conferma</button>
</body>

</html>