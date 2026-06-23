<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Membership - Filming in Jakarta</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

 <!-- Icon -->
 <link rel="icon" type="image/x-icon" href="assets\icon\logo&icon.ico">
 <link rel="shortcut icon" href="assets\icon\logo&icon.ico">
 <link href="assets\icon\logo&icon.ico" rel="apple-touch-icon">

 <!-- Link Swiper's CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
 <!-- Google tag (gtag.js) -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=G-V0S9GRM6LS"></script>

 <!--  Internal Resources -->
 <link rel="stylesheet" href="assets/css/flaticon.css">
 <link rel="stylesheet" href="assets/css/style.css">
 <!-- <link rel="stylesheet" href="assets/css/custom-style.css"> -->

<style>

body{
    background:#f8f9fa;
    font-family:Arial, Helvetica, sans-serif;
}

/* HERO */

.hero{
    background:
    linear-gradient(
    rgba(0,0,0,.65),
    rgba(0,0,0,.65)),
    url('assets/cover/promotion.webp');

    background-size:cover;
    background-position:center;

    min-height:550px;

    display:flex;
    align-items:center;
}

.hero h1{
    color:#fff;
    font-size:56px;
    font-weight:700;
}

.hero p{
    color:#fff;
    font-size:20px;
    max-width:700px;
}

.btn-orange{
    background:#ff5a1f;
    border:none;
    color:#fff;
    padding:14px 30px;
    border-radius:10px;
    font-weight:600;
}

.btn-orange:hover{
    background:#e94c13;
    color:#fff;
}

/* SECTION */

.section-title{
    font-size:34px;
    font-weight:700;
    margin-bottom:15px;
}

.section-subtitle{
    color:#666;
    max-width:700px;
    margin:auto;
}

/* BENEFITS */

.benefit-card{
    background:#fff;
    border-radius:20px;
    padding:30px;
    height:100%;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
    transition:.3s;
}

.benefit-card:hover{
    transform:translateY(-5px);
}

.benefit-card i{
    color:#ff5a1f;
    font-size:40px;
    margin-bottom:20px;
}

/* MEMBERSHIP TYPE */

.package-card{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.package-header{
    background:#ff5a1f;
    color:white;
    padding-top: 8px;
    padding-bottom:1px;
    text-align:center;
}

.package-price{
    font-size:40px;
    font-weight:bold;
}

.package-body{
    padding:30px;
}

.package-body ul{
    padding-left:20px;
}

.package-body li{
    margin-bottom:10px;
}

/* CTA */

.cta{
    background:#111;
    color:#fff;
    padding:80px 0;
}

.cta h2{
    font-size:42px;
    font-weight:700;
}

/* FORM */

.register-card{
    background:#fff;
    border-radius:20px;
    padding:40px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

footer{
    background:#111;
    color:#aaa;
    padding:30px 0;
    text-align:center;
}

/* MEMBERSHIP SELECTOR */

.membership-badge{
    background:#ff5a1f;
    color:#fff;
    padding:8px 16px;
    border-radius:30px;
    font-size:12px;
    font-weight:700;
    letter-spacing:1px;
}

.membership-option{
    background:#fff;
    border-radius:20px;
    padding:35px;
    height:100%;
    border:1px solid #eee;
    transition:.35s ease;
    position:relative;
    overflow:hidden;
}

.membership-option:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.12);
}

.membership-option::before{
    content:"";
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background:
    linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,.35),
        transparent
    );
    transition:.8s;
}

.membership-option:hover::before{
    left:100%;
}

.membership-icon{
    width:80px;
    height:80px;
    margin:auto;
    margin-bottom:20px;
    border-radius:50%;
    background:#fff2ed;
    display:flex;
    align-items:center;
    justify-content:center;
}

.membership-icon i{
    font-size:34px;
    color:#ff5a1f;
}

.membership-option h4{
    font-weight:700;
    margin-bottom:15px;
}

.membership-option p{
    color:#666;
    min-height:80px;
}

.btn-orange{
    transition:.3s;
}

.btn-orange:hover{
    transform:translateY(-3px);
}

.btn-dark{
    transition:.3s;
}

.btn-dark:hover{
    transform:translateY(-3px);
}

.membership-benefits{
    background:#f7f7f7;
}

.benefit-badge{
    background:#ff5a1f;
    color:#fff;
    padding:8px 20px;
    border-radius:50px;
    font-weight:600;
}

.highlight-box{
    background:linear-gradient(
        135deg,
        #ff8a00,
        #e53900
    );
    color:white;
    padding:50px;
    border-radius:25px;
}

.highlight-box h2{
    font-size:54px;
    font-weight:800;
    line-height:1.1;
}

.highlight-label{
    display:inline-block;
    background:rgba(255,255,255,.2);
    padding:8px 15px;
    border-radius:50px;
    margin-bottom:20px;
}

.benefit-showcase{
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 5px 25px rgba(0,0,0,.08);
    transition:.3s;
    height:100%;
}

.benefit-showcase:hover{
    transform:translateY(-8px);
}

.showcase-img{
    width:100%;
    height:240px;
    object-fit:cover;
}

.showcase-body{
    padding:25px;
}

.showcase-body h4{
    font-weight:700;
}

.cinema-banner{
    background:linear-gradient(
        135deg,
        #ff8a00,
        #d40000
    );
    color:white;
    padding:40px;
    border-radius:25px;
}

.cinema-banner h2{
    font-size:42px;
    font-weight:800;
}

.cinema-icon{
    font-size:80px;
}
.membership-benefit{
    background:#f5f5f5;
}

.benefit-wrapper{
    display:flex;
    overflow:hidden;
    border-radius:25px;
    box-shadow:0 15px 40px rgba(0,0,0,.12);
}

.benefit-main{
    flex:2;
    min-height:500px;

    padding:60px;

    display:flex;
    flex-direction:column;
    justify-content:center;

    background:
    linear-gradient(
        135deg,
        #ff8a00,
        #ff5a1f,
        #1f1f1f
    );

    color:white;
}

.benefit-tag{
    display:inline-block;

    background:rgba(255,255,255,.15);

    padding:10px 20px;

    border-radius:50px;

    margin-bottom:20px;

    font-weight:600;

    width:max-content;
}

.benefit-main h2{
    font-size:64px;
    font-weight:800;
    line-height:1;
    margin-bottom:20px;
}

.benefit-main p{
    font-size:20px;
    opacity:.9;
}

.benefit-list{
    flex:1;
    background:#fff;

    display:flex;
    flex-direction:column;
}

.mini-benefit{
    flex:1;

    display:flex;
    align-items:center;

    gap:20px;

    padding:20px;

    border-bottom:1px solid #eee;

    transition:.3s;
}

.mini-benefit:last-child{
    border-bottom:none;
}

.mini-benefit:hover{
    background:#fafafa;
    transform:translateX(5px);
}

.mini-benefit img{
    width:120px;
    height:100px;

    object-fit:cover;

    border-radius:12px;
}

.mini-benefit span{
    font-size:22px;
    font-weight:700;
    color:#222;
}
.benefit-main{
    background:
    linear-gradient(
        rgba(255,90,31,.9),
        rgba(20,20,20,.95)
    ),
    url('assets/cover/promotion.webp');

    background-size:cover;
    background-position:center;
}

.cinema-banner{

    position:relative;

    min-height:350px;

    border-radius:25px;

    overflow:hidden;

    background:
    linear-gradient(
        rgba(255,90,31,.75),
        rgba(20,20,20,.85)
    ),
    url('assets/cover/sinar-mas-land-menyelenggarakan-acara-nonton-bareng-nobar-film-_181124204857-746.jpg');

    background-size:cover;
    background-position:center;

    box-shadow:
    0 15px 40px rgba(0,0,0,.15);
}

.cinema-overlay{

    min-height:350px;

    display:flex;
    flex-direction:column;
    justify-content:center;

    padding:60px;

    color:white;
}

.cinema-badge{

    display:inline-block;

    width:max-content;

    background:rgba(255,255,255,.15);

    backdrop-filter:blur(5px);

    padding:10px 18px;

    border-radius:50px;

    margin-bottom:20px;

    font-weight:600;
}

.cinema-overlay h2{

    font-size:54px;
    font-weight:800;

    line-height:1.1;
    color: white;

    margin-bottom:20px;
}

.cinema-overlay p{

    font-size:18px;

    max-width:600px;

    margin:0;

    opacity:.95;
}

@media(max-width:768px){

    .cinema-overlay{
        padding:40px 25px;
    }

    .cinema-overlay h2{
        font-size:34px;
    }

}

.service-card{

    position:relative;

    min-height:450px;
    height: 100%;

    border-radius:25px;

    overflow:hidden;

    background-size:cover;
    background-position:center;

    box-shadow:
    0 15px 40px rgba(0,0,0,.15);
}

.scouting-card{

    background:
    linear-gradient(
        rgba(255,90,31,.75),
        rgba(20,20,20,.85)
    ),
    url('assets/cover/jakarta-malam-ramai.webp');
     background-size: contain;
    background-position: center;
}

.production-card{

    background:
    linear-gradient(
        rgba(255,90,31,.75),
        rgba(20,20,20,.85)
    ),
    url('assets/cover/crew-film-warm.webp');
    
     background-size: contain;
    background-position: center;
}

.service-overlay{

    padding:50px;

    color:white;

    height:100%;

    display:flex;
    flex-direction:column;
    justify-content:flex-start;
}

.service-overlay h2{

    font-size:42px;
    font-weight:800;
    color: white;

    margin-bottom:25px;
}

.service-overlay ul{

    list-style:none;
    padding:0;
    margin:0;
}

.service-overlay li{

    margin-bottom:12px;

    font-size:18px;
}

</style>
</head>
<body>
    
    <div id="navbar"></div>

<!-- HERO -->

<section class="hero">

    <div class="container">

        <h1>
            Become a Member of
            <br>
            Filming in Jakarta
        </h1>

        <p>
            Connect with filmmakers, production houses,
            location owners, and creative professionals
            across Jakarta through one integrated platform.
        </p>

        <a href="#register" class="btn btn-orange mt-3">
            Join Membership
        </a>

    </div>

</section>

<!-- MEMBERSHIP BENEFITS -->

<section class="membership-benefits py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="benefit-badge">
                Membership Exclusive Benefits
            </span>

            <h2 class="section-title mt-3">
                More Than Just Membership
            </h2>

            <p class="section-subtitle">
                Enjoy exclusive promotional opportunities 
                available only for Filming in Jakarta members.
            </p>

        </div>
    </div>
</section>

    <!-- Benefit 1 -->
    <section class="membership-benefit py-5">
        <div class="container">
            <div class="benefit-wrapper">

                <!-- LEFT SIDE -->
                <div class="benefit-main">

                    <span class="benefit-tag">
                        Membership Benefit
                    </span>

                    <h2 style="color: white;">
                        FREE 7 DAYS
                        <br>
                        FILM PROMOTION
                    </h2>

                    <p>
                        Exclusive promotional opportunity
                        for Filming in Jakarta members.
                    </p>

                </div>

                <!-- RIGHT SIDE -->

                <div class="benefit-list">

                    <div class="mini-benefit">

                        <img
                        src="assets/cover/jxbpromotion.webp"
                        alt="Mobil Kiosk">

                        <span>
                            Mobil Kiosk
                        </span>

                    </div>

                    <div class="mini-benefit">

                        <img
                        src="assets/cover/jakarta-street-experience.png"
                        alt="Jakarta Street Experience">

                        <span>
                            Jakarta Street Experience
                        </span>

                    </div>

                    <div class="mini-benefit">

                        <img
                        src="assets/cover/jxb-vending.jpg"
                        alt="JXB Vending">

                        <span>
                            JXB Vending Machine
                        </span>

                    </div>

                    <div class="mini-benefit">

                        <img
                        src="assets/cover/sinar-mas-land-menyelenggarakan-acara-nonton-bareng-nobar-film-_181124204857-746.jpg"
                        alt="Nobar Bioskop">

                        <span>
                            Nobar Bioskop
                        </span>

                    </div>

                </div>
            </div>
        </div>

        <!-- Bottom Banner -->
        <div class="container">
            <div class="cinema-banner mt-5">

                <div class="cinema-overlay">

                    <span class="cinema-badge">
                        Member Benefit
                    </span>

                    <h2>
                        FREE 1x MOVIE SCREENING
                        <br>
                        AT CINEMA
                    </h2>

                    <p>
                        Enjoy a special cinema gathering event
                        with fellow members and industry partners.
                    </p>

                </div>

            </div>
        </div>
    </section>


<section class="service-benefits py-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">

            <!-- Location Scouting -->
            <div class="col-lg-6">
                <div class="service-card scouting-card">
                    <div class="service-overlay">

                        <h2>
                            Location Scouting
                        </h2>

                        <ul>
                            <li>
                                ✈ Domestic & International Production
                            </li>
                            <li>
                                🏨 Free 1 Night Accommodation
                            </li>
                            <li>
                                🚗 Transportation for 4 Pax
                            </li>
                            <li>
                                🤝 Local Assistance & Guidance
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

            <!-- Production Service -->
            <div class="col-lg-6">
                <div class="service-card production-card">
                    <div class="service-overlay">

                        <h2>
                            Production Services
                        </h2>

                        <ul>
                            <li>
                                🏨 Tavia Heritage Hotel
                            </li>
                            <li>
                                🛏 5 Rooms Available
                            </li>
                            <li>
                                🍳 Breakfast Included
                            </li>
                            <li>
                                💸 Up To 50% Accommodation Discount
                            </li>
                            <li>
                                🎬 Location Permit Assistance
                            </li>
                            <li>
                                🏛 Support From DKI Jakarta Government
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- MEMBERSHIP TYPE -->
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Membership Categories
            </h2>

        </div>

        <div class="row g-4 justify-content-center">

            <div class="col-md-5 col-lg-4">
                <div class="package-card">

                    <div class="package-header">
                        <h3 style="background:#ff5a1f; color:white; text-align:center;">
                            <strong>Individual</strong>
                        </h3>
                    </div>

                    <div class="package-body">
                        <ul>
                            <li>Active Industry Practitioner</li>
                            <li>Emerging Filmmakers</li>
                            <li>Students</li>
                            <li>Film Enthusiast</li>
                            <li>Others</li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-5 col-lg-4">
                <div class="package-card">

                    <div class="package-header">
                        <h3 style="background:#ff5a1f; color:white; text-align:center;">
                            <strong>Entities</strong>
                        </h3>
                    </div>

                    <div class="package-body">
                        <ul>
                            <li>Production House</li>
                            <li>Academic Institution</li>
                            <li>Industry Support</li>
                            <li>SMSEs</li>
                            <li>Others</li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->

<section class="cta">

    <div class="container text-center">

        <h2 style="color:#fff; padding:80px 0; font-size:42px; font-weight:700;">
            Ready to Join the Jakarta Film Community?
        </h2>

        <p class="mt-3">
            Register today and become part of the official
            Filming in Jakarta ecosystem.
        </p>

        <a href="#register" class="btn btn-orange mt-3">
            Register Now
        </a>

    </div>

</section>

<!-- REGISTER -->
<section id="register" class="py-5">
<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="register-card text-center">

                <span class="membership-badge">
                    REGISTRATION OPEN
                </span>

                <h2 class="mt-3 mb-3">
                    Choose Your Membership Type
                </h2>

                <p class="text-muted mb-5">
                    Select the registration form that best
                    matches your profile.
                </p>

                <div class="row g-4">

                    <!-- Individual -->

                    <div class="col-md-6">

                        <div class="membership-option">

                            <div class="membership-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <h4>Individual Member</h4>

                            <p>
                                For filmmakers, freelancers,
                                students, crew members,
                                artists, and creative professionals.
                            </p>

                            <a
                            href="https://forms.gle/gX6rj3MApcqG2fk1A"
                            target="_blank"
                            class="btn btn-orange btn-lg w-100">
                                Register as Individual
                            </a>

                        </div>

                    </div>

                    <!-- Entities -->

                    <div class="col-md-6">

                        <div class="membership-option">

                            <div class="membership-icon">
                                <i class="fa-solid fa-building"></i>
                            </div>

                            <h4>Entities Member</h4>

                            <p>
                                For production houses,
                                agencies, studios,
                                vendors and organizations.
                            </p>

                            <a
                            href="https://forms.gle/WChB8x8aGkeKEtcJ8"
                            target="_blank"
                            class="btn btn-dark btn-lg w-100">
                                Register as Entities
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
</section>

<footer>

    © <?= date('Y') ?> Filming in Jakarta.
    All Rights Reserved.

</footer>


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

<script>

const observer = new IntersectionObserver(entries => {

    entries.forEach(entry => {

        if(entry.isIntersecting){

            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }

    });

},{
    threshold:0.15
});

document
.querySelectorAll(
'.benefit-card,.package-card,.membership-option'
)
.forEach(el=>{

    el.style.opacity="0";
    el.style.transform="translateY(40px)";
    el.style.transition="all .8s ease";

    observer.observe(el);

});


// function loadComponent(id, url) {

//         const target =
//             document.getElementById(id);

//         if(!target){
//             console.warn(
//                 "Element not found:",
//                 id
//             );
//             return;
//         }

//         fetch(url)
//             .then(res => res.text())
//             .then(data => {

//                 target.innerHTML = data;

//             })
//             .catch(err =>
//                 console.error(
//                     "Component error:",
//                     err
//                 )
//             );
//     }

//     // load components
//     loadComponent("navbar", "components/navbar.html");
</script>

</body>
</html>