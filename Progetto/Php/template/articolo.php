<!--da cambiare la disposizione in mobile, cambia la dimensione in base alla size-->

<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo ($templateParams["quadroSpecifico"][0]["titolo"])?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
  <!-- icone-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="../Css/Style.css" rel="stylesheet">
  </head>
  <body>
    
  <header>
      <div class="container-fluid" style="padding: 0px;">
        <div class="row">
          <div class="col-12">

            <nav class="navbar navbar-dark bg-dark fixed-top">

              <div class="col-4">
                <a href="./home2.php"><img src="../Immagini/logobiancocut.png" class="d-block" alt="..." style="margin-left: 10px; padding: 0px; width: 150px;"></a>
              </div>
              <div class="col-5"></div>
              <div class="col-1 text-end">
              <?php if(isUserLoggedIn()): ?>
                <button class="btn btn-default" type="button">
                  <a href="./archivio-carrello.php">
                  <?php if($templateParams["elemCarrello"][0]["numquadri"]!=0):?>
                    <img src="../Immagini/cart2.png" alt="" style="height:30px"/>
                  <?php else:?>
                      <img src="../Immagini/cart.png" alt="" style="height:30px"/>
                  <?php endif?>
                  </a>
                  </button>

                  <?php endif?>

                
              </div>

                <div class="col-1 text-end" style="padding-right:30px">
                <?php if(isUserLoggedIn()): ?>
                  <button class="btn btn-default" type="button">

                  <a href="./archivio-notifiche.php">

                <?php if($templateParams["notifiche"][0]["num"]!=0):?>
                <img src="../Immagini/bell2.png" alt="" style="height:30px"/>
                <?php else:?>
                <img src="../Immagini/bell.png" alt="" style="height:30px"/>
                <?php endif?>
                
                </a>

                </button>
                <?php endif?>

            </div>
            <div class="col-1 text-start">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: white;">Menù</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./home2.php"><i class="fa fa-home"></i>&nbsp; Home</a>
                      </li>
                      <li class="nav-item">
                      <?php if(isUserLoggedIn()): ?>
                        <a class="nav-link" href="./utente2.php"><i class="fa fa-fw fa-user"></i> &nbsp; Account</a>
                        <a class="nav-link" href="./archivio-notifiche.php"><i class="fa fa-bell"></i>&nbsp; Notifiche <span class="badge bg-danger"> <?php echo $templateParams["notifiche"][0]["num"]?></span> </a>
                        <a class="nav-link" href="./archivio-carrello.php"><i class="fa fa-shopping-cart"></i> &nbsp; Carrello</a>
                        <a class="nav-link" href="./archivio-categorie.php"> &nbsp; Categorie</a>
                        <a class="nav-link" href="./archivio-artisti.php"> &nbsp; Artisti</a>
                        <a class="nav-link" href="./home2.php#chisiamo"> &nbsp; Chi Siamo</a>
                        <a class="nav-link" href="./logout.php"> &nbsp; Logout</a>

                      <?php else:?>
                        <a class="nav-link" href="./login.php">&emsp;&emsp; Login</a>
                        <a class="nav-link" href="./registrazione.php">&emsp;&emsp; Registrazione</a>
                        <a class="nav-link" href="./archivio-categorie.php"> &nbsp; Categorie</a>
                        <a class="nav-link" href="./archivio-artisti.php"> &nbsp; Artisti</a>
                        <a class="nav-link" href="./home2.php#chisiamo"> &nbsp; Chi Siamo</a>
                      <?php endif?>
                        
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>   
        </div>
        </header>

<h2 style="padding-top: 80px; padding-left: 40px;">Dettagli Articolo</h2>

<?php if(isset($_SESSION["errQuantita"])):?>
  <div class="alert alert-danger" role="alert">
    <div class="row">
      <div class="col-8 col-md-6">      
        <h4>Errore! <?php echo ($_SESSION["errQuantita"])?></h4>
      </div> 
    </div>         
</div>

<?php $_SESSION["errQuantita"]= NULL; ?>
<?php endif; ?>
<?php $_SESSION["errQuantita"]= NULL; ?>


<div class="container">
  <div class="row">
  <div class="col-lg-6">
    <br>
    
    <?php $first = true;?>
    
    <?php foreach($templateParams["quadroSpecifico"] as $quadroq): ?>

    <img src="../Immagini/<?php echo $quadroq["immagine"] ?>" class="d-block w-100" style="border-radius:5% ;" alt="...">

  </div>
    <div class="col-lg-6">
    

        <h2><br><?php echo $quadroq["titolo"] ?></h2>
        <p class="mb-2 text-muted small"><?php echo $quadroq["artista"] ?></p>
  
        <p><span class="mr-1">$<?php echo $quadroq["prezzo"] ?></span></p>


    
        <div class="table-responsive">
          <table class="table table-sm table-borderless mb-0">
            <tbody>
              <tr>
                <th class="pl-0 w-25" scope="row">Corrente: </th>
                <td><?php echo $quadroq["nomeCorrArt"] ?></td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row">Dimensioni: </th>
                <td><?php echo $quadroq["dimensione"] ?></td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row">Spedizione:</th>
                <td>USA, Europe</td>
              </tr>
            </tbody>
          </table>
        </div>
      
        

        <hr>
        <form  action="./aggiunta-carrello.php?titoloq=<?php echo $quadroq["titolo"] ?>" method="POST"> <!--action="./archivio-articolo.php"-->
       
        <?php if(isUserLoggedIn()): ?>
        <div class="table-responsive mb-2">
          <table class="table table-sm table-borderless">
            <tbody>
              <tr>
                <td class="pl-0 pb-0 w-25">Quantità:</td>
              </tr>
              <tr>
                <td class="pl-0">
                  <div class="def-number-input number-input safari_only mb-0">
                    <!--<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                      class="minus"></button>-->
                    <input class="quantity" id="quantita" name="quantita" min="1" value="1" type="number">
                    <!--<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                      class="plus"></button>-->
                   

                  </div>
                </td>
                <!--
                <td>
                  <div class="mt-1">
                    <div class="form-check form-check-inline pl-0">
                      <input type="radio" class="form-check-input" id="small" name="materialExampleRadios"
                        checked>
                      <label class="form-check-label small text-uppercase card-link-secondary"
                        for="small">Rapida</label>
                    </div>
                    <div class="form-check form-check-inline pl-0">
                      <input type="radio" class="form-check-input" id="medium" name="materialExampleRadios">
                      <label class="form-check-label small text-uppercase card-link-secondary"
                        for="medium">Standard</label>
                    </div>

                  </div>
                </td>-->
              </tr>
            </tbody>
          </table>
        </div>
        

        <button type="submit" name="btnBuyNow" class="btn btn-primary btn-md mr-1 mb-2">Compra ora!</button>

        <button type="submit" name="btnAggCarrello" class="btn btn-light btn-md mr-1 mb-2" style="background-color:rgb(228, 228, 2)"> 
        <i class="fa fa-shopping-cart "></i> &nbsp;Aggiungi al carrello</button>

        <?php else:?>
          <h1>Effettua Login per acquistare un quadro.</h1>
        <?php endif?>
        
        <?php endforeach; ?>
      </form>
      </div>


  </div>
</div>






<!-- FOOTER -->

<div id="chisiamo" class="container-fluid mt-5" style="padding: 0px; text-align: center;">
    <div class="card" style="width: 100%;">
        <div class="row mb-4 ">
            <div class="col-md-4 ">
                <div class="footer-text">
                    
                        <a href="./home2.php"> <img src="../Immagini/logobiancocut.png" alt="" style="max-height: 50px; margin-bottom: 10px;"></a>
                    
                    <p class="card-text">Artelier è un progetto universitario con l'obiettivo di simulare il funzionamento di un negozio online che mette a disposizione riproduzioni di quadri famosi.<br> 
                      E' sviluppato dagli studenti: Elia Zavatta, Pietro Lelli e Giovanni Maffi dell'Università di Bologna per la materia Tecnologie Web.</p>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <h5 class="heading" style="margin-top: 15px;">Pagine</h5>
                <ul>
                  <li><a href="./home2.php">Home</a></li>
                  <li><a href="./archivio-quadri.php">Quadri</a></li>
                  <li><a href="./archivio-artisti.php">Artisti</a></li>
                  <li><a href="./archivio-Categorie.php">Categorie</a></li>
                </ul>
            </div>
            
            <div class="col-md-3">
                <h5 class="heading" style="margin-top: 15px;">Utente</h5>
                <ul class="card-text">
                <?php if(isUserLoggedIn()): ?>
                    <li><a href="./utente2.php">Account</a></li>
                    <li><a href="./archivio-carrello.php">Carrello</a></li>
                    <li><a href="./logout.php">Logout</a></li>   
                    <?php else: ?> 
                      <li><a href="./login.php">Login</a></li>
                      <li><a href="./registrazione.php">Registrazione</a></li>
                    <?php endif; ?> 
                </ul>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="social mt-2 mb-3"> <i class="fa fa-facebook-official fa-lg"></i> <i class="fa fa-instagram fa-lg"></i> <i class="fa fa-twitter fa-lg"></i> <i class="fa fa-linkedin-square fa-lg"></i> <i class="fa fa-facebook"></i> </div>

          </div>

        </div>
        <div class="divider mb-4"> </div>
        <div class="row" style="font-size:10px;">
          <div class="col-md-6 col-sm-6 col-xs-6"></div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-right mr-4 d-flex policy">
              <div>Terms of Use</div>
              <div>Privacy Policy</div>
              <div>Cookie Policy</div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>
