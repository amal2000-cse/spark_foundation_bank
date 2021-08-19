<html>
<head>

<style>
a{
     font-size:100%;
     
   }
form{
            background-image: url("https://images.pexels.com/photos/4025825/pexels-photo-4025825.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
            background-position: center center;
            background-repeat: no-repeat;
            background-position: scroll;
            background-size: cover;
            color:black;
            padding: 1px;
            


             
        }

label
{
    padding:3%;
    
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

<!--Js code for plugin-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

<section id="nav-bar">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <!---logo is here-->
        <a class="navbar-brand" href="#"><img src="https://bit.ly/3D7uojZ" width="10%"> &nbsp;The Sparks Foundation Online Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!--.ml-auto class pushes the elements right-side -->
        <ul class="navbar-nav ml-auto" >
            <li class="nav-item ">
              <a class="nav-link" href="home.html">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewcustomers.php">ACCOUNTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history.php">HISTORY</a>
            </li>
              
        </ul>
       </div>
      </nav>
</section>
<br><br><br>

<div>
<form method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>

<div class=" col-lg-6  col-md-6 col-sm-6">
<label for="from" class="form-label" >From:</label>
<input type="text" name="acc" id="from" class="form-control" ><br><br required>
</div>

<div class=" col-lg-6  col-md-6 col-sm-6">
<label for="amount" class="form-label" >Amount:</label>
<input type="number"name="amount" id="amount" class="form-control" ><br><br required>
</div>

<div class=" col-lg-6  col-md-6 col-sm-6">
<label for="to" class="form-label">To:</label>
<input type="text" name="ben" id="to" class="form-control" ><br><br required>
</div>

<button type ="submit" class="btn btn-primary"  onclick="confirm()">Send</button><br><br>


</form>

</div>


<script>
    function confirm()
    {
        alert("Are you sure you want to transfer funds ? ");
    }
</script>
</body>

</html>


<?php

date_default_timezone_set("Asia/Kolkata");
$servername = "127.0.0.1";
$username = "amal";
$password = "Suvarnam@123";
$dbname = "CUSTOMER";
$flag=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$accountholder=$_POST["acc"];
$beneficiary=$_POST["ben"];
 $amount=$_POST["amount"];
 $date=date("y-m-d");

 if(!empty($accountholder) && !empty($accountholder) && !empty($accountholder) ){
$sql="UPDATE customers SET balance = balance-'$amount' where name ='$accountholder' ";
$sql1="UPDATE customers SET balance = balance+'$amount' where name ='$beneficiary' ";

$sql2="INSERT INTO transaction_history (Accountholder,Beneficiary,Amount,date) VALUES ('$accountholder','$beneficiary',$amount,'$date')";

if($conn->query($sql) === TRUE) 
{
      if($conn->query($sql1) === TRUE &&   $conn->query($sql2)==TRUE)
    {
      echo"<script> alert('Transaction was successfull')</script>";
        //If both the amount credition and debition is done then , i want to add this details to the transaction history table.
       
    }else{echo"<script>alert('Please enter  valid details')</script>";}
    $flag=1;

  } else {
   die("Error updating record: " . $conn->error);
  
}


}else{
  echo"<script>alert('Input fields cannot be empty');</script>";
  }
}
?>

