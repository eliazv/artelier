<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>HomePage</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
  <!-- icone-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="../Css/cart.css" rel="stylesheet">
  </head>
  <body>
    <header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

              <nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container-fluid">

                  <a href="HomePage2.html"><img src="Immagini/logobiancocut.png" class="d-block" alt="..." style="margin: 0px; padding: 0px; width: 150px;"></a>

                  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                      <h6 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: white;">Menù</h6>
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

        

        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="p-2">
                        <h2>Carrello</h2>
                    </div>

                    <?php $indx=0; $somma=0;?>
                    <?php foreach($templateParams["compone"] as $compone): ?>
                      
                      <?php $templateParams["quadro"] = $dbh->getQuadroByTitolo($compone["titolo"]);  ?>

                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1"><img class="rounded" src="../Immagini/<?php echo $templateParams["quadro"][$indx]["immagine"] ?>" width="150"></div>
                        <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold">
                            <?php echo $compone["titolo"] ?>
                        </span>
                       
                            <div class="d-flex flex-row product-desc">
                              
                              
                            </div>
                            <div class="d-flex flex-row product-desc">
                              <h6 class="text-grey mt-1 mr-1 ml-1">&emsp;-&nbsp;<?php echo $compone["quantita"] ?>&nbsp;+ </h6>
                              
                            </div>
                        </div>
                        <div>
                            <?php $totPaziale=($templateParams["quadro"][$indx]["prezzo"] * $compone["quantita"]);?>
                            <h6 class="text-grey">&nbsp;&nbsp;&nbsp;€<?php echo $totPaziale ?> &nbsp;</h6> <!--*php echo $compone["quantita"]-->
                        </div>
                        <div class="d-flex align-items-center"><i class="fa fa-trash-o" style="color: red;"></i></div>
                    </div>
                    <?php 
                      $somma = $somma + $totPaziale;
                      $indx++; ?>
                    <?php endforeach; ?>

<br><br>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="Totale:"><h6>€<?php echo $somma?></h6></div> 
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><a href="Checkout.html"><button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button" style="position: absolute; right: 20%;">Procedi all'ordine</button></a></div>
                </div>
            </div>
        </div>

  <!-- FOOTER -->

  <div id="chisiamo" class="container-fluid mt-5" style="padding: 0px; text-align: center;">
    <div class="card" style="width: 100%;">
        <div class="row mb-4 ">
            <div class="col-md-4 ">
                <div class="footer-text">
                    
                        <a href="HomePage2.html"> <img src="Immagini/logobiancocut.png" alt="" style="max-height: 50px; margin-bottom: 10px;"></a>
                    
                    <p class="card-text">Artelier è un progetto universitario con l'obiettivo di simulare il funzionamento di un negozio online che mette a disposizione riproduzioni di quadri famosi.<br> 
                      E' sviluppato dagli studenti: Elia Zavatta, Pietro Lelli e Giovanni Maffi dell'Università di Bologna per la materia Tecnologie Web.</p>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <h6 class="heading" style="margin-top: 15px;">Pagine</h6>
                <ul>
                  <a href="HomePage2.html"><li>Home</li></a>
                  <a href="Quadri.html"><li>Quadri</li></a>
                  <a href="Artisti.html"><li>Artisti</li></a>
                  <a href="Categorie.html"><li>Categorie</li></a>
                </ul>
            </div>
            
            <div class="col-md-3">
                <h6 class="heading" style="margin-top: 15px;">Utente</h6>
                <ul class="card-text">
                    <a href="Utente.html"><li>Account</li></a>
                    <a href="Cart.html"><li>Carrello</li></a>
                    <a href=""><li>Logout</li></a>              
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
            <div class="col-md-6 col-sm-6 col-xs-6">
                
            </div>
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
