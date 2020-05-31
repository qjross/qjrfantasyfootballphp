<!DOCTYPE html>
<html>
<head>
<!--
I kept the 1 point in for points allowed even though it's impossible to score a single point in American football (however, if we do have fantasy CFL players...).
-->
<link rel ="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

$blockedKicks = $_POST['blockedKicks'];
$safety = $_POST['safety'];
$forcedFumble = $_POST['forcedFumble'];
$fumbleRecovery = $_POST['fumbleRecovery'];
$interceptions = $_POST['interceptions'];
$sacks = $_POST['sacks'];
$pointsAllowed = $_POST['pointsAllowed'];

$defenseFile = fopen("defense.txt", "w");

fputs($defenseFile, "$blockedKicks:$safety:$forcedFumble:$fumbleRecovery:$interceptions:$sacks:$pointsAllowed");

$kickBlock = ' ';
    $safeties = ' ';
    $fumblesForced = ' ';
    $fumblesRecovered = ' ';
    $picks = ' ';
    $qbSacks = ' ';
    $allowedPoints = ' ';
    
    
$kickBlock = $blockedKicks * 2;
$safeties = $safety * 2;
$fumblesForced = $forcedFumble * 1;
$fumblesRecovered = $fumbleRecovery * 1;
$picks = $interceptions * 2;
$qbSacks = $sacks * 1;

if ($pointsAllowed == 0)
$allowedPoints = 10;

elseif ($pointsAllowed >= 1 AND $pointsAllowed <= 6)
$allowedPoints = 8;

elseif ($pointsAllowed >= 7 AND $pointsAllowed <= 13)
$allowedPoints = 6;

elseif ($pointsAllowed >= 14 AND $pointsAllowed <= 20)
$allowedPoints = 2;

elseif ($pointsAllowed >= 21 AND $pointsAllowed <= 27)
$allowedPoints = 1;

elseif ($pointsAllowed >= 28 AND $pointsAllowed <= 34)
$allowedPoints = 0;

elseif ($pointsAllowed >= 35 AND $pointsAllowed <= 41)
$allowedPoints = -2;

elseif ($pointsAllowed > 41)
$allowedPoints = -4;


$defenseScore = $kickBlock + $safeties + $fumblesForced + $fumblesRecovered + $picks + $qbSacks + $allowedPoints;
echo("<table border=\"1\">");	
echo("<tr><th>Category</th><th>Stat</th><th>FP</th></tr>");
    for ($count = 1; $count <= 7; $count = $count + 1)
	
	{
			
		echo ("<tr>");
		if ($count == 1)
			echo("<td>Blocked Kicks</td><td>$blockedKicks</td><td>$kickBlock</td>");
		elseif ($count == 2)
		echo("<td>Safeties</td><td>$safety</td><td>$safeties</td>");
		elseif ($count == 3)
		echo("<td>Forced Fumbles</td><td>$forcedFumble</td><td>$fumblesForced</td>");
		elseif ($count == 4)
		echo("<td>Fumble Recoveries</td><td>$fumbleRecovery</td><td>$fumblesRecovered</td>");
		elseif ($count == 5)
		echo("<td>Interceptions</td><td>$interceptions</td><td>$picks</td>");
		elseif ($count == 6)
		echo("<td>Sacks</td><td>$sacks</td><td>$qbSacks</td>");
		else
			echo("<td>Points Allowed</td><td>$pointsAllowed</td><td>$allowedPoints</td>");
		
		
		
	}
    
    fclose($defenseFile);
echo("</table>");

echo("<h2> Your defense's total score is $defenseScore.</h2>");
    
?>
</body>
</html>