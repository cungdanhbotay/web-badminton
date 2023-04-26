<?php
session_start();
include_once(__DIR__ . '/../../dbconnect.php');




$check_kh = $_SESSION['makh'];
$sql = "SELECT * FROM dondathang 
        INNER JOIN khachhang ON dondathang.makh = khachhang.makh where dondathang.makh = $check_kh";

$result = mysqli_query($conn, $sql);


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

$sql_select_dondathang = mysqli_query($conn, "SELECT * FROM dondathang");
$count = mysqli_num_rows($sql_select_dondathang);

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

  <?php include_once(__DIR__ . '/../../frontend/layouts/partials/header.php'); ?>

  <?php if ($count > 0) { ?>
  <div class="container">

   
    <div>
      
    </div>
    <table class="table table-bordered" style="margin-top: 10px;">
      <thead class="thead-dark">
        <tr>
          <th>Customer name</th>
          <th>Order date</th>
          <th>receiving date</th>
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
          <td><a href="/website_tmdt/customer/order/detail.php?maddh=<?= $donhang['maddh'] ?>"><button
                class="btn btn-outline-danger">
                See details
              </button></a>
            <a href="/website_tmdt/customer/order/delete_order.php?maddh=<?= $donhang['maddh'] ?>"><button
                class="btn btn-outline-danger">
                Cancel order
              </button></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <!-- footer -->

    <!-- end footer -->

   
    <?php include_once __DIR__ . '/../../frontend/layouts/scripts.php' ?>

    <script>
    // var option = {
    //     animation: true,
    //     delay: 1000
    // };

    $(function() {
      
      $('.btnDelete').on('click', function() {
        var xacnhan = confirm('Are you sure you want to delete??');
        if (xacnhan == true) {
          
          var id = $(this).attr('data-maddh');
          
          location.href = "deleteorder.php?maddh=" + id;
        }
      });
    });
    </script>
  </div>
  <?php } else { ?>
  <div>
    <h1 style="height: 300px; text-align: center; margin-top: 200px;">There are currently no orders</h1>
    <h6 style="text-align: center;">Please place an order to get an invoice</h6>
  </div>
  <?php } ?>

  <?php include_once(__DIR__ . '/../../frontend/layouts/partials/footer.php'); ?>
</body>

</html>