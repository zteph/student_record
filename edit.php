<?php
require_once "db.php";
$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT * FROM students WHERE id=? AND is_archived=0");
$stmt->bind_param("i",$id); $stmt->execute();
$student = $stmt->get_result()->fetch_assoc();
if (!$student) { header("Location: index.php?error=Student record not found."); exit; }
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Edit Student</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<header><div><h1>Student Record System</h1><p>Edit Student Record</p></div><a class="outline" href="index.php">Back</a></header>
<main><section class="card"><h2>Update Student</h2>
<form action="update.php" method="POST">
<input type="hidden" name="id" value="<?= $student['id'] ?>">
<label>Student ID</label><input name="student_id" value="<?= htmlspecialchars($student['student_id']) ?>" required>
<label>Name</label><input name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
<label>Program</label><input name="program" value="<?= htmlspecialchars($student['program']) ?>" required>
<button type="submit">Save Changes</button>
</form></section></main></body></html>
