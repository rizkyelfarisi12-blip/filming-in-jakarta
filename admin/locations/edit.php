<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include "../includes/auth.php";
include "../includes/db.php";
include "../includes/config.php";

$id = (int)$_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT *
    FROM locations
    WHERE id='$id'
    LIMIT 1"
);

$data = mysqli_fetch_assoc($query);

if(!$data){
    die("Location not found");
}

/*
|--------------------------------------------------------------------------
| UPDATE
|--------------------------------------------------------------------------
*/
function createSlug($text){

    $text = strtolower($text);

    $text = preg_replace(
        '/[^a-z0-9]+/',
        '-',
        $text
    );

    return trim($text,'-');
}

if($_SERVER['REQUEST_METHOD']=="POST"){

    $name = mysqli_real_escape_string(
        $conn,
        $_POST['name']
    );

    $slug = createSlug($name);
    $oldSlug = $data['slug'];
    $newSlug = $slug;

    $ownership = mysqli_real_escape_string(
        $conn,
        $_POST['ownership']
    );

    $district = mysqli_real_escape_string(
        $conn,
        $_POST['district']
    );

    $manager = mysqli_real_escape_string(
        $conn,
        $_POST['manager']
    );

    $description = mysqli_real_escape_string(
        $conn,
        $_POST['description']
    );

    $area_size = mysqli_real_escape_string(
        $conn,
        $_POST['area_size']
    );

    $category = json_encode(
        $_POST['category'] ?? []
    );

    $facilities = json_encode(
        array_filter(
            $_POST['facilities'] ?? []
        )
    );

    $shooting_fee = mysqli_real_escape_string(
        $conn,
        $_POST['shooting_fee'] ?? ''
    );

    $permit_status = mysqli_real_escape_string(
        $conn,
        $_POST['permit_status'] ?? ''
    );

    $drone_allowed = mysqli_real_escape_string(
        $conn,
        $_POST['drone_allowed'] ?? ''
    );

    $map_location = mysqli_real_escape_string(
        $conn,
        $_POST['map_location'] ?? ''
    );

    $is_published =
        (int)$_POST['is_published'];

    $coverImage =
        $data['cover_image'];

        if(
        !empty(
        $_FILES['cover_image']['name']
        )
        ){

            $ext = pathinfo(
                $_FILES['cover_image']['name'],
                PATHINFO_EXTENSION
            );

            $newFile =
            uniqid().".".$ext;

            $uploadPath =
            $_SERVER['DOCUMENT_ROOT'] .
            "/uploads/covers/" .
            $newFile;

            if(
                move_uploaded_file(
                    $_FILES['cover_image']['tmp_name'],
                    $uploadPath
                )
            ){
                $coverImage = $newFile;
            }else{
                die(
                    "Upload failed.<br>" .
                    $uploadPath .
                    "<br>" .
                    print_r(error_get_last(),true)
                );
            }

            if(
            !empty($data['cover_image'])
            &&
            file_exists(
                $_SERVER['DOCUMENT_ROOT']."/uploads/covers/" .
                $data['cover_image']
            )
            ){
            unlink(
                $_SERVER['DOCUMENT_ROOT']."/uploads/covers/" .
                $data['cover_image']
            );
            }

            $coverImage = $newFile;
        }

        $oldSlug = $data['slug'];

        if($oldSlug != $slug){

            $oldDir =
            $_SERVER['DOCUMENT_ROOT'] .
            "/uploads/gallery/" .
            $oldSlug;

            $newDir =
            $_SERVER['DOCUMENT_ROOT'] .
            "/uploads/gallery/" .
            $slug;

            if(is_dir($oldDir)){
                rename($oldDir,$newDir);
            }
        }

        if($oldSlug != $newSlug){

            $oldFolder =
                $_SERVER['DOCUMENT_ROOT'] .
                "/uploads/gallery/" .
                $oldSlug;

            $newFolder =
                $_SERVER['DOCUMENT_ROOT'] .
                "/uploads/gallery/" .
                $newSlug;

            if(is_dir($oldFolder)){

                rename(
                    $oldFolder,
                    $newFolder
                );
            }
        }

    mysqli_query(
        $conn,
        "UPDATE locations SET

        name='$name',
        slug='$slug',
        ownership='$ownership',
        district='$district',
        manager='$manager',
        category='$category',
        description='$description',
        area_size='$area_size',
        shooting_fee='$shooting_fee',
        permit_status='$permit_status',
        drone_allowed='$drone_allowed',
        map_location='$map_location',
        facilities='$facilities',
        cover_image='$coverImage',
        is_published='$is_published'

        WHERE id='$id'"
    );

    header(
        "Location: edit.php?id=".$id."&success=1"
    );
    exit;
}

$selectedCategory =
json_decode(
    $data['category'],
    true
) ?? [];

$facilities =
json_decode(
    $data['facilities'],
    true
) ?? [];

?>

<!DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Edit Location</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/admin.css">

    </head>

    <body>

        <?php include "../includes/sidebar.php"; ?>

        <div style="margin-left:250px;padding:30px;">

            <h2 class="mb-4">
            Edit Location
            </h2>

            <?php if(isset($_GET['success'])): ?>

                <div class="alert alert-success">
                Location updated successfully.
                </div>

            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Name</label>

                        <input type="text" name="name" class="form-control"
                        value="<?= htmlspecialchars($data['name']) ?>" required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Ownership</label>

                        <input
                        type="text"
                        name="ownership"
                        class="form-control"
                        value="<?= htmlspecialchars($data['ownership']) ?>">

                    </div>
                        <div class="col-md-6 mb-3">
                        <label>District</label>

                            <select
                                name="district"
                                class="form-select"
                                required>

                                <option value="">
                                Select District
                                </option>

                                <option value="Jakarta Pusat">
                                Jakarta Pusat
                                </option>

                                <option value="Jakarta Selatan">
                                Jakarta Selatan
                                </option>

                                <option value="Jakarta Barat">
                                Jakarta Barat
                                </option>

                                <option value="Jakarta Timur">
                                Jakarta Timur
                                </option>

                                <option value="Jakarta Utara">
                                Jakarta Utara
                                </option>

                                <option value="Kepulauan Seribu">
                                Kepulauan Seribu
                                </option>

                            </select>
                        </div>

                    <div class="col-md-6 mb-3">

                        <label>Manager</label>

                        <input type="text" name="manager" class="form-control"
                        value="<?= htmlspecialchars($data['manager']) ?>">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Area Size</label>

                        <input
                        type="text" name="area_size" class="form-control"
                        value="<?= htmlspecialchars($data['area_size']) ?>">

                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Shooting Fee</label>
                        <input
                            type="text"
                            name="shooting_fee"
                            class="form-control"
                            value="<?= htmlspecialchars($data['shooting_fee']) ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Permit Status</label>

                        <select name="permit_status" class="form-select">
                            <option value="">Select</option>

                            <option value="Required"
                            <?= $data['permit_status']=='Required' ? 'selected' : '' ?>>
                            Required
                            </option>

                            <option value="Not Required"
                            <?= $data['permit_status']=='Not Required' ? 'selected' : '' ?>>
                            Not Required
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Drone Allowed</label>

                        <select name="drone_allowed" class="form-select">
                            <!-- <option value="">Select</option> -->

                            <option value="1"
                            <?= $data['drone_allowed']=='Yes' ? 'selected' : '' ?>>
                            Yes
                            </option>

                            <option value="0"
                            <?= $data['drone_allowed']=='No' ? 'selected' : '' ?>>
                            No
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Map Location</label>

                        <textarea
                            name="map_location"
                            class="form-control"
                            rows="3"><?= htmlspecialchars($data['map_location']) ?></textarea>
                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Status</label>

                        <select name="is_published" class="form-select">

                        <option value="1"
                        <?= $data['is_published']==1 ? 'selected' : '' ?>>
                        Published
                        </option>

                        <option value="0"
                        <?= $data['is_published']==0 ? 'selected' : '' ?>>
                        Draft
                        </option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Category</label>

                        <?php

                        $allCategories = [

                        "art",
                        "culture",
                        "tradition",

                        "coastal",
                        "nature",

                        "landmark",
                        "heritage",

                        "park",
                        "cemetery",

                        "port",
                        "industrial",

                        "residential",
                        "community",

                        "sports",
                        "event",

                        "transport",
                        "infrastructure",

                        "urban",
                        "business"

                        ];

                        foreach($allCategories as $cat):

                        ?>

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" name="category[]"
                            value="<?= $cat ?>"

                            <?= in_array(
                                $cat,
                                $selectedCategory
                                )
                                ? 'checked'
                                : ''
                            ?>>

                            <label class="form-check-label">
                                <?= ucfirst($cat) ?>
                            </label>

                        </div>

                        <?php endforeach; ?>

                    </div>

                    <div class="col-12 mb-3">

                        <label>Description</label>

                        <textarea name="description" class="form-control" rows="5">
                        <?= htmlspecialchars($data['description']) ?>
                        </textarea>

                    </div>

                    <div class="col-12 mb-3">
                        <label>Facilities</label>
                        <div id="facility-wrapper">

                            <?php foreach($facilities as $facility): ?>

                            <div class="input-group mb-2">

                                <input type="text" name="facilities[]" class="form-control"
                                value="<?= htmlspecialchars($facility) ?>">

                                <button type="button" class="btn btn-danger removeFacility">
                                X
                                </button>

                            </div>

                            <?php endforeach; ?>

                        </div>

                        <button type="button" id="addFacility" class="btn btn-secondary btn-sm">
                        + Add Facility
                        </button>

                    </div>

                </div>

                <div class="col-12 mb-4">
                    <label>Current Cover</label>
                    <br>

                    <?php if(!empty($data['cover_image'])): ?>

                    <img
                    src="../../uploads/covers/<?= $data['cover_image'] ?>"
                    style="width:300px; border-radius:12px;">

                    <?php else: ?>

                    <p>No Cover Image</p>

                    <?php endif; ?>

                </div>

                <div class="col-12 mb-4">
                    <label>Replace Cover Image</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                </div>

                <button class="btn btn-primary" type="submit">
                Update Location
                </button>

            </form>

        </div>

        <script>

        document
        .getElementById("addFacility")
        .addEventListener("click",function(){

            let div =
            document.createElement("div");

            div.className =
            "input-group mb-2";

            div.innerHTML = `
                <input
                type="text"
                name="facilities[]"
                class="form-control">

                <button
                type="button"
                class="btn btn-danger removeFacility">
                X
                </button>
            `;

            document
            .getElementById(
                "facility-wrapper")
            .appendChild(div);
        });

        document.addEventListener(
        "click",
        function(e){

        if(e.target.classList.contains(
                "removeFacility"
            )
            ){e.target.parentElement.remove();}

        });

        </script>

    </body>
</html>