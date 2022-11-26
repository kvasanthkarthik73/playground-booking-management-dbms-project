<?php 

    require_once("crudcon.php");
    if(isset($_GET['Del']))
         {
             $p_id = $_GET['Del'];
             $query = " delete from playg where p_id = '".$p_id."'";
             $result = mysqli_query($con,$query);
             if($result)
             {
                 header("location:view.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
            header("location:view.php");
         }

         ?>