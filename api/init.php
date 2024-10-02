<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-token/utils.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/properties.php";

$gas_domain = get_required(gas_domain);
$gas_address = get_required(gas_address);
$gas_password = get_required(gas_password);

if (!DEBUG) error("cannot use not in debug session");

tokenAccountReg($gas_domain, $gas_address, $gas_password);

echo json_encode(["success" => true]);


