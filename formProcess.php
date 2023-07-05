<!--  MUHAMAMAD NUR FAIZ BIN MOHAMAD TARMIZI -->
<?php
session_start();
require "function.php";

$voltageV = $_POST['voltInput'];
$currentA = $_POST['currentInput'];
$currentRate = $_POST['rateInput'];

if (!is_numeric($voltageV) || !is_numeric($currentA) || !is_numeric($currentRate)) {
    echo '<script>alert("Invalid value. Please enter a numeric value.");</script>';
    echo '<script>window.location.href = "index.php";</script>';
    session_unset();
    session_destroy();
}

$_SESSION['voltageV'] = $voltageV;
$_SESSION['currentA'] = $currentA;
$_SESSION['currentRate'] = $currentRate;

calculate($voltageV, $currentA, $currentRate);

echo '<script>window.location.href="index.php";</script>';