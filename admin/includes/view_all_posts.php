   <tbody>
   <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Category Id</th>
                <th>Image</th>
                <th>Content</th>
                <th>Tags</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        </body>
            <tr>
            <?php

            if( isset($_GET['delete']) )
            {
                $the_post_id = $_GET['delete'];

                $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
                $delete_query = mysqli_query($connection, $query);
            }

            $query = "SELECT * FROM posts";
            $select_posts = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_posts) )
            {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_category_id = $row['post_category_id'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];

                echo "<tr>";
                    echo "<td>$post_id</td>";
                    echo "<td>$post_title</td>";
                    echo "<td>$post_author</td>";
                    echo "<td>$post_date</td>";

                    $category_query = "SELECT * FROM categories WHERE category_id = {$post_category_id} ";
                    $select_categories_id = mysqli_query($connection, $category_query);
            
                    if($select_categories_id->num_rows === 0)
                    {
                        echo "<td>No categories found.</td>";
                    }
                    else
                    {
                        $row = mysqli_fetch_assoc($select_categories_id);
                        $category_id = $row['category_id'];
                        $category_title = $row['category_title'];

                        echo "<td>{$category_title}</td>";
                    }
                    


                    echo "<td><img width = 150 class='img-responsive' src='../images/$post_image' alt='image'></td>";
                    echo "<td>$post_content</td>";
                    echo "<td>$post_tags</td>";
                    //echo "<td>$post_comment_count</td>";
                    echo "<td>$post_status</td>";
                    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";

                echo "</tr>";
            }


            ?>
            </tr>            
   
</tbody>
</table>