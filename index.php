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
$date = $_POST["date"];
$time = $_POST["time"];
$barberadmin = $_POST["barberadmin"];
$comment = $_POST["comment"];
$servicetype = $_POST["servicetype"];
echo  $date; 
echo $time;
echo $barberadmin;
echo $comment;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO appointments (customer_id,barber_id,service_id,date,time,comment,status)
VALUES ('1','1','$servicetype','$date','$time','$comment','pending')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo '<form action="index.php" method="post" class="bg-white w-1/2 item-center m-auto p-8">';
echo '<h1 class="text-base-300">จองคิวเพื่อตัดผม</h1>';
echo  '<p class="text-base-300">วันที่</p>';
echo '<input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xs"  name="date" required />';
echo  '<p class="text-base-300">เวลา</p>';
echo '<input type="time" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="time" required/>';
echo  '<p class="text-base-300">ช่างตัดผม</p>';
echo '<select class="select select-bordered w-full max-w-xs" name="barberadmin" required>
<option disabled selected>เลือกช่างตัดผม</option>
<option value="1">ช่างตุ๊ก</option>
</select>';
echo '<br>';
echo '<br>';
echo '<select class="select select-bordered w-full max-w-xs" name="servicetype" required>
<option disabled selected>เลือกบริการ</option>
<option value="6">ตัดผม</option>
<option  value="7">โกนหนวด</option>
<option  value="8">สระ/ไดร์</option>
</select>';

echo '<br>';
echo '<br>';
echo '<textarea class="textarea textarea-bordered w-full" placeholder="ระบุความต้องการเพิ่มเติม" name="comment" required></textarea>';
echo '<br>';
echo '<div class="flex justify-between">';  
echo '<button class="btn justify-start ">กลับ</button>';
echo '<button type="submit" class="btn btn-outline btn-success ">ยืนยันการจอง</button>';
echo '</div>';
echo'</form>';
echo '<hr class="bg-white mt-8 mb-8" >';

// $sql = "SELECT id, firstname, lastname FROM MyGuests";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["barber_id"]. " " . $row["ervice_id"]. " " . $row["date"]." ". $row["time"]."<br>";
//   }
// } else {
//   echo "0 results";
// }
$conn->close();

?>

</body>
</html>