<!DOCTYPE html>
<html data-theme="dracula" lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php04</title>
</head>

<body>
  <p>Singup</p>
  <?php
  $fullname = '';
  if (isset($_POST['fullname'])) { //isset เช็คว่า มีค่าที่รับมาไหมมั้ย
    $fullname = $_POST['fullname']; //คือการแก้บัคที่มี error
  }
  $email = '';
  if (isset($_POST['email'])) { //isset เช็คว่า มีค่าที่รับมาไหมมั้ย
    $email = $_POST['email']; //คือการแก้บัคที่มี error
  }
  $pass = '';
  if (isset($_POST['password'])) { //isset เช็คว่า มีค่าที่รับมาไหมมั้ย
    $pass = $_POST['password']; //คือการแก้บัคที่มี error
  }
  $phone = '';
  if (isset($_POST['phone'])) { //isset เช็คว่า มีค่าที่รับมาไหมมั้ย
    $phone = $_POST['phone']; //คือการแก้บัคที่มี error
  }
  $servername = "localhost";
  $username = "root";
  $password = "";
  // $fullname = $_POST["fullname"];
  // $email = $_POST["email"];
  // $pass = $_POST["password"];
  // $phone= $_POST["phone"];
  // Create connection
  $conn = new mysqli($servername, $username, $password, "likebarb_er");

  $sql = "INSERT INTO users (fullname, email, password,phone) 
VALUES ('$fullname', '$email', '$pass','$phone')"; //วงเล็บแแรกคือชื่อ ฟิลเท้านั้น 
//วงเล็บที่2 คือตัวแปรที่รับมา
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully"; //คำสั่งsave
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

  echo '<hr>';
  echo "$fullname.$email.$pass.$phone";



  // Check connection
  if ($conn->connect_error) {
    echo 'error';
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  echo '<br>';
  echo '<br>';


  ?>
  <?php
  echo '<div class="flex items-end">';
  echo'<div class="w-full">';
  echo '<form action="signup.php" method="post" class="p-4 bg-green-500 text-lg text-slate-950 " >';
  echo 'fullname.<input type="text" name="fullname" class="input input-bordered w-full max-w-xs " >';
  echo '<br>';
  echo '<p class="text-red">email</p>.<input type="email" name="email"class="input  w-full max-w-xs" >';
  echo '<br>';
  echo '<p class="text-blue-500">password</p>.<input type="password" name="password"class="input  w-full max-w-xs" >';
  echo '<br>';
  echo '<p class="text-yellow-500">phone</p>.<input type="text" name="phone"class="input input-bordered w-full max-w-xs" >';
  echo '<br>';
  echo '<br>';
  echo '<button type="" class="btn btn-success">ลงทะเบียน</button>';
  echo '<a href="signin.php" class="btn"><p class="text-green-500 text-sm" >กลับไปยังหน้าเข้าสู่ระบบ</p></a>';
  echo '</form>';
  echo '</div>' ;
  echo '</div>';

  
  ?>
  
  

</body>

</html>