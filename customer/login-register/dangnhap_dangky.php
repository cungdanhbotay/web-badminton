<?php
include_once(__DIR__  . '/../../dbconnect.php');
session_start();
//nhan bien
//yeu thichs
$yeuthich = null;
if (isset($_GET['yeuthich'])) {
    $yeuthich = $_GET['yeuthich'];
    $_SESSION['yeuthich'] = $yeuthich;
    // header('location: /website_tmdt/customer/favorite.php');
} else {
    $_SESSION['yeuthich'] = $yeuthich;
}
//gio hang
$giohang = null;
if (isset($_GET['giohang'])) {
    $giohang = $_GET['giohang'];
    $_SESSION['giohang'] = $giohang;
} else {
    $_SESSION['giohang'] = $giohang;
}
//them gio hang
$themgiohang = null;
if (isset($_GET['themgiohang'])) {
    $themgiohang = $_GET['themgiohang'];
    $_SESSION['themgiohang'] = $themgiohang;
} else {
    $_SESSION['$themgiohang'] = $themgiohang;
}
//sanpham
$masp = null;
if (isset($_GET['masp'])) {
    $masp = $_GET['masp'];
    $_SESSION['masp'] = $masp;
}
//math
$math = null;
if (isset($_GET['math'])) {
    $math = $_GET['math'];
    $_SESSION['math'] = $math;
}
//kiem tra trong cookie
if (isset($_SESSION['makh'])) {
    header('location: /website_tmdt/index.php');
}
//lay danh sach khach hang
$sqlKh = "select * from khachhang";
$resultKh = mysqli_query($conn, $sqlKh);
$listkh = [];
while ($row = mysqli_fetch_array($resultKh, MYSQLI_ASSOC)) {
    $listkh[] = array(
        'makh' => $row['makh'],
        'tenkh' => $row['tenkh'],
        'diachi' => $row['diachi'],
        'email' => $row['email'],
        'dienthoai' => $row['dienthoai'],
        'gioitinh' => $row['gioitinh'],
        'password' => $row['password'],
        'hinhanhkh' => $row['hinhanhkh']
    );
}

//login
if (isset($_POST['dangnhap'])) {
    $check = false;
    $getIdkh = null;
    $noidung = "Wrong account or password ";
    $email = $_POST['email'];
    $password = $_POST['password'];
    foreach ($listkh as $khachhang) {
        if ($email == $khachhang['email'] && md5($password) == $khachhang['password']) {
            $check = true;
            $getIdkh = $khachhang['makh'];
            break;
        }
    }
    if ($check == true) {
        $_SESSION['makh'] = $getIdkh;
        if ($_SESSION['yeuthich'] == 'yeuthich') {
            unset($_SESSION['yeuthich']);
            unset($_SESSION['giohang']);
            unset($_SESSION['themgiohang']);
            //echo '<script type="text/javascript">alert("login successfull !") </script>';
            header('location: /website_tmdt/customer/product_like.php');
        } else if ($_SESSION['giohang'] == 'giohang') {
            unset($_SESSION['yeuthich']);
            unset($_SESSION['giohang']);
            unset($_SESSION['themgiohang']);
            header('location: /website_tmdt/customer/giohang.php');
        } else if (isset($_SESSION['masp'])) {
            unset($_SESSION['yeuthich']);
            unset($_SESSION['giohang']);
            unset($_SESSION['themgiohang']);
            $masp_send = $_SESSION['masp'];
            $math_send = $_SESSION['math'];
            echo "<script>window.location='/website_TMDT/page_main/detail_product.php?masp=$masp_send&math=$math_send'</script>";
        } else if (($_SESSION['themgiohang'] == 'themgiohang')) {
            header('location: /website_tmdt/index.php');
        } else {
            header('location: /website_tmdt/index.php');
        }
    } else {
        echo $noidung;
    }
}
//register

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhâp - Đăng ký</title>
  <style>
  body {
    margin: 0;
    color: #6a6f8c;
    background: #c8c8c8;
    font: 600 16px/18px 'Open Sans', sans-serif;
  }

  *,
  :after,
  :before {
    box-sizing: border-box
  }

  .clearfix:after,
  .clearfix:before {
    content: '';
    display: table
  }

  .clearfix:after {
    clear: both;
    display: block
  }

  a {
    color: inherit;
    text-decoration: none
  }

  .login-wrap {
    margin-top: 34px;
    width: 100%;
    margin: auto;
    max-width: 525px;
    min-height: 670px;
    position: relative;
    background: url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
  }

  .login-html {
    width: 100%;
    height: 100%;
    position: absolute;
    padding: 90px 70px 50px 70px;
    background: rgba(40, 57, 101, .9);
  }

  .login-html .sign-in-htm,
  .login-html .sign-up-htm {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: all .4s linear;
  }

  .login-html .sign-in,
  .login-html .sign-up,
  .login-form .group .check {
    display: none;
  }

  .login-html .tab,
  .login-form .group .label,
  .login-form .group .button {
    text-transform: uppercase;
  }

  .login-html .tab {
    font-size: 22px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin: 0 15px 10px 0;
    display: inline-block;
    border-bottom: 2px solid transparent;
  }

  .login-html .sign-in:checked+.tab,
  .login-html .sign-up:checked+.tab {
    color: #fff;
    border-color: #1161ee;
  }

  .login-form {
    min-height: 345px;
    position: relative;
    perspective: 1000px;
    transform-style: preserve-3d;
  }

  .login-form .group {
    margin-bottom: 15px;
  }

  .login-form .group .label,
  .login-form .group .input,
  .login-form .group .button {
    width: 100%;
    color: #fff;
    display: block;
  }

  .login-form .group .input,
  .login-form .group .button {
    border: none;
    padding: 15px 20px;
    border-radius: 25px;
    background: rgba(255, 255, 255, .1);
  }

  .login-form .group input[data-type="password"] {
    text-security: circle;
    -webkit-text-security: circle;
  }

  .login-form .group .label {
    color: #aaa;
    font-size: 12px;
  }

  .login-form .group .button {
    background: #1161ee;
  }

  .login-form .group label .icon {
    width: 15px;
    height: 15px;
    border-radius: 2px;
    position: relative;
    display: inline-block;
    background: rgba(255, 255, 255, .1);
  }

  .login-form .group label .icon:before,
  .login-form .group label .icon:after {
    content: '';
    width: 10px;
    height: 2px;
    background: #fff;
    position: absolute;
    transition: all .2s ease-in-out 0s;
  }

  .login-form .group label .icon:before {
    left: 3px;
    width: 5px;
    bottom: 6px;
    transform: scale(0) rotate(0);
  }

  .login-form .group label .icon:after {
    top: 6px;
    right: 0;
    transform: scale(0) rotate(0);
  }

  .login-form .group .check:checked+label {
    color: #fff;
  }

  .login-form .group .check:checked+label .icon {
    background: #1161ee;
  }

  .login-form .group .check:checked+label .icon:before {
    transform: scale(1) rotate(45deg);
  }

  .login-form .group .check:checked+label .icon:after {
    transform: scale(1) rotate(-45deg);
  }

  .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
    transform: rotate(0);
  }

  .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
    transform: rotate(0);
  }

  .hr {
    height: 2px;
    margin: 60px 0 50px 0;
    background: rgba(255, 255, 255, .2);
  }

  .foot-lnk {
    text-align: center;
  }
  </style>
</head>

<body>
  <div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
      <div class="login-form">
        <form action="" method="post">
          <div class="sign-in-htm">
            <div class="group">
              <label for="email" class="label">Email</label>
              <input name="email" id="email" type="email" class="input" placeholder="Email">
            </div>
            <div class="group">
              <label for="password" class="label">Password</label>
              <input name="password" id="password" type="password" class="input" data-type="password"
                placeholder="Password">
            </div>
            <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
              <input name="dangnhap" type="submit" class="button" value="Sign In">
            </div>
            <div class="hr"></div>
          </div>
        </form>
        <form action="" method="post">
          <div class="sign-up-htm">
            <div class="group">
              <label for="email" class="label">Email</label>
              <input name="email" id="email" type="email" class="input">
            </div>
            <div class="group">
              <label for="password" class="label">Password</label>
              <input name="password" id="password" type="password" class="input" data-type="password">
            </div>
            <div class="group">
              <label for="tenkh" class="label">user name</label>
              <input name="tenkh" id="tenkh" type="text" class="input">
            </div>
            <div class="group">
              <label for="diachi" class="label">Address</label>
              <input name="diachi" id="diachi" type="text" class="input">
            </div>
            <div class="group">
              <label for="dienthoai" class="label">Phone</label>
              <input name="dienthoai" id="dienthoai" type="text" class="input">
            </div>
            <div class="group">
              <input name="dangky" type="submit" class="button" value="Sign Up">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <label for="tab-1">Already Member?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script>

  </script>
</body>

</html>

<?php
include_once(__DIR__ . '/../../dbconnect.php');

if (isset($_POST['dangky'])) {
    
    $tenkh = $_POST['tenkh'];
    $email = $_POST['email'];
	$dienthoai = $_POST['dienthoai'];
	$diachi = $_POST['diachi'];
    $password = $_POST['password'];

    $errors = [];


    
    // Rule1: Required
    if (empty($tenkh)) {
        $errors['tenkh'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $tenkh,
            'msg' => 'Please enter your name'
        ];
    }
    
    else if (strlen($tenkh) < 3) {
        $errors['tenkh'][] = [
            'rule' => 'min',
            'rule_value' => 3,
            'value' => $tenkh,
            'msg' => 'Please enter customer name 3 characters'
        ];
    }
	foreach($listkh as $kh_check){
		if($kh_check['email'] == $email){
			$errors['email'][] = [
				'rule' => 'min',
				'rule_value' => 3,
				'value' => $email,
				'msg' => 'The Email was registered'
			];
			break;
		}
	}

    // 
    // Rule1: Required
    if (empty($email)) {
        $errors['email'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $email,
            'msg' => 'Please enter your email'
        ];
    }
	if (empty($dienthoai)) {
        $errors['dienthoai'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $dienthoai,
            'msg' => 'Please enter the phone number'
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

    // verify validation for file
    // 
    if (isset($_FILES['hinhanhkh'])) {
        // For each file, there will be the following attributes:
         // $_FILES['hinhsp']['name'] : The name of the file we upload
         // $_FILES['hinhsp']['type'] : The type of file we upload (image, word, excel, pdf, txt, ...)
         // $_FILES['hinhsp']['tmp_name'] : The path to the temporary file on the web server
         // $_FILES['hinhsp']['error'] : Status of the file we uploaded, 0 => no error
         // $_FILES['hinhsp']['size'] : Size of the file we upload
         // -- Validate in case the file Uploaded to the Server fails
         // If the file upload has an error, ie the error attribute > 0
        if ($_FILES['hinhanhkh']['error'] > 0) {
            // File Upload Bị Lỗi
            $fileError = $_FILES["hinhanhkh"]["error"];

            // Depending on the error value, we will return a user-friendly error message...
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
            // -(file types)
            // 
            // 
            $file_extension = pathinfo($_FILES['hinhanhkh']["name"], PATHINFO_EXTENSION); // (file extension)
            if (!($file_extension == 'jpg' || $file_extension == 'jpeg'
                || $file_extension == 'png' || $file_extension == 'gif'
            )) {
                $errors['hinhanhkh'][] = [
                    'rule' => 'file_extension',
                    'rule_value' => '.jpg, .jpeg, .png, .gif',
                    'value' => $_FILES['hinhanhkh']["name"],
                    'msg' => 'Only allow uploading of formats  (*.jpg, *.jpeg, *.png, *.gif)...'
                ];
            }

            // -- Validate 
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
?>

<?php
if (isset($_POST['dangky']) && !empty($errors)) :
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <ul>
    <?php foreach ($errors as $fields) : ?>
    <?php foreach ($fields as $fields) : ?>
    <li class="alert alert-success"><?= $fields['msg'] ?></li>
    <?php endforeach; ?>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>

<?php
if (isset($_POST['dangky']) && empty($errors)) {
    $uploads_dir = __DIR__ .  "/../../assets/uploads/khachhang/";
	
    $tentaptin = date('YmdHis') . '_' . $_FILES['hinhanhkh']['name'];

    move_uploaded_file(
        $_FILES['hinhanhkh']['tmp_name'],
        $uploads_dir . $tentaptin
    );

    //

    //
    $sqlInsert = "INSERT INTO khachhang (tenkh, email, password, hinhanhkh,dienthoai,diachi)
    VALUES ('$tenkh','$email',md5('$password'),'avata.png','$dienthoai','$diachi')";

    
    mysqli_query($conn, $sqlInsert);
    echo "<script>window.open('dangnhap_dangky.php','_self')</script>";
}
?>