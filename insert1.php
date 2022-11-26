<?php

    require_once("crudcon.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['p_name']) || empty($_POST['p_id']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $p_name = $_POST['p_name'];
            $p_id = $_POST['p_id'];
           

            $query = " insert into playg (p_name, p_id) values('$p_name','$p_id')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:view.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:insert1.php");
    }



?>