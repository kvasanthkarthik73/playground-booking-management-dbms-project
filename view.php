<?php 

    require_once("crudcon.php");
    $query = " select * from playg ";
    $result = mysqli_query($con,$query);

?>
<style>
    body{
        text-align:center;
        align-items:center;
    }
    .row{
        margin-top:150px;
        margin-left:600px;
     }
.container{
    background-color:rgba(255, 0, 0, 0.6);;
}
.pool{
    rgba(255, 0, 0, 0.6);
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>View Records</title>
</head>
<body class="bg-dark">

        <div class="container">
        <a href="http://localhost/playglogin/insert.php">GO BACK TO INSERTING</a>
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td> playground name |||</td>
                                <td> playground id |||</td>
                               <td> Edit  |||</td>
                                <td> Delete||| </td>
                            </tr>
<?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $p_id = $row['p_id'];
                                        $p_name = $row['p_name'];
                                       
                            ?>
                                    <tr>
                                        <td><?php echo $p_id ?></td>
                                        <td><?php echo $p_name ?></td>
                                        <td><a href="you.php?GetID=<?php echo $p_id ?>">Edit</a></td>
                                        <td><a href="delete.php?Del=<?php echo $p_id ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>