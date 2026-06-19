<?php
include "admin/includes/db.php";

$featured = mysqli_query(
    $conn,
    "SELECT *
    FROM locations
    WHERE is_published = 1
    ORDER BY id DESC
    LIMIT 3"
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description"
     content="Jakarta is opening its doors to filmmakers, advertisers, and creative content producers seeking unique and versatile filming locations across the vibrant capital city. This initiative not only showcases a wide range of iconic urban spots but also offers exclusive access to valuable assetsWith comprehensive facilities and streamlined permits, your production will benefit from unmatched convenience and professionalism. owned by Regional-Owned Enterprises (BUMD) under the DKI Jakarta Provincial Government, Discover filming locations in Jakarta, production services, permits, crews, studios, and cinematic destinations for international film, TV, and commercial productions.">
 <meta name="keywords" content="Filming, Filming Location, Filming In Jakarta, Filming Index">
 <meta name="author" content="Jakarta Film Commission">
 <meta name="google-site-verification" content="NQZUOjo03LMHyMKLijsZwVm2vet9p3f1X_jgroXkUGo" />

 <!-- Icon -->
 <link rel="icon" type="image/x-icon" href="assets\icon\logo&icon.ico">
 <link rel="shortcut icon" href="assets\icon\logo&icon.ico">
 <link href="assets\icon\logo&icon.ico" rel="apple-touch-icon">

 <!-- Eksternal Resources -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

 <!-- Link Swiper's CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
 <!-- Google tag (gtag.js) -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=G-V0S9GRM6LS"></script>

 <!--  Internal Resources -->
 <link rel="stylesheet" href="assets/css/animate.css">
 <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
 <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
 <link rel="stylesheet" href="assets/css/flaticon.css">
 <link rel="stylesheet" href="assets/css/style.css">
 <link rel="stylesheet" href="assets/css/custom-style.css">

</head>

<body>
    <div id="navbar"></div>


    <!-- Video Modal -->
<div id="videoModal" class="video-modal" onclick="outsideClick(event)">
  <div class="video-content">
    <span class="close-video" onclick="closeVideo()">&times;</span>

    <iframe id="youtubeFrame"
        width="100%" height="400"
        src=""
        frameborder="0"
        allow="autoplay; encrypted-media"
        allowfullscreen>
    </iframe>

  </div>
</div>

<!-- Hero Section -->
    <div class="hero-wrap js-fullheight" 
    style="background-image: linear-gradient(to top, rgba(0,0,0,0.70), rgba(0,0,0,0.30)), 
            url('assets/cover/banner.webp');">
    
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-lg-10 col-md-10 col-sm-7 ftco-animate hero">                
                <h1 class="mb-4">Bring Your Story to Jakarta’s Best Filming Spots!</h1>
                <p class="caps">Complete facilities and iconic views ready to support your production</p>
            </div>
            <a href="javascript:void(0)" onclick="openVideo()">
                <span class="icon-video d-flex align-items-center justify-content-center mb-4">
                    <span class="fa fa-video-camera"></span>
                </span>
            </a>
        </div>
    </div>
    </div>

    <!-- About us -->
    <section class="ftco-section" style="padding:60px 0;">
        <div class="container">
            <div class="row align-items-center">
                <!-- IMAGE LEFT -->
                <div class="col-md-4 ftco-animate item">
                    <div style="border-radius:16px; overflow:hidden; box-shadow:0 10px 25px rgba(0,0,0,0.15);">
                        <img src="assets/cover/about_us.webp" 
                            style="width: 100%; height:300px; object-fit:cover;">
                    </div>
                </div>

                <!-- TEXT RIGHT -->
                <div class="col-md-8 ftco-animate item">
                    <span style="color:#ff5a1f; font-weight:600; padding-top: 10px;">FILMING IN JAKARTA</span>
                    <h2 style="font-weight:700;">
                        Discover strategic shooting locations and world-class facilities supported at Jakarta
                    </h2>
                    <p style="color:#777;">
                        Jakarta is opening its doors to filmmakers, advertisers, and creative content producers seeking unique and versatile filming locations across the vibrant capital city.
                    </p>

                    <a href="about-us.html" 
                    class="btn btn-primary" 
                    style="border-radius:8px; padding:10px 20px;">
                    Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Locations -->
    <section class="ftco-section" style="padding-top:30px;">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 style="font-weight:600;">Featured Location</h4>
                <a href="location-list.html" style="color:#ff5a1f; font-weight:600;">See More</a>
            </div>
            
            <!-- Featured Location Cards -->
            <div class="row">

            <?php while($item = mysqli_fetch_assoc($featured)): ?>

            <?php
            $categories = json_decode($item['category'], true) ?? [];
            $category = !empty($categories)
                ? ucfirst($categories[0])
                : 'Location';

            $cover =
                !empty($item['cover_image'])
                ? "uploads/covers/".$item['cover_image']
                : "assets/cover/default.webp";
            ?>

            <div class="col-md-4 item">
                <a href="location-detail.php?slug=<?= urlencode($item['slug']) ?>">
                    <div class="project-wrap">

                        <span class="tag">
                            <?= htmlspecialchars($category) ?>
                        </span>
                        <div class="img-wrap">
                            <div class="img"
                            style="background-image:url('<?= $cover ?>')">
                            </div>

                        </div>

                        <div class="location-box">

                            <h5 style="color:white;font-weight:bold;">
                                <?= htmlspecialchars($item['name']) ?>
                            </h5>
                            <small>
                                <i class="fa fa-map-marker"></i>
                                <?= htmlspecialchars($item['district']) ?>
                            </small>
                            <!-- <small>
                                <?= htmlspecialchars($item['ownership']) ?>
                            </small> -->

                        </div>
                    </div>

                </a>
            </div>
            <?php endwhile; ?>
            </div>

        </div>
    </section>

    <!-- Contact Card -->
    <section style="padding:40px 0;">
        <div class="container ftco-animate item">
            <div style="position:relative; border-radius:12px; overflow:hidden;">

                <img src="assets/cover/banner_kecil.webp"
                    style="width:100%; height:180px; object-fit:cover; object-position: center 80%;">

                <div style="position:absolute; top:0; left:0; width:100%; height:100%; 
                            padding-top: 5px; padding-bottom: 0px; padding-left: 20px; padding-right: 20px;
                            background:rgba(0,0,0,0.5); display:flex; flex-direction:column;
                            justify-content:center; align-items:center; color:white; text-align:center;">

                    <h4 style="font-weight:600; color: #fff;">
                        Your Perfect Filming Location Awaits – Let’s Talk!
                    </h4>
                    <p style="font-size:14px;">
                        Connect with our team for personalized support and location scouting.
                    </p>

                    <a href="contact-us.html"
                    class="btn btn-primary"
                    style="margin-top:10px; border-radius:8px;">
                    Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Jakarta Film Summit -->
    <section class="ftco-section" style="position:relative; overflow:hidden;">

        <!-- Background -->
        <div style="
            position:absolute;
            top:0; left:0;
            width:100%; height:100%;
            background:url('https://lh3.googleusercontent.com/aida-public/AB6AXuCIxrWnxOIj2l_K5mMh7ElGSjTxtskvPXKzQ5IKHTu6IQdSraeP6wBPl4zRnF_uPCuP6kS3MGNF9oKUGDnOeHIBPJMZXApXC4UK_JbIJXyp394u-mktK7skZ9alMTBE32bYF2OddiydrFB-wwAiSCjURBK7NwZ6Wlqlzey_FUttvUOeTcB9uZbcOLH-x5JPDepi2duS_1VotXNB8mAbgqRJ0Zlek_SfZNtCMHKj8abdigp7GOPmnC1skqYZvNUwkrzl05vzTdw9EPQ') center/cover no-repeat;
            filter: blur(6px);
            transform: scale(1.05);">
        </div>

        <!-- Overlay -->
        <div style="
            position:absolute;
            top:0; left:0;
            width:100%; height:100%;
            background:rgba(21,28,39,0.5);">
        </div>

        <div class="container" style="position:relative;">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div style="
                        background:white;
                        border-radius:12px;
                        padding:40px;
                        box-shadow:0 10px 30px rgba(0,0,0,0.2);">
                        <div class="row align-items-center">

                            <!-- LEFT CONTENT -->
                            <div class="col-md-7">
                                <span style="color:#ff5a1f; font-weight:600; letter-spacing:2px;">
                                    Upcoming</span>

                                <h2 style="font-weight:700; margin-top:10px;">
                                    Jakarta <br> Film Summit</h2>

                                <p style="color:#ff5a1f; font-weight:600;">
                                    Elevating the Epicenter of Asian Cinema</p>

                                <p style="color:#666;">
                                    Your Ultimate Gateway to Seamless Production, World-Class Locations, and Exclusive B2B Networking in Southeast Asia.</p>

                                <a href="jfs/jfs.html" class="btn btn-primary">
                                    Learn More</a>
                            </div>

                            <!-- RIGHT CARD -->
                            <div class="col-md-5 text-center">
                                <div style="
                                    background:#f5f5f5;
                                    padding:25px;
                                    border-radius:12px;
                                    display:inline-block;
                                    margin-top:20px;">

                                    <div style="
                                        width:50px;
                                        height:50px;
                                        background:#000;
                                        color:white;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        border-radius:8px;
                                        margin:0 auto 15px;">
                                        <i class="fa fa-calendar"></i>
                                    </div>

                                    <h5 style="font-weight:600;">Coming Soon</h5>
                                    <p style="margin:0; color:#FF6501;">
                                        <strong>2026</strong>
                                    </p>
<!-- 
                                    <span style="color:#ff5a1f; font-weight:600;">
                                        Coming Soon
                                    </span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>
<script>
     window.dataLayer = window.dataLayer || [];

     function gtag() {
         dataLayer.push(arguments);
     }
     gtag('js', new Date());

     gtag('config', 'G-V0S9GRM6LS');

     
    // fetch('card-location.json')
    // .then(res => res.json())
    // .then(data => {

    //     const container = document.getElementById('featured-list');

    //     const featured = data.slice(0, 3);
    //     featured.forEach(item => {

    //         const col = document.createElement('div');
    //         col.className = 'col-md-4 item';
    //         col.setAttribute('data-category', item.category);

    //         col.innerHTML = `
    //         <a href="${item.link}">
    //             <div class="project-wrap">

    //                 <span class="tag">
    //                     ${item.category}
    //                 </span>

    //                 <div class="img-wrap">
    //                     <div class="img"
    //                         style="background-image:url(${item.image})">
    //                     </div>
    //                 </div>

    //                 <div class="location-box">
    //                     <h5 style="color:white;font-weight:bold;">
    //                         ${item.title}
    //                     </h5>

    //                     <small>
    //                         <i class="fa fa-map-marker"></i>
    //                         ${item.location}
    //                     </small>
    //                 </div>

    //             </div>
    //         </a>
    //     `;

    //         container.appendChild(col);
    //     });
    // });

    function openVideo() {
        const modal = document.getElementById("videoModal");
        const iframe = document.getElementById("youtubeFrame");

        iframe.src = "https://www.youtube.com/embed/fDxVZR6TZAQ?autoplay=1";
        modal.style.display = "block";
    }

    function closeVideo() {
        const modal = document.getElementById("videoModal");
        const iframe = document.getElementById("youtubeFrame");

        modal.style.display = "none";
        iframe.src = ""; // stop video saat ditutup
    }
  
    document.addEventListener("keydown", function(e) {
        if (e.key === "Escape") {
            closeVideo();
        }
    });

    function outsideClick(event) {
    if (event.target.id === "videoModal") {
        closeVideo();
        }
    }

    function outsideClick(event) {
    const content = document.querySelector(".video-content");

    // kalau klik di luar box video
    if (!content.contains(event.target)) {
        closeVideo();
        }
    }
</script>


</html>
