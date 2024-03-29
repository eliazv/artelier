<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Ordini</title>

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
                  <?php if($templateParams['elemCarrello'][0]['numquadri']!=0):?>
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

                <?php if($templateParams['notifiche'][0]['num']!=0):?>
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
                        <a class="nav-link" href="./archivio-notifiche.php"><i class="fa fa-bell"></i>&nbsp; Notifiche <span class="badge bg-danger"> <?php echo $templateParams['notifiche'][0]['num']?></span> </a>
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
        </div>
        </header>
        <main>

        <div class="container mt-5 mb-5">
            <?php if($_SESSION['email'] == NULL):
              
            ?>
              <h3>DEVI EFFETTUARE IL LOGIN PER VISUALIZZARE GLI ORDINI</h3>
            <?php else: ?>
            <?php foreach($templateParams['ordini'] as $ordini): ?>
              <?php if(date("Y-m-d H:i:s") >= $ordini['dataConsegna'] && $ordini['arrivato'] == 0): ?>
                <?php $dbh->setOrderDelivered($ordini['codOrdine']) ?>
                <?php $codOrd = $ordini['codOrdine']; ?>
                <?php $dbh->insertNotifica("Ordine  #$codOrd consegnato", "Ordine  #$codOrd consegnato all'indirizzo di destinazione. Clicca qui per verdere i dettaglia","archivio-Ordini.php", date("Y-m-d H:i:s"), 0, $_SESSION['email']);?>
              <?php endif; ?>
            <?php endforeach; ?>
              
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="p-2">
                        <h3>Ordini in transito</h3>
                    </div>
                    <?php foreach($templateParams['ordiniShip'] as $ordini): ?>
                        <h4>&ensp;Ordine <?php echo($ordini['codOrdine']) ?>: </h4>
                        <?php $templateParams['ordiniShip'] = $dbh->getSpecificOrders($_SESSION['email'], $ordini['codOrdine']); ?>
                    <?php foreach($templateParams['ordiniShip'] as $ordine): ?>
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                      <div class="mr-1"><img class="rounded" src="<?php echo UPLOAD_DIR.$ordine['immagine'] ?> " width="120" height="70"></div>
                      <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"><?php echo $ordine['titoloQuaOrd']?></span>
                          <div class="d-flex flex-row product-desc">
                          </div>
                      </div>
                      <div class="d-flex flex-row align-items-center qty">
                          <h6 class="text-grey mt-1 mr-1 ml-1">&nbsp;QT:<?php echo $ordine['quantita']?>&nbsp;</h6>
                      </div>
                      <div>
                          <h6 class="text-grey mt-1 mr-1 ml-1">$<?php echo $ordine['prezzo'] * $ordine['quantita']?></h6>
                      </div>
                      <div class="d-flex align-items-center"><a href="archivio-Tracciamento.php?titoloq=<?php echo $ordine['titoloQuaOrd']; ?>"><button class="btn btn-sm btn-outline-secondary">traccia</button></a>&nbsp;
                      </div>

                    </div>
                    <?php endforeach; ?>     
                    <br><br>
                    <?php endforeach; ?>
                    

                    <hr class="featurette-divider">
                    <div class="p-2">
                        <h3>Ordini arrivati</h3>
                    </div>
                    <?php foreach($templateParams['ordiniArrivati'] as $ordineArrivato): ?>
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1"><img class="rounded" src="<?php echo UPLOAD_DIR.$ordineArrivato['immagine'] ?>" width="120" height="70"></div>
                        <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"><?php echo $ordineArrivato['titoloQuaOrd'] ?></span>
                            <div class="d-flex flex-row product-desc">
                            </div>
                        </div>
                        <div>
                            <h6 class="text-grey mt-1 mr-1 ml-1">&nbsp;QT: <?php echo $ordineArrivato['quantita']?>&nbsp;</h6>
                        </div>
                        <div>
                            <h6 class="text-grey">$<?php echo $ordineArrivato['prezzo'] * $ordineArrivato['quantita']?></h6>
                        </div>
                    </div>
                    <?php endforeach; ?>  
                </div>
            </div>
            <?php endif;?>
        </div>


  
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
