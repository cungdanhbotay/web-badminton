<?php
include_once(__DIR__ . '/../../dbconnect.php');
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn


        // -------------DANH SÁCH SẢN PHẨM
        // 2. Chuẩn bị câu lệnh SQL
        $sql =   "SELECT * FROM khachhang";
        // 3. Thực thi câu lệnh
        $result = mysqli_query($conn, $sql);

        // 4. Phân tích dữ liệu thành mảng ARRAY PHP
        $data = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'makh' => $row['makh'],
                'tenkh' => $row['tenkh'],
                'diachi' => $row['diachi'],
                'email' => $row['email'],
                'dienthoai' => $row['dienthoai'],
            );
        }
        
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximun-
    scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of customers</title>
  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="../frontend/css/style.scss">
  <?php include_once __DIR__ . '/../../frontend/layouts/styles.php' ?>
</head>


<body>


  <input type="checkbox" id="nav-toggle">
  <?php include_once(__DIR__ . '/../partials/lertList.php'); ?>
  <div class="main-content">

    <!-- // -------------TABLE DANH SÁCH San Pham -->
    <div style="margin-top: 144px">
      <!-- <a class="btn btn-primary" style="margin-top: 155px" href="./addcustomer.php">Thêm mới khách hàng</a> -->
    </div>

    <?php include_once(__DIR__ . '/../partials/header.php'); ?>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>No. </th>
          <th>Customer name</th>
          <th>Address</th>
          <th>Email</th>
          <th>Phone </th>
          <!-- <th>Chức năng</th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $khachhang) : ?>
        <tr>
          <td><?= $khachhang['makh'] ?></td>
          <td><?= $khachhang['tenkh'] ?></td>
          <td><?= $khachhang['diachi'] ?></td>
          <td><?= $khachhang['email'] ?></td>
          <td><?= $khachhang['dienthoai'] ?></td>
          <!-- <td>
                            <a class="btn btn-outline-secondary" href="./updatecustomer.php?makh=<?= $khachhang['makh'] ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i>Sửa</a>
                            <br>

                            <button onclick="Toasty()" style="margin-left: 5px;" type="button" class="btn btn-outline-danger btnDelete" data-makh="<?= $khachhang['makh'] ?>">
                                <i class="fa fa-trash" aria-hidden="true"></i>Xóa</button>
                        </td> -->
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- footer -->

    <!-- end footer -->

    <!-- Nhúng nội dung file "scripts.php" -->
    <?php include_once __DIR__ . '/../../frontend/layouts/scripts.php' ?>

    <script>
    // var option = {
    //     animation: true,
    //     delay: 1000
    // };

    $(function() {
      //Nhờ JQUERY tìm tất cả các Element có dùng class
      $('.btnDelete').on('click', function() {
        var xacnhan = confirm('Are you sure you want to delete?');
        if (xacnhan == true) {
          //Lấy giá trị truyen_id của Nút mà người dùng vừa click
          var id = $(this).attr('data-makh');
          //Chuyển trang xoa.php
          location.href = "deletecustomer.php?makh=" + id;
        }
      });
    });
    </script>
  </div>
</body>

</html>