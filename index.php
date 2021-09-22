<?php
require_once "vendor/autoload.php";
require_once "app/ReadData.php";

use App\ReadData;

$data = new ReadData();
$records = $data->getRecords();



if(isset($_GET["search"])){
    $records = $data->setSearchResult($_GET["searchInput"]);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Covid Data</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="searchInput">
        <input type="submit" value="Meklēt" name="search">
    </form>




    <table class="table">

        <th>Datums</th>
        <th>Valsts</th>
        <th>14DienuKumIncid</th>
        <th>Izcelosana</th>
        <th>Pasizolacija</th>
        <th>(Vakc)PasizolacijaLV</th>
        <th>(Vakc)TestsPirmsLV</th>
        <th>(Vakc)TestsPecIebrauksanasLV</th>
        <th>(BezVakc)PasizolacijaLV</th>
        <th>(BezVakc)TestsPirmsLV</th>
        <th>(BezVakc)TestsPecIebrauksanasLV</th>




        <?php foreach ($records as $record):?>
        <tr>
            <td> <?php echo $record["Datums"]; ?></td>
            <td> <?php echo $record["Valsts"]; ?></td>
            <td> <?php echo $record["14DienuKumIncid"]; ?></td>
            <td> <?php echo mb_substr($record["Izcelosana"],0,25,'UTF-8'); ?></td>
            <td> <?php echo mb_substr($record["Pasizolacija"],0,60,'UTF-8'); ?></td>
            <td> <?php echo $record["(Vakc)PasizolacijaLV"]; ?></td>
            <td> <?php echo $record["(Vakc)TestsPirmsLV"]; ?></td>
            <td> <?php echo $record["(Vakc)TestsPecIebrauksanasLV"]; ?></td>
            <td> <?php echo $record["(BezVakc)PasizolacijaLatvija"]; ?></td>
            <td> <?php echo $record["(BezVakc)TestsPirmsLV"]; ?></td>
            <td> <?php echo $record["(BezVakc)TestsPecIebrauksanasLV"]; ?></td>

        </tr>
        <?php endforeach;?>
    </table>


</body>
</html>
<?php

?>