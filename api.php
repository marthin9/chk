<?php

// ===============[API BY @badboychx ]================
//error_reporting(0);

$start_time = microtime(true);

$card = $_GET["lista"] ?? '';
$mode = $_GET["mode"] ?? "cvv";
$amount = $_GET["amount"] ?? 1;
$currency = $_GET["currency"] ?? "usd";

if (empty($card)) {
    echo "Please enter a card number";
    exit();
}

$split = explode("|", $card);
$cc = $split[0] ?? '';
$mes = $split[1] ?? '';
$ano = $split[2] ?? '';
$cvv = $split[3] ?? '';

if (empty($cc) || empty($mes) || empty($ano) || empty($cvv)) {
    echo "Invalid card details";
    exit();
}

$pk = 'pk_live_51HwXTWF4MTEJX6hQaD5Cj7SAFGmIor1noB93C4c5QLHS62tJh0KCjVNcmMiGoKjEsbwxGeYfZBnZr0IjR5q8lr9b00772dT2dM';
$sk = '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';
$tokenData = [
    'card' => [
        'number' => $cc,
        'exp_month' => $mes,
        'exp_year' => $ano,
        'cvc' => $cvv,
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($tokenData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $pk,
    'Content-Type: application/x-www-form-urlencoded',
]);

$tokenResponse = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    exit();
}
curl_close($ch);

$tokenData = json_decode($tokenResponse, true);
if (isset($tokenData['error'])) {
    echo 'Error: ' . $tokenData['error']['message'];
    exit();
}

$tokenId = $tokenData['id'] ?? '';
if (empty($tokenId)) {
    echo 'Token creation failed';
    exit();
}

$chargeData = [
    'amount' => $amount * 100, 
    'currency' => $currency,
    'source' => $tokenId,
    'description' => 'Charge for product/service'
];


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($chargeData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $sk,
    'Content-Type: application/x-www-form-urlencoded',
]);

// Execute cURL request for charge creation
$chargeResponse = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    exit();
}
curl_close($ch);

$chares = json_decode($chargeResponse);

$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);

if (isset($chares->status) && $chares->status == "succeeded") {
    $status = "CHARGED";
    $resp = "Charged successfully ✅";
} elseif (strpos(json_encode($chares), "Your card's security code is incorrect.") !== false) {
    $status = "LIVE";
    $resp = "CCN LIVE✅";
} elseif (strpos(json_encode($chares), 'insufficient funds') !== false || strpos(json_encode($chares), 'Insufficient Funds') !== false) {
    $status = "LIVE";
    $resp = "insufficient funds✅";
} else {
    $status = "Declined ❌️";
    
    $resp = $chares->error->decline_code ?? $chares->error->message ?? 'Unknown error';
}

echo $status . '-->' . $card . '-->[' . $resp . ']';

function create_rnd_str($length = 16)
{
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $chars_length = strlen($chars);
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $chars_length - 1)];
    }
    return $str;
}

?>