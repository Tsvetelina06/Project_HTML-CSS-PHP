<?php include "files/header.php"; ?>
 <div id="content">
<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1)){
	echo "<span class='errMsg'>Нямате достатъчно права!</span>";
}
else{
	$errMsg="";
	$id_reception=$_POST["id_reception"];
	$name =$_POST["name"];
	$time =$_POST["time"];
	$moreinfo =addslashes($_POST["moreinfo"]);
	if (empty($name))
		$errMsg .="Няма име!<br>";
	if (empty($time))
		$errMsg .="Не е въведено време за приготвяне!<br>";
	else
		if (!is_numeric($time)) $errMsg .="Некоректно въведено време за приготвяне!<br>";
	if ($errMsg) {
		echo "<span class='errMsg'>".$errMsg."</span><br>";
		echo "<a href='edit_reception.php?edit_id='$id_reception''> Корекция на данните</a>";
	}
	else{
	  include "files/init.inc.php";
		$upd_query="update tbl_receptions set name='$name', time='$time', moreinfo='$moreinfo' where id_reception='$id_reception'";
		if ($mysqli->query($upd_query))
			echo "Данните успешно са обновени!<br>"; 		 
		$mysqli->close();
	}
}
?>
 </div>
 <?php include "files/footer.php"; ?>
