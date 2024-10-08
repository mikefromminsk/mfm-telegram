<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-token/utils.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/properties.php";

$gas_domain = get_required(gas_domain);
$gas_address = get_required(gas_address);
$gas_password = get_required(gas_password);

onlyInDebug();

tokenAccountReg($gas_domain, $gas_address, $gas_password);


$response = [
    "message" => "send gas tokens to `telegram` gas account",
    success => true,
];

echo json_encode($response);


