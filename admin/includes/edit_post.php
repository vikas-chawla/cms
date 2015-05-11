<?php

	if( isset($_GET['p_id']) )
	{
		$get_post_id = $_GET['p_id'];
	}	

    $query = "SELECT * FROM posts WHERE post_id = $get_post_id ";
    $select_posts_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts_id) )
    {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
    }

    if(isset($_POST['update_post']) )
    {
    	//var_dump($_POST);
    	//die();
    	$post_title = isset($_POST['post_title']) || array_key_exists('post_title', $_POST) ? $_POST['post_title'] : "";
    	$post_author = $_POST['post_author'];
    	$post_category_id = $_POST['post_category'];
    	$post_status = $_POST['post_status'];
    	$post_content= $_POST['post_content'];
    	$post_tags = $_POST['post_tags'];

    	if( !empty($_FILES['image']) )
    	{
    		$post_image = $_FILES['image']['name'];
    		$post_image_temp = $_FILES['image']['tmp_name'];
    		move_uploaded_file($post_image_temp, "../images/$post_image");
    		
    		$query = "SELECT * FROM posts WHERE post_id = $get_post_id ";
    		$select_image = mysqli_query($connection,$query);

    		while($row = mysqli_fetch_array($select_image) )
    		{
    			$post_image = $row['post_image'];
    		}
    	}

    	$query = "UPDATE posts SET ";
    	$query .="post_author = '{$post_author}', ";
    	$query .="post_title ='{$post_title}', ";
    	$query .="post_category_id ='{$post_category_id}', ";
    	$query .="post_status = '{$post_status}', ";
    	$query .="post_image = '{$post_image}', ";
    	$query .="post_content = '{$post_content}', ";
    	$query .="post_tags = '{$post_tags}', ";
    	$query .="post_date = now() ";
    	$query .="WHERE post_id = {$get_post_id}";

    	$update_post = mysqli_query($connection,$query);

    	if(!$update_post)
	    {
	        die("QUERY FAILED" . mysqli_error($connection) );
	    }
    }
?>
<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
	</div>

	<div class="form-group">
	<select name="post_category" id="">
	<?php
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);

        if(!$select_categories)
        {
        	die("QUERY FAILED ." . mysqli_error($connection) );
        }
        else
        {
            while($row = mysqli_fetch_assoc($select_categories) )
            {
                $category_id = $row['category_id'];
                $category_title = $row['category_title'];

                if($post_category_id === $category_id)
                {
                	echo "<option selected = 'selected' value='$category_id'>$category_title</option>";
                }
                else
                {
                	echo "<option value='$category_id'>$category_title</option>";
                }
            }
        }
 
	?>
	</select>
	</div>


	<div class="form-group">
		<label for="title">Author</label>
		<input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
	</div>

	<div class="form-group">
		<label for="status">Post Status</label>
		<input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
	</div>

	<div class="form-group">
		<img width="125" src="../images/<?php echo $post_image; ?>" alt="">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
	</div>


	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"> <?php echo $post_content; ?>
		</textarea>
	</div>


	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
	</div>