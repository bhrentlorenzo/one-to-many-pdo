<?php
include 'config/database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
SELECT * FROM developers
WHERE developer_id = ?
");

$stmt->execute([$id]);

$developer = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])) {

    $developer_name = $_POST['developer_name'];
    $specialty = $_POST['specialty'];

    $sql = "
    UPDATE developers
    SET developer_name = ?,
        specialty = ?
    WHERE developer_id = ?
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $developer_name,
        $specialty,
        $id
    ]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Developer</title>
</head>
<body>

<h1>Update Developer</h1>

<form method="POST">

    <input
    type="text"
    name="developer_name"
    value="<?= $developer['developer_name']; ?>"
    required>

    <br><br>

    <input
    type="text"
    name="specialty"
    value="<?= $developer['specialty']; ?>"
    required>

    <br><br>

    <button
    type="submit"
    name="submit">
        Update Developer
    </button>

</form>

</body>
</html>