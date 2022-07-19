 <?php include "files/header.php"; ?>
 <script>
 setTimeout('self.location.href="list_receptions.php"',1500)
</script>
 <div id="content">
<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1)){
	echo "<span class='errMsg'>Нямате достатъчно права!</span>";
}
else{
	include "files/init.inc.php"; 
	$del_id =$_REQUEST['del_id'];
	$result = $mysqli->query("select * from tbl_receptions where id_reception='$del_id'");
	$row = $result->fetch_assoc();
	if ($row['picture']) unlink("pictures/".$row['picture']);
	if ($mysqli->query("delete from tbl_receptions where id_reception='$del_id'"))
		echo "Данните за посочената рецепта са изтрити.<br>";

	$mysqli->close();
}
?>
 </div>
 <?php include "files/footer.php"; ?>