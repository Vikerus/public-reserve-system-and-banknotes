<?php

$sqli="SELECT donorgold, donortokens, exp, skillpoints FROM donor WHERE signature = '".$qr."'";
$resulit = mysqli_query($con,$sqli);

echo '<table class="table table-bordered table-striped table-hover">
      <tr>
    <th>Points</th>
    <th>Gold</th>
    <th>Tokens</th>
    <th>Exp</th>
    <th>Skillpoints</th>
	</tr>';
while($rowi = mysqli_fetch_array($resulit)) {
    echo "<tr>";
    echo "<td>" . $_SESSION['points'] . "</td>";
    echo "<td>" . $row['donorgold'] . "</td>";
    echo "<td>" . $row['donortokens'] . "</td>";
    echo "<td>" . $row['exp'] . "</td>";
    echo "<td>" . $row['skillpoints'] . "</td>";
    echo "</tr>";
}
echo '</table>';
?>