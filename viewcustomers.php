


<?php
$servername = "127.0.0.1";
$username = "amal";
$password = "Suvarnam@123";
$dbname = "CUSTOMER";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name,emailid,balance FROM customers";


$result = $conn->query($sql);

$table="<div class='table-responsive'> <table class='table-bordered table table-striped '><tr><th class='table-dark'>Name</th><th class='table-dark'>Email</th><th class='table-dark'>Balance</th></tr>";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
     {
     $table.=  "<tr><td>" . $row["name"]. "</td><td>" . $row["emailid"]. " </td><td>" .$row["balance"]. "</td></tr>";
    }
  } else {
    echo "0 results";
  }

    $table.="</table></div";
    echo $table;


?>

<html>
<head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    
    table
    {
        
        font-size:200%;
        text-align:center;
    }
    
</style>
</head>
<body>
  <div style="margin-left:50%;">
<button type ="submit" class="btn btn-primary"><a href="transfer.php" style="text-decoration:none; color:white">Back</button>
 </div>

 </body>

</html>