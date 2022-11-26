<?php 

    require_once("crudcon.php");

    if(isset($_POST['update']))
    {
        $p_id = $_POST['p_id'];
        $p_name = $_POST['p_name'];
        

        $query = " update playg set p_name = '".$p_name."', p_id='".$p_id."' WHERE  p_name='".$p_name."'";
        $query1 = " update playg set p_name = '".$p_name."', p_id='".$p_id."' WHERE  p_id='".$p_id."'";
        $result = mysqli_query($con,$query);
        $result1 = mysqli_query($con,$query1);
        if($result and $result1)
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