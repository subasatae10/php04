<!DOCTYPE html>
<html  data-theme="dracula" lang="en">
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
    $email = $_POST['email'];
    $pass = $_POST['password'];// $_POST คือการรับค่าจากอินพุท
    echo '<p class="pl-4">'.$email;
    echo $pass;
    echo '</p>';
    $dbname = "likebarb_er";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";


$sql = "SELECT email, password  FROM users WHERE email='$email' and password ='$pass'";
$result = mysqli_query($conn, $sql);//$result จะได้เปนตัวเลขกลับมาเสมอ 
    // echo 'ghg'.$result;
    echo '<form action="signin.php" method="post" class="pl-4 pt-4 pb-4 pr-4">';
    echo '<input type="email" name="email" class="input input-bordered w-full max-w-xs "';
    echo '<br>';
    echo '<input type="password" name="password" class="input input-bordered w-full max-w-xs">';
    echo '<button type="submit" class="btn">submit</button>';
      
    echo '</form>';
    if ( (mysqli_num_rows($result) > 0)) {
        # code...
         header("Location: index.php");
        // echo 'คุณใส่รหัสถูก';
  exit();
    } else {
        # code...
        echo 'div class="alert alert-warning">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
        <span>Warning:คุณใส่รหัสไม่ถูกต้อง</span>
      </div>';
    }
    
$conn->close();
   ?> 
</body>
</html>