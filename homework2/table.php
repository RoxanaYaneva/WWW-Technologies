<?php

echo "<table cellspacing='5'>";

for ($i = 1; $i < 10; $i++) {
	echo "<tr>";
	for ($j = 1; $j < 10; $j++) {
		if ($i == 1 or $j == 1) {
			echo "<th align='center'>".($i * $j)."</th>";
		}
		else {
			echo "<td align='center'>".($i * $j)."</td>";
		}
	}
	echo "</tr>";
}

echo "</table>";

?>