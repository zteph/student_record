<?php
require_once "db.php";
$id=(int)($_POST['id']??0);
$stmt=$conn->prepare("UPDATE students SET is_archived=0 WHERE id=?");
$stmt->bind_param("i",$id); $stmt->execute();
header("Location: archived.php?success=Student record restored.");
exit;
?>