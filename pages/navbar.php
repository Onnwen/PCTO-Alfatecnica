<?php
echo '<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a href="../index.php"><img src="../img/logo.png" width="55px" height="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse header" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="lista-anagrafica.php">Anagrafica</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: red">Revisione</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: red">Prodotti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: red">Utenti</a>
                </li>
                </li>
            </ul>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="logout();">Logout</button>
        </div>
    </div>
</nav>
<script>
    const httpLogoutRequest = new XMLHttpRequest();
    httpLogoutRequest.onreadystatechange = () => {
        if (httpLogoutRequest.readyState === 4 && httpLogoutRequest.status === 200) {
            console.log("CIAO")
            window.location.replace("../index.php");
        }
    }
    
    function logout() {
        httpLogoutRequest.open("GET", "../php/login/logout.php");
        httpLogoutRequest.send();
    }
</script>
';

