<?php include "includes/admin_header.php" ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1 class="page-header">
                            Welcome To Admin Page

                            
                            <small>Hi <?php echo $_SESSION['user_username'] ?></small>
                        </h1>
               
                        <!--
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page 
                        </li>
                        </ol> 
                    </div> -->
                </div>
            <!-- /.row -->
            </div>
        </div>
    </div>
          <!-- /.container-fluid -->

<?php include "includes/admin_footer.php" ?>