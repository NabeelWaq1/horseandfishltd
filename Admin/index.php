<?php
session_start();
include('../config/connect.php');
$email = $_SESSION['email'];
$pwd = $_SESSION['pwd'];
$sql = mysqli_query($conn,"SELECT * FROM `admin1080` WHERE `email`='$email' AND `password`='$pwd';");
if(mysqli_num_rows($sql)>0){
  $res = mysqli_fetch_assoc($sql);
}
if(isset($_SESSION['pwd']) && $_SESSION['pwd']==$res['password'] && isset($_SESSION['email']) && $_SESSION['email'] == $res['email']){
   $sql2 = mysqli_query($conn,"SELECT * FROM `users`;");
   if(isset($_GET['del_id']) && $_GET['del_id'] != null){
    $userId = $_GET['del_id'];
    $sql3 = mysqli_query($conn , "DELETE FROM `users` WHERE `users`.`id` = $userId;");
    if($sql3){
      ?>
      <script>
      alert('User Deleted Successfull');
        window.location.href = "./index.php";
      </script>
      <?php
    }
   }
}else{
  header('Location: ./admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horse And Fish Ltd. | Admin</title>
    <link rel="stylesheet" href="../src/output.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="shortcut icon" href="../Horse.png" type="image/x-icon">
   
</head>
<body class="bg-gray-2 w-screen min-h-screen overflow-x-hidden">
<nav class=" bg-nav-color flex flex-row justify-center gap-20 tablet:gap-80  items-center py-4 sticky top-0 left-0 border-2 border-border-color border-x-0 border-t-0 px-10">
    <a href="./index.php" class="text-text-color hover:text-gray-2 hover:text-xl text-[10px] tablet:text-lg transition-all duration-700 ease-in-out">
      <h1 class="text-center font-bold pb-0 ">Horse And Fish Ltd.</h1>
    </a>
    <a href="./index.php" class="w-18 h-12 rounded-full tablet:w-20 tablet:h-20"><img src="../Horse.png" alt="" class="logo object-cover w-full h-full rounded-full hover:animate-spin tablet:ml-[-50px] mr-0"></a>
    <a href="./logout.php" class=" no-underline text-text-color hover:text-gray-2 transition-all duration-500 ease-in-out text-[10px] tablet:text-lg pr-0 tablet:pr-0">Logout</a>
  </nav>
  <main class='w-screen min-h-screen flex flex-col justify-start items-center py-5'>
<h2 class="text-center text-h1-color font-bold text-3xl py-4 pb-1">Registered Users</h2>


<table id="myTable" class="display">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact No</th>
            <th>Relationship With You</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
      <?php if(mysqli_num_rows($sql2)>0){ ?>
      <?php while($user = mysqli_fetch_assoc($sql2)){ ?>
        <tr>
            <td><?php echo $user["id"]; ?></td>
            <td><?php echo $user["name"]; ?></td>
            <td><?php echo $user["address"]; ?></td>
            <td><?php echo $user["contact no"]; ?></td>
            <td><?php echo $user["relationship"]; ?></td>
            <td><?php echo $user["status"]; ?></td>
            <td>
              <ul class="flex gap-2 justify-center items-center">
                <li class="text-red"><a class="text-red bg-white w-10 h-10 rounded-md py-1 px-2" href="./index.php?del_id=<?php echo $user["id"];?>">Delete</a></li>
                <li><a href="./dets.php?user_id=<?php echo $user["id"];?>">Details</a></li>
              </ul>
            </td>
        </tr>
        <?php }} ?>
    </tbody>
</table>


  </main>
  <footer class="bg-nav-color flex justify-center items-center py-4">
    <h1 class="text-gray-2 text-[10px]">Made By Technology Solutioner | &copy; copyright 2024</h1>
  </footer>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
  <script>
      let table = new DataTable('#myTable');
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
</body>
</html>