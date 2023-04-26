<?php
include_once(__DIR__ . '/../../dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Staff</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        .dropbtn {
            background-color: lightslategray;
            color: white;
            padding: 8px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }


        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }
    </style>
</head>

<body>
    <!------ Include the above in your HEAD tag ---------->

    <form class="form-horizontal" name="frmCreate" method="POST" enctype="multipart/form-data">
        <fieldset>

            <!-- Form Name -->
            <h2 class="text-center">Add Staff </h2>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Staff name</label>
                <div class="col-md-4">
                    <input name="hoten" placeholder="Staff name" class="form-control input-md" type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Date of birth</label>
                <div class="col-md-4">
                    <input name="ngaysinhnv" placeholder="Date of birth" class="form-control input-md" type="date">
                </div>
            </div>

            <div>
                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Address</label>
                    <div class="col-md-4">
                        <input name="diachinv" placeholder="Address" class="form-control input-md" type="text" >
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Employee salary</label>
                    <div class="col-md-4">
                        <input name="luongnv" placeholder="Employee salary" class="form-control input-md">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btnLuu"></label>
                    <div class="col-md-4">
                        <button name="btnLuu" class="btn btn-primary">Save now</button>
                        <a href="/website_tmdt/admin/staff/getstaff.php" name="btnQuayVe" class="btn btn-default">Return</a>
                    </div>
                </div>
        </fieldset>
    </form>

    <script>
        /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>

</html>


<!-- ----------------------PHP--------------------- -->

<?php
include_once(__DIR__ . '/../../dbconnect.php');

if (isset($_POST['btnLuu'])) {
    // 1. Thu thập dữ liệu từ người dùng gửi đên
    $hoten = $_POST['hoten'];
    $ngaysinhnv = $_POST['ngaysinhnv'];
    $diachinv = $_POST['diachinv'];
    $luongnv = $_POST['luongnv'];

    // 2. Kiểm tra ràng buộc dữ liệu (Validation)
    $errors = [];

    // Rule1: Required
    if (empty($hoten)) {
        $errors['hoten'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $hoten,
            'msg' => 'Please enter employee name'
        ];
    }
    // Rule2: min 3 ký tự
    else if (strlen($hoten) < 3) {
        $errors['hoten'][] = [
            'rule' => 'min',
            'rule_value' => 3,
            'value' => $hoten,
            'msg' => 'Please enter a name of 3 or more characters'
        ];
    }

    // Calidate mancc
    // Rule1: Required
    if (empty($ngaysinhnv)) {
        $errors['ngaysinhnv'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $ngaysinhnv,
            'msg' => 'Please enter your date of birth'
        ];
    }

    // Rule1: Required
    if (empty($diachinv)) {
        $errors['diachinv'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $diachinv,
            'msg' => 'Please enter your address'
        ];
    }

    // Rule1: Required
    if (empty($luongnv)) {
        $errors['luongnv'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $luongnv,
            'msg' => 'Please enter employee salary'
        ];
    }
}
?>

<?php
if (isset($_POST['btnLuu']) && !empty($errors)) :
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
if (isset($_POST['btnLuu']) && empty($errors)) {
    //1. Mở kết nối
    include_once(__DIR__ . '/../../dbconnect.php');
    //2. Câu lệnh
    $sqlInsert = "INSERT INTO nhanvien (hoten, ngaysinhnv, diachinv, luongnv)
    VALUES ('$hoten','$ngaysinhnv','$diachinv','$luongnv')";

    //3. Thực thi câu lệnh
    mysqli_query($conn, $sqlInsert);
    echo "<script>window.open('getstaff.php','_self')</script>";

}
?>