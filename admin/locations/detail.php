<?php

include "../includes/auth.php";
include "../includes/db.php";

$id = (int)$_GET['id'];

$location =
mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT *
        FROM locations
        WHERE id='$id'
        LIMIT 1"
    )
);

if(!$location){
    die("Location not found");
}

$gallery =
mysqli_query(
    $conn,
    "SELECT *
    FROM location_gallery
    WHERE location_id='$id'
    ORDER BY id ASC"
);

$categories =
json_decode(
    $location['category'],
    true
) ?? [];

$facilities =
json_decode(
    $location['facilities'],
    true
) ?? [];

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="main" style="margin-left:250px;padding:30px;">

<h2>
<?= htmlspecialchars($location['name']) ?>
</h2>

<p>
<?= $location['location_code'] ?>
</p>

</div>