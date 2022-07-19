<?php include "files/header.php"; ?>
 <div id="content">
  <form action="insert_reception.php" method="post" enctype="multipart/form-data">
   <h4>Въвеждане на данни за нова рецепта:</h4><br><br>
Категория:   
<?php
include "files/init.inc.php"; 
$type_query="select * from tbl_types order by type";
$result = $mysqli->query($type_query);
echo "<select name='id_type'>";
echo "<option value='0'>Изберете...</option>";
while($row = $result->fetch_assoc())
{
echo "<option value='". $row['id_type'] . "'>" . htmlspecialchars($row['type']) . "</option>";
}
echo "</select> ";
$mysqli->close();
?>
<br><p>Име на рецептата:</p> 
<input type="text" name="name" value="">
<br><p>Време: </p> 
<input type="number" min="0" name="time" value=""> min.<br><br>
<p> Друга информация</p> <br><textarea name="moreinfo" rows="10" cols="40">Начин на приготвяне ...</textarea><br>
<p>Cнимка:</p> <input type="file" name="imgFile"><br><br>
<input type="submit" value="Добави">
  </form>
 </div>
 <?php include "files/footer.php"; ?>