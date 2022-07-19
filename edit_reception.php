 <?php include "files/header.php"; ?>
 <div id="content">
 <form action='update_reception.php' method='post'>
<?php
include "files/init.inc.php";
$edit_id =$_REQUEST['edit_id'];
$query = "select tbl_receptions.*, tbl_types.type from tbl_receptions join tbl_types on tbl_receptions.id_type=tbl_types.id_type where id_reception='$edit_id'";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();
echo "<input type='hidden' value='$edit_id' name='id_reception'>";
echo "<table border='1' align='center'>";
echo "<tr valign='top'>";
echo "<td width='33%'> Категория: <b>".htmlspecialchars($row['type']) . "</b><br><nobr>Име на рецептата: <br><b><input type='text' value='".$row['name']. "' name='name'></b></nobr><br><nobr>Време:<br><b><input type='number' value='".$row['time']. "' name='time'></b> min.</nobr><br><hr><textarea rows='10' cols='30' name='moreinfo'>".$row['moreinfo']."</textarea><br><input type='submit' value='Запис'></td>";
if(empty($row['picture'])){
		echo "<td>Няма добавена снимка.</td>";
	}
	else{
		echo "<td><img src='pictures/".$row['picture']."'></td>";
	}
echo "</tr>";
echo "</table>";
$mysqli->close();
?>
</form>
 </div>
 <?php include "files/footer.php"; ?>