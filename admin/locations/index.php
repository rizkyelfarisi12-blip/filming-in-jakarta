<?php

include "../includes/auth.php";
include "../includes/db.php";

$search = $_GET['search'] ?? '';
$status = $_GET['status'] ?? '';

$where = "WHERE 1=1";

if($search != ''){
    $search = mysqli_real_escape_string($conn,$search);

    $where .= "
        AND (
            name LIKE '%$search%'
            OR location_code LIKE '%$search%'
        )
    ";
}

if($status !== ''){

    $status = (int)$status;

    $where .= "
        AND is_published = $status
    ";
}

$query = mysqli_query(
    $conn,
    "SELECT *
     FROM locations
     $where
     ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Locations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

    body{
        background:#f5f6fa;
    }

    .sidebar{
        position:fixed;
        left:0;
        top:0;

        width:250px;
        height:100vh;

        background:#1f2937;
        padding:25px;
    }

    .sidebar h3{
        color:white;
        margin-bottom:30px;
    }

    .sidebar a{
        display:block;
        color:white;
        text-decoration:none;
        padding:12px 0;
    }

    .main{
        margin-left:250px;
        padding:30px;
    }

    .table-box{
        background:white;
        border-radius:16px;
        padding:20px;
        box-shadow:0 5px 15px rgba(0,0,0,.05);
    }

    .cover-thumb{
        width:80px;
        height:50px;
        object-fit:cover;
        border-radius:6px;
    }

    </style>

    </head>

    <body>
        <?php include "../includes/sidebar.php"; ?>
        <div class="main">
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>Locations</h2>

            <a
                href="create.php"
                class="btn btn-primary">
                + Add Location
            </a>
        </div>

        <div class="table-box">
            <form class="row mb-4">
                <div class="col-md-4">
                    <input
                        type="text"
                        name="search"
                        value="<?= htmlspecialchars($search) ?>"
                        class="form-control"
                        placeholder="Search location...">
                </div>

                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">
                        All Status
                        </option>

                        <option value="1"
                        <?= $status==='1'?'selected':'' ?>>
                        Published
                        </option>

                        <option value="0"
                        <?= $status==='0'?'selected':'' ?>>
                        Draft
                        </option>
                    </select>
                </div>

                <div class="col-md-2">

                    <button
                    class="btn btn-dark w-100"
                    >
                    Filter
                    </button>

                </div>
            </form>

                <table class="table table-bordered align-middle">

                    <thead>

                        <tr>
                        <th>ID</th>
                        <th>Cover</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Gallery</th>
                        <th width="180">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php while($row = mysqli_fetch_assoc($query)): ?>

                            <tr>

                                <td>
                                    <?= $row['id'] ?>
                                </td>

                                <td>

                                    <?php if($row['cover_image']): ?>

                                    <img src="../uploads/covers/<?= $row['cover_image'] ?>"
                                    class="cover-thumb">

                                    <?php endif; ?>

                                </td>

                                <td>
                                <?= htmlspecialchars($row['location_code']) ?>
                                </td>

                                <td>
                                <?= htmlspecialchars($row['name']) ?>
                                </td>

                                <td>
                                <?= htmlspecialchars($row['category']) ?>
                                </td>

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
                                                
                                    <a href="gallery.php?id=<?= $row['id'] ?>"
                                    class="btn btn-info btn-sm">
                                    Gallery
                                    </a>

                                </td>

                                <td>

                                    <a href="edit.php?id=<?= $row['id'] ?>"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                    </a>

                                    <a href="delete.php?id=<?= $row['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete location?')">
                                    Delete
                                    </a>

                                </td>

                            </tr>

                        <?php endwhile; ?>

                    </tbody>

                </table>

            </div>
        </div>
    </body>
</html>