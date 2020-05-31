<!DOCTYPE html>
<html>
<head>
    <!--
I consolidated missed FGs and PATs as one missed kicks category as they are both -2.
-->

<link rel ="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

$madeFG17 = $_POST['madeFG17'];
$madeFG40 = $_POST['madeFG40'];
$madeFG50 = $_POST['madeFG50'];
$madeFG60 = $_POST['madeFG60'];
$madePAT = $_POST['madePAT'];
$missedKicks = $_POST['missedKicks'];

$kickersFile = fopen("kickers.txt", "w");

fputs($kickersFile, "$madeFG17:$madeFG40:$madeFG50:$madeFG60:$madePAT:$missedKicks");
    
    $patConvert = ' ';
    $fgMade17 = ' ';
    $fgMade40 = ' ';
    $fgMade50 = ' ';
    $fgMade60 = ' ';
    $kicksMissed = ' ';

$patConvert = $madePAT * 1;
$fgMade17 = $madeFG17 * 3;
$fgMade40 = $madeFG40 * 4;
$fgMade50 = $madeFG50 * 5;
$fgMade60 = $madeFG60 * 6;
$kicksMissed = $missedKicks * 2;

$kickerScore = ($fgMade17 + $fgMade40 + $fgMade50 + $fgMade60 + $patConvert) - $kicksMissed;

echo("<table border=\"1\">");	
echo("<tr><th>Category</th><th>Stat</th><th>FP</th></tr>");

    for ($count = 1; $count <= 6; $count = $count + 1)
	
	{
		
		echo ("<tr>");
		if ($count == 1)
			echo("<td>PATs Made</td><td>$madePAT</td><td>$patConvert</td>");
		elseif ($count == 2)
		echo("<td>Field Goals 17-39 Yards</td><td>$madeFG17</td><td>$fgMade17</td>");
		elseif ($count == 3)
		echo("<td>Field Goals 40-49 Yards</td><td>$madeFG40</td><td>$fgMade40</td>");
		elseif ($count == 4)
		echo("<td>Field Goals 50-59 Yards</td><td>$madeFG50</td><td>$fgMade50</td>");
		elseif ($count == 5)
		echo("<td>Field Goals 60+ Yards</td><td>$madeFG60</td><td>$fgMade60</td>");
		else
		echo("<td>Missed Kicks</td><td>$missedKicks</td><td>$kicksMissed</td>");
		
		
		
		
	}
    
    fclose($kickersFile);
echo("</table>");

echo("<h2> Your kicker's total score is: $kickerScore.");
?>
    

</body>
</html>