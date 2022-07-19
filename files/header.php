<?php session_start();
define("dbHost", "localhost");
define("dbUser", "root");
define("dbPasswd", "");
define("dbName", "receptions_data");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Рецепти</title>
<link href="files/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header id="head">
			<h1 onclick="col()" id="h1">Рецепти</h1>
	</header>
<div id="top" align="right"><?php
	if (!isset($_SESSION["username"]))
	{?>
	<form action="login.php" method="post">
	Потребител: <input type="text" name="username" value="admin"> Парола: <input type="password" name="passwd" value="admin"> <input type="submit" value="Вход">&nbsp;&nbsp;
	</form>
	<?php }
	else echo $_SESSION["personname"] . " <a href='logout.php'>Изход</a>&nbsp;&nbsp;";
	?>
</div>
	<div id="top-menu">
	<nav>
		<ul>
		<li><a href="." title="Начало">Начало</a></li>
		<li><a href="list_receptions.php" title="Рецепти">Рецепти</a></li>
		<?php
		if (isset($_SESSION["username"]))
		  if ($_SESSION["usertype"]==1)
		{?>
		<li><a href="enter_reception.php" title="Въвеждане на данни за нова рецепта">Добавяне</a></li>
		<li><a href="logout.php">Изход</a></li>
		<?php } ?>
		</ul>
	</nav>
</div>