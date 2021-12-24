<!--da cambiare la disposizione in mobile, cambia la dimensione in base alla size-->

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
    <link href="Css/Articolo.css" rel="stylesheet">
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
    </div>
</header>

<h2 style="padding-top: 80px; padding-left: 40px;">Dettagli Articolo</h2>


<div class="container">
  <div class="row">
  <div class="col-lg-6">
    <br>
    <?php foreach($templateParams["quadro"] as $quadro): ?>
    <img src="../Immagini/<?php echo $quadro["immagine"] ?>" class="d-block w-100" style="border-radius:5% ;" alt="...">

  </div>
    <div class="col-lg-6">
    

        <h2><br><?php echo $quadro["titolo"] ?></h2>
        <p class="mb-2 text-muted small"><?php echo $quadro["artista"] ?></p>
  
        <p><span class="mr-1">$<?php echo $quadro["prezzo"] ?></span></p>

        <p class="pt-1"><?php echo $quadro["descrizione"] ?></p>

    
        <div class="table-responsive">
          <table class="table table-sm table-borderless mb-0">
            <tbody>
              <tr>
                <th class="pl-0 w-25" scope="row">Corrente: </th>
                <td><?php echo $quadro["nomeCorrArt"] ?></td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row">Dimensioni: </th>
                <td><?php echo $quadro["dimensione"] ?></td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row">Spedizione:</th>
                <td>USA, Europe</td>
              </tr>
            </tbody>
          </table>
        </div>

        <?php endforeach; ?>

        <hr>
        <div class="table-responsive mb-2">
          <table class="table table-sm table-borderless">
            <tbody>
              <tr>
                <td class="pl-0 pb-0 w-25">Quantità:</td>
                <td class="pb-0">Spedizione:</td>
              </tr>
              <tr>
                <td class="pl-0">
                  <div class="def-number-input number-input safari_only mb-0">
                    <!--<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                      class="minus"></button>-->
                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                    <!--<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                      class="plus"></button>-->
                  </div>
                </td>
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
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Compra ora!</button>
        <button type="button" class="btn btn-light btn-md mr-1 mb-2" style="background-color:rgb(228, 228, 2)"><i
            class="fa fa-shopping-cart "></i> &nbsp;Aggiungi al carrello</button>
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