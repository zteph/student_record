<?php
require_once "db.php";
$id=(int)($_POST['id']??0);
$student_id=trim($_POST['student_id']??'');
$name=trim($_POST['name']??'');
$program=trim($_POST['program']??'');
if(!$id || !$student_id || !$name || !$program){
    header("Location: index.php?error=Please complete all fields."); exit;
}
$stmt=$conn->prepare("UPDATE students SET student_id=?,name=?,program=? WHERE id=? AND is_archived=0");
$stmt->bind_param("sssi",$student_id,$name,$program,$id);
if($stmt->execute()) header("Location: index.php?success=Student record updated successfully.");
else header("Location: index.php?error=Update failed. Student ID may already exist.");
exit;
?>