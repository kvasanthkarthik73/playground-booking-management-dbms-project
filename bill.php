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


</style>
<?php
// $billing_id = $_POST['billing_id'];
$slot_id = $_POST['slot_id'];
// $c_id = $_POST['c_id '];
// $price = $_POST['price'];
$booking_date = $_POST['booking_date'];
$p_name = $_POST['p_name'];
$c_name = $_POST['c_name'];
$p_id = $_POST['p_id'];
$email = $_POST['email'];
$st_t = $_POST['st_t'];
$end_t = $_POST['end_t'];

$conn = new mysqli('localhost','root','','turf');

	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
//     $query = mysqli_query($conn,"SELECT * FROM `registration` WHERE  email='$email'");
//     $query12 = mysqli_query($conn,"SELECT * FROM `registration` WHERE  uniqueid='$uniqueid'");
//   if(mysqli_num_rows($query) or mysqli_num_rows($query12)>0){
//     echo "<h1>E-mail or Unique-id already in use</h1>
//     <input type=button onClick=\"location.href='http://localhost/userreg/userreg.php'\"
//  value='click here to register again'>";
//   }
//   else{
    $q="select * from customer";
    $res=mysqli_query($conn,$q);
    $cid =  mysqli_num_rows($res) + 1;

    $q1="select * from invoice";
    $res1=mysqli_query($conn,$q1);
    $bid =  mysqli_num_rows($res1) + 7;
    
    

		$stmt = $conn->prepare("insert into customer(c_name,email,c_id) values(?,?,?)");
		$stmt->bind_param("ssi", $c_name,$email,$cid);
		
        $stmt2 = $conn->prepare("insert into slot(slot_id,booking_date,st_t,end_t) values(?,?,?,?)");
		$stmt2->bind_param("isss", $slot_id,$booking_date,$st_t,$end_t);
		

        $stmt4 = $conn->prepare("insert into invoice(billing_id,slot_id,booking_date,c_id) values(?,?,?,?)");
		$stmt4->bind_param("iisi",$bid,$slot_id,$booking_date,$cid);
		$execval = $stmt2->execute();
        $execval = $stmt->execute();

        $execval = $stmt4->execute();

        // echo header("Location:http://localhost/userreg/profile.php");
		// echo $execval;
		// echo "Registration successfully...";
        echo "<h1>User profile </h1> <br>
        <div class=\"inputfields\"><p> BILLING ID : {$bid}</p></div>
        <div class=\"inputfields\"><p> NAME : {$c_name}</p></div>
        <div class=\"inputfields\"><p> CUSTOMER ID : {$cid}</p></div>
        <div class=\"inputfields\"><p> EMAIL : {$email}</p></div>
        <div class=\"inputfields\"><p> PRICE: 2000 RUPEES</p></div>
        <div class=\"inputfields\"><p> SLOT ID : {$slot_id}</p></div>
        <div class=\"inputfields\"><p> Booking date : {$booking_date}</p></div>
        <div class=\"inputfields\"><p> Start time : {$st_t}</p></div>
        <div class=\"inputfields\"><p> End time : {$end_t}</p></div>
        <br></br>
        
        
        ";
		$stmt->close();
		$conn->close();}
	

?>

<!-- // <br></br>
        // <div class=\"inputfields\"><p>QUALIFICATION : {$qualification}</p></div>
        // <br></br>
        
        // <div class=\"inputfields\"><p>E-MAIL : {$email}</p></div>
        // <br></br>
        
        // <div class=\"inputfields\"><p>PHONE :  {$phone}</p></div>
        // <br></br>
       
        // <button>Search job</button>
        // <br></br>
        
        // <button>Job alerts </button> -->

