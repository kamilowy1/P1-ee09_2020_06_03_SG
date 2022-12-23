<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" type="text/css" href="styl5.css">
</head>
<body>
    <div id="baner1"><img src="logo1.png" alt="Mój kalendarz"></div>
    <div id="baner2">
        <h1>KALENDARZ</h1>
        <?php
            $server = 'localhost';
            $user = 'root';
            $password = '';
            $dbname = 'egzamin5';
            $conn = mysqli_connect($server, $user, $password, $dbname);
            /*
            if ($conn) {
            echo "Jest ok";
            } else {
                echo "czób";
            }
            */

            $sql = "SELECT miesiac, rok FROM zadania WHERE dataZadania='2020-07-01'";
            $zapytanie = mysqli_query($conn, $sql);
            while ($wynik=mysqli_fetch_row($zapytanie)) {
                echo 'miesiąc:' . ' ' . $wynik[0];
                echo ', ';
                echo 'rok: ' . ' ' . $wynik[1];
            }
        ?>
    </div>
    <div id="glowny">
<?php

$sql2 = "SELECT dataZadania, wpis FROM zadania WHERE miesiac='lipiec'";
$zapytanie2 = mysqli_query($conn, $sql2);
while ($wynik2=mysqli_fetch_row($zapytanie2)){
    echo "<div class='blok'> $wynik2[0] . <h5> $wynik2[1] </h5> </div>";
}

?>
    </div>
    <div id="stopka">
        <form method="post">
            <label>dodaj wpis:
            <input type="text" name="tekst" id="tekst">
            <input type="submit" value="DODAJ">
            <p>Stronę wykonał: 000000000</p>
            </label>
        </form>
<?php

if (!empty($_POST['tekst'])) {
    $tekst = $_POST['tekst'];
    $sql3 = "UPDATE zadania set wpis = '$tekst' WHERE dataZadania = '2020-07-13'";
    mysqli_query($conn,$sql3);
}
mysqli_close($conn);

?>
    </div>
</body>
</html>