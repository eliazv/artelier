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

    <link href="../Css/Checkout.css" rel="stylesheet">

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
                <div class="container-fluid">

                  <a href="HomePage2.html"><img src="../Immagini/logobiancocut.png" class="d-block" alt="..." style="margin: 0px; padding: 0px; width: 150px;"></a>

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
                          <a class="nav-link active" aria-current="page" href="HomePage2.html"><i class="fa fa-home"></i>&nbsp; Home</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="Utente.html"><i class="fa fa-fw fa-user"></i> &nbsp; Account</a>
                              <a class="nav-link" href="login.html">&emsp;&emsp; Login</a>
                              <a class="nav-link" href="Registrazione.html">&emsp;&emsp; Registrazione</a>
                              <a class="nav-link" href="Notifiche.html"><i class="fa fa-bell"></i>&nbsp; Notifiche</a>
                              <a class="nav-link" href="Cart.html"><i class="fa fa-shopping-cart"></i> &nbsp; Carrello</a>
                              <a class="nav-link" href="Categorie.html"> &nbsp; Categorie</a>
                              <a class="nav-link" href="Artisti.html"> &nbsp; Artisti</a>
                              <a class="nav-link" href="HomePage2.html#chisiamo"> &nbsp; Chi Siamo</a>
                        </li>
                      </ul>
                      <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-light" type="submit">Search</button>
                      </form>
                    </div>
                  </div>
                </div>
              </nav>
            </div>   
        </div>

    
<div class="container">
  <main>
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

        
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Inserisci i tuoi Dati</h4>
        <form>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" placeholder="" value="" >
              <div class="invalid-feedback">
                Inserisci Nome valido.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Cognome</label>
              <input type="text" class="form-control" id="cognome" placeholder="" value="" >
              <div class="invalid-feedback">
                Inserisci Cognome valido.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Email</label>
              <div class="input-group">
                <input type="text" class="form-control" id="email" placeholder="Username" >
              <div class="invalid-feedback">
                Inserisci Email valida.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Indirizzo</label>
              <input type="text" class="form-control" id="indirizzo" placeholder="Via Gramsci 120" >
              <div class="invalid-feedback">
                Inserisci Indirizzo valido.
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Paese</label>
              <select class="form-select" id="paese" >
                <option value="">Scegli...</option>
                <option>Italia</option>
              </select>
              <div class="invalid-feedback">
                Seleziona un Paese valido.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">CAP</label>
              <input type="text" class="form-control" id="cap" placeholder="" >
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Salva informazioni per la prossima volta</label>
          </div>
          <button type="button" class="w-100 btn btn-primary btn-lg"><a class="text-reset" href="archivio-pagamento.php">Continua al Pagamento</a></button>
        </form>
      </div>
    </div>
  </main>

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
                    <a href="Utente.html"><li>Account</li></a>
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
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>