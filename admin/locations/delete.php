<?php

include "../includes/auth.php";
include "../includes/db.php";

$id = (int)$_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT *
        FROM locations
        WHERE id='$id'
        LIMIT 1"
    )
);

$rootPath = realpath(__DIR__ . "/../../");

if(!$data){
    die("Location not found");
}

/*
|--------------------------------------------------------------------------
| Delete Cover
|--------------------------------------------------------------------------
*/
if(!empty($data['cover_image'])){

    $coverFile =
        $rootPath .
        "/uploads/covers/" .
        $data['cover_image'];

    if(file_exists($coverFile)){
        unlink($coverFile);
    }
}

/*
|--------------------------------------------------------------------------
| Delete Gallery Files
|--------------------------------------------------------------------------
*/
$galleryDir =
    $rootPath .
    "/uploads/gallery/" .
    $data['slug'];

if(is_dir($galleryDir)){

    foreach(
        glob($galleryDir . "/*")
        as $file
    ){

        if(is_file($file)){
            unlink($file);
        }
    }

    rmdir($galleryDir);
}

/*
|--------------------------------------------------------------------------
| Delete Gallery Records
|--------------------------------------------------------------------------
*/
mysqli_query(
    $conn,
    "DELETE FROM location_gallery
    WHERE location_id='$id'"
);

/*
|--------------------------------------------------------------------------
| Delete Location
|--------------------------------------------------------------------------
*/
mysqli_query(
    $conn,
    "DELETE FROM locations
    WHERE id='$id'"
);

header(
    "Location: list.php?deleted=1"
);

exit;