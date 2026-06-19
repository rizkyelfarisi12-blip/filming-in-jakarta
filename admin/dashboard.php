<?php

include "includes/auth.php";
include "includes/db.php";
include "includes/config.php";

$totalLocations =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) total FROM locations"
));

$totalPublished =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) total
FROM locations
WHERE is_published=1"
));

$totalUsers =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) total FROM users"
));

include "includes/header.php";
include "includes/sidebar.php";
?>

<div class="content">

    <h2 class="mb-4">
    Dashboard
    </h2>

    <div class="row">

        <div class="col-md-4">

            <div class="stat-card">

                <h3>
                <?= $totalLocations['total']; ?>
                </h3>

                <p>Total Locations</p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stat-card">

                <h3>
                <?= $totalPublished['total']; ?>
                </h3>

                <p>Published</p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stat-card">

                <h3>
                <?= $totalUsers['total']; ?>
                </h3>

                <p>Users</p>

            </div>

        </div>

    </div>

</div>

</body>
</html>