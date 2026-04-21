<?php
session_start();

// ініціалізація
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['player'] = 'X';
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Хрестики-нулики</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
body { text-align:center; font-family:Arial; }

table { margin:auto; border-collapse: collapse; }

td {
    width:80px;
    height:80px;
    border:2px solid black;
    font-size:30px;
    cursor:pointer;
}
</style>
</head>

<body>

<h2>Хрестики-нулики</h2>
<h3 id="status">Хід: X</h3>

<table id="board">
<?php
for ($i = 0; $i < 9; $i++) {
    if ($i % 3 == 0) echo "<tr>";

    echo "<td data-id='$i'>" . $_SESSION['board'][$i] . "</td>";

    if ($i % 3 == 2) echo "</tr>";
}
?>
</table>

<br>
<button id="reset">Почати заново</button>

<script src="script.js"></script>

</body>
</html>
