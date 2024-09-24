<!-- including header starts -->
<!-- <?php
include('./mainInclude/header.php');
?> -->
<!-- including header ends -->

<?php
require_once('vendor/autoload.php');

$callbackURL = 'http://localhost/bKash-Payment-geteway-setup-by-php-main/bKash-Payment-geteway-setup-by-php-main/?a=15';  // Set a valid callback URL

$app_key = '4f6o0cjiki2rfm34kfdadl1eqq';
$app_secret = '2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b';
$username = 'sandboxTokenizedUser02';
$password = 'sandboxTokenizedUser02@12345';
$base_url = 'https://tokenized.sandbox.bka.sh';

// Start Grant Token


try {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', $base_url.'/v1.2.0-beta/tokenized/checkout/token/grant', [
        'json' => [
            'app_key' => $app_key,
            'app_secret' => $app_secret
        ],
        'headers' => [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'password' => $password,
            'username' => $username,
        ],
    ]);
    $response = json_decode($response->getBody());
    if (isset($response->id_token)) {
        $id_token = $response->id_token;
    } else {
        throw new Exception("Failed to get id_token. Check the credentials or request body.");
    }
} catch (\GuzzleHttp\Exception\RequestException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
// End Grant Token

if (isset($_GET['a'])) {
    $amount = $_GET['a'];
    $InvoiceNumber = 'shop'.rand();

    // Start Create Payment
    $auth = $id_token;
    $requestbody = [
        'mode' => '0011',
        'amount' => $amount,
        'currency' => 'BDT',
        'intent' => 'sale',
        'payerReference' => $InvoiceNumber,
        'merchantInvoiceNumber' => $InvoiceNumber,
        'callbackURL' => $callbackURL
    ];
    
    $url = curl_init($base_url.'/v1.2.0-beta/tokenized/checkout/create');
    $requestbodyJson = json_encode($requestbody);
    $header = [
        'Content-Type: application/json',
        'Authorization: ' . $auth,
        'X-APP-Key: ' . $app_key
    ];
    
    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    $resultdata = curl_exec($url);
    curl_close($url);
    
    $obj = json_decode($resultdata);
    if (isset($obj->{'bkashURL'})) {
        header("Location: " . $obj->{'bkashURL'});
    } else {
        echo "Error creating payment: " . $resultdata;
    }
    // End Create Payment
}

// Execute payment
if (isset($_GET['paymentID'], $_GET['status']) && $_GET['status'] == 'success') {
    $paymentID = $_GET['paymentID'];  
    $auth = $id_token;
    $post_token = ['paymentID' => $paymentID];
    
    $url = curl_init($base_url.'/v1.2.0-beta/tokenized/checkout/execute');       
    $posttoken = json_encode($post_token);
    $header = [
        'Content-Type: application/json',
        'Authorization: ' . $auth,
        'X-APP-Key: ' . $app_key
    ];
    
    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_POSTFIELDS, $posttoken);
    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    
    $resultdata = curl_exec($url);
    curl_close($url);
    
    $obj = json_decode($resultdata);
    
    if (isset($obj->paymentID)) {
        $customerMsisdn = $obj->customerMsisdn;
        $paymentID = $obj->paymentID;
        $trxID = $obj->trxID;
        $merchantInvoiceNumber = $obj->merchantInvoiceNumber;
        $time = $obj->paymentExecuteTime;
        $transactionStatus = $obj->transactionStatus;
        $amount = $obj->amount;

        print_r($obj);
    } else {
        echo "Error executing payment: " . $resultdata;
    }
}
?>
   <!-- Popular Course starts -->
   <div class="container mt-5">
    <h1 class="text-center">All Courses</h1>
    <div class="row mt-4">
        <!-- 1st -->
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400" src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="Guitar"/>
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="./?a=980">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        

    <!-- 2nd -->
    
       
        <div class="col-md-4 mb-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img height="250" width="400" src="https://images.pexels.com/photos/270632/pexels-photo-270632.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="Guitar"/>
                    <div class="card-body">
                        <h5 class="card-title">Learn Guitar Easy Way</h5>
                        <p class="card-text">mkkihihigugvjufyufyjh</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#478 980</del></small><span class="font-weight-bolder">&#478 980</span></p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="./?a=980">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

       

        <!--Popular Course ends  -->
    <!-- end course page -->
<!-- including footer starts-->
<?php
include('./mainInclude/footer.php');
?>
<!-- including footer ends -->