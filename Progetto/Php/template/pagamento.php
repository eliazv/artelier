<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" >
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="../Css/Pagamento.css" rel="stylesheet" >

<title>Pagamento</title>
<div class="container">

    <div class="page-header text-center">
        <h1>Pagamento con Carta di Credito</h1>
    </div> <!-- Credit Card Payment Form - START -->
    <?php if(isset($templateParams["errore"])): ?>
    <div class="alert alert-danger" role="alert">
    <div class="row">
      <div class="col-8 col-md-6">
        <h4><?php echo ($templateParams["errore"])?></h4>
      </div> 
    </div>
    </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
                <div class="col-8">
                <div class="panel panel-default">
                
                    <div class="panel-heading">
                        <div class="row">
                            <h3 class="text-center">Payment Details</h3>
                            <div class="inlineimage"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png"> </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="./archivio-pagamento.php" method="POST">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group"> <label>CARD NUMBER</label>
                                        <div class="input-group"> <input type="tel" class="form-control" name="numCarta" id="numCarta" maxlength="19" placeholder="Valid Card Number" /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group"> <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label> 
                                    <br>
                                    <select class="form-select" id="mese" >
                                    <option value="">mese</option>
                                        <?php for($i = 1; $i <= 12; $i++): ?>
                                        <option><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <select class="form-select" id="anno" >
                                    <option value="">anno</option>
                                        <?php for($i = 22; $i <= 40; $i++): ?>
                                        <option><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select> 
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group"> <label>CV CODE</label> <input type="tel" class="form-control" placeholder="CVC" maxlength="3" id="cvCode" name="cvCode" /> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group"> <label>CARD OWNER</label> <input type="text" class="form-control" placeholder="Card Owner Name" id="cardOwn" name="cardOwn" /> </div>
                                </div>
                            </div>
                        
                    </div>
                    
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-12">  <button name="btnConfPaym" class="btn btn-success btn-lg btn-block">Confirm Payment</button> </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



