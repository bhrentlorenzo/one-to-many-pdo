<?php
include 'config/database.php';

$developers = $pdo->query("
SELECT * FROM developers
")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Development Agency</title>
</head>
<body>

<h1>WEB DEVELOPMENT AGENCY</h1>

<a href="add_developer.php">Add Developer</a>

<hr>

<?php foreach($developers as $developer): ?>

    <h2>
        <?= $developer['developer_name']; ?>
    </h2>

    <p>
        Specialty:
        <?= $developer['specialty']; ?>
    </p>

    <a href="update_developer.php?id=<?= $developer['developer_id']; ?>">
        Edit Developer
    </a>

    |

    <a href="delete_developer.php?id=<?= $developer['developer_id']; ?>">
        Delete Developer
    </a>

    <br><br>

    <a href="add_project.php?id=<?= $developer['developer_id']; ?>">
        Add Project
    </a>

    <br><br>

    <?php

    $developer_id = $developer['developer_id'];

    $stmt = $pdo->prepare("
    SELECT * FROM projects
    WHERE developer_id = ?
    ");

    $stmt->execute([$developer_id]);

    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <table border="1" cellpadding="10">

        <tr>
            <th>Project Name</th>
            <th>Client Name</th>
            <th>Actions</th>
        </tr>

        <?php foreach($projects as $project): ?>

        <tr>

            <td>
                <?= $project['project_name']; ?>
            </td>

            <td>
                <?= $project['client_name']; ?>
            </td>

            <td>

                <a href="update_project.php?id=<?= $project['project_id']; ?>">
                    Edit
                </a>

                |

                <a href="delete_project.php?id=<?= $project['project_id']; ?>">
                    Delete
                </a>

            </td>

        </tr>

        <?php endforeach; ?>

    </table>

    <hr>

<?php endforeach; ?>

</body>
</html>