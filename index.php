<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title> Ozow Payment Gateway |  POST Method </title>
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

            $currencyCode = 'ZAR';
            $countryCode = 'ZA';
            $cancelUrl = "http://demo.ozow.com/cancel.aspx";
            $successUrl = "http://demo.ozow.com/success.aspx";
            $notifyUrl = "http://demo.ozow.com/notify.aspx";
            $IsTest = "false";
            $key = "215114531aff7134a94c88ceea48e";
            
            // Concatenate all the post variables && DO NOT CHANGE THIS ORDER
            $values = "TSTSTE0001".$countryCode.$currencyCode.$amount.$orderId.$transId.$cancelUrl.$successUrl.$notifyUrl.$IsTest.$key;
            // Convert the above concatenated string to lowercase
            $values = strtolower($values);
            // Generate a SHA512 hash of the lowercase concatenated string
            $hash = hash('SHA512',$values);
            
            echo '
            <form action="https://pay.ozow.com" method="POST">
               <input type="hidden" name="SiteCode" value="TSTSTE0001">
               <input type="hidden" name="CountryCode" value="'.$countryCode.'">
               <input type="hidden" name="CurrencyCode" value="'.$currencyCode.'">
               <input type="hidden" name="Amount" value="'.$amount.'">
               <input type="hidden" name="TransactionReference" value="'.$orderId.'">
               <input type="hidden" name="BankReference" value="'.$transId.'">
               <input type="hidden" name="CancelUrl" value="'.$cancelUrl.'">
               <input type="hidden" name="SuccessUrl" value="'.$successUrl.'"> 
               <input type="hidden" name="NotifyUrl" value="'.$notifyUrl.'"> 
               <input type="hidden" class="form-control" name="HashCheck" value="'.$hash.'">
               <input type="hidden" name="IsTest" value="'.$IsTest.'">
               <input type="submit" class="btn btn-success" value="Click to Checkout Using Ozow">
            </form>
            ';
        } //endif
    ?>
    </body>
</html>
