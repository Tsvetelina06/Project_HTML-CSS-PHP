 <?php include "files/header.php"; ?>

<script type="text/javascript">
function removeReception(num)
{
   if (confirm("Да се изтрие ли рецепта?"))
     self.location.href="delete_reception.php?del_id="+num;
}
</script>
 <div id="content">
<?php
$idType=0; $time=""; $insertText=""; $addWord=" where "; $addWordEnd="type";
if (isset($_GET["id_type"]))
{
	$idType=$_GET['id_type']; $time=$_GET['time'];
	if ($idType!=0)
		{$insertText .=$addWord."tbl_receptions.id_type=".$_GET["id_type"]; $addWord=" and "; $addWordEnd="time";}
	if (!empty($time))
		if (is_numeric($time))
			{$insertText .=$addWord."time<=".$_GET['time']; $addWordEnd="time";}
		else $time="";
}

include "files/init.inc.php";
$query = "select * from tbl_types order by type";
$result = $mysqli->query($query);

echo "<form action='".$_SERVER['PHP_SELF']."' method='get'>";
echo "Категория: <select name='id_type'>";
echo "<option value='0'>Всички рецепти</option>";

while($row = $result->fetch_assoc()){
echo "<option value='" . $row['id_type'] . "'".(($row['id_type']==$idType)?' selected':'').">" . htmlspecialchars($row['type']) . "</option>";
}
echo "</select>";
echo " време на приготвяне до <input type='number' name='time' value='".$time."'> min.";
echo " <input type='submit' value='Справка'>";
echo "</p>";
echo "</form>";

$result = $mysqli->query("select tbl_receptions.*, tbl_types.type from tbl_receptions join tbl_types on tbl_receptions.id_type=tbl_types.id_type".$insertText." order by ".$addWordEnd);

echo "<table border='1' align='center' width='600'>";
echo "<tr><th>Категория</th><th>Име на рецептата</th><th>време</th>";
if (isset($_SESSION["username"]) && $_SESSION["usertype"]==1){
	echo "<th colspan='2'>операции</th></tr>";
}

while($row = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . htmlspecialchars($row['type']) . "</td><td><a href='show_reception.php?show_id=".$row['id_reception']."' title='Подробна информация'>" .$row['name'] . "</a></td><td>" .$row['time'] . " min.</td>";
if (isset($_SESSION["username"]) && $_SESSION["usertype"]==1)
	{	
		echo "<td><a href='edit_reception.php?edit_id=".$row['id_reception']."' title='Промяна на времето и на допълнителната информация'>редактиране</a></td><td><a href='javascript:removeReception(".$row['id_reception'].")'  title='Изтриване на данните'>изтриване</a></td>";
		
	}
echo "</tr>";
}
echo "</table>";
$mysqli->close();
?>
 </div>
 <?php include "files/footer.php"; ?>