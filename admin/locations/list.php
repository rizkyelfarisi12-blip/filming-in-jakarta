<?php

include "../includes/auth.php";
include "../includes/db.php";
include "../includes/config.php";

$result = mysqli_query(
    $conn,
    "SELECT *
     FROM locations
     ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">

    <title>Locations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/admin.css">

    </head>

    <body>

    <?php include "../includes/sidebar.php"; ?>

        <div class="main" style="margin-left:250px;padding:30px;">

        <div class="d-flex justify-content-between mb-4">

            <h2>Locations</h2>

            <a
            href="create.php"
            class="btn btn-primary"
            >
            Add Location
            </a>

        </div>

        <?php if(isset($_GET['deleted'])): ?>

        <div class="alert alert-success">
        Location deleted successfully.
        </div>

        <?php endif; ?>

            <table class="table table-bordered">

                <thead>

                    <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>

                </thead>
                <tbody>

                <?php while($row=mysqli_fetch_assoc($result)): ?>

                    <tr>

                        <td><?= $row['id'] ?></td>

                        <td><?= $row['location_code'] ?></td>

                        <td><?= $row['name'] ?></td>

                        <td><?= $row['category'] ?></td>

                        <td>

                            <?php if($row['is_published']): ?>

                                <span class="badge bg-success">
                                Published
                                </span>

                            <?php else: ?>

                                <span class="badge bg-secondary">
                                Draft
                                </span>

                            <?php endif; ?>

                        </td>
                        <td>
                            <td>

                                <a
                                href="edit.php?id=<?= $row['id'] ?>"
                                class="btn btn-warning btn-sm"
                                >
                                Edit
                                </a>

                                <a
                                href="gallery.php?id=<?= $row['id'] ?>"
                                class="btn btn-info btn-sm"
                                >
                                Gallery
                                </a>

                                <a
                                href="view.php?id=<?= $row['id'] ?>"
                                class="btn btn-info btn-sm"
                                >
                                View
                                </a>

                                <a
                                href="delete.php?id=<?= $row['id'] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this location and all gallery images?')"
                                >
                                Delete
                                </a>

                            </td>
                        </td>
                    </tr>

                <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </body>
</html>