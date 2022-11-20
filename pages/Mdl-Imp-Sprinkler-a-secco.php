<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
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

    <!-- Tabella -->
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center nome-azienda">
                <div class="row">
                    <div class="col-12">
                        <h4>Mld-Imp</h4>
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
                                <th scope="col">Pos</th>
                                <th scope="col" >&nbsp;</th>
                                <th scope="col">Intervento</th>
                                <th scope="col">Note</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <th scope="row">
                                    <center>1</center>
                                </th>
                                <td style="text-align: left;">
                                    Tipologia e caratteristiche impianto
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center;">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn  active">
                                          <input type="radio" name="options" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>



                            <tr>
                                <th scope="row">
                                    <center>2</center>
                                </th>
                                <td style="text-align: left;">
                                    Composizione, quantità componenti principali
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center;">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn  active">
                                          <input type="radio" name="options1" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options1" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>


                            <tr>
                                <th scope="row">
                                    <center>3</center>
                                </th>
                                <td style="text-align: left;">
                                    Tipologia di sprinkler/erogatori
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center;">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn  active">
                                          <input type="radio" name="options2" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options2" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>4</center>
                                </th>
                                <td style="text-align: left;">
                                    Sussistenza schemi, manualistica di uso e manutenzione, procedure
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center;">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn  active">
                                          <input type="radio" name="options3" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options3" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="12" class="table-active" style="text-align: center;">
                                    Documentazione
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>5</center>
                                </th>
                                <td style="text-align: left;">
                                    Progetto
                                </td>
                                <td style="text-align: center;">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn  active">
                                          <input type="radio" name="options4" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options4" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>


                            <tr>
                                <th scope="row">
                                    <center>6</center>
                                </th>
                                <td style="text-align: left;">
                                    Numero impianto, classificazione di pericolo, area operativa, densità di scarica, pressione e portata su dispositivi di prova
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options5" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options5" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="12" class="table-active" style="text-align: center;">
                                    Verifica componenti impianto
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>7</center>
                                </th>
                                <td style="text-align: left;">
                                    Valvola di controllo, trim, campana idraulica, valvola di drenaggio, dispositivo di prova impianto per pressione e portata
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options6" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options6" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>8</center>
                                </th>
                                <td style="text-align: left;">
                                    Tipologia di manutenzione/intervento
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options7" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options7" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>9</center>
                                </th>
                                <td style="text-align: left;">
                                    Presenza di targhe di riconoscimento "valvola di intercettazione sprinkler", "valvole di controllo sprinkler"
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options8" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options8" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>10</center>
                                </th>
                                <td style="text-align: left;">
                                    Esame generale dell'impianto con alimentazione
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options9" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options9" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>


                            <tr>
                                <th scope="row">
                                    <center>11</center>
                                </th>
                                <td style="text-align: left;">
                                    Verifica ed inibizione e/o gestione in prova di allarmi idraulici od elettrici scaricando acqua a valle della valvola di intercettazione
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options10" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options10" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="12" class="table-active" style="text-align: center;">
                                    principale e a monte della valvola di allarme
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>12</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo sostegni, staffature di supporto tubazioni
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options11" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options11" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>13</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo eventuali sistemi per il flussaggio delle tubazioni
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options12" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options12" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>14</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo sprinkler (incrostazioni, verniciatura, deformazioni)
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options13" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options13" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>15</center>
                                </th>
                                <td style="text-align: left;">
                                    Verifica dello stato delle valvole di intercettazione, controllo e allarme, scarico

                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options14" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options14" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>16</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo posizione di apertura delle valvole di intercettazione e relativo bloccaggio

                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options15" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options15" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>17</center>
                                </th>
                                <td style="text-align: left;">
                                    Verifica - Prova di funzionamento degli indicatori di livello, valvole a galleggiante dell'eventuale rincalzo o altra apparecchiatura

                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options16" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options16" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="12" class="table-active" style="text-align: center;">
                                    ausiliaria dl sistema di alimentazione
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>18</center>
                                </th>
                                <td style="text-align: left;">
                                    Prova di funzionamento delle valvole principali, ausiliaria di intercettazione e di scarico

                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options17" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options17" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>19</center>
                                </th>
                                <td style="text-align: left;">
                                    Prove di tenuta alla pressione di esercizio delle valvole di non ritorno

                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options18" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options18" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>20</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo pressione aria di pressurizzazione

                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options19" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options19" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="12" class="table-active" style="text-align: center;">
                                    Prova di funzionamento valvola di controllo e intervento campana idraulica a mezzo di "valvola di prova impianto"
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>21</center>
                                </th>
                                <td style="text-align: left;">
                                    Aprire lentamente la valvola terminale di "prova impianto" (pos. Test)

                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options20" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options20" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>22</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllare l'intervento della campana idraulica (entro 30 sec.) ed eventuali altri dispositivi di segnalazione e controllo asserviti
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options21" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options21" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>23</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllare l'intervento della campana idraulica (entro 30 sec.) ed eventuali altri dispositivi di segnalazione e controllo asserviti
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options22" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options22" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>24</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo e pulizia eventuale pistone di fermo - carica -riarmo piatto otturatore
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options23" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options23" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>25</center>
                                </th>
                                <td style="text-align: left;">
                                    Verifica segnalazioni per bassa pressione aria su circuito di pressurizzazione
                                    <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                          <input type="radio" name="options24" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options24" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>26</center>
                                </th>
                                <td style="text-align: left;">
                                    Verifica pressione su "valvole prova impianto"
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                            <input type="radio" name="options25" id="option1" autocomplete="off"> Si
                                        </label>
                                        <label class="btn ">
                                            <input type="radio" name="options25" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>27</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo funzionamento flussostati o pressostati
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                        <label class="btn  active">
                                           <input type="radio" name="options26" id="option1" autocomplete="off"> Si
                                        </label>
                                        <label class="btn ">
                                            <input type="radio" name="options26" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>28</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo assenze perdite sull'impianto
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options27" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options27" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>29</center>
                                </th>
                                <td style="text-align: left;">
                                    Richiudere lentamente la valvola "prova impianto", la campana cesserà di suonare
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options28" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options28" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="12" class="table-active" style="text-align: center;">
                                    Prova di funzionamento - intervento campana idraulica a mezzo "valvola di drenaggio dell'impianto"
                                </td>

                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>30</center>
                                </th>
                                <td style="text-align: left;">
                                    Aprire lentamente la valvola di drenaggio dell'impianto
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options29" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options29" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>31</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllare intervento della campana idraulica
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options30" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options30" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>32</center>
                                </th>
                                <td style="text-align: left;">
                                    Verifica pressioni d'intervento allarmi, sull'alimentazione idrica
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options31" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options31" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>33</center>
                                </th>
                                <td style="text-align: left;">
                                    Richiudere la valvola di drenaggio
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options32" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options32" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="12" class="table-active" style="text-align: center;">
                                    Controllo componenti e trim "Valvola di controllo"
                                </td>

                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>34</center>
                                </th>
                                <td style="text-align: left;">
                                    Chiusura delle valvole di intercettazione a valle della "valvola di controllo"
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options33" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options33" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>35</center>
                                </th>
                                <td style="text-align: left;">
                                    Chiusura valvola aria compressa
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options34" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options34" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>36</center>
                                </th>
                                <td style="text-align: left;">
                                    Aprire la valvola di drenaggio dell'impianto
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options35" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options35" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>37</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllare l'azzeramento dei manometri sulla "valvola di controllo"
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options36" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options36" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>38</center>
                                </th>
                                <td style="text-align: left;">
                                    Rimuovere il coperchio d'ispezione anteriore della "valvola di controllo"
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options37" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options37" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>39</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo e pulizia otturatore clapet e sede "valvola di controllo"
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options38" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options38" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>40</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllo e pulizia eventuale pistone di fermo - carica - riarmo piatto otturatore
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options39" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options39" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>41</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllare posizione integrità e flessibilità delle guarnizioni di tenuta
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options40" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options40" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>42</center>
                                </th>
                                <td style="text-align: left;">
                                    Riposizionamento clapet - otturatore
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options41" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options41" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>43</center>
                                </th>
                                <td style="text-align: left;">
                                    Riposizionamento e richiusura coperchio valvola di controllo
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options42" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options42" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>44</center>
                                </th>
                                <td style="text-align: left;">
                                    Verifica valvola di ritegno sul by-pass monte-valle della valvola di controllo
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options43" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options43" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>45</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllare restrizione - filtro tubazione d'allarme e ugello campana idraulica
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options44" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options44" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>46</center>
                                </th>
                                <td style="text-align: left;">
                                    Chiusura valvola di drenaggio
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options45" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options45" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>47</center>
                                </th>
                                <td style="text-align: left;">
                                    Ripristini
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options46" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options46" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="12" class="table-active" style="text-align: center;">
                                    Ricarica impianto a secco
                                </td>

                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>48</center>
                                </th>
                                <td style="text-align: left;">
                                    Aprire aria compressa di pressurizzazione,valvola di pressione stabile (>2,5 bar)
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options47" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options47" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>49</center>
                                </th>
                                <td style="text-align: left;">
                                    Aprire lentamente e totalmente la valvola di intercettazione dell'impianto
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options48" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options48" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>50</center>
                                </th>
                                <td style="text-align: left;">
                                    Controllare il ristabilimento delle pressioni a monte e a valle della "valvola di controllo"
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options49" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options49" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="12" class="table-active" style="text-align: center;">
                                    valori
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <center>51</center>
                                </th>
                                <td style="text-align: left;">
                                    Verifica collegamento di "messa a terra" dell'impianto
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                      </div>
                                </td>
                                <td style="text-align: center; ">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons ">
                                     <label class="btn  active">
                                          <input type="radio" name="options50" id="option1" autocomplete="off"> Si
                                        </label>

                                        <label class="btn ">
                                          <input type="radio" name="options50" id="option2" autocomplete="off"> No
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      </div>
                                </td>
                            </tr>


                            <tr>

                                <td colspan="12" class="table-active" style="text-align: center;">
                                    Note generali
                                </td>

                            </tr>

                            <tr>

                                <td colspan="12" style="text-align: left;">
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="exampleFormControlTextarea1"></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                      </div>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Fine -->

    <!-- Footer -->
    <?php require_once("footer.php"); ?>
    <!-- Fine -->
</body>

</html>
