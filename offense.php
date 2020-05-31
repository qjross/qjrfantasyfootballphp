<!DOCTYPE html>
<html>
<head>
    <!--
I held off on making interceptions and fumbles as one category, however. Both are still -2, but unlike missed kicks, having one single stat for turnovers would be more efficient, but it would make less sense.
!-->

<link rel ="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

$yardsPassing = $_POST['yardsPassing'];
$passingTDs = $_POST['passingTDs'];
$interceptions = $_POST['interceptions'];
$yardsReceiving = $_POST['yardsReceiving'];
$receivingTDs = $_POST['receivingTDs'];
$yardsRushing = $_POST['yardsRushing'];
$rushingTDs = $_POST['rushingTDs'];
$lostFumbles = $_POST['lostFumbles'];

$offenseFile = fopen("offense.txt", "w");

fputs($offenseFile, "$yardsPassing:$passingTDs:$interceptions:$yardsReceiving:$receivingTDs:$yardsRushing:$rushingTDs:$lostFumbles");

$passingYards = ' ';
$passTDs = ' ';
$picks = ' ';
$receivingYards = ' ';
$recTDs = ' ';
$rushingYards = ' ';
$rushTDs = ' ';
$fumbles = ' ';    
    
$passingYards = $yardsPassing / 25;
$passTDs = $passingTDs * 4;
$picks = $interceptions * 2;
$receivingYards = $yardsReceiving / 10;
$recTDs = $receivingTDs * 6;
$rushingYards = $yardsRushing / 10;
$rushTDs = $rushingTDs * 6;
$fumbles = $lostFumbles * 2;    

$offenseScore = ($passingYards + $passTDs + $receivingYards + $recTDs + $rushingYards + $rushTDs) - $picks - $fumbles;

$passingYards = number_format($passingYards, 2);
$receivingYards = number_format($receivingYards, 2);
$rushingYards = number_format($rushingYards, 2);
$offenseScore = number_format($offenseScore, 2);

echo("<table border=\"1\">");	
echo("<tr><th>Category</th><th>Stat</th><th>FP</th></tr>");
for ($count = 1; $count <= 8; $count = $count + 1)
	
	{
		
		
		echo ("<tr>");
		if ($count == 1)
			echo("<td>Passing Yards</td><td>$yardsPassing</td><td>$passingYards</td>");
		elseif ($count == 2)
		echo("<td>Passing TDs</td><td>$passTDs</td><td>$passingTDs</td>");
		elseif ($count == 3)
		echo("<td>Interceptions</td><td>$interceptions</td><td>-$picks</td>");
		elseif ($count == 4)
		echo("<td>Receiving Yards</td><td>$yardsReceiving</td><td>$receivingYards</td>");
		elseif ($count == 5)
		echo("<td>Receiving TDs</td><td>$receivingTDs</td><td>$recTDs</td>");
		elseif ($count == 6)
		echo("<td>Rushing Yards</td><td>$yardsRushing</td><td>$rushingYards</td>");
		elseif ($count == 7)
		echo("<td>Rushing TDs</td><td>$rushingTDs</td><td>$rushTDs</td>");
		else
			echo("<td>Fumbles Lost</td><td>$lostFumbles</td><td>-$fumbles</td>");
		
		
		
	}
    
    fclose($offenseFile);
echo("</table>");

echo("<h2> Your player's total score is: $offenseScore.</h2>");
?>
</body>
</html>