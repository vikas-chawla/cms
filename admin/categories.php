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
                            <small>Author</small>
                        </h1>


                        <div class="col-xs-6">

                        <?php insert_categories($connection); ?>
                        <form action ="" method="post">
                            <div class="form-group">
                            <label for="category-title">Add Category</label>
                                <input type="text" class="form-control" name="category_title">
                            </div>
                             <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <?php


                        if(isset($_GET['edit']) )
                        {
                            $edit_category_id = $_GET['edit']; 

                            include "includes/admin_update_categories.php";
                        }
                            
                        ?>
                       
                        </div>
                        
                        <div class="col-xs-6">
                        
                         
                        <table class="table table-hover">
                            <thead>
                                <th>Id</th>     
                                <th>Category Title</th>
                            </thead>
                            <tbody>
                                    <?php //find and delete categories
                                    findAllCategories($connection);
                                    ?>


                                    <?php // Query that deletes
                                    deleteCategories($connection);
                                    ?>
                            </tbody>
                        </table>


                        </div>
                        </div>
                   
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->



<?php include "includes/admin_footer.php" ?>