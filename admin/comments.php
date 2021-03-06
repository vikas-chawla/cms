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
                        All Comments
                        <h4>Author</h4>
                    </h1>
                    <?php
                    if(isset($_GET['source']) )
                    {
                        $source = $_GET['source'];
                    }
                    else
                    {
                        $source = '';
                    }
                    switch($source)
                    {
                        case 'add_post.php';
                        include "includes/add_post.php";
                        break;

                        case 'edit_post';
                        include "includes/edit_post.php";
                        break;

                        default:
                        include "includes/view_all_comments.php";
                        break; 

                    }

                    ?>                       
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            </div>
            <!-- /.container-fluid -->

<?php include "includes/admin_footer.php" ?>