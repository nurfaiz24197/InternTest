<!--  
     MUHAMAMAD NUR FAIZ BIN MOHAMAD TARMIZI 
     970124145111
-->
<?php
session_start();
if (isset($_SESSION["energyWh"]) && isset($_SESSION["rateRM"]) && isset($_SESSION["currentRate"]) && isset($_SESSION["voltageV"]) && isset($_SESSION["currentA"])) {
    $energykWh = $_SESSION["energyWh"];
    $rateRM = $_SESSION["rateRM"];
    $currentRate = $_SESSION["currentRate"];
    $voltageV = $_SESSION["voltageV"];
    $currentA = $_SESSION["currentA"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h3 class="mb-4">Calculate</h3>
        <form method="POST" action="formProcess.php">
            <div class="row">
                <div class="col mb-4">
                    <label for="voltInput" class="form-label">Voltage :</label>
                    <input type="text" class="form-control" id="voltInput" name="voltInput" value="<?php if (isset($voltageV)) {
                        echo $voltageV;
                    } ?>" required>
                    <span class="form-text">Voltage (V)</span>

                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <label for="currentInput" class="form-label">Current :</label>
                    <input type="text" class="form-control" id="currentInput" name="currentInput" value="<?php if (isset($currentA)) {
                        echo $currentA;
                    } ?>" required>
                    <span class="form-text">Ampere (A)</span>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <label for="rateInput" class="form-label">Current Rate :</label>
                    <input type="text" class="form-control" id="rateInput" name="rateInput" value="<?php if (isset($currentRate)) {
                        echo $currentRate;
                    } ?>" required>
                    <span class="form-text">sen/kWh</span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col mb-4 text-center">
                    <input type="submit" class="btn btn btn-outline-primary" value="calculate">
                </div>
            </div>
        </form>

        <?php if (isset($energykWh) && isset($currentRate) && isset($rateRM)) {
            include 'function.php';
            ?>
            <div class="card card-sm mb-5" style="border-color:blue; color:#084298;">
                <div class="card-body fs-5 fw-bold">
                    POWER :
                    <?php echo $energykWh ?>kw
                    <br>
                    RATE :
                    <?php echo $rateRM ?>RM<br>
                </div>
            </div>
            <table class="table mt-5 mb-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Hour</th>
                        <th>Energy (kWh)</th>
                        <th>TOTAL (RM)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo genTable($energykWh, $currentRate);
                    ?>
                </tbody>
            </table>
            <?php
            session_unset();
            session_destroy();
        } else { ?>
            <div class="card card-sm mb-5" style="border-color:blue; color:#084298;">
                <div class="card-body fs-5 fw-bold">
                    POWER : <br>
                    RATE :
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>