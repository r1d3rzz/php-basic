<?php

if (isset($_POST['submit'])) {

    $p_1 = 0;
    $p_2 = 0;
    $d = 0;

    for ($i = 0; $i < 100; $i++) {
        $player_1 = rand(0, 9);
        $player_2 = rand(0, 9);

        if ($player_1 > $player_2) {
            $p_1++;
        } else if ($player_1 < $player_2) {
            $p_2++;
        } else if ($player_1 == $player_2) {
            $d++;
        }
    }
    echo "Player 1 is Win $p_1 times <br/>";
    echo "Player 2 is Win $p_2 times <br/>";
    echo "Draw $d times <br/>";
    if ($p_1 > $p_2) {
        echo "So Player 1 is Winner";
    } else {
        echo "So Player 2 is Winner";
    }
}

?>

<form action="" method="POST">
    <input type="submit" value="start" name="submit">
</form>