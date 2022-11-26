<style>
body {
    background: #4c268f;
    color: #99eeb4;
    height: 100vh;
    text-align: center;
  }

.inputFields {
  margin: auto;
  display:block;
  font-size: 16px;
  font-family: "Dank Mono", ui-monospace, monospace;
  padding: 10px;
  width: 250px;
  height: 70px;
  border: 1px solid rgba(10, 180, 180, 1);
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(20, 20, 20, .2);
  color: white;
}
.registerbtn {
  background-color: #455547;
  color: white;
  font-size: medium;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.7;
}
.registerbtn:hover {
  opacity: 2;
}

</style>
<?php
   $conn = new mysqli('localhost','root','','turf');


   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   $sql = 'SELECT * FROM invoice';

   $retval = mysqli_query( $conn,$sql );

   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysqli_fetch_array($retval)) {
      echo "<div class=\"inputfields\">SLOT ID :{$row['slot_id']} </div><br> ".
         "<div class=\"inputfields\">BILLING ID: {$row['billing_id']} </div><br> ".
         "<div class=\"inputfields\">CUSTOMER ID: {$row['c_id']} </div><br> ".
         "<div class=\"inputfields\">BOOKING DATE : {$row['booking_date']} </div><br> ".
         "--------------------------------<br>".
         "--------------------------------<br>";
         
   }
 
   
   echo "<input type=button class=\"registerbtn\" onClick=\"location.href='http://localhost/playglogin/playgcrud.php'\"
value='PLAYGROUND DATABASE CRUD'>";
   
  
;
   mysqli_close($conn);
?>