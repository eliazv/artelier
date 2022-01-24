<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>Checkout</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
  <!-- icone-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->

    <link href="../Css/Input.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
  </head>
  <body class="bg-light">
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

<main>
<div class="container">
  
    <div class="text-center" style="padding-top: 100px;">
      <h1>Checkout</h2>
    </div>
    <?php $numart=0;?>
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Il tuo Carrello</span>
          <?php foreach($templateParams["carrello"] as $carrello): ?>
            <?php $numart++;?>
            <?php endforeach; ?>

          <span class="badge bg-primary rounded-pill"><?php echo $numart ?></span>

        </h4>
        <ul class="list-group mb-3">

        <?php $somma=0;?>
        <?php foreach($templateParams["carrello"] as $carrello): ?>
                      
        <?php $templateParams["quadro"] = $dbh->getQuadroByTitolo($carrello["titolo"]);  ?>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo $carrello["titolo"] ?></h6>
              <small class="text-muted"><?php echo $templateParams["quadro"][0]["artista"] ?> x<?php echo $carrello["quantita"]?></small>
            </div>
            <?php $totPaziale=(($templateParams["quadro"][0]["prezzo"]) * ($carrello["quantita"]));?>
            <span class="text-muted">€<?php echo $totPaziale ?></span>
          </li>

            <?php $somma = $somma + $totPaziale;?>

            <?php endforeach; ?>
           
          <li class="list-group-item d-flex justify-content-between">
            <span>Totale</span>
            <strong>€<?php echo $somma?></strong>
          </li>
        </ul>
          <?php $_SESSION["somma"]= $somma?>
        
      </div>
      <div class="col-md-7 col-lg-8">
        <h3 class="mb-3">Dati di Fatturazione</h3>
        <form>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nome</label>
              <h4 class="mb-3"><?php echo $templateParams["utente"][0]["nome"]?></h4>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Cognome</label>
              <h4 class="mb-3"><?php echo$templateParams["utente"][0]["cognome"]?></h4>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Email</label>
              <div class="input-group">
              <h4 class="mb-3"><?php echo $_SESSION["email"]?></h4>
              </div>
            </div>
        

            <div class="col-6">
              <label for="address" class="form-label">Indirizzo</label>
              <h4 class="mb-3"><?php echo $templateParams["utente"][0]["indirizzo"]?></h4>
            </div>

            <div class="col-md-3">
              <label for="country" class="form-label">Paese</label><br>
              <h4 class="mb-3"><?php echo $templateParams["utente"][0]["paese"]?></h4>
            </div>

            <div class="col-md-2">
              <label for="zip" class="form-label">CAP</label>
              <h4 class="mb-3"><?php echo $templateParams["utente"][0]["cap"]?></h4>
            </div>
          </div>

          <hr class="my-4">

          
          <a class="text-reset" href="./archivio-pagamento.php"><button type="button" class="w-100 btn btn-primary btn-lg">Continua al Pagamento</button></a>
        </form>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
<footer>
<div id="chisiamo" class="container-fluid mt-5" style="padding: 0px; text-align: center;">
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
                  <a href="./home2.php"><li>Home</li></a>
                  <a href="./archivio-quadri.php"><li>Quadri</li></a>
                  <a href="./archivio-artisti.php"><li>Artisti</li></a>
                  <a href="./archivio-Categorie.php"><li>Categorie</li></a>
                </ul>
            </div>
            
            <div class="col-md-3">
                <h5 class="heading" style="margin-top: 15px;">Utente</h5>
                <ul class="card-text">
                <?php if(isUserLoggedIn()): ?>
                    <a href="./utente2.php"><li>Account</li></a>
                    <a href="./archivio-carrello.php"><li>Carrello</li></a>
                    <a href="./logout.php"><li>Logout</li></a>   
                    <?php else: ?> 
                      <a href="./login.php"><li>Login</li></a>
                      <a href="./registrazione.php"><li>Registrazione</li></a>
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
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>
