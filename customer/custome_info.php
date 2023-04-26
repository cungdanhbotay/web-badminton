<?php
include_once __DIR__ . ('/../dbconnect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$makh = $_SESSION['makh'];
$sqlSelect = "SELECT * FROM khachhang WHERE makh = $makh;";

$resultSelect = mysqli_query($conn, $sqlSelect);
$list = [];
while ($row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC)) {
  $list = array(
    'makh' => $row['makh'],
    'tenkh' => $row['tenkh'],
    'diachi' => $row['diachi'],
    'email' => $row['email'],
    'dienthoai' => $row['dienthoai'],
    'hinhanhkh' => $row['hinhanhkh'],

  );
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Info </title>
  <link rel="stylesheet" href="./product.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <?php include_once(__DIR__ . '/../frontend/layouts/styles.php'); ?>
  <style>
  body {}

  .shaw {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }

  .form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
  }

  .profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
  }

  .profile-button:hover {
    background: #682773
  }

  .profile-button:focus {
    background: #682773;
    box-shadow: none
  }

  .profile-button:active {
    background: #682773;
    box-shadow: none
  }

  .back:hover {
    color: #682773;
    cursor: pointer
  }

  .labels {
    font-size: 11px
  }

  .add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
  }

  .text2 {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 600;
    color: black;
  }

  .text-1 {
    color: black;
  }

  .img-main {
    object-fit: contain;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
  }

  .mt-style {
    margin-top: 40px;
  }

  .img-user {
    align-items: center;
    display: flex;
    flex-direction: column;
  }

  .btnstyle {
    margin-top: 20px;
  }

  .line-letter {
    height: 3px;
    width: 100%;
    background-position-x: -30px;
    background-size: 116px 3px;
    background-image: repeating-linear-gradient(45deg, #6fa6d6, #6fa6d6 33px, transparent 0, transparent 41px, #f18d9b 0, #f18d9b 74px, transparent 0, transparent 82px);
  }

  /* .relief {

      color: #444;
      text-shadow:
        1px 0px 1px #ccc, 0px 1px 1px #eee,
        2px 1px 1px #ccc, 1px 2px 1px #eee,
        3px 2px 1px #ccc, 2px 3px 1px #eee,
        4px 3px 1px #ccc, 3px 4px 1px #eee,
        5px 4px 1px #ccc, 4px 5px 1px #eee,
        6px 5px 1px #ccc, 5px 6px 1px #eee,
        7px 6px 1px #ccc;
    } */
  </style>
</head>

<body>
  <?php include_once(__DIR__ . '/../frontend/layouts/partials/header.php'); ?>
  <!-- info -->

  <div class="container rounded bg-white mt-5 mb-5">
    <div class="line-letter"></div>
    <h3 class="relief" style="text-align: center; margin-top:20px;">User information <span
        class="badge badge-secondary text-1"><?= $kh['tenkh'] ?></span></h3>
    <div class="row mt-style">

      <div class="col">
        <div class="img-user">
          <form action="" method="post" enctype="multipart/form-data">
            <div style="margin: 0 150px;">
              <img class="img-main" src="/website_tmdt/assets/uploads/khachhang/<?= $list['hinhanhkh'] ?>" alt=""
                id="preview-img">
              <h3 class="btnstyle text-1">Edit image</h3>
            </div>
            <label for="hinhanhkh" class="btnstyle text-1">Select image:</label>
            <input type="file" id="hinhanhkh" name="hinhanhkh" class="btn btn-outline-info"
              accept=".jpg, .jpeg, .png, .gif">
            <button name="btnLuu" id="btnLuu" class="btn btn-primary"> Change photo</button>
          </form>

          <button type="button" class="btn btn-primary btnstyle" data-toggle="modal" data-target="#exampleModalCenter">Edit Information</button>
        </div>
      </div>

      <div class="col">
        <div class="group-info">
          <div class="col">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0 text-1 relief">Customer name</p>
                  </div>
                  <div class="col-sm-8">
                    <p class="text-muted mb-0"><?= $list['tenkh'] ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0 text-1 relief">Address</p>
                  </div>
                  <div class="col-sm-8">
                    <p class="text-muted mb-0"><?= $list['diachi'] ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0 text-1 relief">Email</p>
                  </div>
                  <div class="col-sm-8">
                    <p class="text-muted mb-0"><?= $list['email'] ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0 text-1 relief">Phone</p>
                  </div>
                  <div class="col-sm-8">
                    <p class="text-muted mb-0 "><?= $list['dienthoai'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="w-100"></div>
        <div class="line-letter"></div>
        <!--  -->
        <!-- Button trigger modal -->

        <!-- Modal -->


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-1 relief  " id="exampleModalLongTitle">Update information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" name="frmCreate" method="post" enctype="multipart/form-data">

                  <div class="col-md-12">
                    <div class="p-3 py-5">
                      <div class="d-flex justify-content-center align-items-center mb-3 flex-column">
                        <h4 class="text-right text-1">Customer information
                        </h4>
                        <h4 class="badge badge-success" style="padding: 20px;font-size: 20px;"><?= $list['tenkh'] ?>
                        </h4>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12"><label class="labels text2">Customer name</label>
                          <input id="tenkh" name="tenkh" type="text" class="form-control" placeholder="..."
                            value="<?= $list['tenkh'] ?>">
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12"><label class="labels text2">Phone </label>
                          <input name="dienthoai" type="text" class="form-control" placeholder="..."
                            value="<?= $list['dienthoai'] ?>">
                        </div>
                        <div class="col-md-12"><label class="labels text2">Address</label>
                          <input name="diachi" type="text" class="form-control" placeholder="..."
                            value="<?= $list['diachi'] ?>">
                        </div>
                        <div class="col-md-12"><label class="labels text2">Email</label>
                          <input name="email" type="text" class="form-control" placeholder="..."
                            value="<?= $list['email'] ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" id="btnSua" name="btnSua" class="btn btn-secondary">
                    </input>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OUTPUT</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!--  -->
        </div>


      </div>
    </div>
  </div>


  <?php include_once(__DIR__ . '/../frontend/layouts/partials/footer.php'); ?>
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <!-- <script src="../assets/vendor/jquery/jscript.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>

  <script>
  const reader = new FileReader();
  const fileInput = document.getElementById("hinhanhkh");
  const img = document.getElementById("preview-img");
  reader.onload = e => {
    img.src = e.target.result;
  }
  fileInput.addEventListener('change', e => {
    const f = e.target.files[0];
    reader.readAsDataURL(f);
  })
  </script>
</body>

</html>


<!-- Thay đổi hình ảnh -->
<?php
if (isset($_POST['btnLuu'])) {
  $errors = [];

  if (isset($_FILES['hinhanhkh'])) {
// For each file, there will be the following attributes:
     // $_FILES['chuong_hinhanh_tenhinh']['name'] : The name of the file we upload
     // $_FILES['chuong_hinhanh_tenhinh']['type'] : The type of file we upload (image, word, excel, pdf, txt, ...)
     // $_FILES['chuong_hinhanh_tenhinh']['tmp_name'] : The path to the temporary file on the web server
     // $_FILES['chuong_hinhanh_tenhinh']['error'] : Status of the file we uploaded, 0 => no error
     // $_FILES['chuong_hinhanh_tenhinh']['size'] : Size of the file we upload
     // -- Validate in case the file Uploaded to the Server fails
     // If the file upload has an error, ie the error attribute > 0
    if ($_FILES['hinhanhkh']['error'] > 0) {
      // File Upload Bị Lỗi
      $fileError = $_FILES["hinhanhkh"]["error"];

      
      switch ($fileError) {
        case UPLOAD_ERR_OK: // 0
          break;
        case UPLOAD_ERR_INI_SIZE:
          // Exceeds max size in php.ini
          $errors['hinhanhkh'][] = [
            'rule' => 'max_size',
            'rule_value' => '5Mb',
            'value' => $_FILES["hinhanhkh"]["tmp_name"],
            'msg' => 'The file you uploaded is too large. Please upload files no larger than 5Mb...'
          ];
          break;
        case UPLOAD_ERR_PARTIAL:
          // Exceeds max size in html form
          $errors['hinhanhkh'][] = [
            'rule' => 'max_size',
            'rule_value' => '5Mb',
            'value' => $_FILES["hinhanhkh"]["tmp_name"],
            'msg' => 'The file you uploaded is too large. Please upload files no larger than 5Mb...'
          ];
          break;
        case UPLOAD_ERR_NO_FILE:
          // No file was uploaded
          $errors['hinhanhkh'][] = [
            'rule' => 'no_file',
            'rule_value' => true,
            'value' => $_FILES["hinhanhkh"]["tmp_name"],
            'msg' => 'You have not selected a file to upload...'
          ];
          break;
        case UPLOAD_ERR_NO_TMP_DIR:
          // No /tmp dir to write to
          break;
        case UPLOAD_ERR_CANT_WRITE:
          // Error writing to disk
          break;
        case UPLOAD_ERR_EXTENSION:
          // A PHP extension stopped the file upload
          break;
        default:
          // No error was faced! Phew!
          break;
      }
    } else {
      // -- Validate trường hợp file Upload lên Server thành công mà bị sai về Loại file (file types)
      // Nếu người dùng upload file khác *.jpg, *.jpeg, *.png, *.gif
      // thì báo lỗi
      $file_extension = pathinfo($_FILES['hinhanhkh']["name"], PATHINFO_EXTENSION); // Lấy đuôi file (file extension) để so sánh
      if (!($file_extension == 'jpg' || $file_extension == 'jpeg'
        || $file_extension == 'png' || $file_extension == 'gif'
      )) {
        $errors['hinhanhkh'][] = [
          'rule' => 'file_extension',
          'rule_value' => '.jpg, .jpeg, .png, .gif',
          'value' => $_FILES['hinhanhkh']["name"],
          'msg' => 'Only allow uploading of formats (*.jpg, *.jpeg, *.png, *.gif)...'
        ];
      }

      // -- Validate trường hợp file Upload lên Server thành công mà kích thước file quá lớn
      $file_size = $_FILES['hinhanhkh']["size"];
      if ($file_size > (1024 * 1024 * 10)) { // 1 Mb = 1024 Kb = 1024 * 1024 Byte
        $errors['hinhanhkh'][] = [
          'rule' => 'file_size',
          'rule_value' => (1024 * 1024 * 10),
          'value' => $_FILES['hinhanhkh']["name"],
          'msg' => 'Only allow uploading files smaller than 10Mb...'
        ];
      }
    }
  }
}

if (isset($_POST['btnLuu']) && !empty($errors)) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <ul>
    <?php foreach ($errors as $fields) : ?>
    <?php foreach ($fields as $field) : ?>
    <li><?= $field['msg'] ?></li>
    <?php endforeach; ?>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif;

// 
if (isset($_POST['btnLuu']) && empty($errors)) {
  $upload_dir = __DIR__ . "/../assets/uploads/khachhang/";

  $tentaptin = $_FILES['hinhanhkh']['name'];
  move_uploaded_file(
    $_FILES['hinhanhkh']['tmp_name'],$upload_dir . $tentaptin);

  include_once __DIR__ . '/../dbconnect.php';
  $makh = $_SESSION['makh'];

  $sqlAdd = "UPDATE khachhang SET        
          hinhanhkh = '$tentaptin'
          WHERE makh = $makh";
  //Thuc thi sql
  mysqli_query($conn, $sqlAdd);
  echo "<script>window.open('/website_tmdt/customer/custome_info.php','_self')</script>";
}
?>


<!-- Thay đổi thông tin khách hàng -->
<?php
include_once __DIR__ . '/../dbconnect.php';
if (isset($_POST['btnSua'])) {

  $tenkh = $_POST['tenkh'];
  $diachi = $_POST['diachi'];
  $dienthoai = $_POST['dienthoai'];
  $email = $_POST['email'];


  $errors = [];


  // Calidate Tên 
  // Rule1: Required
  if (empty($tenkh)) {
    $errors['tenkh'][] = [
      'rule' => 'required',
      'rule_value' => true,
      'value' => $tenkh,
      'msg' => 'Please enter your name'
    ];
  }

  if (empty($diachi)) {
    $errors['diachi'][] = [
      'rule' => 'required',
      'rule_value' => true,
      'value' => $diachi,
      'msg' => 'Please enter your address'
    ];
  }

  if (empty($dienthoai)) {
    $errors['dienthoai'][] = [
      'rule' => 'required',
      'rule_value' => true,
      'value' => $dienthoai,
      'msg' => 'Please enter your phone number'
    ];
  }

  if (empty($email)) {
    $errors['email'][] = [
      'rule' => 'required',
      'rule_value' => true,
      'value' => $email,
      'msg' => 'Please enter your email'
    ];
  }
}
?>

<?php
if (isset($_POST['btnSua']) && !empty($errors)) :
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

  <ul>
    <?php foreach ($errors as $fields) : ?>
    <?php foreach ($fields as $fields) : ?>
    <li><?= $fields['msg'] ?></li>
    <?php endforeach; ?>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>

<?php
if (isset($_POST['btnSua']) && empty($errors)) {
  include_once __DIR__ . '/../dbconnect.php';

  $check_id = $_SESSION['makh'];

  $sqlUpdate = "UPDATE khachhang SET
        tenkh = '$tenkh',
        diachi = '$diachi',
        dienthoai = '$dienthoai',
        email = '$email'
        WHERE makh = $check_id;
    ";
  //Thuc thi sql
  mysqli_query($conn, $sqlUpdate);
  echo "<script>window.open('/website_tmdt/customer/custome_info.php','_self')</script>";
}
?>