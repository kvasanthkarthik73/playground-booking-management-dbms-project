<style>
.animate-charcter
{
   text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 190px;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <p class="animate-charcter"> WELCOME TO THE PLAYGROUND DATABASE</p>
      <center><h3 class="animate-charcter"><a href="http://localhost/playglogin/insert.php">INSERT</a><h3></center>
<center><h3 class="animate-charcter"><a href="http://localhost/playglogin/view.php">VIEW</a><h3></center>
    </div>
  </div>
</div>


