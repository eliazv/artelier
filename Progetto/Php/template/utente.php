utente

<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Account</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
  <!-- icone-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="../Css/Input.css" rel="stylesheet">
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
  
  <main>
    <br>
    

    <div class="row">
    <div class="col-1"> </div>
      
      <div class="col-md-10" style="margin-top: 30px">
        <h1>Il tuo Profilo</h1>

        <?php foreach($templateParams["utente"] as $utente): ?>
        <?php if($utente["venditore"] ): ?>
          <h3>
            <a class="mb-3" href="./archivio-modifica-art.php" style="color: black; text-decoration: none;" >• Modifica Articoli</a>
            <a class="mb-3" href="./archivio-inserimentoArt.php"  style="color: black; text-decoration: none;" >&emsp;• Inserisci Articoli</a>
            <a class="mb-3" href="./archivio-admin-ordini.php"  style="color: black; text-decoration: none;" >&emsp;• Vedi tutti gli Ordini</a>
            <a class="mb-3" href="./archivio-Ordini.php" style="color: black; text-decoration: none;" >&emsp;• I tuoi Ordini</a><br>
        <?php else:?>
            <a class="mb-3" href="./archivio-Ordini.php" style="color: black; text-decoration: none;" >• I tuoi Ordini</a><br>
        <?php endif?>
          </h3>

        <div class="table-responsive">
          <table class="table table-sm table-borderless mb-0">
            <tbody>
              <tr>
                <th class="pl-0 w-25" scope="row">Nome: </th>
                <td><?php echo $utente["nome"] ?></td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row">Cognome: </th>
                <td><?php echo $templateParams["utente"][0]["cognome"] ?></td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row">Email:</th>
                <td><?php echo $templateParams["utente"][0]["email"] ?></td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row">Indirizzo: </th>
                <td><?php echo $templateParams["utente"][0]["indirizzo"] ?>, <?php echo $templateParams["utente"][0]["citta"] ?>, <?php echo $templateParams["utente"][0]["paese"] ?></td>
              </tr>
            </tbody>
          </table>
        </div>

        <hr>


        <h4 class="mb-3">Modifica i tuoi Dati<br><br>
        <?php if(isset($templateParams["errore"])): ?>
          <div class="alert alert-danger" role="alert">
          <div class="row">
            <div class="col-8 col-md-6">
              <h4><?php echo ($templateParams["errore"])?></h4>
            </div> 
          </div>
          </div>
        <?php endif; ?>
        
        <form class="row g-3"  action="./utente2.php" method="POST">
            
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Vecchia Password</label>
              <input type="password" class="form-control" id="inputPassword" name="vecchiaPassword">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Nuova Password</label>
              <input type="password" class="form-control" id="inputPassword2" name="nuovaPassword">
            </div>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">Indirizzo</label>
              <input type="text" class="form-control" id="inputAddress" name="indirizzo" placeholder="<?php echo $utente["indirizzo"]?>">
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Città</label>
              <input type="text" class="form-control" id="inputCity" name="citta" placeholder="<?php echo $utente["citta"]?>">
            </div>
            <div class="col-md-4">
            <label for="inputCity" class="form-label">Nazione</label>
              <input type="text" class="form-control" id="inputNazione" name="paese" placeholder="<?php echo $utente["paese"]?>">
            </div>
            <div class="col-md-2">
              <label for="inputCap" class="form-label">CAP</label>
              <input type="text" class="form-control" id="inputZip" name="cap" placeholder="<?php echo $utente["cap"]?>">
            </div>
            <div class="col-12">
            </div>
            <div class="col-12">
              
            <button type="submit" class="btn btn-primary" name="btnModifica">Modifica</button> 
            </div>
          </form>
          <?php endforeach; ?>
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
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>
