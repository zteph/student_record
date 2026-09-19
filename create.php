<?php
require_once "db.php";
$student_id = trim($_POST['student_id'] ?? '');
$name = trim($_POST['name'] ?? '');
$program = trim($_POST['program'] ?? '');

if ($student_id === '' || $name === '' || $program === '') {
    header("Location: index.php?error=Please complete all fields.");
    exit;
}

$stmt = $conn->prepare("INSERT INTO students (student_id,name,program) VALUES (?,?,?)");
$stmt->bind_param("sss", $student_id, $name, $program);

if ($stmt->execute()) {
    header("Location: index.php?success=Student record created successfully.");
} else {
    header("Location: index.php?error=Student ID already exists or data could not be saved.");
}
exit;
?>