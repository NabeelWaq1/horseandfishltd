<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $list_1_type = $_POST['list-1-type'];

  $list_type_2 = $_POST['list_type_2'];

  $list_type_3 = $_POST['list_type_3'];

  $disclosure_reference_number = $_POST['dis_ref_no'];
  $issue_date = $_POST['issue_date'];
  $certificate_number = $_POST['cert_no'];
  $certificate_date = $_POST['cert-date'];
  $name_of_employer_service_provided_to = $_POST['section-2-name'];
  $address_of_employer_service_provide = $_POST['section-2-address'];
  $contact_no = $_POST['section-2-contact'];
  $position = $_POST['section-2-position'];
  $job_title = $_POST['section-2-job-title'];

  $start_date = $_POST['section-2-sdate'];
  $leave_date = $_POST['section-2-ldate'];
  $name = $_POST['section-3-name'];
  $address = $_POST['section-3-address'];
  $rel = $_POST['section-3-relation'];
  $how_long_have_you_known_the_referee = $_POST['section-3-referee'];
  $employ_name = $_POST['section-4-name'];
  $employ_address = $_POST['section-4-address'];
  $employ_post = $_POST['section-4-post'];
  $employ_tel = $_POST['section-4-telephone'];
  $employ_mobile = $_POST['section-4-mobile'];
  $employ_hub = $_POST['section-4-hub'];
  $employ_dep = $_POST['section-4-depart'];
  $employ_email = $_POST['section-4-email'];
  $nok_name = $_POST['section-4-name2'];
  $nok_address = $_POST['section-4-address2'];
  $nok_post = $_POST['section-4-post2'];
  $nok_tel = $_POST['section-4-telephone2'];
  $nok_mobile = $_POST['section-4-mobile2'];
  $nok_eve = $_POST['section-4-eve'];
  $nok_rel = $_POST['section-4-rel2'];

  $Photographic_Identification = $_FILES['ph-identification-file']['name'];
  $ph_temp_name = $_FILES['ph-identification-file']['tmp_name'];

  $proof_of_residency = $_FILES['residency-proof-file']['name'];
  $proof_of_residency_tmp_name = $_FILES['residency-proof-file']['tmp_name'];

  $identification = $_FILES['identification-file']['name'];
  $identification_tmp_name = $_FILES['identification-file']['tmp_name'];

  $supporting_docs = $_FILES['section-2-file']['name'];
  $supporting_docs_tmp_name = $_FILES['section-2-file']['tmp_name'];

  $folder1 = 'images/' . $Photographic_Identification;
  $folder2 = 'images/' . $proof_of_residency;
  $folder3 = 'images/' . $identification;
  $folder4 = 'images/' . $supporting_docs;



  if (!empty($list_1_type) && !empty($Photographic_Identification) && !empty($list_type_2) && !empty($proof_of_residency) && !empty($list_type_3) && !empty($name_of_employer_service_provided_to) && !empty($address_of_employer_service_provide) && !empty($contact_no) && !empty($position) && !empty($job_title) && !empty($supporting_docs) && !empty($start_date) && !empty($leave_date) && !empty($name) && !empty($address) && !empty($rel) && !empty($how_long_have_you_known_the_referee) && !empty($employ_name) && !empty($employ_address) && !empty($employ_post) && !empty($employ_tel) && !empty($employ_mobile) && !empty($employ_hub) && !empty($employ_dep) && !empty($employ_email) && !empty($nok_name) && !empty($nok_address) && !empty($nok_post) && !empty($nok_tel) && !empty($nok_mobile) && !empty($nok_eve) && !empty($nok_rel) && !empty($folder1) && !empty($folder2) && !empty($folder3)) {

    move_uploaded_file($ph_temp_name, $folder1);
    move_uploaded_file($proof_of_residency_tmp_name, $folder2);
    move_uploaded_file($identification_tmp_name, $folder3);
    move_uploaded_file($supporting_docs_tmp_name, $folder4);

    include('config/connect.php');

    $sql = mysqli_query($conn, "INSERT INTO `users` ( `list 1 type`, `Photographic Identification`, `list 2 type`, `proof of residency`, `list 3 type`, `identification`, `disclosure reference number`, `issues date`, `certificate number`, `certificate date`, `name of employer service provided to`, `address of employer service provided to`, `contact no`, `position`, `job title`, `supporting documents`, `start date`, `leave date`, `name`, `address`, `relationship`, `how long have you known the referee`, `employ_name`, `employ_address`, `employ_post`, `employ_tel`, `employ_mobile`, `employ_hub`, `employ_dep`, `employ_email`, `nok_name`, `nok_address`, `nok_post`, `nok_tel`, `nok_mobile`, `nok_eve`, `nok_rel`) VALUES ('$list_1_type', '$folder1', '$list_type_2', '$folder2', '$list_type_3', '$folder3', '$disclosure_reference_number', '$issue_date', '$certificate_number', '$certificate_date', '$name_of_employer_service_provided_to', '$address_of_employer_service_provide', '$contact_no', '$position', '$job_title', '$folder4', '$start_date', '$leave_date', '$name', '$address', '$rel', '$how_long_have_you_known_the_referee', '$employ_name', '$employ_address', '$employ_post', '$employ_tel', '$employ_mobile', '$employ_hub', '$employ_dep', '$employ_email', '$nok_name', '$nok_address', '$nok_post', '$nok_tel', '$nok_mobile', '$nok_eve', '$nok_rel');");

    if ($conn) {
?>
      <script>
        alert('Form Submitted Successfully');
      </script>
    <?php
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_connect_error($conn);
    }

    $conn->close();
  } else {
    $err = 'Please fill all the fields';
    ?>
    <script>
      alert('Please fill all the fields');
    </script>
<?php
  }
} else {
  // $err = 'Form cannot be submitted';
}
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horse And Fish Ltd. - Home</title>
  <link href="./src/output.css" rel="stylesheet">
  <link rel="shortcut icon" href="./Horse.png" type="image/x-icon">

</head>

<body class="bg-gray-2 w-screen min-h-screen overflow-x-hidden">
  <nav class=" bg-nav-color flex flex-row justify-center gap-20 tablet:gap-80  items-center py-4 sticky top-0 left-0 border-2 border-border-color border-x-0 border-t-0 px-10">
    <a href="./index.php" class="text-text-color hover:text-gray-2 hover:text-xl text-[10px] tablet:text-lg transition-all duration-700 ease-in-out">
      <h1 class="text-center font-bold pb-0 ">Horse And Fish Ltd.</h1>
    </a>
    <a href="./index.php" class="w-18 h-12 rounded-full tablet:w-20 tablet:h-20"><img src="./Horse.png" alt="" class="logo object-cover w-full h-full rounded-full hover:animate-spin tablet:ml-[-50px] mr-0"></a>
    <a href="./Admin" class=" no-underline text-text-color hover:text-gray-2 transition-all duration-500 ease-in-out text-[10px] tablet:text-lg pr-0 tablet:pr-0">Admin</a>
  </nav>
  <main class="w-screen min-h-screen overflow-x-hidden px-20 flex flex-col justify-center items-center gap-5 py-5">


    <h2 class="text-center text-h1-color font-bold text-3xl py-4 pb-1 tablet:py-6 tablet:pb-0 tablet:text-2xl">Registration Form For
      HNF Ltd.</h2>
    <hr class="bg-border-color text-border-color w-20 h-[5.5px] pt-0 mx-auto rounded-sm mt-[-15px]">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
      <!-- Section 1 -->
      <section id="Section-1" class="w-screen min-h-screen flex flex-col justify-start items-center gap-5 px-10">
        <h3 class="text-center tablet:text-xl py-2 pt-3 font-bold text-h1-color w-full text-lg">Section 1 - Proof of
          Identification</h3>
        <ul class="flex flex-col justify-center items-center gap-1">
          <li class="list-none">
            <p class="text-baby-powder text-sm text-center py-2">Documents requiring signature must be witd in 6 montds
              of expiry
              date - Name and address must be current - Bills must be less tdan 3 montds old</p>
          </li>
          <li class="list-none">
            <p class="text-baby-powder text-sm text-center">Please provide one document from list (1,2,3)</p>
          </li>
        </ul>
        <div class="lists flex flex-col justify-center items-start gap-10 px-20 py-3 w-full">
          <div class="flex tablet:justify-between items-center w-full px-20 tablet:flex-row flex-col justify-center ">
            <div class="ph-identification-name">
              <h4 class="text-md py-1 text-text-color font-semibold">List 1 - Photographic Identification</h4>
              <select class="outline-none border-none py-1  rounded-md" name="list-1-type" id="">
                <option value="UK Issue Passport">UK Issue Passport</option>
                <option value="Full UK Driving License Witd Photo">Full UK Driving License Witd Photo</option>
                <option value="714/715 Card or CIS Card Witd Photo">714/715 Card or CIS Card Witd Photo</option>
                <option value="Forces ID Card Witd Photo">Forces ID Card Witd Photo</option>
              </select>
              <input type="file" name="ph-identification-file" id="" class="my-5">
              <!-- <ul>
              <li class="flex gap-2"><input type="radio" name="ph-identification" id="ph-identification1"><label
                  class="text-sm" for="ph-identification1">UK Issue Passport</label></li>
              <li class="flex gap-2"><input type="radio" name="ph-identification" id="ph-identification2"><label
                  class="text-sm" for="ph-identification2">Full UK Driving License Witd Photo</label></li>
              <li class="flex gap-2"><input type="radio" name="ph-identification" id="ph-identification3"><label
                  class="text-sm" for="ph-identification3">714/715 Card or CIS Card Witd Photo</label></li>
              <li class="flex gap-2"><input type="radio" name="ph-identification" id="ph-identification4"><label
                  class="text-sm" for="ph-identification4">Forces ID Card Witd Photo</label></li>
            </ul> -->
            </div>
            <div class="residency-proof">
              <h4 class="text-md py-1 text-text-color font-semibold">List 2 - Proof of Residency</h4>
              <select class="outline-none border-none py-1  rounded-md" name="list_type_2" id="">
                <option value="Council Tax bill">Council Tax bill</option>
                <option value="TV License">TV License</option>
                <option value="Utility Bill (Gas - Electricity - Water)">Utility Bill (Gas - Electricity - Water)
                </option>
                <option value="Mobile or broadband bill">Mobile or broadband bill</option>
                <option value="Bank statement">Bank statement</option>
              </select>
              <input type="file" name="residency-proof-file" id="" class="my-5">
              <!-- <ul>
              <li class="flex gap-2"><input type="radio" name="residency-proof" id="residency-proof1"><label
                  class="text-sm" for="residency-proof1">Council Tax bill</label></li>
              <li class="flex gap-2"><input type="radio" name="residency-proof" id="residency-proof2"><label
                  class="text-sm" for="residency-proof2">TV License</label></li>
              <li class="flex gap-2"><input type="radio" name="residency-proof" id="residency-proof3"><label
                  class="text-sm" for="residency-proof3">Utility Bill (Gas - Electricity - Water)</label></li>
              <li class="flex gap-2"><input type="radio" name="residency-proof" id="residency-proof4"><label
                  class="text-sm" for="residency-proof4">Mobile or broadband bill</label></li>
              <li class="flex gap-2"><input type="radio" name="residency-proof" id="residency-proof5"><label
                  class="text-sm" for="residency-proof5">Bank statement</label></li>
            </ul> -->
            </div>
          </div>
          <div class="identification tablet:px-20 tablet:w-screen tablet:flex tablet:justify-start tablet:flex-col tablet:items-start tablet:gap-2 w-full  flex flex-col gap-2 justify-start items-center">
            <h4 class="text-md py-1 text-text-color font-semibold tablet:w-full w-[250px] text-start">List 3 - Identification</h4>
            <select class="outline-none border-none py-1 rounded-md" name="list_type_3" id="">
              <option value="UK Driving License (Photo Card)">UK Driving License (Photo Card)</option>
              <option value="Disclosure Reference"> Disclosure Reference</option>
              <option value="Passport">Passport</option>
            </select>
            <input type="file" name="identification-file" id="" class="h-15 px-5  py-0 w-[120px] tablet:w-full tablet:h-full">
            <ul class="tablet:my-5 my-0">

              <li class="flex gap-2 text-sm">Scottish Disclosure</li>
              <li class="text-sm m-3 flex flex-col gap-2 items-center justify-center tablet:flex-row ">
                <label for="reference-no" class="text-sm px-2 text-center"> Disclosure Reference Number: </label>
                <input type="text" placeholder="Reference number" id="reference-no" class="px-3 py-1 rounded-md border-none outline-none" name="dis_ref_no">
              </li>
              <li class="w-full m-3  flex flex-col gap-2 items-center justify-center tablet:flex-row">
                <label for="issue-date" class="text-sm px-2">Issue Date:</label>
                <input type="date" placeholder="date" class="px-3 text-opacity-20 rounded-md border-none outline-none" id="issue-date" name="issue_date">
              </li>
              <li class="">
                <div class="flex items-center gap-2 text-sm">Passport</div>
                <ul>
                  <li class="text-sm m-3 flex flex-col gap-2 items-center justify-center tablet:flex-row ">
                    <label for="cert-no" class="px-2">Certificate Number: </label>
                    <input id="cert-no" type="text" placeholder="number" class="px-3 py-1 rounded-md border-none outline-none" name="cert_no">
                  </li>
                  <li class="text-sm m-3 flex flex-col gap-2 items-center justify-center tablet:flex-row  ">
                    <label for="cert-date" class="px-2">Certificate Date: </label>
                    <input id="cert-date" type="text" placeholder="date" class="px-3 py-1 rounded-md border-none outline-none" name="cert-date">
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <section id="Section-2" class="w-screen min-h-screen flex flex-col justify-center items-center gap-5 py-8 my-1 border-t-1 mt-20 border-b-0 border-x-0 border-border-color border border-b-1">
        <h3 class="text-center text-xl py-2 pt-3 font-bold text-h1-color tablet:text-lg">Section 2 - Five Year History</h3>
        <ul class="flex flex-col justify-center items-center gap-1">
          <li class="list-none">
            <p class="text-baby-powder text-sm text-center px-10 tablet:w-[100%] tablet:px-7">Details are required for tde period of 5 years prior
              to
              application - tdese should include: Work History, Education, voluntary work and include an explanation of
              work gap in excess of 14 days.</p>
          </li>
        </ul>
        <table class="flex flex-col gap-10 w-full justify-center items-center my-5 min-h-[200px]">
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Name of Employer Service Provided To: </td>
            <td><input type="text" placeholder="Name" name="section-2-name" class="px-3 py-1 rounded-md border-none outline-none"></td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Address of Employer Service Provided To: </td>
            <td><textarea name="section-2-address" class="px-3 py-1 rounded-md border-none outline-none" id="" placeholder="Address"></textarea></td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Contact No: </td>
            <td><input type="number" name="section-2-contact" placeholder="Contact Number" class="px-3 py-1 rounded-md border-none outline-none" id=""></td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Position: </td>
            <td><input type="text" placeholder="Position" name="section-2-position" class="px-3 py-1 rounded-md border-none outline-none"></td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Job Title: </td>
            <td><input type="text" placeholder="Job Title" name="section-2-job-title" class="px-3 py-1 rounded-md border-none outline-none"></td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Supporting Documents(Evidence): </td>
            <td><input type="file" name="section-2-file" class=" w-20 mx-2 px-4 text-end" id=""></td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Start Date: </td>
            <td><input class="px-3 py-1 rounded-md border-none outline-none" type="date" name="section-2-sdate" id="">
            </td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Leave Date: </td>
            <td><input class="px-3 py-1 rounded-md border-none outline-none" type="date" name="section-2-ldate" id="">
            </td>
          </tr>

        </table>
      </section>
      <section id="Section-3" class="w-screen min-h-screen flex flex-col justify-center items-center gap-5 py-8 my-1 border-t-1 mt-20 border-b-0 border-x-0 border-border-color border border-b-1">
        <h3 class="text-center text-xl py-2 pt-3 font-bold text-h1-color tablet:text-lg">Section 3 - Character References</h3>
        <ul class="flex flex-col justify-center items-center gap-1 tablet:px-14 px-4">
          <li class="list-none">
            <p class="text-baby-powder text-sm text-center px-10 my-2 pb-4 tablet:py-2">Please supply details of 2 character referee's -
              these
              individuals must not be relatives or reside at your address.The referee's must have known you for a period
              of two years witdin the last 5 years. References will be taken up orally prlor to commencement of
              services.
              These will also be taken up in writing.
            </p>
            <p class="text-baby-powder text-sm text-center px-10 my-2 tablet:px-0">Information to be requested will include: a) The
              nature of
              their relationship with you b) Confirmation that notding is known about you which could adversely affect
              your suitability to supply
              services on behalf of this company. </p>
          </li>
        </ul>
        <table class="flex flex-col gap-10 w-full justify-center items-center my-5 min-h-[200px]">
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Name: </td>
            <td><input type="text" placeholder="Name" name="section-3-name" class="px-3 py-1 rounded-md border-none outline-none"></td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Address: </td>
            <td><textarea name="section-3-address" class="px-3 py-1 rounded-md border-none outline-none" id="" placeholder="Address"></textarea></td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">Relationship With You: </td>
            <td><input type="text" placeholder="Relationship" name="section-3-relation" class="px-3 py-1 rounded-md border-none outline-none"></td>
          </tr>
          <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
            <td class="text-[15px] px-10">How Long Have You Known The Referee: </td>
            <td><input type="number" placeholder="Years" name="section-3-referee" class="px-3 py-1 rounded-md border-none outline-none"></td>
          </tr>


        </table>
        <section id="Section-4" class="w-screen min-h-screen flex flex-col justify-center items-center gap-5 py-8 my-1 border-t-1 mt-20 border-b-0 border-x-0 border-border-color border border-b-1">
          <h2 class="text-center text-xl py-2 pt-3 font-bold text-h1-color"><u> NEXT OF KIN</u></h2>
          <h3 class="text-center text-h1-color font-semibold">Employee Details</h3>

          <table class="flex flex-col gap-10 w-full justify-center items-center my-5 min-h-[200px]">
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Name: </td>
              <td><input type="text" placeholder="Name" name="section-4-name" class="px-3 py-1 rounded-md border-none outline-none"></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Address: </td>
              <td><textarea name="section-4-address" class="px-3 py-1 rounded-md border-none outline-none" id="" placeholder="Address"></textarea></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Post Code: </td>
              <td><input type="text" name="section-4-post" placeholder="Post Code" class="px-3 py-1 rounded-md border-none outline-none" id=""></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Telephone: </td>
              <td><input type="tel" placeholder="telephone" name="section-4-telephone" class="px-3 py-1 rounded-md border-none outline-none"></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10"> Mobile: </td>
              <td><input type="number" placeholder="Number" name="section-4-mobile" class="px-3 py-1 rounded-md border-none outline-none"></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10"> Email: </td>
              <td><input type="email" name="section-4-email" class="px-3 py-1 rounded-md border-none outline-none" id=""></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Hub: </td>
              <td><input class="px-3 py-1 rounded-md border-none outline-none" type="text" name="section-4-hub" id="">
              </td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10"> Department: </td>
              <td><input class="px-3 py-1 rounded-md border-none outline-none" type="text" name="section-4-depart" id="">
              </td>
            </tr>

          </table>
          <h3 class="text-center text-h1-color font-semibold">Your next of kin Details</h3>

          <table class="flex flex-col gap-10 w-full justify-center items-center my-5 min-h-[200px]">
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Name: </td>
              <td><input type="text" placeholder="Name" name="section-4-name2" class="px-3 py-1 rounded-md border-none outline-none"></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Address: </td>
              <td><textarea name="section-4-address2" class="px-3 py-1 rounded-md border-none outline-none" id="" placeholder="Address"></textarea></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Post Code: </td>
              <td><input type="text" name="section-4-post2" placeholder="Post Code" class="px-3 py-1 rounded-md border-none outline-none" id=""></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Telephone: </td>
              <td><input type="tel" placeholder="telephone" name="section-4-telephone2" class="px-3 py-1 rounded-md border-none outline-none"></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10"> Mobile: </td>
              <td><input type="number" placeholder="Number" name="section-4-mobile2" class="px-3 py-1 rounded-md border-none outline-none"></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10"> Relationship: </td>
              <td><input type="text" placeholder="Relationship" name="section-4-rel2" class="px-3 py-1 rounded-md border-none outline-none" id=""></td>
            </tr>
            <tr class="py-2 flex w-29 justify-between items-center flex-col tablet:flex-row gap-2">
              <td class="text-[15px] px-10">Evening: </td>
              <td><input class="px-3 py-1 rounded-md border-none outline-none" type="text" placeholder="Evening" name="section-4-eve" id="">
              </td>
            </tr>

          </table>

          <p class="text-yellow-green text-center"><?php if (isset($err)) {
                                                      echo $err;
                                                    } ?></p>

        </section>

        <input type="submit" value="Submit" name="submit" class="py-1 px-4 bg-nav-color text-border-color rounded-md cursor-pointer hover:text-gray-2 hover:bg-border-color transition-all duration-500 ease-in-out">
    </form>
  </main>
  <footer class="bg-nav-color flex justify-center items-center py-4">
    <h1 class="text-gray-2 text-[10px]">Made By Technology Solutioner | &copy; copyright 2024</h1>
  </footer>
</body>

</html>