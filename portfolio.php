<?php include "header.php";?>
        <section class="section breadcrumb-area overlay-dark d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Breamcrumb Content -->
                        <div class="breadcrumb-content text-center">
                            <h2 class="text-white text-uppercase mb-3">Our Past Works</h2>
                            <ol class="breadcrumb d-flex justify-content-center">
                                <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Home</a></li>

                                <li class="breadcrumb-item text-white active">Our Portfolio</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Breadcrumb Area End ***** -->

     <!-- ***** Portfolio Area Start ***** -->
     <section id="portfolio" class="portfolio-area overflow-hidden ptb_100">
            <div class="container">

 <!-- Portfolio Items -->
                <div class="row items portfolio-items">

                <?php
				   $q="SELECT * FROM  portfolio ORDER BY id DESC";


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

            </div>
        </section>
        <!-- ***** Portfolio Area End ***** -->

        <!-- ***** Review Area Start ***** -->
        <section id="review" class="section review-area bg-overlay ptb_100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-7">
                        <!-- Section Heading -->


                        <div class="section-heading text-center">
                            <h2 class="text-white"><?php print $test_title; ?></h2>
                            <p class="text-white d-none d-sm-block mt-4"><?php print $test_text;?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Client Reviews -->
                    <div class="client-reviews owl-carousel">
                        <!-- Single Review -->



                        <?php
				   $q="SELECT * FROM  testimony ORDER BY id DESC LIMIT 6";


 $r123 = mysqli_query($con,$q);

while($ro = mysqli_fetch_array($r123))
{

	$name="$ro[name]";
	$position="$ro[position]";
    $message="$ro[message]";
    $ufile="$ro[ufile]";

print "

<div class='single-review p-5'>
<!-- Review Content -->
<div class='review-content'>
    <!-- Review Text -->
    <div class='review-text'>
        <p>$message</p>
    </div>
    <!-- Quotation Icon -->

</div>
<!-- Reviewer -->
<div class='reviewer media mt-3'>
    <!-- Reviewer Thumb -->
    <div class='reviewer-thumb'>
        <img class='avatar-lg radius-100' src='dashboard/uploads/testimony/$ufile' alt='img'>
    </div>
    <!-- Reviewer Media -->
    <div class='reviewer-meta media-body align-self-center ml-4'>
        <h5 class='reviewer-name color-primary mb-2'>$name</h5>
        <h6 class='text-secondary fw-6'>$position</h6>
    </div>
</div>
</div>


";
}
?>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Review Area End ***** -->

      <?php include "footer.php"; ?>
