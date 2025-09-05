<style>
    table {
        border: 1px solid #000;
        border-collapse: collapse;
        border-spacing: 5px;
    }

    td {
        border: 1px solid #000;
        padding: 8px;
    }
</style>
<?php

$jml = $_GET['jml'];

echo "<table>\n";

for($a = $jml; $a > 0; $a--){

    $total = 0;
    for($i = $a; $i > 0; $i--){
        $total += $i;
    }

    echo "<tr>\n";
    echo "<td colspan='4'>TOTAL: $total</td>";
    echo "</tr>\n";

    echo "<tr>\n";
    for($b = $a; $b > 0; $b--){
        echo "<td>$b</td>";
    }
    echo "</tr>\n";
}

echo "</table>";

?>