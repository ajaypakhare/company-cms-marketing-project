<?php include "header.php"; ?>
        <!-- ***** Welcome Area Start ***** -->
        <section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Welcome Intro Start -->
                    <div class="col-12 col-md-7">
                    <?php
    $rr=mysqli_query($con,"SELECT * FROM static");
$r = mysqli_fetch_row($rr);
$stitle = $r[1];
$stext=$r[2];
?>

                        <div class="welcome-intro">
                            <h1 class="text-white"><?php print $stitle?></h1>
                            <p class="text-white my-4"><?php print $stext?></p>
                            <!-- Buttons -->
                            <div class="button-group">
                                <a href="services.php" class="btn btn-bordered-white">Start a Project</a>
                                <a href="contact.php" class="btn btn-bordered-white d-none d-sm-inline-block">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <!-- Welcome Thumb -->
                        <div class="welcome-thumb-wrapper mt-5 mt-md-0">
                            <span class="welcome-thumb-1">
                                <img class="welcome-animation d-block ml-auto" src="assets/img/welcome/thumb_1.png" alt="">
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Shape Bottom -->
            <div class="shape shape-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#FFFFFF">
                    <path class="shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
        c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
        c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                </svg>
            </div>
        </section>
        <!-- ***** Welcome Area End ***** -->

        <!-- ***** Promo Area Start ***** -->
        <section class="section promo-area ptb_100">
            <div class="container">
                <div class="row">


                <?php
				   $q="SELECT * FROM  why_us ORDER BY id DESC LIMIT 3";


 $r123 = mysqli_query($con,$q);

while($ro = mysqli_fetch_array($r123))
{

	$title="$ro[title]";
	$detail="$ro[detail]";

print "
<div class='col-12 col-md-6 col-lg-4 res-margin'>
<!-- Single Promo -->
<div class='single-promo color-1 bg-hover hover-bottom text-center p-5'>
    <p class='mb-3'>Posted By <b>Admin</b></p>
    <h3 class='mb-3'>$title</h3>
    <p>$detail</p>
</div>
</div>
";
}
?>

<?php
				   $q="SELECT * FROM  user_why_us ORDER BY id DESC LIMIT 3";


 $r123 = mysqli_query($con,$q);

while($ro = mysqli_fetch_array($r123))
{

	$title="$ro[title]";
	$detail="$ro[detail]";
    $username="$ro[username]";

print "
<div class='col-12 col-md-6 col-lg-4 res-margin mt-4'>
<!-- Single Promo -->
<div class='single-promo color-1 bg-hover hover-bottom text-center p-5'>
    <p class='mb-3'>Posted By <b>$username</b></p>
    <h3 class='mb-3'>$title</h3>
    <p>$detail</p>
</div>
</div>
";
}
?>


                </div>
            </div>
        </section>
        <!-- ***** Promo Area End ***** -->

        <!-- ***** Service Area End ***** -->
        <section id="service" class="section service-area bg-grey ptb_150">
            <!-- Shape Top -->
            <div class="shape shape-top">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#FFFFFF">
                    <path class="shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                </svg>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-7">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2><?php print $service_title?></h2>
                            <p class="d-none d-sm-block mt-4"><?php print $service_text?></p>
                        </div>
                    </div>
                </div>
                <div class="row">

                <?php
				   $qs="SELECT * FROM  service ORDER BY id DESC LIMIT 6";


 $r1 = mysqli_query($con,$qs);

while($rod = mysqli_fetch_array($r1))
{
	$id="$rod[id]";
	$serviceg="$rod[service_title]";
	$service_desc="$rod[service_desc]";

print "
<div class='col-12 col-md-6 col-lg-4'>
<!-- Single Service -->
<div class='single-service p-4'  style='border: solid 1px #788282;'>
<p class='mb-3'>Posted By <b>Admin</b></p>
    <h3 class='my-3'>$serviceg</h3>
    <p>$service_desc</p>
    <a class='service-btn mt-3' href='servicedetail.php?id=$id'>Learn More</a>
</div>
</div>

";
}
?>

<?php
				   $qs="SELECT * FROM  user_service ORDER BY id DESC LIMIT 6";


 $r1 = mysqli_query($con,$qs);

while($rod = mysqli_fetch_array($r1))
{
	$id="$rod[id]";
	$serviceg="$rod[service_title]";
	$service_desc="$rod[service_desc]";
    $username="$rod[username]";

print "
<div class='col-12 col-md-6 col-lg-4'>
<!-- Single Service -->
<div class='single-service p-4'  style='border: solid 1px #788282;'>
    <p class='mb-3'>Posted By <b>$username</b></p>
    <h3 class='my-3'>$serviceg</h3>
    <p>$service_desc</p>
    <a class='service-btn mt-3' href='userservicedetail.php?id=$id'>Learn More</a>
</div>
</div>

";
}
?>
                   </div>
            </div>
            <!-- Shape Bottom -->
            <div class="shape shape-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#FFFFFF">
                    <path class="shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
        c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
        c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                </svg>
            </div>
        </section>
        <!-- ***** Service Area End ***** -->

        <!-- ***** Portfolio Area Start ***** -->
        <section id="portfolio" class="portfolio-area overflow-hidden ptb_100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-7">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2><?php print $port_title?></h2>
                            <p class="d-none d-sm-block mt-4"><?php print $port_text?></p>
                        </div>
                    </div>
                </div>
 <!-- Portfolio Items -->
                <div class="row items portfolio-items">
                <?php
				   $q="SELECT * FROM  portfolio ORDER BY id DESC LIMIT 6";


 $r123 = mysqli_query($con,$q);

while($ro = mysqli_fetch_array($r123))
{

	$id="$ro[id]";
	$port_title="$ro[port_title]";
    $port_desc="$ro[port_desc]";
    $ufile="$ro[ufile]";

print "
<div class='col-12 col-sm-6 col-lg-4 portfolio-item' data-groups='['marketing','development']'>
<!-- Single Case Studies -->
<div class='single-case-studies'>
    <!-- Case Studies Thumb -->
    <a href='portdetail.php?id=$id'>
    <p class='text-dark text-center'>Posted By <b>Admin</b></p>
        <img src='dashboard/uploads/portfolio/$ufile' alt=''>
    </a>
    <!-- Case Studies Overlay -->
    <a href='portdetail.php?id=$id' class='case-studies-overlay'>
        <!-- Overlay Text -->
        <span class='overlay-text text-center p-3'>
            <h3 class='text-white mb-3'>$port_title</h3>
            <p class='text-white'>$port_desc.</p>
        </span>
    </a>
</div>
</div>
";
}
?>
                <?php
				   $q="SELECT * FROM  userportfolio ORDER BY id DESC LIMIT 6";


 $r123 = mysqli_query($con,$q);

while($ro = mysqli_fetch_array($r123))
{

	$id="$ro[id]";
	$port_title="$ro[port_title]";
    $port_desc="$ro[port_desc]";
    $ufile="$ro[ufile]";
    $username="$ro[username]";

print "
<div class='col-12 col-sm-6 col-lg-4 portfolio-item' data-groups='['marketing','development']'>
<!-- Single Case Studies -->
<div class='single-case-studies'>
    <!-- Case Studies Thumb -->
    <a href='portdetail.php?id=$id'>
    <p class='text-dark text-center'>Posted By <b>$username</b></p>
        <img src='dashboard/uploads/portfolio/$ufile' alt=''>
    </a>
    <!-- Case Studies Overlay -->
    <a href='userportdetail.php?id=$id' class='case-studies-overlay'>
        <!-- Overlay Text -->
        <span class='overlay-text text-center p-3'>
            <h3 class='text-white mb-3'>$port_title</h3>
            <p class='text-white'>$port_desc.</p>
        </span>
    </a>
</div>
</div>
";
}
?>

                </div>
                <div class="row justify-content-center">
                    <a href="portfolio" class="btn btn-bordered mt-4">View More</a>
                </div>
            </div>
        </section>
        <!-- ***** Portfolio Area End ***** -->

      <?php include "footer.php"; ?>
