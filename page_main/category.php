<?php

include_once __DIR__ . ('/../dbconnect.php');
session_start();
$math = null;
if (isset($_GET['math'])) {
    $math = $_GET['math'];
}
$malh = null;
if (isset($_GET['malh'])) {
    $malh = $_GET['malh'];
}


$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;

$sqlsp = "SELECT * FROM sanpham ORDER BY masp ASC LIMIT " . $item_per_page . " OFFSET " . $offset . " ";
$relsultsp = mysqli_query($conn, $sqlsp);
$totalRecords = mysqli_query($conn, "SELECT * FROM sanpham");

$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);
$danhSachspl = [];
$danhSachSanPham = [];
// search
if($math != null){
    $sqlSanPham = "SELECT * FROM sanpham WHERE math = $math";

    $resultSanPham = mysqli_query($conn, $sqlSanPham);
    $danhSachSanPham = [];
    while ($row = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC)) {
        $danhSachSanPham[] = array(
            'masp' => $row['masp'],
            'tenhang' => $row['tenhang'],
            'math' => $row['math'],
            'hinhsp' => $row['hinhsp'],
            'soluong' => $row['soluong'],
            'donvitinh' => $row['donvitinh'],
            'giamoi' => $row['giamoi'],
            'giacu' => $row['giacu'],
            'malh' => $row['malh']
        );
    }
}else{
    $sqlspl = "SELECT * FROM sanpham WHERE malh = $malh";
    $resultspl = mysqli_query($conn, $sqlspl);
    $danhSachspl = [];
    while ($row = mysqli_fetch_array($resultspl, MYSQLI_ASSOC)) {
        $danhSachspl[] = array(
            'masp' => $row['masp'],
            'tenhang' => $row['tenhang'],
            'math' => $row['math'],
            'hinhsp' => $row['hinhsp'],
            'soluong' => $row['soluong'],
            'donvitinh' => $row['donvitinh'],
            'giamoi' => $row['giamoi'],
            'giacu' => $row['giacu'],
            'malh' => $row['malh']
        );
    }
}
$themgiohang = 'themgiohang';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category </title>
  <?php include_once(__DIR__ . '/../frontend/layouts/styles.php'); ?>

</head>
<style>
.tinhtoan {
  display: flex;
  justify-content: center;
}

.products::after {
  --borderWidth: 3px;
  content: '';
  position: absolute;
  top: calc(-1 * var(--borderWidth));
  left: calc(-1 * var(--borderWidth));
  height: calc(100% + var(--borderWidth) * 2);
  width: calc(100% + var(--borderWidth) * 2);
  background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
  border-radius: calc(2 * var(--borderWidth));
  z-index: -1;
  animation: animatedgradient 3s ease alternate infinite;
  background-size: 300% 300%;
}

.products:hover {
  padding: 10px;
}

@keyframes animatedgradient {
  0% {
    background-position: 0% 50%;
  }

  50% {
    background-position: 100% 50%;
  }

  100% {
    background-position: 0% 50%;
  }
}

.product-price-old {
  text-decoration-line: line-through;
  font-size: 12px;
  color: gray;
}

.product-price {
  padding-left: 5px;
  font-size: 13.5px;
  color: red;
  font-weight: 800;
}

.btncard {
  background: linear-gradient(144deg, #ff8949, #f7434c);
  padding: 9px;
  border-radius: 6px;
  text-align: center;
  color: white;
  font-weight: 700;
}

/* .btnname {
    color: white;
    font-weight: 700;
  } */

.badge-container {
  margin-top: 0.5rem;
  display: flex;
}

.z-1 {
  width: 100%;
  z-index: 1;
}

.onsale {
  font-size: 13px;
  padding: 10px;
  line-height: 20px;
}

.left {
  left: 5px;
}

.top {
  top: -10px;
}

.absolute {
  position: absolute !important;
}

.badge,
.badge+.badge {
  height: 2.5rem;
  width: 2.5rem;
  font-size: 15px;
  margin-left: 0.5rem;
  margin-top: 0.25rem;
}

.badge-outline,
.badge-circle {
  margin-left: -0.4em;
}

.badge {
  display: table;
  z-index: 20;
  pointer-events: none;
  height: 3.5em;
  width: 3.8em;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.badge-inner.secondary.on-sale {
  box-shadow: 0 2px 4px 0 rgb(0 0 0 / 8%);
  background-color: #f7464c;
}

.badge-circle-inside .badge-inner,
.badge-circle .badge-inner {
  border-radius: 999px;
}

.secondary,
.checkout-button,
.button.checkout,
.button.alt {
  background: #f84c4c;
  border: none;
}

.secondary,
.checkout-button,
.button.checkout,
.button.alt {
  background-color: #d26e4b;
}

.badge-inner {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
  width: 100%;
  height: 100%;
  background-color: #446084;
  line-height: .85;
  color: #fff;
  font-weight: bolder;
  padding: 2px;
  white-space: nowrap;
  -webkit-transition: background-color .3s, color .3s, border .3s;
  -o-transition: background-color .3s, color .3s, border .3s;
  transition: background-color .3s, color .3s, border .3s;
}

.onsale {
  font-size: 13px;
}

.name-product {
  display: -webkit-box;
  color: black;
  font-weight: 500;
  font-size: 15px;
  text-align: center;
  line-height: 1.3;
  -webkit-line-clamp: 3;
  /* số dòng hiển thị */
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  height: 50px;
}

.products {
  margin-top: 15px;

}

.cot {
  padding-left: 50px;
  margin-left: -12px;
}

h2 {
  font-size: 2.25rem;
  margin-bottom: 0.75rem;
  font-weight: 700;
  color: #424242;
  font-family: Courier;
}

/* ------------- */
@keyframes slidy {
  0% {
    left: 0%;
  }

  20% {
    left: 0%;
  }

  25% {
    left: -100%;
  }

  45% {
    left: -100%;
  }

  50% {
    left: -200%;
  }

  70% {
    left: -200%;
  }

  75% {
    left: -300%;
  }

  95% {
    left: -300%;
  }

  100% {
    left: -400%;
  }
}

div#slider {
  overflow: hidden;
}

div#slider figure img {
  object-fit: contain;
  width: 20%;
  height: 400px;
  float: left;
}

div#slider figure {
  position: relative;
  width: 500%;
  margin: 0;
  left: 0;
  text-align: left;
  font-size: 0;
  animation: 10s slidy infinite;
}

.card-home-page {
  margin-bottom: 20px;
}

.label {
  width: 100px;
  height: 28px;
  color: #f2f2f2;
  font-size: 20px;
  font-weight: 600;
  background: linear-gradient(#f12711, #f5af19);
}
</style>

<body>
  <div>
    <?php include_once(__DIR__ . '/../frontend/layouts/partials/header.php'); ?>
  </div>
  <div class="wrapper">
    <div class="container">

      <!-- End block content -->
      <div class="row card-home-page">
        <?php foreach ($danhSachSanPham as $sanpham) {
                    if (!empty($sanpham['math'] == $math)) { ?>
        <?php foreach ($danhSachSanPham as $sanpham) : ?>
        <!-- <a style="text-decoration: none;"
          href="./page_main/detail_product.php?masp=<?= $sanpham['masp'] ?>&math=<?= $sanpham['math'] ?>"> -->
        <div class="col-md-3">
          <div class="card products" style="width: 18rem;">
            <div class="badge-container absolute left z-1">
              <div class="badge label" style="width: fit-content;">
                <span class="onsale">Sale 
                  <?= number_format((($sanpham['giacu'] - $sanpham['giamoi']) / $sanpham['giacu']) * 100, 0, ",", ".") ?> % </span>
              </div>
            </div>
            <img style="margin-bottom: 20px; margin-top: 60px;"
              src="/website_tmdt/assets/uploads/sanpham/<?= $sanpham['hinhsp'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title name-product">
                <?= $sanpham['tenhang'] ?>
              </h5>
              <div class="tinhtoan">
                <p class="product-price-old"><?= number_format($sanpham['giacu'], 0, ",", ".") ?>
                  <?= $sanpham['donvitinh'] ?></p>
                <p class="product-price"><?= number_format($sanpham['giamoi'], 0, ",", ".") ?>
                  <?= $sanpham['donvitinh'] ?></p>
              </div>
              <?php
                  if (!isset($_SESSION['makh'])) { ?>
              <div class="d-flex justify-content-between">
                <div class="">
                  <form
                    action="/website_tmdt/customer/login-register/dangnhap_dangky.php?themgiohang=<?= $themgiohang ?>"
                    method="post">
                    <fieldset>
                      <input type="hidden" name="tenhang" value="<?= $sanpham['tenhang'] ?>">
                      <input type="hidden" name="masp" value="<?= $sanpham['masp'] ?>">
                      <input type="hidden" name="giasanpham" value="<?= $sanpham['giamoi'] ?>">
                      <input type="hidden" name="hinhsanpham" value="<?= $sanpham['hinhsp'] ?>">
                      <input type="hidden" name="soluong" value="1">
                      <input type="submit" name="themgiohang" value="Add Cart" class="btn btn-outline-info">
                      </input>
                    </fieldset>
                  </form>
                </div>
                <div class=" btn btncard">
                  <a style="text-decoration: none; color:#fff;"
                    href="/website_tmdt/page_main/detail_product.php?masp=<?= $sanpham['masp'] ?>&math=<?= $sanpham['math'] ?>">
                    Buy Now
                </div>
              </div>
              <?php  } else { ?>
              <div class="d-flex justify-content-between">
                <div class="">
                  <form action="/../website_TMDT/customer/giohang.php" method="post">
                    <fieldset>
                      <input type="hidden" name="tenhang" value="<?= $sanpham['tenhang'] ?>">
                      <input type="hidden" name="masp" value="<?= $sanpham['masp'] ?>">
                      <input type="hidden" name="giasanpham" value="<?= $sanpham['giamoi'] ?>">
                      <input type="hidden" name="hinhsanpham" value="<?= $sanpham['hinhsp'] ?>">
                      <input type="hidden" name="soluong" value="1">
                      <input type="hidden" name="makh" value="<?= $kh['makh'] ?>">
                      <input type="submit" name="themgiohang" value="Add Cart" class="btn btn-outline-info">

                    </fieldset>
                  </form>
                </div>
                <div class=" btn btncard">
                  <a style="text-decoration: none; color:#fff;"
                    href="/website_tmdt/page_main/detail_product.php?masp=<?= $sanpham['masp'] ?>&math=<?= $sanpham['math'] ?>">
                    Buy Now
                </div>
              </div>
              <?php } ?>

            </div>
          </div>
        </div>
        <!-- </a> -->
        <?php endforeach; ?>
        <?php break;
                    }
                } ?>
        <?php foreach ($danhSachspl as $lsp) {
                    if (!empty($lsp['malh'] == $malh)) { ?>
        <?php foreach ($danhSachspl as $sanpham) : ?>
        <a style="text-decoration: none;"
          href="/website_tmdt/page_main/detail_product.php?masp=<?= $sanpham['masp'] ?>&math=<?= $sanpham['math'] ?>">
          <div class="col-md-3">

            <div class="card products" style="width: 18rem;">
              <div class="badge-container absolute left z-1">
                <div class="badge label" style="width: fit-content;">
                  <span class="onsale">Sale 
                    <?= number_format((($sanpham['giacu'] - $sanpham['giamoi']) / $sanpham['giacu']) * 100, 0, ",", ".") ?>%</span>
                </div>
              </div>
              <img style="margin-bottom: 20px; margin-top: 60px;"
                src="/website_tmdt/assets/uploads/sanpham/<?= $sanpham['hinhsp'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title name-product">
                  <?= $sanpham['tenhang'] ?>
                </h5>
                <div class="tinhtoan">
                  <p class="product-price-old"><?= number_format($sanpham['giacu'], 0, ",", ".") ?>
                    <?= $sanpham['donvitinh'] ?></p>
                  <p class="product-price"><?= number_format($sanpham['giamoi'], 0, ",", ".") ?>
                    <?= $sanpham['donvitinh'] ?></p>
                </div>
                <?php
                  if (!isset($_SESSION['makh'])) { ?>
                <div class="d-flex justify-content-between">
                  <div class="">
                    <form
                      action="/website_tmdt/customer/login-register/dangnhap_dangky.php?themgiohang=<?= $themgiohang ?>"
                      method="post">
                      <fieldset>
                        <input type="hidden" name="tenhang" value="<?= $sanpham['tenhang'] ?>">
                        <input type="hidden" name="masp" value="<?= $sanpham['masp'] ?>">
                        <input type="hidden" name="giasanpham" value="<?= $sanpham['giamoi'] ?>">
                        <input type="hidden" name="hinhsanpham" value="<?= $sanpham['hinhsp'] ?>">
                        <input type="hidden" name="soluong" value="1">
                        <input type="submit" name="themgiohang" value="Add Cart" class="btn btn-outline-info">
                        </input>
                      </fieldset>
                    </form>
                  </div>
                  <div class=" btn btncard">
                    <a style="text-decoration: none; color:#fff;"
                      href="/website_tmdt/page_main/detail_product.php?masp=<?= $sanpham['masp'] ?>&math=<?= $sanpham['math'] ?>">
                      Buy Now
                  </div>
                </div>
                <?php  } else { ?>
                <div class="d-flex justify-content-between">
                  <div class="">
                    <form action="/../website_TMDT/customer/giohang.php" method="post">
                      <fieldset>
                        <input type="hidden" name="tenhang" value="<?= $sanpham['tenhang'] ?>">
                        <input type="hidden" name="masp" value="<?= $sanpham['masp'] ?>">
                        <input type="hidden" name="giasanpham" value="<?= $sanpham['giamoi'] ?>">
                        <input type="hidden" name="hinhsanpham" value="<?= $sanpham['hinhsp'] ?>">
                        <input type="hidden" name="soluong" value="1">
                        <input type="hidden" name="makh" value="<?= $kh['makh'] ?>">
                        <input type="submit" name="themgiohang" value="Add Cart" class="btn btn-outline-info">

                      </fieldset>
                    </form>
                  </div>
                  <div class=" btn btncard">
                    <a style="text-decoration: none; color:#fff;"
                      href="/website_tmdt/page_main/detail_product.php?masp=<?= $sanpham['masp'] ?>&math=<?= $sanpham['math'] ?>">
                      Buy Now
                  </div>
                </div>
                <?php } ?>

              </div>
            </div>
          </div>
        </a>
        <?php endforeach; ?>
        <?php break;
                    }
                } ?>

      </div>

    </div>
  </div>
  <?php include_once(__DIR__ . '/../frontend/layouts/partials/footer.php'); ?>



</body>

</html>