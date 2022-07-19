 <?php include "files/header.php"; ?>
 <div id="content">
<?php
include "files/init.inc.php";
$query = "select tbl_receptions.*, tbl_types.type from tbl_receptions join tbl_types on tbl_receptions.id_type=tbl_types.id_type where id_reception=".$_REQUEST['show_id'];
$result = $mysqli->query($query);
$row = $result->fetch_assoc();
echo "Категория: <b>".htmlspecialchars($row['type']) . "</b><br> Име на рецептата: <b>" . $row['name'] . "</b><br> Време: <b>" . $row['time'] . "</b> min.<br><hr>".htmlspecialchars($row['moreinfo'])."<hr>";
	if(empty($row['picture'])){
		echo "Няма добавена снимка.";
	}
	else{
		echo "<img src='pictures/".$row['picture']."'>";
	}
$mysqli->close();
?>
<br>
<a href='javascript:history.back()' title='Kъм предходната страница'> Обратно към списъка с рецепти</a>
 </div>
 <?php include "files/footer.php"; ?>