<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Tracciamento</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="../css/tracciamento.css">
  <!-- icone-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
    
<header class="text-center mt-3">

  <a href="./archivio-Ordini.php" style="text-align: center;">Torna agli Ordini</a>
     
</header>

<main>
<?php foreach($templateParams["ordtracciamento"] as $ordinedaTr):?>
<div class="container-fluid my-5 d-sm-flex justify-content-center">
    
    <div class="card px-2">
        <div class="card-header bg-white">
            <div class="row justify-content-between">
                <div class="col">
                    <p class="text-muted"> Numero Ordine: <span class="font-weight-bold text-dark"><?php echo $ordinedaTr["CodQuadroOrdinato"]?></span></p>
                </div>
                <div class="flex-col my-auto">
                    <p class="text-muted"> Ordinato il: <span class="font-weight-bold text-dark"><?php echo $ordinedaTr["dataOrdine"]?></span> </p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="media flex-column flex-sm-row">
                <div class="media-body ">
                    <h5 class="bold"><?php echo $ordinedaTr["titoloQuaOrd"]?></h5>
                    <p class="text-muted"> Qt: <?php echo $ordinedaTr["quantita"]?></p>
                    <h4 class="mt-3 mb-4 bold"> <?php echo $ordinedaTr["prezzo"] * $ordinedaTr["quantita"] ?><span class="mt-5">&#8364;</span> </h4>
                    <p class="text-muted">Consegna Prevista: <span class="Today"><?php echo $ordinedaTr["dataConsegna"]?></span></p> 
                </div><img class="align-self-center img-fluid" src="<?php echo UPLOAD_DIR.$ordinedaTr["immagine"]?>" width="180 " height="180" style="margin-left: 10px;">
            </div>
        </div>
        <div class="row px-3">
            <div class="col">
                <ul id="progressbar">
                    <li class="step0 active " id="step1">ORDINATO</li>
                    <li class="step0 active text-center" id="step2">IN SPEDIZIONE</li>
                    <li class="step0 text-muted text-right" id="step3">CONSEGNATO</li>
                </ul>
            </div>
        </div>
       
    </div>
    
</div>
<?php endforeach; ?>


  

</div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>
