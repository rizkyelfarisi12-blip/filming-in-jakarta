<?php

include "../includes/auth.php";
include "../includes/db.php";
include "../includes/functions.php";
include "../includes/config.php";

$message = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = trim($_POST['name']);
        if(empty($name)){
        die("Nama lokasi wajib diisi");
    }

    $slug = createSlug($name);

    $slug = generateUniqueSlug(
        $conn,
        $slug
    );

    $ownership = trim($_POST['ownership']);

    $district = trim($_POST['district']);

    $manager = trim($_POST['manager']);

    $category = json_encode(
        $_POST['category'] ?? []
    );
    
    $description = trim($_POST['description']);

    $area_size = trim($_POST['area_size']);

    $facilities = json_encode(
        array_filter($_POST['facilities'] ?? [])
    );
    $is_published = (int)$_POST['is_published'];

    $permit_status =
    trim($_POST['permit_status']);

    $drone_allowed =
    (int)$_POST['drone_allowed'];

    $shooting_fee =
    trim($_POST['shooting_fee']);

    $map_location =
    trim($_POST['map_location']);

    // generate code
    $last = mysqli_query(
        $conn,
        "SELECT id FROM locations ORDER BY id DESC LIMIT 1"
    );

    $lastRow = mysqli_fetch_assoc($last);

    $nextNumber = $lastRow
        ? ($lastRow['id'] + 1)
        : 1;

    $location_code =
        "JFC-" .
        str_pad($nextNumber,4,'0',STR_PAD_LEFT);

    $coverImage = "";

    if(!empty($_FILES['cover_image']['name'])){

        $ext = pathinfo(
            $_FILES['cover_image']['name'],
            PATHINFO_EXTENSION
        );

        $coverImage =
            uniqid() . "." . $ext;

        $allowed = [
            "jpg",
            "jpeg",
            "png",
            "webp"
        ];

        if(
            !in_array(
                strtolower($ext),
                $allowed
            )
        ){
            die("Format gambar tidak valid");
        }

        $uploadPath =
            dirname(__DIR__, 2) .
            "/uploads/covers/" .
            $coverImage;

        if(
            !move_uploaded_file(
                $_FILES['cover_image']['tmp_name'],
                $uploadPath
            )
        ){
            die(
                "Upload gagal ke: " .
                $uploadPath
            );
        }
    }

    $stmt = mysqli_prepare(
    $conn,
        "INSERT INTO locations
        (
            location_code,
            name,
            slug,
            ownership,
            district,
            manager,
            category,
            description,
            area_size,
            facilities,
            map_location,
            permit_status,
            drone_allowed,
            shooting_fee,
            cover_image,
            is_published
        )
        VALUES
        (
            ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
        )"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssssssissi",
        $location_code,
        $name,
        $slug,
        $ownership,
        $district,
        $manager,
        $category,
        $description,
        $area_size,
        $facilities,
        $map_location,
        $permit_status,
        $drone_allowed,
        $shooting_fee,
        $coverImage,
        $is_published
    );

    if(mysqli_stmt_execute($stmt)){

        $newId = mysqli_insert_id($conn);
        
        $galleryFolder =
            "../../uploads/gallery/" . $slug;

        if(!is_dir($galleryFolder)){

            mkdir(
                $galleryFolder,
                0777,
                true
            );
        }

        header("Location: edit.php?id=".$newId);
        exit;

    }else{

        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Add Location</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/admin.css">

    </head>

    <body>

        <?php include "../includes/sidebar.php"; ?>

        <div class="main" style="margin-left:250px;padding:30px;">

            <h2 class="mb-4">
            Add Location
            </h2>

            <div class="card">

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="mb-2">Category</label>
                                <div class="border rounded p-3">
                                    <div class="row">

                                        <div class="col-6">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="art">
                                                <label class="form-check-label">Art</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="culture">
                                                <label class="form-check-label">Culture</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="tradition">
                                                <label class="form-check-label">Tradition</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="coastal">
                                                <label class="form-check-label">Coastal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="nature">
                                                <label class="form-check-label">Nature</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="port">
                                                <label class="form-check-label">Port</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="industrial">
                                                <label class="form-check-label">Industrial</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="sports">
                                                <label class="form-check-label">Sports</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="event">
                                                <label class="form-check-label">Event</label>
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="landmark">
                                                <label class="form-check-label">Landmark</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="heritage">
                                                <label class="form-check-label">Heritage</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="park">
                                                <label class="form-check-label">Park</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="cemetery">
                                                <label class="form-check-label">Cemetery</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="urban">
                                                <label class="form-check-label">Urban</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="business">
                                                <label class="form-check-label">Business</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="residential">
                                                <label class="form-check-label">Residential</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="community">
                                                <label class="form-check-label">Community</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="transport">
                                                <label class="form-check-label">Transport</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="infrastructure">
                                                <label class="form-check-label">Infrastructure</label>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Ownership</label>
                                <input type="text" name="ownership" class="form-control">
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
                                <input type="text" name="manager" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Area Size</label>
                                <input type="text" name="area_size" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">

                            <label>Permit Status</label>

                            <select
                            name="permit_status"
                            class="form-select"
                            >
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Difficult">Difficult</option>
                            <option value="Restricted">Restricted</option>
                            </select>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label>Drone Allowed</label>

                            <select
                            name="drone_allowed"
                            class="form-select"
                            >
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                            </div>

                            <div class="col-md-12 mb-3">
                            <label>Shooting Fee</label>

                            <input
                            type="text"
                            name="shooting_fee"
                            class="form-control"
                            placeholder="Example: Free / IDR 5,000,000 per day"
                            >
                            </div>

                            <div class="col-md-12 mb-3">
                            <label>Google Maps URL</label>

                            <input
                            type="text"
                            name="map_location"
                            class="form-control"
                            placeholder="https://maps.google.com/..."
                            >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Status</label>

                                <select name="is_published" class="form-select">

                                    <option value="1">
                                    Published
                                    </option>

                                    <option value="0">
                                    Draft
                                    </option>

                                </select>

                            </div>

                            <div class="col-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="5"></textarea>
                            </div>

                            <div class="col-12 mb-3">

                                <label>Facilities</label>

                                <div id="facility-wrapper">
                                    <div class="input-group mb-2">

                                        <input type="text" name="facilities[]" class="form-control">

                                    </div>
                                </div>

                                <button type="button" id="addFacility" class="btn btn-secondary btn-sm">
                                + Add Facility
                                </button>

                            </div>

                                <div class="col-12 mb-4">

                                    <label>Cover Image</label>

                                    <input
                                    type="file"
                                    name="cover_image"
                                    class="form-control"
                                    accept="image/*">

                                </div>

                            </div>

                        <button class="btn btn-primary" type="submit">
                        Save Location
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </body>
    <script>

        document
        .getElementById("addFacility")
        .addEventListener("click",function(){

            let div = document.createElement("div");

            div.className =
                "input-group mb-2";

            div.innerHTML = `
                <input
                    type="text"
                    name="facilities[]"
                    class="form-control"
                >

                <button
                    type="button"
                    class="btn btn-danger removeFacility"
                >
                    X
                </button>
            `;

            document
            .getElementById("facility-wrapper")
            .appendChild(div);
        });

        document.addEventListener("click",function(e){

            if(
                e.target.classList.contains(
                    "removeFacility"
                )
            ){
                e.target.parentElement.remove();
            }

        });

    </script>
</html>