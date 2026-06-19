<?php

include "includes/auth.php";
include "includes/db.php";

$keyword =
trim($_GET['keyword'] ?? '');

$category =
trim($_GET['category'] ?? '');

$status =
trim($_GET['status'] ?? '');

$where = [];

if($keyword){

    $where[] =
    "(name LIKE '%$keyword%'
    OR ownership LIKE '%$keyword%'
    OR manager LIKE '%$keyword%')";
}

if($category){

    $where[] =
    "category LIKE '%".$category."%'";
}

if($status !== ''){

    $where[] =
    "is_published='$status'";
}

$sql = "
SELECT
    l.*,
    (
        SELECT COUNT(*)
        FROM location_gallery g
        WHERE g.location_id=l.id
    ) total_images
FROM locations l
";

if(count($where)>0){

    $sql .=
    " WHERE ".implode(
        " AND ",
        $where
    );
}

$sql .= "
ORDER BY name ASC
";

$locations =
mysqli_query(
    $conn,
    $sql
);

include "includes/header.php";
include "includes/sidebar.php";
?>

<div class="main" style="margin-left:250px;padding:30px;">
    <h2 class="mb-4">
    Internal Database
    </h2>

    <form method="GET" class="card mb-4">

        <div class="card-body">
            <div class="row">

                <div class="col-md-4">

                    <input
                    type="text"
                    name="keyword"
                    value="<?= htmlspecialchars($keyword) ?>"
                    class="form-control"
                    placeholder="Search location...">

                </div>

                <div class="col-md-3">
                    <select name="category" class="form-select">

                        <option value="">
                        All Categories
                        </option>

                        <option value="art">
                        Art
                        </option>

                        <option value="culture">
                        Culture
                        </option>

                        <option value="tradition">
                        Tradition
                        </option>

                        <option value="coastal">
                        Coastal
                        </option>

                        <option value="nature">
                        Nature
                        </option>

                        <option value="port">
                        Port
                        </option>

                        <option value="industrial">
                        Industrial
                        </option>

                        <option value="sports">
                        Sports
                        </option>

                        <option value="event">
                        Event
                        </option>

                        <option value="landmark">
                        Landmark
                        </option>

                        <option value="heritage">
                        Heritage
                        </option>

                        <option value="park">
                        Park
                        </option>

                        <option value="cemetery">
                        Cemetery
                        </option>

                        <option value="urban">
                        Urban
                        </option>

                        <option value="business">
                        business
                        </option>

                        <option value="residential">
                        Residential
                        </option>

                        <option value="community">
                        Community
                        </option>

                        <option value="transport">
                        Transport
                        </option>

                        <option value="infrastructure">
                        Infrastructure
                        </option>

                    </select>
                </div>

                <div class="col-md-2">
                    <select name="status" class="form-select">

                        <option value="">
                        All Status
                        </option>

                        <option value="1">
                        Published
                        </option>

                        <option value="0">
                        Draft
                        </option>

                    </select>
                </div>

                <div class="col-md-3">

                    <button class="btn btn-primary">
                    Filter
                    </button>

                    <a href="database.php" class="btn btn-secondary">
                    Reset
                    </a>

                </div>

            </div>
        </div>

    </form>

    <div class="card">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table
                class="table table-hover mb-0"
                >

                    <thead>

                    <tr>

                    <th>ID</th>
                    <th>Cover</th>
                    <th>Name</th>
                    <th>Ownership</th>
                    <th>Manager</th>
                    <th>Status</th>
                    <th>Gallery</th>
                    <th>Action</th>

                    </tr>

                    </thead>


                    <tbody>
                        <?php
                            while(
                                $loc=mysqli_fetch_assoc(
                                $locations
                                )
                            ):
                        ?>

                        <tr>

                            <td><?= $loc['location_code'] ?></td>

                            <td>

                                <!-- <?= $loc['cover_image'] ?>
                                <br> -->

                                <img
                                src="../uploads/covers/<?= $loc['cover_image'] ?>"
                                style="
                                width:80px;
                                height:60px;
                                object-fit:cover;
                                border-radius:8px;
                                border:1px solid red;">

                            </td>

                            <td>

                                <strong><?= htmlspecialchars($loc['name']) ?></strong>

                                <br>

                                <small><?= $loc['slug'] ?></small>

                            </td>

                            <td><?= htmlspecialchars($loc['ownership']) ?></td>

                            <td><?= htmlspecialchars($loc['manager']) ?></td>

                            <td>

                                <?php if($loc['is_published']): ?>

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

                                <span class="badge bg-info">
                                <?= $loc['total_images'] ?>
                                Photos
                                </span>

                            </td>

                            <td>

                                <a href="locations/view.php?id=<?= $loc['id'] ?>"
                                class="btn btn-sm btn-primary">View</a>

                                <a href="locations/edit.php?id=<?= $loc['id'] ?>"
                                class="btn btn-sm btn-warning">Edit</a>

                                <a href="locations/gallery.php?id=<?= $loc['id'] ?>"
                                class="btn btn-sm btn-dark">Gallery</a>

                            </td>

                        </tr>

                        <?php endwhile; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

