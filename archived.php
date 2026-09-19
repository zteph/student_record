<?php
require_once "db.php";
$result=$conn->query("SELECT * FROM students WHERE is_archived=1 ORDER BY id DESC");
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Archived Records</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<header><div><h1>Student Record System</h1><p>Archived Records</p></div><a class="outline" href="index.php">Back to Records</a></header>
<main>
<?php if(isset($_GET['success'])): ?><div class="alert success"><?= htmlspecialchars($_GET['success']) ?></div><?php endif; ?>
<section class="card"><h2>Archived Students</h2>
<div class="table-wrap"><table><tr><th>Student ID</th><th>Name</th><th>Program</th><th>Action</th></tr>
<?php while($row=$result->fetch_assoc()): ?><tr>
<td><?= htmlspecialchars($row['student_id']) ?></td><td><?= htmlspecialchars($row['name']) ?></td><td><?= htmlspecialchars($row['program']) ?></td>
<td><form action="restore.php" method="POST"><input type="hidden" name="id" value="<?= $row['id'] ?>"><button type="submit">Restore</button></form></td>
</tr><?php endwhile; ?></table></div>
</section></main></body></html>
