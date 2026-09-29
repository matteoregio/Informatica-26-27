<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<title>Tavola periodica</title>
	<style>
		table{
			color: #4070a0;
			border-color: #4070a0;
		}
		td, th{
			height: 27px;
			width: 27px;
			text-align: center;
		}
		h1{
			color:#4070a0;
		}
	</style>
</head>
    <body>
        <h1>TAVOLA PITAGORICA</h1>
        <table border = "2" cellpadding="4">
			<?php
			echo "<tr><th>X</th>";
			for ($k = 0; $k <= 10; $k++) {
				echo "<th>".$k."</th>";
			}
			echo "</tr>";

			for ($i = 0; $i <= 10; $i++) {
				echo "<tr>";
				echo "<th>".$i."</th>";
				for ($j = 0; $j <= 10; $j++) {
					$t = $i * $j;
					echo "<td>".$t."</td>";
				}
				echo "<tr>";
			}
			?>
        </table>
    </body>
</html>

