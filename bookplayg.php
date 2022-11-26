<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

html, body {
  background-image: url('foot.jpg') !important;
  align-items: center;
  height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  border: 0;
  display: flex;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 16px;
  height: 100%;
  justify-content: center;
  margin: 0;
  padding: 0;
  color: #62aab7;
  
}
.container {
    padding: 50px;
  background-color: rgb(0, 0, 0);
  opacity: 0.7;
  position: relative;
  
}

 
hr {
  border: 1px solid #000000;
  margin-bottom: 25px;
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

.inputFields {
  margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  width: 250px;
  border: 1px solid rgba(10, 180, 180, 1);
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(20, 20, 20, .2);
  color: white;
  outline: none;
}

</style>
</head>
<body>
<form action="bill.php" method="post">
 
<div class="container">
  <center>  <h1>PLAYGROUND BOOKING</h1> </center> 

<hr>
<center>  <h1>PLAYGROUND BOOKING</h1> </center> 
<input type="text" name="c_name" placeholder= "Customer name" class="inputFields" size="15" required /> 
<br></br>
<input type="number" name="slot_id" placeholder= "SLOT ID" class="inputFields" size="15" required />
<br></br>
<input type="email" placeholder="Email" name="email" class="inputFields" required>  
<br/>
<input type="number" name="p_id" placeholder= "Playground id" class="inputFields" min=1 max= 1000  required /> 
<br></br>
<input type="text" name="p_name" placeholder= "Playground name" class="inputFields" size="15" required /> 
<br></br>
<input type="text" name="booking_date" placeholder= "Play date" class="inputFields" size="15" required /> 
<br/>
<input type="text" name="st_t" placeholder= "Start time" class="inputFields" size="15" required /> 
<input type="text" name="end_t" placeholder= "End time" class="inputFields" size="15" required />

<p>*PLEASE SELECT TIMESLOT WITH A DURATION OF 1 HOUR*</p>
<p>*PLEASE ENTER DATE IN DD/MM/YY FORMAT AND TIME IN HH:MM*</p>
<br/>


 



</div>

<label> 
<button type="submit" class="registerbtn">BOOK</button>    
</form>  
</body>  
</html>  