<style>
html{
	background-image: url('abcd.jpg')
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
  background-color:black;
  color: white;
}

</style>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "turf";

// CREATE CONNECTION
$conn = mysqli_connect($servername,
	$username, $password, $databasename);

// GET CONNECTION ERRORS
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// SQL QUERY
$query = "SELECT p_id, p_name FROM `playg`;";
// FETCHING DATA FROM DATABASE
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	// OUTPUT DATA OF EACH ROW
	while($row = mysqli_fetch_assoc($result)) {
		echo "<div class=\"inputfields\">playground id: " . $row["p_id"]
		. " <br>playground name: " . $row["p_name"]. "</div><br>
        <br>
        ";
	}
} else {
	echo "0 results";
}

$conn->close();

?>


