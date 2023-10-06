<?php
// Pythagorean Theorem Calculator
// Made by Matthew Pelter
?>


<h1 style="text-align:center; font-size:40px;">MATTHEW'S MATH</h1>


<h1><u>Pythagorean Theorem Calculator</u></h1>
<h3>Leave the unknown value blank.</h3>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	A: <input type="text" name="a">
	<br><br>
	B: <input type="text" name="b">
	<br><br>
	C: <input type="text" name="c">
	<br><br>
	<input type="submit" name="submit">
</form>

<h1><u>Calculator</u></h1>
<h3>Fill in the values below.</h3>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	Number 1: <input type="text" name="num1">
	<select name="operation">
		<option value="add">+</option>
		<option value="subtract">-</option>
		<option value="multiply">x</option>
		<option value="divide">/</option>
	</select>
	Number 2: <input type="text" name="num2">
	<br><br>
	<input type="submit" name="calc" value="Calculate">
</form>


<h1>Background Changer in PHP</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	<input type="submit" name="change" value="Change">
</form>
<?php 

//c^2 = a^2 + b^2

if (isset($_POST['calc'])) {
	
	$num1 = htmlspecialchars((float)$_POST['num1']);
	$num2 = htmlspecialchars((float)$_POST['num2']);
	$operation = $_POST['operation'];
	
	if (empty($num1) || empty($num2)) {
		die('Data Missing...');
	}
	
	switch ($operation) {
		case "add":
			echo $num1 . ' + ' . $num2 . ' = ' . ($num1 + $num2);
			break;
		case "subtract":
			echo $num1 . ' - ' . $num2 . ' = ' . ($num1 - $num2);
			break;
		case "multiply":
			echo $num1 . ' x ' . $num2 . ' = ' . ($num1 * $num2);
			break;
		case "divide":
			echo $num1 . ' / ' . $num2 . ' = ' . ($num1 / $num2);
			break;
	}	
}

$dataarray = [];

if (isset($_POST['submit'])) {
	
	if (empty($_POST['a'])) {
		array_push($dataarray, 'a');
	}
	
	if (empty($_POST['b'])) {
		array_push($dataarray, 'b');
	}
	
	if (empty($_POST['c'])) {
		array_push($dataarray, 'c');
	}
	
	if (count($dataarray) > 1) {
		die('You left more than 1 input empty');
		$dataarray = [];
	}
	
	
	if (empty($_POST['a']) && empty($_POST['b']) && empty($_POST['c'])) {
		die('<b>No data was entered</b>');
		
	} else if (empty($_POST['a'])) {
		$b = (float)$_POST['b'];
		$c = (float)$_POST['c'];

		// step by step
		echo 'Step 1: ' . $c . '^2 = ' . 'A^2 + ' . $b . '^2 </br>';
		echo 'Step 2: ' . pow($c, 2) . ' = ' . 'A^2 + ' . pow($b, 2) . '</br>';
		echo 'Step 3: ' . (pow($c, 2) - pow($b, 2)) . ' = ' . 'A^2</br>';
		echo 'Step 4: <b>A = ' . sqrt(abs((pow($c, 2) - pow($b, 2)))) . '</b></br>';
		
		$a = sqrt(pow($c, 2) - pow($b, 2));
		
		echo '</br><b>A = ' . $a . '</b></br>';
		echo 'B = ' . $b . '</br>';
		echo 'C = ' . $c . '</br>';
	} else if (empty($_POST['b'])) {
		$a = (float)$_POST['a'];
		$c = (float)$_POST['c'];
		
		
		// step by step
		echo 'Step 1: ' . $c . '^2 = ' . $a . '^2 + B^2 </br>';
		echo 'Step 2: ' . pow($c, 2) . ' = ' . pow($a, 2) . ' + B^2</br>';
		echo 'Step 3: ' . (pow($c, 2) - pow($a, 2)) . ' = ' . 'B^2</br>';
		echo 'Step 4: <b>B = ' . sqrt(abs((pow($c, 2) - pow($a, 2)))) . '</b></br>';
			
		$b = sqrt(pow($c, 2) - pow($a, 2));
		
		echo '</br>A = ' . $a . '</br>';
		echo '<b>B = ' . $b . '</b></br>';
		echo 'C = ' . $c . '</br>';
	} else if (empty($_POST['c'])) {
		$a = (float)$_POST['a'];
		$b = (float)$_POST['b'];
		
		// step by step
		echo 'Step 1: C^2 = ' . $a . '^2 + ' . $b . '^2 </br>';
		echo 'Step 2: C^2 = ' . pow($a, 2) . ' + ' . pow($b, 2). '</br>';
		echo 'Step 3: C^2 = ' . (pow($a, 2)+pow($b, 2)) . '</br>';
		echo 'Step 4: <b>C = ' . sqrt(abs((pow($a, 2)+pow($b, 2)))) . '</b></br>';
			
		$c = sqrt(pow($a, 2) + pow($b, 2));
		
		echo '</br>A = ' . $a . '</br>';
		echo 'B = ' . $b . '</br>';
		echo '<b>C = ' . $c . '</b></br>';
	} else {
		die('Leave one blank stupid. It is a solver not a answer checker -_-');
	}
}

$colorarray = ['#3498db','#1abc9c','#e67e22','#34495e','#f1c40f','#9b59b6'];

if (isset($_POST['change'])) {
	echo "<body bgcolor='" . $colorarray[Rand(0, (count($colorarray) - 1))] . "'></body>";
	echo $colorarray[Rand(0, (count($colorarray) - 1))];
}


?>