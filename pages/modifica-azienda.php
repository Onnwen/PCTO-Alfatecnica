<?php
session_start();
require_once("../php/connection/connection.php");
if(isset($_SESSION['session_id'])){
    $companyId = isset($_GET['id_ana']) ? $_GET['id_ana'] : '';

    if($companyId !== ''){
        $selectQuery = "SELECT name, site, address, CAP, city, province, phoneNumber1, emailAddress1, personalReference, phoneNumber2, cellPhoneNumber, emailAddress2, companyNotes, clientNotes
        FROM Companies WHERE id = :id";
        $pre = $pdo -> prepare($selectQuery);
        $pre -> bindParam(':id', $companyId, PDO::PARAM_INT);
        $pre -> execute();
        while($row = $pre->fetch(PDO::FETCH_ASSOC)){
            $companyArray = [
                'name' => $row['name'],
                'site' => $row['site'],
                'address' => $row['address'],
                'CAP' => $row['CAP'],
                'city' => $row['city'],
                'province' => $row['province'],
                'phoneNumber' => $row['phoneNumber1'],
                'emailAddress' => $row['emailAddress1'],
                'personalReference' => $row['personalReference'],
                'phoneNumber2' => $row['phoneNumber2'],
                'cellPhoneNumber' => $row['cellPhoneNumber'],
                'emailAddress2' => $row['emailAddress2'],
                'companyNotes' => $row['companyNotes'],
                'clientNotes' => $row['clientNotes']
            ];
        }
    }
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
        function updateInDataBase(){
            let id = <?php echo($companyId); ?>;
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

            $.post('../php/updateCompany.php', {
                id: id,
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
            }, function(response){
                if(response === 'invalidModification'){
                    $('#message').html('Inserimento non valido');
                }else{
                    $('#message').html(response);
                }
            });
        }
        </script>
    </head>
    <body>
        <p>Test</p>
        <p id="message" style="color:brown;">Springulfo</p>
        <form>
            <label for="name">Nome:</label>
            <input type="text" value="<?php echo $companyArray['name']; ?>" id="name"><br>
            <label for="site">Sede:</label>
            <input type="text" value="<?php echo $companyArray['site']; ?>" id="site"><br>
            <label for="address">Indirizzo</label>
            <input type="text" value="<?php echo $companyArray['address']; ?>" id="address"><br>
            <label for="CAP">CAP:</label>
            <input type="number" value="<?php echo $companyArray['CAP']; ?>" id="CAP"><br>
            <label for="city">Città:</label>
            <input type="text" value="<?php echo $companyArray['city']; ?>" id="city"><br>
            <label for="province">Provincia:</label>
            <input type="text" value="<?php echo $companyArray['province']; ?>" id="province"><br>
            <label for="phoneNumber">Numero di telefono:</label>
            <input type="text" value="<?php echo $companyArray['phoneNumber']; ?>" id="phoneNumber"><br>
            <label for="emailAddress">Indirizzo Email:</label>
            <input type="text" value="<?php echo $companyArray['emailAddress']; ?>" id="emailAddress"><br>
            <label for="personalReference">Riferimento personale</label>
            <input type="text" value="<?php echo $companyArray['personalReference']; ?>" id="personalReference"><br>
            <label for="phoneNumber2">Numero di telefono 2:</label>
            <input type="text" value="<?php echo $companyArray['phoneNumber2']; ?>" id="phoneNumber2"><br>
            <label for="cellPhoneNumber">Numero di cellulare:</label>
            <input type="text" value="<?php echo $companyArray['cellPhoneNumber']; ?>" id="cellPhoneNumber"><br>
            <label for="emailAddress2">Indirizzo email 2:</label>
            <input type="text" value="<?php echo $companyArray['emailAddress2']; ?>" id="emailAddress2"><br>
            <label for="companyNotes">Note aziendali:</label>
            <input type="text" value="<?php echo $companyArray['companyNotes']; ?>" id="companyNotes"><br>
            <label for="clientNotes">Note per cliente:</label>
            <input type="text" value="<?php echo $companyArray['clientNotes']; ?>" id="clientNotes"><br>
        </form>

        <button onclick="updateInDataBase()">Conferma</button>
    </body>
</html>

    <?php
} else {
    echo "<script>window.location.replace('../index.php');</script>";
}
?>
