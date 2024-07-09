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
                                <h4 class="mb-sm-0">Add Service</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Service</a></li>
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
                                                <i class="fas fa-home"></i> Add Service
                                            </a>
                                        </li>


                                    </ul>
                                </div>



                                <?php
// Check if a session has not already been started
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}

$status = "OK"; // Initial status
$msg = "";

// Check if the form is submitted
if(isset($_POST['save'])) {
    // Get user information from session
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username']; // Assuming 'username' is the session key where you store the username
    } else {
        // Handle case where username is not set in session
        $username = ''; // Or provide a default value
    }
    
    // Escape and sanitize form inputs
    $service_title = mysqli_real_escape_string($con, $_POST['service_title']);
    $service_desc = mysqli_real_escape_string($con, $_POST['service_desc']);
    $service_detail = mysqli_real_escape_string($con, $_POST['service_detail']);

    // Validate form inputs
    if(strlen($service_title) < 5) {
        $msg .= "Service Title Must Be More Than 5 Characters Long.<br>";
        $status = "NOTOK";
    }
    if(strlen($service_desc) > 150) {
        $msg .= "Short Description Must Be Less Than 150 Characters Long.<br>";
        $status = "NOTOK";
    }
    if(strlen($service_detail) < 15) {
        $msg .= "Service Detail Must Be More Than 15 Characters Long.<br>";
        $status = "NOTOK";
    }

    // Upload file
    $uploads_dir = 'uploads/services';
    $tmp_name = $_FILES["ufile"]["tmp_name"];
    $name = basename($_FILES["ufile"]["name"]);
    $random_digit = rand(0000,9999);
    $new_file_name = $random_digit . $name;
    move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

    if($status == "OK") {
        // Insert data into the database
        $qb = mysqli_query($con, "INSERT INTO service (username, service_title, service_desc, service_detail, ufile) VALUES ('$username', '$service_title', '$service_desc', '$service_detail', '$new_file_name')");

        if($qb) {
            $errormsg = "
<div class='alert alert-success alert-dismissible alert-outline fade show'>
                  Service has been added successfully.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        } else {
            $errormsg = "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                 Error occurred while adding service. Please try again later.
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
              <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row">



   <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label"> Service Title</label>
                                                            <input type="text" class="form-control" id="firstnameInput" name="service_title" placeholder="Enter Service Title">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label"> Short Description</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea5" name="service_desc" rows="2"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label"> Service Detail</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea5" name="service_detail" rows="3"></textarea>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label">Photo</label>
                                                            <input type="file" class="form-control" id="firstnameInput" name="ufile" >
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="submit" name="save" class="btn btn-primary">Add Service</button>

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
