<?php include "files/header.php"; ?>
<div id="content">
<?php
include "files/init.inc.php";
$query = "select * from tbl_users where username='". $_POST["username"] . "' and passwd='" . $_POST["passwd"] . "'";
$result = $mysqli->query($query);
$mysqli->close();
if ($row = $result->fetch_assoc())
{
	$_SESSION["username"]=$row["username"];
	$_SESSION["usertype"]=$row["usertype"];
	$_SESSION["personname"]=htmlspecialchars($row["personname"]);
	header("Location: .");
	exit;
}
else echo "<span class='errMsg'>Невалидно потребителско име или грешна парола!</span>";
?>
</div>
<?php include "files/footer.php"; ?>
