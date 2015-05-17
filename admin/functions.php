<?php

/*
function confirmQuery($result)
{
    
    if(!$create_post_query )
    {
        die("QUERY FAILED ." . mysqli_error($connection) );
    }


}
*/

function insert_categories(&$connection)
{
    if(isset($_POST['submit']) )
    {
    	//global $connection;
        $new_category_title = $_POST['category_title'];

        if($new_category_title == "" || empty($new_category_title) )  
        {
            echo "The field below should not be empty";
        }     
        $query = $connection->prepare("INSERT INTO categories SET category_title = ?;");
        $query->bind_param("s", $new_category_title);
        $success = $query->execute();
        
        /*$query = "INSERT INTO categories(category_title) ";
        $query .= "VALUE('{$new_category_title}') ";
        $create_new_category_query = mysqli_query($connection, $query);
        */
    	
        if(!$success)
    	{
        	die('QUERY FAILED' . mysqli_error($connection) );
    	}
    }
}



function findAllCategories(&$connection)
{

	
    $query = $connection->prepare("SELECT * FROM categories");
    $query->bind_param("s",$fetch_all_categories);
    $success = $query->execute(); 
   
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($select_categories) )
    {
        $category_id = $row['category_id'];
        $category_title = $row['category_title'];
       
        echo "<tr>";
        echo "<td>{$category_id}</td>";
        echo "<td>{$category_title}</td>";
        echo "<td><a href='categories.php?delete={$category_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$category_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function deleteCategories(&$connection)
{
	if( isset($_GET['delete']) )
	{
	    $delete_category_id = $_GET['delete'];
	    $query = $connection->prepare("DELETE FROM categories WHERE 'category_id'=?");
        $query->bind_param("is","$delete_category_id");
        $success = $query->execute();
        header("Location: categories.php");
        /*
        $query = "DELETE FROM categories WHERE category_id = {$delete_category_id} ";
	    $delete_query = mysqli_query($connection,$query);
	    header("Location: categories.php"); */
	}
}


?>