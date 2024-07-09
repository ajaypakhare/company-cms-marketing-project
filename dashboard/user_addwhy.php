<?php include"header.php";?>
<?php include"user_sidebar.php";?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
 <div class="page-content">
       <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row"><br><br><br><br>
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Add Why Choose Us</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Why Choose Us</a></li>
                                        <li class="breadcrumb-item active">Add</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">

                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card mt-xxl-n5">
                                <div class="card-header">
                                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                                <i class="fas fa-home"></i> Add Why Choose Us
                                            </a>
                                        </li>


                                    </ul>
                                </div>



                                <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}

// Ensure database connection is established
if(!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$status = "OK";
$msg = "";

// Check if the form is submitted
if(isset($_POST['save'])) {
    // Get user information from session
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username']; // Change 'username' to the session key where you store the username
    } else {
        // Handle case where username is not set in session
        $username = ''; // Or provide a default value
    }
    
    // Escape and sanitize form inputs
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $detail = mysqli_real_escape_string($con, $_POST['detail']);

    // Validate form inputs
    if(strlen($title) < 2) {
        $msg .= "Title Must Contain At Least 2 Characters.<br>";
        $status = "NOTOK";
    }
    if(strlen($detail) > 500) {
        $msg .= "Detail Must Not Be More Than 500 Characters Long.<br>";
        $status = "NOTOK";
    }

    if($status == "OK") {
        // Insert data into the database
        $qb = mysqli_query($con, "INSERT INTO user_why_us (username, title, detail) VALUES ('$username', '$title', '$detail')");

        if($qb) {
            $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
               Data added successfully.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        } else {
            // Display MySQL error, if any
            $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                 Error occurred while adding data: " . mysqli_error($con) . ".
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 </div>";
        }
    } else {
        $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                 $msg
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 </div>";
    }
}
?>




                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                        <?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
						{
						print $errormsg;
						}
   ?>
              <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row">



   <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label"> Title</label>
                                                            <input type="text" class="form-control" id="firstnameInput" name="title" placeholder="Enter Title">
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label">Detail</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea5" name="detail" rows="3"></textarea>
                                                        </div>
                                                    </div>

                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="submit" name="save" class="btn btn-primary">Add Why Us</button>

                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                        <!--end tab-pane-->

                                        <!--end tab-pane-->

                                        <!--end tab-pane-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include"footer.php";?>
