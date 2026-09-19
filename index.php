<?php
require_once "db.php";
$result = $conn->query("SELECT * FROM students WHERE is_archived=0 ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Record System</title><link rel="stylesheet" href="style.css">
</head>
<body>
<header><div><h1>Student Record System</h1><p>Student Management</p></div><a class="outline" href="archived.php">Archived Records</a></header>
<main>
<?php if(isset($_GET['success'])): ?><div class="alert success"><?= htmlspecialchars($_GET['success']) ?></div><?php endif; ?>
<?php if(isset($_GET['error'])): ?><div class="alert error"><?= htmlspecialchars($_GET['error']) ?></div><?php endif; ?>

<section class="card">
<h2>Add Student</h2>
<form action="create.php" method="POST">
<label>Student ID</label><input type="text" name="student_id" placeholder="e.g. 2026-0001" required>
<label>Name</label><input type="text" name="name" placeholder="Enter student name" required>
<label>Program</label><input type="text" name="program" placeholder="e.g. BS Information Technology" required>
<button type="submit">+ Add Student</button>
</form>
</section>

<section class="card">
<h2>Student Records</h2>
<p class="muted">Records displayed directly from the MySQL database.</p>
<div class="table-wrap"><table>
<tr><th>Student ID</th><th>Name</th><th>Program</th><th>Actions</th></tr>
<?php while($row=$result->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($row['student_id']) ?></td>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['program']) ?></td>
<td class="actions">
<a class="edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
<form action="archive.php" method="POST"><input type="hidden" name="id" value="<?= $row['id'] ?>"><button class="archive" type="submit">Archive</button></form>
</td>
</tr>
<?php endwhile; ?>
</table></div>
</section>
</main>
</body></html>
