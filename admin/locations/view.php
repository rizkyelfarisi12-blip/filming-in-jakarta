<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../includes/auth.php";
include "../includes/db.php";

$id = (int)$_GET['id'];

$location =
mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT *
        FROM locations
        WHERE id='$id'"
    )
);

$gallery =
mysqli_query(
    $conn,
    "SELECT *
    FROM location_gallery
    WHERE location_id='$id'
    ORDER BY sort_order ASC,id ASC"
);

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="main" style="margin-left:250px;padding:30px;">

    <h2><?= htmlspecialchars($location['name']) ?></h2>

    <hr>

    <table class="table table-bordered">

        <tr>
            <th width="200">Location Code</th>
            <td><?= $location['location_code'] ?></td>
        </tr>

        <tr>
            <th>Slug</th>
            <td><?= $location['slug'] ?></td>
        </tr>

        <tr>
            <th>Ownership</th>
            <td><?= $location['ownership'] ?></td>
        </tr>

        <tr>
            <th>Manager</th>
            <td><?= $location['manager'] ?></td>
        </tr>

        <tr>
            <th>Area Size</th>
            <td><?= $location['area_size'] ?></td>
        </tr>

        <tr>
            <th>Status</th>
            <td>
                <?= $location['is_published'] ? 'Published' : 'Draft' ?>
            </td>
        </tr>

    </table>

    <h4>Description</h4>

    <div class="border rounded p-3 mb-4">
        <?= nl2br(htmlspecialchars($location['description'])) ?>
    </div>

    <h4>Gallery</h4>

    <div class="row">

        <?php while($img=mysqli_fetch_assoc($gallery)): ?>

        <div class="col-md-3 mb-3">

            <img
            src="https://filminginjakarta.com/uploads/gallery/<?= $location['slug'] ?>/<?= $img['image_path'] ?>"
            class="img-fluid rounded">

        </div>

        <?php endwhile; ?>

    </div>

</div>