<?php
$text=" ";
if (isset($_POST['text']) && $_POST['text']!="") {
    $text=htmlspecialchars($_POST['text']);
}

$backColor="#FFFFFF";
if (isset($_POST['backColor']) && $_POST['backColor']!="") {
    $backColor=htmlspecialchars($_POST['backColor']);
}

$textColor="#000000";
if (isset($_POST['textColor']) && $_POST['textColor']!="") {
    $textColor=htmlspecialchars($_POST['textColor']);
}

$borderColor="#A9A9A9";
if (isset($_POST['borderColor']) && $_POST['borderColor']!="") {
    $borderColor=htmlspecialchars($_POST['borderColor']);
}

$borderWidth="5";
if (isset($_POST['borderWidth']) && $_POST['borderWidth']!="") {
    $borderWidth=htmlspecialchars($_POST['borderWidth']);
}

$borderStyle="solid";
if (isset($_POST['borderStyle']) && $_POST['borderStyle']!="") {
    $borderStyle=htmlspecialchars($_POST['borderStyle']);
}

$borderRadius="0";
if (isset($_POST['borderRadius']) && $_POST['borderRadius']!="") {
    $borderRadius=htmlspecialchars($_POST['borderRadius']);
}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Kodutöö 8.1</title>
		<style type="text/css">
			
			#text {
				width: 500px;
				height: 200px;
				background-color: <?php echo $backColor;?>;
				color: <?php echo $textColor;?> ;
				border-width: <?php echo $borderWidth;?>px;
				border-style: <?php echo $borderStyle;?>;
				border-color: <?php echo $borderColor;?>;
				border-radius: <?php echo $borderRadius;?>px;
		
			}
			
			#border{
				border: 2px solid lightgrey;
				border-radius:0%;
				
			}
		</style>
	</head>
	
<body>
	
	<div id="text">
		<?php echo $text;?>
	</div>
	
	<form action="textbox.php" method="POST">
		<textarea name="text" placeholder="Kirjuta siia tekst"><?php if (isset($_POST['text']))
				echo htmlspecialchars ($_POST['text']);?></textarea><br>
		<input type="color" name="backColor" value="<?php echo $backColor;?>">Taustavärvus<br>
		<input type="color" name="textColor" value="<?php echo $textColor;?>">Tekstivärvus<br>
		
		Piirjoon
		<div id="border">
		<input type="number" name="borderWidth" value="<?php echo $borderWidth;?>" min="0" max="20">Piirjoone laius(0-20px)<br>
		<select name="borderStyle">
			<option value="solid" <?php if(!empty($_POST["borderStyle"]) && $_POST["borderStyle"] == "solid") echo "selected";?>>solid</option>
			<option value="dotted" <?php if(!empty($_POST["borderStyle"]) && $_POST["borderStyle"] == "dotted") echo "selected";?>>dotted</option>
			<option value="dashed" <?php if(!empty($_POST["borderStyle"]) && $_POST["borderStyle"] == "dashed") echo "selected";?>>dashed</option>
			<option value="double" <?php if(!empty($_POST["borderStyle"]) && $_POST["borderStyle"] == "double") echo "selected";?>>double</option>

			</select><br>
		<input type="color" name="borderColor" value="<?php echo $borderColor;?>">Piirjoone värvus<br>
		<input type="number" name="borderRadius" value="<?php echo $borderRadius;?>" min="0" max="100">Piirjoone nurga raadius(0-100px)<br>
		</div>
		<br>
		<input type="submit" value="Esita">
	</form>
</body>

</html>