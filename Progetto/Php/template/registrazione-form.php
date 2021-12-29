<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Registrazione</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
  <!-- icone-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="../Css/Registrazione.css" rel="stylesheet">
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
                              <a class="nav-link" href="HomePage2.html#categorie"> &nbsp; Categorie</a>
                              <a class="nav-link" href="HomePage2.html#artisti"> &nbsp; Artisti</a>
                              <a class="nav-link" href="#"> &nbsp; Chi Siamo</a>
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

        
  
  <main>
    <br>
    

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <h1>Registrazione</h1>
        
        <h4 class="mb-3">Inserisci i tuoi Dati:<br><br>
          <form class="row g-3" action="#" method="POST">
            <div class="col-md-6">
              <label for="nome" class="form-label">Nome:</label>
              <input type="nome" class="form-control" id="nome" name="nome">
            </div>
            <div class="col-md-6">
              <label for="cognome" class="form-label">Cognome:</label>
              <input type="cognome" class="form-control" id="cognome" name="cognome">
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Password:</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-12">
              <label for="indirizzo" class="form-label">Indirizzo:</label>
              <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="Via Gramsci 781">
            </div>
            <div class="col-md-4">
            <label for="indirizzo" class="form-label">Paese:</label>
              <input type="text" class="form-control" id="paese" name="paese" placeholder="Italia">
              </select>
            </div>
            <div class="col-md-2">
              <label for="cap" class="form-label">CAP:</label>
              <input type="text" class="form-control" id="cap" name="cap">
            </div>
            <div class="col-12">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary" name="btnRegistra">Registrati</button>
            </div>
          </div>
          </form>
      
    </div>
  </main>

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
