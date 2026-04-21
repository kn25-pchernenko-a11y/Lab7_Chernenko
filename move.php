<?php
session_start();

$cell = $_POST['cell'];

if ($_SESSION['board'][$cell] == '') {
    $_SESSION['board'][$cell] = $_SESSION['player'];
    $_SESSION['player'] = ($_SESSION['player'] == 'X') ? 'O' : 'X';
}

function checkWin($b) {
    $wins = [
        [0,1,2],[3,4,5],[6,7,8],
        [0,3,6],[1,4,7],[2,5,8],
        [0,4,8],[2,4,6]
    ];

    foreach ($wins as $w) {
        if ($b[$w[0]] != '' && $b[$w[0]] == $b[$w[1]] && $b[$w[1]] == $b[$w[2]]) {
            return $b[$w[0]];
        }
    }
    return null;
}

$winner = checkWin($_SESSION['board']);

echo json_encode([
    "board" => $_SESSION['board'],
    "status" => "Хід: " . $_SESSION['player'],
    "winner" => $winner
]);