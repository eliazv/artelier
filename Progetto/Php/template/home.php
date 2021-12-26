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
    <link href="../Css/HomePage2.css" rel="stylesheet">
  </head>
  <body>
    
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


<!-- 
        <div class="row">
            <div class="col-12">
              <div id="image">
                <img src="Immagini/quadri-astratt-ble-c291.jpg" class="d-block w-100" alt="..." >
            </div>
            </div>   
        </div>
-->


<section class="text-center" style="background-image: url(../Immagini/quadri-astratt-ble-c291.jpg); height: 400px; padding: 0px; margin:0px" >
  <div class="slider-ctn">
    <h2 class="title">PITTURA</h2>
    <h2 class="subtitle">Le migliori repliche dei quadri più famosi.</h2>
    <div class="button">
        <a href="Quadri.html">Esplora<i class="icon icon-ico-arrow-new-right"></i></a>
    </div>
</div>
</section>

        <div class="row">
            <div class="col-12">
              <div id="carosello">
                <h1 style="padding-bottom: 30px; padding-left: 90px; padding-top: 50px;"><br>Nuovi Arrivi</h1>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"  style="margin-left: 10%;margin-right: 10%;">
                  
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <?php $first = true; ?>
                        <?php foreach($templateParams["4Quadri"] as $quadro): ?>
                          <?php if($first == true): 
                            $first = false;
                            ?>
                              
                              
                              <div class="carousel-item-active">
                                <?php else: ?>
                          
                              <div class="carousel-item">
                            <?php endif; ?>
                            <img src="<?php echo UPLOAD_DIR.$quadro["immagine"]; ?>" class="d-block w-100" alt="...">

                        </div>

                        <?php endforeach; ?>  
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
              </div>
            </div>   
        </div>
</header>

<main>

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <hr class="featurette-divider">
  
  <div class="container marketing">

    <h1 id="artisti" style="padding-bottom: 30px;">I nostri Artisti</h1>
    <!-- Three columns of text below the carousel -->
    <div class="row">

        <?php foreach($templateParams["3Artisti"] as $artista): ?>
    
            <div class="col-4">
                <a href="HomePage2.html"><img src="<?php echo UPLOAD_DIR.$artista["immagine"]; ?>" class="d-block w-100" style="border-radius: 200px 200px 200px 200px" alt="..."></a>
                <a href="HomePage2.html"><h2 class="text-center" style="padding-top: 15px;"><?php echo $artista["cognome"]; ?></h2></a>
            </div>

        <?php endforeach; ?>

      <div class="col-9"></div>
        <div class="col-2" style="margin-top: 25px;">
            <button type="button" class="btn btn-outline-secondary"><a class="text-reset" href="Artisti.html">Mostra tutti</a></button>
        </div>

    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <h1>I nostri quadri</h1>

    <?php $right = true; $num = 0; 
    
    foreach($templateParams["4Quadri"] as $quadro): 
      $num +=1;?>
    
    <?php if($right == true):
      $right = false;
    ?>

    <div class="row featurette">
      <div class="col-5">
        <a href="HomePage2.html"><h2 class="featurette-heading"><?php echo $quadro["titolo"] ?></h2></a>
        <p class="lead"><?php echo $quadro["artista"] ?></p>
      </div>
      <div class="col-7">
        <a href="HomePage2.html"> <img src="<?php echo UPLOAD_DIR.$quadro["immagine"]; ?>" class="d-block w-100" alt="..."></a>
      </div>
    </div>


    <?php else:
      $right = true; ?>
      <div class="row featurette">
      
      <div class="col-7">
        <a href="HomePage2.html"> <img src="<?php echo UPLOAD_DIR.$quadro["immagine"]; ?>" class="d-block w-100" alt="..."></a>
      </div>

      <div class="col-5">
        <a href="HomePage2.html"><h2 class="featurette-heading"><?php echo $quadro["titolo"] ?></h2></a>
        <p class="lead"><?php echo $quadro["artista"] ?></p>
      </div>
    </div>

    <?php endif; ?>
    <?php if($num != 4):?>
      <hr class="featurette-divider">
      <?php endif; ?>
    <?php endforeach; ?>

    
    
    <div class="row">
      <div class="col-9"></div>
        <div class="col-2">
            <button type="button" class="btn btn-outline-secondary"><a class="text-reset" href="archivio-quadri.php">Mostra tutti</a></button>
        </div>
    </div>
      </div>


    <hr class="featurette-divider">

    <h1 id="categorie"><br>Cartegorie</h1>

    <?php foreach($templateParams["3Categorie"] as $categoria): ?>
    
        <div class="row">
            <div class="col-12">
                <a href="HomePage2.html"><img src="<?php echo UPLOAD_DIR.$categoria["immagine"]; ?>" alt="" class="rounded mx-auto d-block";  style=" margin: 20px; max-height: 300px; max-width:90%;"> </a>
            </div>
        </div>

<?php endforeach; ?>
<div class="row"><div class="col-9"></div>
        <div class="col-2">
            <button type="button" class="btn btn-outline-secondary"><a class="text-reset" href="Categorie.html">Mostra tutte</a></button>
        </div>
</div>
  
</div>

</div>


    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->

  <div id="chisiamo" class="container-fluid mt-5" style="padding: 0px; text-align: center;">
    <div class="card" style="width: 100%;">
        <div class="row mb-4 ">
            <div class="col-md-4 ">
                <div class="footer-text">
                    
                        <a href="HomePage2.html"> <img src="../Immagini/logobiancocut.png" alt="" style="max-height: 50px; margin-bottom: 10px;"></a>
                    
                    <p class="card-text">Artelier è un progetto universitario con l'obiettivo di simulare il funzionamento di un negozio online che mette a disposizione riproduzioni di quadri famosi.<br> 
                      E' sviluppato dagli studenti: Elia Zavatta, Pietro Lelli e Giovanni Maffi dell'Università di Bologna per la materia Tecnologie Web.</p>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <h5 class="heading" style="margin-top: 15px;">Pagine</h5>
                <ul>
                  <a href="HomePage2.html"><li>Home</li></a>
                  <a href="Quadri.html"><li>Quadri</li></a>
                  <a href="Artisti.html"><li>Artisti</li></a>
                  <a href="Categorie.html"><li>Categorie</li></a>
                </ul>
            </div>
            
            <div class="col-md-3">
                <h5 class="heading" style="margin-top: 15px;">Utente</h5>
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
