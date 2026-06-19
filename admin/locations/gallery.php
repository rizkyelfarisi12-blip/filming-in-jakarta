<?php

include "../includes/auth.php";
include "../includes/db.php";
include "../includes/functions.php";
include "../includes/config.php";

$id = (int)$_GET['id'];

$location =
mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM locations
        WHERE id='$id'"
    )
);

if(!$location){
    die("Location not found");
}

$slug = $location['slug'];

$galleryDir =
dirname(__DIR__,2)
. "/uploads/gallery/"
. $slug;

if(!is_dir($galleryDir)){
    mkdir($galleryDir,0777,true);
}

if(
    $_SERVER['REQUEST_METHOD']=="POST"
    &&
    isset($_FILES['gallery'])
){

    foreach(
        $_FILES['gallery']['tmp_name']
        as $key=>$tmp
    ){

        if(empty($tmp)){
            continue;
        }

        $ext =
        strtolower(
            pathinfo(
                $_FILES['gallery']['name'][$key],
                PATHINFO_EXTENSION
            )
        );

        $fileName =
        uniqid().".".$ext;

        if(
            move_uploaded_file(
                $tmp,
                $galleryDir."/".$fileName
            )
        ){
            mysqli_query(
                $conn,
                "INSERT INTO location_gallery
                (
                    location_id,
                    image_path
                )
                VALUES
                (
                    '$id',
                    '$fileName'
                )"
            );
        }
    }

    header(
        "Location: gallery.php?id=".$id
    );
    exit;
}

$images =
mysqli_query(
    $conn,
    "SELECT *
    FROM location_gallery
    WHERE location_id='$id'
    ORDER BY id DESC"
);

$gallery =
mysqli_query(
$conn,
"SELECT *
FROM location_gallery
WHERE location_id='$id'
ORDER BY id ASC"
);

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>
        Gallery Manager
        </title>

        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/admin.css">
    </head>
    <body>
        <div class="main" style="margin-left:250px;padding:30px;">

            <h2>
                Gallery
                <br>
                <small>
                <?= htmlspecialchars($location['name']) ?>
                </small>
            </h2>

            <hr>

            <form method="POST" enctype="multipart/form-data" class="mb-4">

                <label class="form-label">
                Upload Gallery Images
                </label>

                <input type="file" name="gallery[]" multiple accept="image/*" class="form-control">

                <button class="btn btn-primary mt-3">
                Upload
                </button>

            </form>

            <div class="row">
                <?php while($img=mysqli_fetch_assoc($images)): ?>
                <div class="col-md-3 mb-4">

                    <div class="card">

                        <img
                        src="../../uploads/gallery/<?= $slug ?>/<?= $img['image_path'] ?>"
                        class="card-img-top" style=" height:220px; object-fit:cover;">

                        <div class="card-body text-center">

                            <a
                            href="delete-gallery.php?id=<?= $img['id'] ?>&location=<?= $id ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete image?')">
                            Delete
                            </a>

                        </div>

                    </div>

                </div>
                <?php endwhile; ?>
            </div>

        </div>
    </body>
</html>