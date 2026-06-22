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
    padding:20px;
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

<!-- BENEFITS -->

<section class="py-5">

<div class="container">

    <div class="text-center mb-5">

        <h2 class="section-title">
            Why Join?
        </h2>

        <p class="section-subtitle">
            Membership gives you direct access to the growing
            filmmaking ecosystem in Jakarta.
        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-4">

            <div class="benefit-card">

                <i class="fa-solid fa-location-dot"></i>

                <h4>Location Access</h4>

                <p>
                    Discover verified filming locations
                    across Jakarta and surrounding areas.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="benefit-card">

                <i class="fa-solid fa-users"></i>

                <h4>Industry Network</h4>

                <p>
                    Connect with producers, directors,
                    agencies, and location managers.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="benefit-card">

                <i class="fa-solid fa-bullhorn"></i>

                <h4>Promotion</h4>

                <p>
                    Promote your services, locations,
                    and creative projects.
                </p>

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

    <div class="row g-4">

        <div class="col-md-4">

            <div class="package-card">

                <div class="package-header">
                    <h3>Individual</h3>
                </div>

                <div class="package-body">

                    <ul>
                        <li>Personal Profile</li>
                        <li>Community Access</li>
                        <li>Event Invitations</li>
                        <li>Industry Updates</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="package-card">

                <div class="package-header">
                    <h3>Company</h3>
                </div>

                <div class="package-body">

                    <ul>
                        <li>Company Listing</li>
                        <li>Project Promotion</li>
                        <li>Production Network</li>
                        <li>Business Visibility</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="package-card">

                <div class="package-header">
                    <h3>Location Owner</h3>
                </div>

                <div class="package-body">

                    <ul>
                        <li>Location Listing</li>
                        <li>Direct Inquiry Access</li>
                        <li>Photo Gallery</li>
                        <li>Featured Opportunities</li>
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

    <h2>
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

            <div class="register-card">

                <h3 class="mb-4">
                    Membership Registration
                </h3>

                <form action="membership-submit.php" method="POST">

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input
                        type="text"
                        name="name"
                        class="form-control"
                        required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input
                        type="email"
                        name="email"
                        class="form-control"
                        required>
                    </div>

                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input
                        type="text"
                        name="phone"
                        class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Membership Type</label>

                        <select
                        name="membership_type"
                        class="form-select">

                            <option>
                                Individual
                            </option>

                            <option>
                                Company
                            </option>

                            <option>
                                Location Owner
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">
                        <label>Message</label>

                        <textarea
                        name="message"
                        rows="4"
                        class="form-control"></textarea>
                    </div>

                    <button class="btn btn-orange">
                        Submit Registration
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</section>

<footer>

    © <?= date('Y') ?> Filming in Jakarta.
    All Rights Reserved.

</footer>
<script src="assets/js/main.js"></script>

</body>
</html>