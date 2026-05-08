<?php
include 'config/database.php';

$developer_id = $_GET['id'];

if(isset($_POST['submit'])) {

    $project_name = $_POST['project_name'];
    $client_name = $_POST['client_name'];

    $sql = "
    INSERT INTO projects
    (developer_id, project_name, client_name)
    VALUES (?, ?, ?)
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $developer_id,
        $project_name,
        $client_name
    ]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Project</title>
</head>
<body>

<h1>Add Project</h1>

<form method="POST">

    <input
    type="text"
    name="project_name"
    placeholder="Project Name"
    required>

    <br><br>

    <input
    type="text"
    name="client_name"
    placeholder="Client Name"
    required>

    <br><br>

    <button
    type="submit"
    name="submit">
        Add Project
    </button>

</form>

</body>
</html>