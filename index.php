<?php include "files/header.php"; ?>
 <script type="text/javascript">
function removeReception(num)
{
   if (confirm("Да се изтрие ли рецепта?"))
     self.location.href="delete_reception.php?del_id="+num;
}
</script>
<div id="content">
	<img src="files/resceptions.png">
</div>
 <?php 
 $insertText=""; $addWordEnd="type";

include "files/init.inc.php";

$result = $mysqli->query("select * from tbl_types order by type");

$strQuery="select tbl_receptions.*, tbl_types.type from tbl_receptions join tbl_types on tbl_receptions.id_type=tbl_types.id_type".$insertText." order by ".$addWordEnd;

$result = $mysqli->query($strQuery);

while($row = $result->fetch_assoc())
{
	echo "<div id='content'>";
	echo "<p>Категория: " . htmlspecialchars($row['type']) . "</p><p><a href='show_reception.php?show_id=".$row['id_reception']."' title='Повече информация'>Име на рецептата: " .$row['name'] . "</a></p><p>Време: " .$row['time'] . " min.</p>";
	if (isset($_SESSION["username"]) && $_SESSION["usertype"]==1){
			echo "<p> <a href='edit_reception.php?edit_id=".$row['id_reception']."' title='Промяна на времето и на допълнителната информация'>редактиране</a></p><p><a href='javascript:removeReception(".$row['id_reception'].")'  title='Изтриване на данните'>изтриване</a></p>";
	}
	if(empty($row['picture'])){
	print("<p>Няма изображение!</p>");
	}
	else{
		echo "<p><img src='pictures/".$row['picture']."'></p>";
	}
	echo "</div><br>";
}

$mysqli->close();
?>
 <?php include "files/footer.php"; ?>
 