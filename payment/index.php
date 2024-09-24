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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Demo Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Demo Product 1</h5>
                                    <span class="text-muted text-decoration-line-through">৳ 20.00</span>
                                    ৳ 15
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./?a=15">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Demo Product 2</h5>
                                    <span class="text-muted text-decoration-line-through">৳ 50.00</span>
                                    ৳ 25
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./?a=25">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Demo Product 3</h5>
                                    <span class="text-muted text-decoration-line-through">৳ 30.00</span>
                                    ৳ 20
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./?a=20">Buy Now</a></div>
                            </div>
                        </div>
                    </div>

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
                        <a class="btn btn-outline-dark mt-auto"  href="./?a=">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Demo Product 4</h5>
                                    <span class="text-muted text-decoration-line-through">৳ 60.00</span>
                                    ৳ 35
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./?a=35">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Demo Shop 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
