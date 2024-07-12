<?php
if(isset($_GET['user_id']) || (isset($_GET['approve']) && isset($_GET['user_id']))){
  $user_id = $_GET['user_id'];
  include('../config/connect.php');
  $sql = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$user_id;");
  $res = mysqli_fetch_assoc($sql);
  if(isset($_GET['approve']) && isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $sql2 = mysqli_query($conn , "UPDATE `users` SET `status` = 'approved' WHERE `users`.`id` = $user_id;");
    if($sql2){
      ?>
      <script>
       
        alert('User Approved Successfully');
        
        window.location.href = './index.php';
      </script>
      <?php
    }
  }
}else{
  header("Location: ../index.php");
}
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horse And Fish Ltd. - User Details</title>
  <link href="../src/output.css" rel="stylesheet">
  <link rel="stylesheet" href="./dets.css">
  <link rel="shortcut icon" href="./Horse.png" type="image/x-icon">

</head>
<body class="bg-gray-2 w-screen min-h-screen overflow-x-hidden">
<nav class=" bg-nav-color flex flex-row justify-center gap-20 tablet:gap-80  items-center py-4 sticky top-0 left-0 border-2 border-border-color border-x-0 border-t-0 px-10">
    <div class="flex tablet:flex-row flex-col gap-5">
<u><a href="./index.php" class=" text-text-color hover:text-gray-2 transition-all duration-500 ease-in-out text-[10px] tablet:text-lg pr-0 tablet:pr-0 underline underline-offset-2">Back</a></u>
    <a href="./index.php" class="text-text-color hover:text-gray-2 hover:text-xl text-[10px] tablet:text-lg transition-all duration-700 ease-in-out py-0">
      <h1 class="text-center font-bold pb-0 ">Horse And Fish Ltd.</h1>
    </a>
    </div>
    <a href="./index.php" class="w-18 h-12 rounded-full tablet:w-20 tablet:h-20"><img src="../Horse.png" alt="" class="logo object-cover w-full h-full rounded-full hover:animate-spin tablet:ml-[-50px] mr-0"></a>
    <a href="./logout.php" class=" no-underline text-text-color hover:text-gray-2 transition-all duration-500 ease-in-out text-[10px] tablet:text-lg pr-0 tablet:pr-0">Logout</a>
  </nav>

  <main class="min-h-screen w-screen py-8 px-4 flex flex-col justify-start items-center gap-2 relative">
    <h1 class="text-h1-color font-bold text-3xl">Detail of User of id <?php if(isset($_GET['user_id'])){echo $_GET['user_id'];} ?></h1>
    <div class="flex flex-col gap-10 justify-center items-center w-full relative">
      <div class="flex flex-col gap-8 user-i px-5 tablet:px-20 justify-center items-center tablet:flex-row tablet:justify-between tablet:item-start w-full relative">
      <div class="flex flex-col gap-2 min-h-52 justify-start items-start tablet:w-[50%] tablet:bg-light-blue relative">
          <h2 class="text-lg text-h1-color font-semibold text-center">User Info</h2>
          <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Name: <?php echo $res['name'];  ?></h4>
          </div>
          <h4 class="text-sm font-medium">Address: <?php echo $res['address'];  ?></h4>
          <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Relationship with you: <?php echo $res['relationship'];  ?></h4>
          </div>
          <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Known the referee for: <?php echo $res['how long have you known the referee'];  ?> Years</h4>
          </div>
        </div>
        <div class="flex py-5 tablet:py-0 flex-col min-h-52 gap-2 justify-start items-start w-full proof tablet:bg-light-blue relative">
        <h2 class="text-lg text-h1-color font-semibold text-center">Proof of Identification</h2>
        <div class="flex gap-2 flex-col tablet:flex-row  items-center justify-center tablet:justify-start w-32">
        <h4 class="text-sm font-medium">Photographic Identification: <?php echo $res['list 1 type'];  ?></h4>
        <img src="../<?php  echo $res['Photographic Identification']; ?>" class="img1" alt="">
        </div>
        <div class="flex gap-2 flex-col tablet:flex-row  items-center justify-start w-32">
        <h4 class="text-sm font-medium">Proof of Residency: <?php echo $res['list 2 type'];  ?></h4>
        <img src="../<?php  echo $res['proof of residency']; ?>" class="img1" alt="">
        </div>
        <div class="flex gap-2 flex-col tablet:flex-row  items-center justify-start w-32">
        <h4 class="text-sm font-medium">Identification: <?php echo $res['list 3 type'];  ?></h4>
        <img src="../<?php  echo $res['identification']; ?>" class="img1" alt="">
        </div>
        <h4 class="text-sm font-medium">Disclosure Reference Number: <?php if(isset($res['disclosure reference number'])){echo $res['disclosure reference number'];} ?></h4>
        <h4 class="text-sm font-medium">Issue Date: <?php if(isset($res['issues date'])){echo $res['issues date'];} ?></h4>
        <h4 class="text-sm font-medium">Certificate Number: <?php if(isset($res['certificate number'])){echo $res['certificate number'];} ?></h4>
        <h4 class="text-sm font-medium">Certificate Date: <?php if(isset($res['certificate date'])){echo $res['certificate date'];} ?></h4>
        </div>
      </div>
      <div class="flex flex-col gap-6 user-i px-5 tablet:px-20 justify-center items-center tablet:flex-row tablet:justify-between tablet:item-start w-full relative">
      <div class="flex py-0 tablet:py-5 flex-col min-h-52 gap-2 justify-start items-start  tablet:bg-light-blue relative">
      <h2 class="text-lg text-h1-color font-semibold text-center">Five Year History</h2>
      <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Name of Employer Service Provided To: <?php echo $res['name of employer service provided to'];  ?></h4>
          </div>
          <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Address of Employer Service Provided To: <?php echo $res['address of employer service provided to'];  ?></h4>
          </div>
          <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Contact no: <?php echo $res['contact no'];  ?></h4>
          </div>
          <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Position: <?php echo $res['position'];  ?></h4>
          </div>
          <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Job Title: <?php echo $res['job title'];  ?></h4>
          </div>
          
          <div class="flex gap-1  items-center justify-start w-24 my-4">
          
          <h4 class="text-sm font-medium">Supporting Documents: </h4>
          <img src="../<?php  echo $res['supporting documents']; ?>" class="img1" alt="">
          </div>
          <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Start Date: <?php echo $res['start date'];  ?></h4>
          </div>
          <div class="flex gap-1  items-center justify-start w-24">
          <h4 class="text-sm font-medium">Leave Date: <?php echo $res['leave date'];  ?></h4>
          </div>
      </div>
      <div class="flex py-5 tablet:py-0 flex-col min-h-52 gap-2 justify-start items-start  tablet:bg-light-blue relative">
      <h2 class="text-lg text-h1-color font-semibold text-center">Employee Details: </h2>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Name: <?php echo $res['employ_name'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Address: <?php echo $res['employ_address'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Post Code: <?php echo $res['employ_post'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Telephone: <?php echo $res['employ_tel'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Mobile: <?php echo $res['employ_mobile'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Hub: <?php echo $res['employ_hub'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Department: <?php echo $res['employ_dep'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Email: <?php echo $res['employ_email'];  ?></h4>
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-6 user-i px-5 tablet:px-20 justify-center items-center tablet:flex-row tablet:justify-between tablet:item-start w-full relative">
    <div class="flex py-5 tablet:py-0 flex-col min-h-52 gap-2 justify-start items-start  tablet:bg-light-blue relative">
      <h2 class="text-lg text-h1-color font-semibold text-center">Next of Kin Details: </h2>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Name: <?php echo $res['nok_name'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Address: <?php echo $res['nok_address'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Post Code: <?php echo $res['nok_post'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Telephone: <?php echo $res['nok_tel'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Mobile: <?php echo $res['nok_mobile'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Evening: <?php echo $res['nok_eve'];  ?></h4>
        </div>
      <div class="flex gap-2 items-center justify-start w-32">
        <h4 class="text-sm font-medium">Relationship: <?php echo $res['nok_rel'];  ?></h4>
        </div>

      </div>

      </div>
      <div class="w-full flex justify-center items-center">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <?php if($res['status'] == 'approved'){ ?>
    <input type="submit" value="Approved" disabled class="py-1 px-2 text-lg font-bold bg-nav-color opacity-40 text-h1-color rounded-md hover:bg-h1-color hover:text-nav-color cursor-not-allowed transition-all duration-700 ease-in-out">
  <?php }else{ ?>
    <a href="./dets.php?user_id=<?php echo $res['id']; ?>&approve=truee" class="py-1 px-2 text-lg font-bold bg-nav-color text-h1-color rounded-md hover:bg-h1-color hover:text-nav-color cursor-pointer transition-all duration-700 ease-in-out">Approve</a>
    <?php } ?>
  </form>
  
</div>
  </main>
  <footer class="bg-nav-color flex justify-center items-center py-4">
    <h1 class="text-gray-2 text-[10px]">Made By Technology Solutioner | &copy; copyright 2024</h1>
  </footer>



</body>
</html>