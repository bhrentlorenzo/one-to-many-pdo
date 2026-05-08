<?php
include 'config/database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
SELECT * FROM projects
WHERE project_id = ?
");

$stmt->execute([$id]);

$project = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])) {

    $project_name = $_POST['project_name'];
    $client_name = $_POST['client_name'];

    $sql = "
    UPDATE projects
    SET project_name = ?,
        client_name = ?
    WHERE project_id = ?
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $project_name,
        $client_name,
        $id
    ]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Project</title>
</head>
<body>

<h1>Update Project</h1>

<form method="POST">

    <input
    type="text"
    name="project_name"
    value="<?= $project['project_name']; ?>"
    required>

    <br><br>

    <input
    type="text"
    name="client_name"
    value="<?= $project['client_name']; ?>"
    required>

    <br><br>

    <button
    type="submit"
    name="submit">
        Update Project
    </button>

</form>

</body>
</html>