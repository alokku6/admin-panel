<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/config.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">




    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit - Registered Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit - Registered Users

            </h3>
            <a href="registered.php" class="btn btn-primary float-right">BACK</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="add.php" method="POST">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `users` WHERE id='$id' LIMIT 1";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row) {
                        ?>
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        Name
                                        <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php echo $row['name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        Email
                                        <input type="Email" class="form-control" name="email" placeholder="Enter your email" value="<?php echo $row['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        Phone No.
                                        <input type="tel" class="form-control" name="phone" placeholder="Enter your Phone" value="<?php echo $row['phone']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        Password
                                        <input type="password" name="password" class="form-control" placeholder="Enter your password" value="<?php echo $row['password']; ?>" required>
                                    </div>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo "<h4>No Data Found.</h4>";
                            } ?>
                        <?php
                        }
                        ?>

                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" name="updateuser" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>








</div>


<?php include('includes/script.php'); ?>
<?php include('includes/footor.php'); ?>