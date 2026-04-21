$(function () {

    $('td').click(function () {
        let cell = $(this).data('id');

        $.post('move.php', {cell: cell}, function (data) {
            let res = JSON.parse(data);

            updateBoard(res.board);
            $('#status').text(res.status);

            if (res.winner) {
                alert("Переміг: " + res.winner);
            }
        });
    });

    $('#reset').click(function () {
        $.post('reset.php', function () {
            location.reload();
        });
    });

});

function updateBoard(board) {
    $('td').each(function (i) {
        $(this).text(board[i]);
    });
}