<?php
include "shared/head.php";
// include "shared/header.php";
// include "shared/asside.php";
include "app/config.php";

session_start();
// Check if the session variable for the array exists
if (isset($_SESSION['my_array'])) {
  // Retrieve the array from the session variable
  $my_array = $_SESSION['my_array'];
} else {
  // If the session variable doesn't exist, initialize an empty array
  $my_array = array();
}

// Check if the "add" button is pressed
if (isset($_POST['add'])) {
  $name = $_POST['appeal'];
  // Add the new name to the array
  $my_array[] = $name;

  // Store the updated array back into the session variable
  $_SESSION['my_array'] = $my_array;
}
print_r($_SESSION['my_array'])

// if (isset($_POST['add'])) {
//   // Get the input value from the form
//   $input_value = $_POST["appeal"];

//   // Split the input value into an array of values
//   $values_array = explode(",", $input_value);

//   // Add values to the array using array_push()
//   foreach ($values_array as $value) {
//     array_push($my_array, $value);
//   }
//   $save=[];
//   $save []= $my_array;

//   print_r($save);
// }




// if(isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
//   $target_dir = "uploads/";
//   $files = $_FILES['files'];

//   for($i = 0; $i < count($files['name']); $i++) {
//       $file_name = $files['name'][$i];
//       $file_tmp = $files['tmp_name'][$i];
//       $file_size = $files['size'][$i];
//       $file_error = $files['error'][$i];


//       // check for errors
//       if($file_error === 0) {
//           $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
//           $file_dest = $target_dir . md5(uniqid()) . "." . $file_ext;

//           // move the uploaded file to the uploads directory
//           if(move_uploaded_file($file_tmp, $file_dest)) {
//               // echo "File $file_name uploaded successfully!<br>";
//           } else {
//               echo "There was an error uploading file $file_name.<br>";
//           }           
//       } else {
//           echo "Error uploading file $file_name.<br>";
//       }


//       $sql = "INSERT INTO files (filename, location, size) VALUES ('$file_name', '$file_dest', '$file_size')";
//       $s = mysqli_query($conn , $sql);
//   }
// }

// $link = $_GET['link_variable'];
// $data = ['ahmed' , 'mohamed'];
// if (isset($_POST['add'])) {
//   $appeal_name = $_POST['appeal'];
//   for($i = 1 ; $i<3 ; $i++){
//    array_push($data,"$appeal_name");
//   }
// }


// if (isset($_POST['send'])) {
//   $appeal_no = $_POST['appeal_no'];
//   $appeal_date = $_POST['appeal_date'];

//   $insert = "INSERT INTO `$link`(`id`, `Appeal_No`, `Appeal_Date`) VALUES (null,$appeal_no,'$appeal_date')";
//   $i = mysqli_query($conn, $insert);
// }

?>


<main id="main" class="main">

  <section class="section dashboard p-5">
    <div class="overlay"></div>
    <div class="container col-md-6">
      <div class="form-details">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="" class="label">رقم الأستئناف</label>
                <input type="number" name="appeal_no" class="form-control input_form">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="input_form" class="label">سنة الأستئناف</label>
                <input type="date" name="appeal_date" class="form-control input_form">
              </div>
            </div>
            <div class="col-lg-6">
              <form method="post" action="">
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="" class="label"> اسم المستئنف </label>
                      <input name="appeal" type="text" class="form-control input_form">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button name="add" class="plus"><i class="bi bi-plus"></i></button>
                  </div>
                </div>
              </form>
              <div class="alert alert alert-success text-center text-success">
                <ul>
                  <?php foreach ($my_array as $item) : ?>
                    <li><?= $item ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>

            <div class="col-lg-6">
              <form method="post" action="">
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="" class="label"> اسم المستئنف ضده </label>
                      <input name="appeal" type="text" class="form-control input_form">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button name="add" class="plus"><i class="bi bi-plus"></i></button>
                  </div>
                </div>
              </form>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="" class="label">الدائرة</label>
                <input type="text" class="form-control input_form" placeholder="رقم الدائرة">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="" class="label">تاريخ الحكم</label>
                <input type="date" class="form-control input_form" placeholder="رقم الدائرة">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label for="" class="label">منطوق الحكم</label>
                <textarea type="date" class="form-control text_area p-3" rows="3" cols="3" placeholder="أكتب شيئاً"></textarea>
              </div>
            </div>

            <div class="col-lg-8">
              <div class="form-group">
                <label for="" class="label">رفع الملف </label>
                <input type="file" name="files[]" multiple class="form-control input_form">
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <label for="" class="label"> عدد المستندات</label>
                <select name="" class="form-control input_form" id="select">
                  <option value="">1</option>
                  <option value="">2</option>
                </select>
              </div>
            </div>

            <div class="col-lg-3 mt-3">
              <!-- <button name="send" class="btn_save">
                حفظ
              </button> -->

              <input type="submit" value="Upload Files">
            </div>
          </div>

        </form>
      </div>
    </div>
  </section>

</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



<?php

include "shared/footer.php";
include "shared/script.php";

?>