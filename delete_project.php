<?php
include 'config/database.php';

$id = $_GET['id'];

$sql = "
DELETE FROM projects
WHERE project_id = ?
";

$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

header("Location: index.php");
?>