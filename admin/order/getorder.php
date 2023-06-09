<?php
include_once(__DIR__ . '/../../dbconnect.php');
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn


        // -------------DANH SÁCH SẢN PHẨM
        // 2. Chuẩn bị câu lệnh SQL
        $sql = "SELECT * FROM dondathang 
        INNER JOIN khachhang ON dondathang.makh = khachhang.makh";
        // 3. Thực thi câu lệnh
        $result = mysqli_query($conn, $sql);

        // 4. Phân tích dữ liệu thành mảng ARRAY PHP
        $data = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'maddh' => $row['maddh'],
                'tenkh' => $row['tenkh'],
                'ngaydathang' => $row['ngaydathang'],
                'ngaygiaohang' => $row['ngaygiaohang'],
                'ngaychuyenhang' => $row['ngaychuyenhang'],
                'noigiaohang' => $row['noigiaohang'],
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
  <title>Order List</title>
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
    <table class="table table-bordered" style="margin-top: 10px;">
      <thead class="thead-dark">
        <tr>
          <th>Customer name</th>
          <th>Order date</th>
          <th>Delivery date</th>
          <th>Delivery date</th>
          <th>Delivery place</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $donhang) : ?>
        <tr>
          <td><a href=""><?= $donhang['tenkh'] ?></a></td>
          <td><a href=""><?= $donhang['ngaydathang'] ?></td>
          <td><a href=""><?= $donhang['ngaygiaohang'] ?></a></td>
          <td><a href=""><?= $donhang['ngaychuyenhang'] ?></a></td>
          <td><a href=""><?= $donhang['noigiaohang'] ?></a></td>
          <td>
            <a href="/website_tmdt/admin/order/detail.php?maddh=<?= $donhang['maddh'] ?>">
              <button class="btn btn-outline-danger">
              See details
              </button>
            </a>
            <a href="/website_tmdt/admin/order/delete_order.php?maddh=<?= $donhang['maddh'] ?>">
              <button class="btn btn-outline-danger">
              Cancel order
              </button>
            </a>
          </td>
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
          var id = $(this).attr('data-maddh');
          //Chuyển trang xoa.php
          location.href = "deleteorder.php?maddh=" + id;
        }
      });
    });
    </script>
  </div>
</body>

</html>