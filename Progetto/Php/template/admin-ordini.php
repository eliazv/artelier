<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Tutti gli Ordini</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="../Css/modificaArt.css" rel="stylesheet">
  </head>
  <body>
     
  <header>
      <div class="container-fluid" style="padding: 0px;">
        <div class="row">
          <div class="col-12">

            <nav class="navbar navbar-dark bg-dark fixed-top">
              <div class="container-fluid">

                <a href="./home2.php"><img src="../Immagini/logobiancocut.png" class="d-block" alt="..." style="margin: 0px; padding: 0px; width: 150px;"></a>

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
    </header>

    <?php if($_SESSION['email']==NULL || $templateParams["utente"][0]["venditore"]==0): ?>
      <h3> <br> <br><br><br> <br>  Non hai accesso a questa pagina.</h3>
    <?php else:?>

    <main>
    <div class="row">
        
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <h1><br><br>Tutti gli Ordini</h1><br>
            
          </div>

    </div>

    <div class="row">
    <div class="col-md-2 col-0"></div>
    <div class="col-md-8 col-12 accordion px-4" id="diskAccordion">
        <?php foreach($templateParams["ordine"] as $ordine): ?>
            <div class="accordion-item">
                <h2 id="header<?php echo $ordine["codOrdine"]?>" class="accordion-header">
                <button class="accordion-button pt-3 row mx-0" type="button"  data-bs-target="#quadro<?php echo $ordine["codOrdine"]?>" aria-controls="quadro<?php echo $ordine["codOrdine"]?>">
                    
                    <div class="col-5 ml-2">
                        <label>Numero ordine: #<?php echo $ordine["codOrdine"]?></label>
                    </div>
                    <div class="col-5">
                        <label>Acquirente: <?php echo $ordine["email"]?></label>
                    </div>
                    <div class="col-2"></div>
                </button>
                </h2>
                <div id="disk<?php echo $ordine["codOrdine"]?>"  aria-labelledby="heading<?php echo $ordine["codOrdine"]?>" data-bs-parent="#diskAccordion">
                  <div class="accordion-body row" id="modifyAccordion">
                    <div class="row mt-2">
                       <div class="col-12 text-center">
                            <table class="table table-sm table-borderless mb-0">
                              <tbody>
                                <tr>
                                  <th class="pl-0 w-25" scope="row">Nome e Cognome: </th>
                                  <td><?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?></td>
                                </tr>
                                <tr>
                                  <th class="pl-0 w-25" scope="row">Email: </th>
                                  <td><?php echo $ordine["email"]?></td>
                                </tr>
                                <tr>
                                  <th class="pl-0 w-25" scope="row">Importo:</th>
                                  <td> €<?php echo $ordine["importo"]?></td>
                                </tr>
                                <tr>
                                  <th class="pl-0 w-25" scope="row">Indirizzo: </th>
                                  <td><?php echo $ordine["indirizzo"]?>, <?php echo $ordine["citta"]?> <?php echo $ordine["cap"]?>, <?php echo $ordine["paese"]?> </td>
                                </tr>
                                <tr>
                                  <th class="pl-0 w-25" scope="row">Data ordine: </th>
                                  <td><?php echo $ordine["dataOrdine"]?> </td>
                                </tr>
                                <tr>
                                  <th class="pl-0 w-25" scope="row">Data consegna: </th>
                                  <td><?php echo $ordine["dataConsegna"]?> </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Avviso!</h5>
                <button class="btn btn-default" data-dismiss="modal">
                <img class="closeIcon" src="" alt=""/>
                </button>
            </div>
            <div class="modal-body">
                <p>Sei sicuro di voler eliminare il quadro?</p>
                <input type="hidden"  id="dataid" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary px-2" data-dismiss="modal">Chiudi</button>
                <button type="button" class="btn btn-primary px-2" id="btnSi" >Si</button>
            </div>
        </div>
    </div>
</div>
    </main>

    <?php endif?>
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
