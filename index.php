<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title> </title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    
    <body>
        <?php
        if(isset($_GET['transactionid']) && isset($_GET['orderid']) && isset($_GET['amount'])){
            // Set Variables
            $transId= $_GET['transactionid'];
            $orderId = $_GET['orderid'];
            $amount = $_GET['amount'];
            
            // Concatenate all the post variables
            $a = "TSTSTE0001"."ZA"."ZAR".$amount.$orderId.$transId."http://demo.ozow.com/cancel.aspx"."http://demo.ozow.com/success.aspx"."http://demo.ozow.com/notify.aspx"."false"."215114531aff7134a94c88ceea48e";
            // Convert the above concatenated string to lowercase
            $a = strtolower($a);
            // Generate a SHA512 hash of the lowercase concatenated string
            $hash = hash('SHA512',$a);
        ?>
        <form action="https://pay.ozow.com" method="POST">
           <input type="hidden" name="SiteCode" value="TSTSTE0001">
           <input type="hidden" name="CountryCode" value="ZA">
           <input type="hidden" name="CurrencyCode" value="ZAR">
           
           <input type="hidden" name="Amount" value="<?=$amount;?>">
           <input type="hidden" name="TransactionReference" value="<?=$orderId;?>">
           <input type="hidden" name="BankReference" value="<?=$transId;?>">
           
           <input type="hidden" name="CancelUrl" value="http://demo.ozow.com/cancel.aspx">
           <input type="hidden" name="SuccessUrl" value="http://demo.ozow.com/success.aspx">
           <input type="hidden" name="NotifyUrl" value="http://demo.ozow.com/notify.aspx">
           
           <input type="hidden" class="form-control" name="HashCheck" value="<?=$hash;?>">
           
           <input type="hidden" name="IsTest" value="false">
           <input type="submit" class="btn btn-success" value="Click to Checkout Using Ozow">
        </form>
        <?php } ?>

    </body>
</html>