   <form action ="" method="post">
        <div class="form-group">
        <label for="category-title">Update Category</label>
        


        <?php

        if(isset($_GET['edit']) )
        {
            $edit_category_id = $_GET['edit'];
            
            $query = "SELECT * FROM categories WHERE category_id = $edit_category_id ";
            $select_categories_id = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_categories_id) )
                {
                    $category_id = $row['category_id'];
                    $category_title = $row['category_title'];
        ?>

        <input value="<?php if(isset($category_title) ){echo $category_title;} ?>" type="text" class="form-control" name="category_title">


        <?php   }
        }
        
        ?>


        <?php

        //Query that updates categories

        if(isset($_POST['update_category']) )
        {
            $edit_category_title = $_POST['category_title'];
            
            $query = "UPDATE categories SET category_title = '{$edit_category_title}' WHERE category_id = {$edit_category_id} ";
            $update_query = mysqli_query($connection,$query);
            
            if(!$update_query)
            {
                die("query failed" . mysqli_error($connection) );
            }
        }


        ?>

       
        </div>
         <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
        </div>
</form>