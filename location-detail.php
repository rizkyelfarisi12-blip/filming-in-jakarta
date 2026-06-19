<?php

include "admin/includes/db.php";

$slug = $_GET['slug'] ?? '';

$location = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT *
        FROM locations
        WHERE slug='".mysqli_real_escape_string($conn,$slug)."'
        AND is_published=1
        LIMIT 1"
    )
);

if(!$location){
    die("Location not found");
}

$gallery = mysqli_query(
    $conn,
    "SELECT *
    FROM location_gallery
    WHERE location_id='".$location['id']."'
    ORDER BY sort_order ASC,id ASC"
);

$facilities =
json_decode(
    $location['facilities'],
    true
) ?? [];

$categories =
json_decode(
    $location['category'],
    true
) ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>
    Filming In Jakarta -
    <?= htmlspecialchars($location['name']) ?>
    </title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description"
     content="Jakarta is opening its doors to filmmakers, advertisers, and creative content producers seeking unique and versatile filming locations across the vibrant capital city. This initiative not only showcases a wide range of iconic urban spots but also offers exclusive access to valuable assetsWith comprehensive facilities and streamlined permits, your production will benefit from unmatched convenience and professionalism. owned by Regional-Owned Enterprises (BUMD) under the DKI Jakarta Provincial Government, Discover filming locations in Jakarta, production services, permits, crews, studios, and cinematic destinations for international film, TV, and commercial productions.">
 <meta name="keywords" content="Filming, Filming Location, Filming In Jakarta, Filming Index">
 <meta name="author" content="Jakarta Film Commission">

 <!-- Icon -->
 <link rel="icon" type="image/x-icon" href="assets\icon\logo&icon.ico">
 <link rel="shortcut icon" href="assets\icon\logo&icon.ico">
 <link href="assets\icon\logo&icon.ico" rel="apple-touch-icon">
 
 <!-- <link rel="preload" href="locations.json" as="fetch" crossorigin> -->
 <link rel="preload" as="image" href="assets/cover/banner.webp">
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
     rel="stylesheet">


 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <!-- internal resources -->
 <link rel="stylesheet" href="assets/css/animate.css">
 <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
 <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
 <link rel="stylesheet" href="assets/css/flaticon.css">
 <link rel="stylesheet" href="assets/css/style.css">
 <link rel="stylesheet" href="assets/css/custom-style.css">

 <!-- Link Swiper's CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
 <!-- Google tag (gtag.js) -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=G-V0S9GRM6LS"></script>
 <script>
     window.dataLayer = window.dataLayer || [];

     function gtag() {
         dataLayer.push(arguments);
     }
     gtag('js', new Date());

     gtag('config', 'G-V0S9GRM6LS');
 </script>

</head>
<body>
    <!-- LIGHTBOX HTML -->
    <div id="lightbox-modal">
        <span class="close-btn">
            &times;
        </span>
        <span class="nav-arrow prev">
            &#10094;
        </span>
        <img src="">
        <span class="nav-arrow next">
            &#10095;
        </span>
        <div class="image-counter"></div>

    </div>

    <div id="navbar"></div>

    <section class="hero-wrap hero-wrap-2 hero-background">
    
        <div class="container ">
            <div class="row no-gutters slider-text  align-items-end justify-content-center other-hero ">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="https://filminginjakarta.com">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span><a
                                href="https://filminginjakarta.com/location-list.html">location list </a><i
                                class="fa fa-chevron-right"></i><a> location detail </a></span></p>
                    <h1 class="mb-0 bread">
                    <?= htmlspecialchars($location['name']) ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">

            <!-- BACK -->
            <div class="back-wrapper">
                <a href="location-list.php" class="back-btn">
                    <span class="back-icon">←</span>
                    <span>Back to List</span>
                </a>
            </div>

            <!-- TITLE -->
            <div class="text-center text-center mb-4">
                <h2
                class="title-asset"
                style="text-align:left;padding-left:10px;padding-bottom:20px;"
                >
                <?= htmlspecialchars($location['name']) ?>
                </h2>
                <div class="row align-items-start">

            <!-- LEFT: DESCRIPTION 700 max letter-->    
            <div class="col-md-8">
                <p
                class="desc-asset"
                style="color:#666;line-height:1.7;text-align:justify;"
                >
                <?= nl2br(htmlspecialchars($location['description'])) ?>
                </p>
            </div>

            <!-- RIGHT: INFO BOX -->
            <div class="col-md-4">
                <div class="card-detail">
                    <ul style="padding-left:15px; margin:0;">

                        <li>
                        <strong style="color:#ff5a1f;">
                        Area Size
                        </strong>
                        <br>
                        <?= htmlspecialchars($location['area_size']) ?>
                        </li>

                        <li style="margin-top:10px;">
                        <strong style="color:#ff5a1f;">
                        Facilities
                        </strong>
                        <br>
                        <?= implode(", ",$facilities) ?>

                        </li>

                    </ul>
                </div>
            </div>
        </div>

        </div>

       <!-- GALLERY -->
        <div id="gallery" class="gallery-grid">

        <?php while($img=mysqli_fetch_assoc($gallery)): ?>

        <div class="gallery-item">

        <img
        src="uploads/gallery/<?= $location['slug'] ?>/<?= $img['image_path'] ?>"
        class="gallery-img loaded"
        data-full="uploads/gallery/<?= $location['slug'] ?>/<?= $img['image_path'] ?>"
        loading="lazy">

        </div>

        <?php endwhile; ?>

        </div>

        
        <!-- MAP -->
        <div class="map-section mt-5">
            <div class="map-placeholder"
                id="map-placeholder">
                Click to Load Map
            </div>
            <iframe
            id="map-frame"
            src="<?= htmlspecialchars($location['map_location']) ?>"
            width="100%"
            height="400"
            loading="lazy"
            style="display:none;">
            </iframe>

        </div>

    </div>
    </section>
    <!-- Floating WhatsApp Button & footer -->
    <div id="floating-wa"></div>
    <div id="footer"></div>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/jquery.animateNumber.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/scrollax.min.js"></script>

    <script src="assets/js/main.js"></script>
    <!-- <script src="https://filminginjakarta.com/assets/js/lightbox.js"></script> -->

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>
<script>
    // =========================
    // LIGHTBOX
    // =========================

    function initLightbox(){

        const images =
            document.querySelectorAll(".gallery-img");

        const modal =
            document.getElementById("lightbox-modal");

        const modalImg =
            modal.querySelector("img");

        const closeBtn =
            modal.querySelector(".close-btn");

        const nextBtn =
            modal.querySelector(".next");

        const prevBtn =
            modal.querySelector(".prev");

        const counter =
            modal.querySelector(".image-counter");

        let currentIndex = 0;

        function showImage(index){

            modalImg.src =
                images[index].dataset.full;

            counter.textContent =
                (index + 1) +
                " / " +
                images.length;
        }

        images.forEach((img,index) => {

            img.addEventListener("click", () => {

                currentIndex = index;

                modal.style.display = "block";

                showImage(index);
            });
        });

        closeBtn.onclick = () => {

            modal.style.display = "none";
        };

        nextBtn.onclick = () => {

            currentIndex =
                (currentIndex + 1)
                % images.length;

            showImage(currentIndex);
        };

        prevBtn.onclick = () => {

            currentIndex =
                (currentIndex - 1 + images.length)
                % images.length;

            showImage(currentIndex);
        };

        document.addEventListener("keydown", (e) => {

            if(modal.style.display === "block"){

                if(e.key === "Escape"){
                    modal.style.display = "none";
                }

                if(e.key === "ArrowRight"){
                    nextBtn.click();
                }

                if(e.key === "ArrowLeft"){
                    prevBtn.click();
                }
            }
        });
    }

    document.querySelectorAll(".gallery-img").forEach(img => {

        if(img.complete){

            img.classList.add("loaded");

            img.parentElement.style.animation = "none";

        }else{

            img.onload = function(){

                img.classList.add("loaded");

                img.parentElement.style.animation = "none";
            };
        }

    });

    document.addEventListener(
        "DOMContentLoaded",
        function(){

            initLightbox();

        }
    );

    document
    .getElementById("map-placeholder")
    .addEventListener("click", function(){

        document.getElementById("map-frame")
        .style.display = "block";

        this.style.display = "none";

    });
</script>
</html>
