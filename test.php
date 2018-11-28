
<?php

echo "The time is " . date("h:i:s a") . '<br>';
echo (memory_get_usage(true) ) . 'B<br><br>';

$x = 0;

for ($i = 0; $i < 10000000; $i++) {
    //echo $i . ' ';
    $x++;
    $x += 2;
}


echo "<br><br>The time is " . date("h:i:s a") . '<br>';
echo (memory_get_usage(true) ) . 'B<br><br>';

