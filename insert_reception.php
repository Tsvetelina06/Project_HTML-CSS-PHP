 <?php include "files/header.php"; ?>
 <div id="content">
<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1))
{
	echo "<span class='errMsg'>Нямате достатъчно права!</span>";
}
else
{
	$id_type =$_POST["id_type"];
	$name =$_POST["name"];
	$time =$_POST["time"];
	$moreinfo =addslashes($_POST["moreinfo"]);
	$errMsg="";
	if ($id_type==0) 
		$errMsg .="Не е избрана категория!<br>";
	if (empty($name))
		$errMsg .="Няма име на рецептата!<br>";
	if (empty($time))
		$errMsg .="Не е въведенo време за приготвяне!<br>";
	else
		if (!is_numeric($time)) $errMsg .="Некоректно въведенo време за приготвяне!<br>";
	if ($errMsg) 
	{
		echo "<span class='errMsg'>".$errMsg."</span><br>";
		echo "<a href='enter_reception.php'>Ново въвеждане</a>";
	}
	else
	{
	  include "files/init.inc.php";

		$query="insert into tbl_receptions(id_type, name, time, moreinfo, picture) values ('$id_type','$name','$time','$moreinfo', '')";
		if ($mysqli->query($query))
			echo "Данните са записани успешно в базата.<br>";

		$fileErr=$_FILES["imgFile"]["error"]>0;
		if ($fileErr)
		  {
			echo "<span class='errMsg'>Не е добавена снимка.</span><br>";
		  }
		else
		  {
			$allowedExt = array("gif", "jpeg", "jpg", "png");
			$arrName = explode(".", $_FILES["imgFile"]["name"]);
			$ext = end($arrName);
			if (in_array($ext, $allowedExt) && ($_FILES["imgFile"]["size"] < 280000))
			{
				$idReception=$mysqli->insert_id;
				$picName="Pic".$idReception.".".$ext;
				move_uploaded_file($_FILES["imgFile"]["tmp_name"], "pictures/".$picName);
				$query="update tbl_receptions set picture='".addslashes($picName)."' where id_reception=".$idReception;
				if ($mysqli->query($query))
					echo "Снимката е добавена.<br>";
			}
			else
			{
				echo "<span class='errMsg'>Невалиден файл е избран за снимка!</span><br>";
			}
		  }

		$mysqli->close();
	}
}	
?>
 </div>
 <?php include "files/footer.php"; ?>
