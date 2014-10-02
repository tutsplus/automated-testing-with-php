<!DOCTYPE html>
<html>
<?php
	require_once __DIR__ . '/MathematicalLibrary.php';
	require_once __DIR__ . '/Display.php';
	require_once __DIR__ . '/Calculator.php';
	require_once __DIR__ . '/RealDao.php';
?>
<head>
	<title>MathLib</title>
	</head>
<body>

<form name="double" action="#" method="POST">
	<label for="number">Number: </label>
	<input id="number" type="text" name="number" />
	<input type="submit" name="Double it" value="Double it">
</form>

<?
	$mathLib = new MathematicalLibrary(new Calculator(), new Display());
	$double = $mathLib->double($_POST['number']);
?>

<?if(isset($_POST['number'])):?>
	<p>
		The double of <?=$_POST['number'];?> is <?=$double;?>.
	</p>
<?endif;?>

</body>
</html>