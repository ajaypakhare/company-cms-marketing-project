<?php
include "header.php";
$todo= mysqli_real_escape_string($con,$_GET["id"]);
?>
        <!-- ***** Breadcrumb Area Start ***** -->
        <section class="section breadcrumb-area overlay-dark d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Breamcrumb Content -->
                        <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                            <h2 class="text-white text-uppercase mb-3">Portfolio Details</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-uppercase text-white" href="index.html">Home</a></li>

                                <li class="breadcrumb-item text-white active">Portfolio</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Breadcrumb Area End ***** -->


        <?php
    $rt=mysqli_query($con,"SELECT * FROM userportfolio where id='$todo'");
    $tr = mysqli_fetch_array($rt);
    $port_title = "$tr[port_title]";
    $port_detail = "$tr[port_detail]";
    $ufile = "$tr[ufile]";
    $username = "$tr[username]";
?>


        <!-- ***** About Area Start ***** -->
        <section class="section about-area ptb_100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-6">
                        <!-- About Thumb -->
                        <div class="about-thumb text-center">
                            <img src="dashboard/uploads/portfolio/<?php print $ufile;?>" alt="img">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <!-- About Content -->
                        <div class="about-content section-heading text-center text-lg-left pl-md-4 mt-5 mt-lg-0 mb-0">
                            <p>Posted By <b><?php print $username;?></b></p>
                            <h2 class="mb-3"><?php print $port_title?></h2>
                            <p><?php print $port_detail;?></p>
                            <!-- Counter Area -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** About Area End ***** -->
<?php include "footer.php"; ?>
