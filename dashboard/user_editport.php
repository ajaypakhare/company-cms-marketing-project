<?php
include"header.php";
$todo=  mysqli_real_escape_string($con,$_GET['id']);
include"user_sidebar.php";

?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
 <div class="page-content">
       <div class="container-fluid">
            <div class="row"><br><br><br><br>
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Portfolio</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                <li class="breadcrumb-item active">Portfolio</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
<?php
$query="SELECT * FROM  userportfolio where id='$todo' ";
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$port_title="$row[port_title]";
	$port_desc="$row[port_desc]";
  $port_detail="$row[port_detail]";
}
?>

<div class="row">
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                            <i class="fas fa-home"></i> Edit Portfolio
                        </a>
                    </li>
                </ul>
            </div>
<?php
    $status = "OK"; // Initial status
    $msg = "";
    
    if(isset($_POST['save'])) {
        $service_title = mysqli_real_escape_string($con, $_POST['service_title']);
        $service_desc = mysqli_real_escape_string($con, $_POST['service_desc']);
        $service_detail = mysqli_real_escape_string($con, $_POST['service_detail']);
        
        /*
        $uploads_dir = 'uploads';
        $tmp_name = $_FILES["ufile"]["tmp_name"];
        $name = basename($_FILES["ufile"]["name"]);
        $random_digit = rand(0000, 9999);
        $new_file_name = $random_digit . $name;
        move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
        */
        
        if($status == "OK") {
            $qb = mysqli_query($con, "UPDATE portfolio SET port_title='$port_title', port_desc='$port_desc', port_detail='$port_detail' WHERE id='$todo'");
    
            if($qb) {
                $errormsg = "
                <div class='alert alert-success alert-dismissible alert-outline fade show'>
                    Portfolio Updated successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>"; //printing error if found in validation
            }
        } elseif ($status !== "OK") {
            $errormsg = "
            <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                ".$msg." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>"; //printing error if found in validation
        } else {
            $errormsg = "
            <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>"; //printing error if found in validation
        }
    }
?>
                                            <div class="card-body p-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                                        <?php
                                                            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                                print $errormsg;
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label"> Portfolio Title</label>
                                                            <input type="text" class="form-control" id="firstnameInput" name="service_title" value="<?php print $port_title ?>" placeholder="Enter Portfolio Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label"> Short Description</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea5" name="service_desc" rows="2"><?php print $port_desc ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label">Portfolio Detail</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea5" name="service_detail" rows="3"><?php print $port_detail ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="submit" name="save" class="btn btn-primary">Update Portfolio</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include"footer.php";?>
