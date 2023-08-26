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
                
                // sql to delete a record

                if (isset($_POST["aid"])) {
                  # code...
                  
                $aid = $_POST["aid"];
                $sqldel = "DELETE FROM appointments WHERE id='$aid' ";
                if ($conn->query($sqldel) === TRUE) {
                  echo "Record deleted successfully";
              } else {
                  echo "Error deleting record: " . $conn->error;
              }

                }

                $sql = "SELECT appointments.id,appointments.barber_id,appointments.service_id,appointments.date,
    appointments.time,appointments.comment,barbers.name,barbers.email,services.name as service_name
    FROM appointments JOIN
     barbers,services  WHERE appointments.barber_id = barbers.id and
     appointments.service_id = services.id ";
                //⭐ WHERE  🟠FKต้นทาง = 🟡PKปลายทาง 
                //ถ้าใช้ ๋ JOIN ต้องมี WHERE เสมอ
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '
        <tr>
        <th>' . $row["name"] . '</th>
        <th>' . $row["email"] . '</th>
        <td>' . $row["service_name"] . '</td>
        <td>' . $row["date"] . '</td>
        <td>' . $row["time"] . '</td>
        <td>' . $row["comment"] . '</td>

        <td><button  class="btn  btn-success ">confirm</button></td>
       <td><form action="admin-index.php" method="post">  <input type="text" value="' . $row["id"] . '" name="aid" Class="invisible ">  <button type="submit" class="btn btn-outline btn-error -mt-3">cancel</button></form> </td>
      </tr>';
                    }
                } else {
                   
                }
                $conn->close();

                ?>
            </tbody>
        </table>
    </div>

    <div class="overflow-x-auto">
  <table class="table w-1/2 m-auto">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Job</th>
        <th>Favorite Color</th>
      </tr>
    </thead>
    <tbody>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "likebarb_er";

$conn = new mysqli($servername, $username, $password,$dbname);//ต่อจากconn CRUD  
if (isset( $_POST["user_id"])
and isset($_POST["name"])
and isset($_POST["email"])
and isset($_POST["phone"])
and isset($_POST["password"])

) {
  # code...
  $user_id = $_POST["user_id"];
  $name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$pass = $_POST["password"];
$sql_update = "UPDATE customers SET  `name` = '$name',email='$email' , `phone` = '$phone', `password` = '$pass' WHERE id=$user_id";
if ($conn->query($sql_update) === TRUE) {
  header("Location:#my_modal_dbsuccess");
  exit();
} else {
    header("Location:#my_db_error");
  exit();
}
}


if (isset( $_POST['uid'])) {
  # code...
  
  $uid = $_POST['uid'];
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "DELETE FROM customers WHERE id=$uid";
  
  if ($conn->query($sql) === TRUE) {
    
    header("Location:#my_modal_dbsuccess");
  } else {
    header("Location:#my_db_error");
    
 
    exit();
  }
  
}






// Check connection



$sql = "SELECT customers.id,customers.name,customers.email,customers.phone,customers.password FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<tr class="bg-base-content text-base-200 ">
    <th>'.$row["name"].'</th>
    <td>'.$row["email"].'</td>
    <td>'.$row["phone"].'</td>
    <td>'.$row["password"].'</td>
    <td><a href="#my_modal_2" class="btn bg-green-500 m-auto">แก้ไขข้อมูล</a></td>
    <td><form action="admin-index.php" method="post"> 
    
    <button type="sumbit"class="btn btn-error ">ลบ</button> 
    <input type="text" name="uid" value=" '.$row['id'].' " class="invisible hidden " >
    </form></td>
    </tr>';


    echo '<div class="modal" id="my_modal_2">
    <div class="modal-box">
      <h3 class="font-bold text-lg">แก้ไขข้อมูลผู้ใช้งาน</h3>
    
  <form action="admin-index.php" method="post"  >
  <input type="text" name="user_id" class="input input-bordered w-full max-w-xs mt-3 mb-3 invisible " value="'.$row["id"].' " ><br>
  <p class="-mt-8">name</p><input type="text" name="name" class="input input-bordered w-full max-w-xs mt-3 mb-3" value="'.$row["name"].'"><br>
  <p>email</p><input type="email" name="email" class="input input-bordered w-full max-w-xs mt-3 mb-3"value="'.$row["email"].'">
  <p>phone</p><input type="text"name="phone"class="input input-bordered w-full max-w-xs mt-3 mb-3" value="'.$row["phone"].'">
  <p>password</p><input type="password" name="password"class="input input-bordered w-full max-w-xs mt-3 mb-3" value="'.$row["password"].'">
  <br><a href="#" class="btn">กลับ</a>
  <button type="submit"class="btn btn-success bg-green-500 m-4">บันทึกข้อมูล!</button>
  </form>
  
    </div>
  </div>';



    
  }
} else {
 
}
     

?>
  
</tbody>

  </table>
</div>

<div class="m-auto">
<!-- The button to open modal -->

<!-- Put this part before </body> tag -->
<div class="modal m-auto" id="my_modal_1">
  <div class="modal-box">
    <h3 class="font-bold text-lg">Hello!</h3>
    <p class="py-4">This modal works with anchor links</p>
    <input type="text" value="n">
    <div class="modal-action">
     <a href="#" class="btn">Yay!</a>
    </div>
  </div>
</div>
</div>

<!-- The button to open modal -->
<div class="m-auto">

<!-- Put this part before </body> tag -->

</div>



<!-- The button to open modal -->

<!-- Put this part before </body> tag -->
<div class="modal " id="my_modal_dbsuccess">
  <div class="modal-box bg-green-500">
    <h3 class="font-bold text-zinc-950 ">บันทึกข้อมูลสำเร็จ!</h3>

    <div class="modal-action">
     <a href="#" class="btn">Okay!</a>
    </div>
  </div>
</div>


<!-- The button to open modal -->

<!-- Put this part before </body> tag -->
<div class="modal" id="my_db_error">
  <div class="modal-box bg-red-950">
    <h3 class="font-bold text-lg">บันทึกข้อมูลไม่สำเร็จ</h3>
    <p class="py-4">This modal works with anchor links</p>
    <div class="modal-action">
     <a href="#" class="btn">Yay!</a>
    </div>
  </div>
</div>
</body>

</html>