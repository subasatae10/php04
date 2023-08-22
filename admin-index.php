<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "likebarb_er";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT appointment.barber_id,appointment.service_id,appointment.date,appointment.time,appointment.comment FROM appointment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo $row["barber_id"].$row["service_id"].$row["date"].$row["time"].$row["comment"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>





<div class="overflow-x-auto">
  <table class="table w-1/3 bg-neutral-content text-base-300 m-auto">
    <!-- head -->
    <thead class="bg-base-300 ">
      <tr>
      
        <th>Barber</th>
        <th>email</th>
        <th>Service_name</th>
        <th>date</th>
        <th>time</th>
        <th>comment</th>
        <th>Action</th>
        <th></th>
      </tr>
    </thead>
    
    <tbody>
      <!-- row 1 -->
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "likebarb_er";
      
      
      
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
    //   $a = 1;
    //   while ($a < 100) {
    //     # code...
    //     echo '<tr>
    //     <th>'.$a.'</th>
    //     <td>Cy Ganderton</td>
    //     <td>Quality Control Specialist</td>
    //     <td>Blue</td>
    //   </tr>';  
    //     $a++;
    // }   
    $sql = "SELECT appointment.barber_id,appointment.service_id,appointment.date,
    appointment.time,appointment.comment,barbers.name,barbers.email,pr.name as service_name
    FROM appointment JOIN
     barbers,pr  WHERE appointment.barber_id = barbers.id and
     appointment.service_id = pr.id ";
     //⭐ WHERE  🟠FKต้นทาง = 🟡PKปลายทาง 
     //ถ้าใช้ ๋ JOIN ต้องมี WHERE เสมอ
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '
        <tr>
        <th>'.$row["name"].'</th>
        <th>'.$row["email"].'</th>
        <td>'.$row["service_name"].'</td>
        <td>'.$row["date"].'</td>
        <td>'.$row["time"].'</td>
        <td>'.$row["comment"].'</td>
        <td><button  class="btn  btn-success ">confirm</button></td>
        <td><button  class="btn btn-outline btn-error ">cancel</button></td>
      </tr>' ;
    }
  } else {
    echo "0 results";
  }
  $conn->close();
    
    ?>
    </tbody>
  </table>
</div>
<div class="mt-8">
<div class="card w-96 bg-neutral-content shadow-xl text-base-300 m-auto">
  <figure><img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
  <div class="card-body">
    <h2 class="card-title">Shoes!</h2>
    <p>If a dog chews shoes whose shoes does he choose?</p>
    <div class="card-actions justify-end">
      <button class="btn btn-primary">Buy Now</button>
    </div>
  </div>
</div>
</div>
</body>
</html>