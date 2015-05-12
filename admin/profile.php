<?php include "includes/admin_header.php" ?>
<?php
    if(isset($_SESSION['user_username']) )
    {
        echo $_SESSION['user_username'];
    }


?>
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
                        Welcome to Admin
                    </h1> 

                    <form action="users.php?source=edit_user&edit_user=<?php echo $the_user_id; ?>" method="post" enctype="multipart/form-data">

    
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" value="<?php echo $user_firstname;  ?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="status">Lastname</label>
        <input type="text" value="<?php echo $user_lastname;  ?>" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
    <select name="user_role" id="">
        <?php
        if($user_role == 'admin')
        {
            echo "<option value='subscriber'>Subscriber></option>";
        }
        else
        {
            echo "<option value='admin'>Admin</option>";            
        }
        ?>

        <option value="subscriber">Select Options</option>
        <option value="admin">Admin</option>
    </select>
    </div>

    <!--<div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" value="<?php echo $username;  ?>" class="form-control" name="username">
    </div>


    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" value="<?php echo $user_email;  ?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" value="<?php echo $user_password;  ?>" class="form-control" name="user_password">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>
</form> 


                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            </div>
            <!-- /.container-fluid -->

<?php include "includes/admin_footer.php" ?>