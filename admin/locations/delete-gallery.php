<?php

include "../includes/auth.php";
include "../includes/db.php";

$id = (int)$_GET['id'];

$img =
mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT
            g.*,
            l.slug
        FROM location_gallery g
        JOIN locations l
            ON l.id = g.location_id
        WHERE g.id='$id'
        LIMIT 1"
    )
);

if(!$img){
    die("Image not found");
}

$path =
"../../uploads/gallery/" .
$img['slug'] .
"/" .
$img['image_path'];

if(file_exists($path)){
    unlink($path);
}

mysqli_query(
    $conn,
    "DELETE FROM location_gallery
    WHERE id='$id'"
);

header(
    "Location: gallery.php?id=".$img['location_id']."&deleted=1"
);
exit;