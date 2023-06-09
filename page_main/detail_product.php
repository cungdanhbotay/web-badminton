<?php
include_once __DIR__ . ('/../dbconnect.php');
session_start();
unset($_SESSION['masp']);
unset($_SESSION['math']);


$masp = null;
if (isset($_GET['masp'])) {
  $masp = $_GET['masp'];
}


$sqlsp = "select * from sanpham where masp = $masp";
$resultsp = mysqli_query($conn, $sqlsp);


$sqlhinhsp = "SELECT * FROM hinhsanpham WHERE masp = $masp";
$resulthinhsp = mysqli_query($conn, $sqlhinhsp);
$hinhsanpham = [];
while ($row = mysqli_fetch_array($resulthinhsp, MYSQLI_ASSOC)) {
  $hinhsanpham[] = array(
    'maha' => $row['maha'],
    'tenha' => $row['tenha'],
    'masp' => $row['masp']
  );
}

$math = null;
if (isset($_GET['math'])) {
  $math = $_GET['math'];
}
$sqlthuonghieu = "SELECT * FROM thuonghieu WHERE math = $math";
$resultthuonghieu = mysqli_query($conn, $sqlthuonghieu);
$thuonghieu = [];
while ($row = mysqli_fetch_array($resultthuonghieu, MYSQLI_ASSOC)) {
  $thuonghieu = array(
    'tenth' => $row['tenth'],
    'math' => $row['math']
  );
}

$sqlsoluong = "SELECT MAX(soluong) as max_soluong FROM sanpham WHERE masp = $masp;";
$resultsoluong = mysqli_query($conn, $sqlsoluong);
$soluong = mysqli_fetch_array($resultsoluong, MYSQLI_ASSOC);
$soluongmax = $soluong['max_soluong'];






$sqlBinhLuan = "SELECT * FROM binhluan
INNER JOIN khachhang ON binhluan.makh = khachhang.makh
where masp = $masp";
$resultBinhLuan = mysqli_query($conn, $sqlBinhLuan);
$binhLuan = [];
while ($row = mysqli_fetch_array($resultBinhLuan, MYSQLI_ASSOC)) {
  $binhLuan[] = array(
    'mabl' => $row['mabl'],
    'masp' => $row['masp'],
    'hinhanhkh' => $row['hinhanhkh'],
    'tenkh' => $row['tenkh'],
    'makh' => $row['makh'],
    'noidung' => $row['noidung'],
    'thoigianbl' => date('d/m/Y', strtotime($row['thoigianbl']))
  );
}
$sqlYeuthich = "SELECT * FROM yeuthich";
$resultYeuthich = mysqli_query($conn, $sqlYeuthich);
$danhsachyt = [];
while ($row = mysqli_fetch_array($resultYeuthich, MYSQLI_ASSOC)) {
  $danhsachyt[] = array(
    'mayt' => $row['mayt'],
    'makh' => $row['makh'],
    'masp' => $row['masp']
  );
}

$check_yeuthich = false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <link rel="stylesheet" href="./product.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <?php include_once(__DIR__ . '/../frontend/layouts/styles.php'); ?>
  <style>
  .method {
    display: flex;
  }

  .method .add-cart {
    background-color: #ffeee8;
    padding: 10px 20px;
    border: 1px solid #ee4d2d;
    font-size: 16px;
    line-height: 44px;
    color: #ee4d2d;
    border-radius: 4px;
  }

  .method .buy {
    padding: 10px 20px;
    background-color: #f05d40;
    color: #ffffff;
    font-size: 16px;

    margin-left: 14px;
    border: none;
    border-radius: 4px;
    line-height: 45px;
  }

  .method .buy a {

    color: #ffffff;
    font-size: 16px;
    line-height: 19px;
    border: none;
    font-weight: bold;
  }

  .method .add-cart a {

    color: #3b5999;
    font-size: 16px;
    font-weight: bold;
    line-height: 19px;
    border: none;

  }

  .method .like {
    padding: 10px 20px;
    line-height: 45px;
    margin-left: 14px;
    border: 1px solid #de0217;
    border-radius: 4px;
  }

  .network {
    margin-left: 20px;
    margin-top: 40px;
  }

  .img-custome {
    height: 150px;
    width: 150px;
    border-radius: 50%;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  }

  .style {
    align-items: center;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    margin: 20px 0;
  }

  .style-1 {
    align-items: center;
    padding: 10px;


  }

  .name {
    color: #797979;
    font-weight: 600;
  }

  .time {
    color: black;
  }

  .comment {
    color: #212529;
  }

  .style {
    padding: 20px;
  }

  .line-letter {
    height: 3px;
    width: 100%;
    background-position-x: -30px;
    background-size: 116px 3px;
    background-image: repeating-linear-gradient(45deg, #6fa6d6, #6fa6d6 33px, transparent 0, transparent 41px, #f18d9b 0, #f18d9b 74px, transparent 0, transparent 82px);
  }

  .group {
    text-align: center;

  }

  .group img {
    width: 600px;

  }

  .main-title {
    width: 920px;
  }

  .main-title p {
    background-color: #10c2ff;
    text-align: left;
    color: #212529;
    font-size: 30px;
    padding: 5px 10px 5px;
  }

  .itemCT {
    color: #212529;
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #10c2ff;
    margin-bottom: 8px;
    padding: 10px 20px;
  }

  .itemCT .rightdetail {
    margin-right: 210px;
  }

  /*  */
  .tilte_comment {
    font-size: 35px;
    color: black;
  }
  </style>
</head>

<body>
  <div>
    <?php include_once(__DIR__ . '/../frontend/layouts/partials/header.php'); ?>
    <?php
    while ($row = mysqli_fetch_array($resultsp, MYSQLI_ASSOC)) {
    ?>
  </div>
 
  <div class="container">
    <div class="row background">
      <div class="col">
        <div class="group-img">
          <div id="slide-view">
            <span class="slide-view-text"> 🙌 FAST - PROFESSIONAL👨‍🔧</span>
            <img id="imgView" class="" src="/website_tmdt/assets/uploads/sanpham/<?= $row['hinhsp'] ?>" />
          </div>
          <div id="slide-wrap">
            <?php foreach ($hinhsanpham as $hinhsp) : ?>
            <img class="slide-show" src="/website_tmdt/assets/uploads/sanpham/<?= $hinhsp['tenha'] ?>" alt="">
            <?php endforeach ?>
          </div>
        </div>

        <div class="network">
          <div class="line-letter mb-4"></div>
          <span class="text-2">share:
            <i class="fa fa-facebook-square" style="color: #3b5999;font-size:30px;" aria-hidden="true"></i>
            <i class="fa fa-twitter-square" style="color: #10c2ff;font-size:30px;" aria-hidden="true"></i>
            <i class="fa fa-youtube-play" style="color: #de0217;font-size:30px;" aria-hidden="true"></i>
          </span>

          <span class="heart">
            <i class="fa fa-heart-o" style="font-size:30px; color: #ff424f;" aria-hidden="true"></i>
            <?php
            $sqldathich = "SELECT count(mayt) as demyeuthich FROM yeuthich WHERE masp = $masp";
            $resultdenyt = mysqli_query($conn, $sqldathich);
            $dem_dathich = mysqli_fetch_array($resultdenyt, MYSQLI_ASSOC);
            $dem_yt = $dem_dathich['demyeuthich'];
            ?>
            <span class="text-2">Like (<?= $dem_yt ?>)</span>
          </span>
        </div>

      </div>
      <div class="col">
        <div class="info-product">
          <div class="form-title">
            <span class="name-sp"><?= $row['tenhang'] ?></span>
            <div class="title-vote">
              <span>
                <span class="vote">4.6</span>
                <i class="vote fa fa-star" aria-hidden="true"></i>
                <i class="vote fa fa-star" aria-hidden="true"></i>
                <i class="vote fa fa-star" aria-hidden="true"></i>
                <i class="vote fa fa-star" aria-hidden="true"></i>
                <i class="vote fa fa-star-half-o" aria-hidden="true"></i>
              </span>

          
              <span class="title">
                <?php
                $sqlbl = "SELECT COUNT(makh) AS dem FROM binhluan WHERE masp = $masp";
                $resultcount = mysqli_query($conn, $sqlbl);
                $soluongbl = mysqli_fetch_array($resultcount, MYSQLI_ASSOC);
                $soluong_bl = $soluongbl['dem']; ?>
                <?= $soluong_bl; ?> value
              </span>
              <span>|</span>
       
              <span class="title">
                <?php
                $sqldaban = "SELECT SUM(soluongddh) AS tong FROM chitietdathang WHERE masp = $masp";
                $resultsum = mysqli_query($conn, $sqldaban);
                $sum_daban = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
                $sum_soluong = $sum_daban['tong']; ?>
                <?= $sum_soluong; ?>0 Sold
                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
              </span>
            </div>

  
            <div class="title-price mt-3">
              <span class="old">
                <?= number_format($row['giacu'], 0, ",", ".") ?> <?= $row['donvitinh'] ?>
              </span>
              <span class="new">
                <?= number_format($row['giamoi'], 0, ",", ".") ?> <?= $row['donvitinh'] ?>
              </span>
              <span class="badge badge-danger sale">
                <?= number_format((($row['giacu'] - $row['giamoi']) / $row['giacu']) * 100, 0, ",", ".") ?>%
                <span> discount </span> </span>
              </br>
              <span style="color: #797979; font-size: 14px;">Everything is cheap, good price compared to the market <i
                  style="color: #de0217;" class="fa fa-gratipay" aria-hidden="true"></i></span>
            </div>
            <div class="title-info mt-3">
              <div class="km ">
                <label class="text-2 " for="">Combo Sale:</label>
                <button class="btn-style-2">Buy 2 products get 30% off</button>
              </div>
              <div class="shield mt-3">
                <label class="text-2" for="">Insurance:</label>
                <button class="btn-style">
                Durability Insurance
                  <i class="fa fa-fire" aria-hidden="true"></i>
                </button>
              </div>

              <div class="type mt-3">
                <label class="text-2" for="">Color:</label>
                <button class="btn-style">
                  <a href="#"> Black </a>
                </button>
                <button class="btn-style">
                  <a href="#"> Blue </a>
                </button>
                <button class="btn-style">
                  <a href="#"> White </a>
                </button>
              </div>
              <div class="hang mt-3" style="display: flex;">
                <label for="" class="text-2">famous brand:</label>
                <button style="border-style: solid; text-align: center; margin-left:7px;">
                  <span style="color: black; margin: 5px;"><?= $thuonghieu['tenth'] ?></span>
                </button>
              </div>

              <?php if ($soluongmax != 0) { ?>
              <div class="number mt-3">
                <label for="" class="text-2"> Quantity </label>
                <div class="buttons_added">
                  <input class="minus is-form" type="button" value="-">
                  <input id="soluong" name="soluong" aria-label="quantity" class="input-qty" max=<?= $soluongmax ?>
                    min="1" type="number" value="1" disabled>
                  <input class="plus is-form" type="button" value="+">
                </div>
                <span class="text-2 ml-2"><?= $row['soluong'] ?> Products Available</span>
              </div>


              <div class="method mt-3">
                <?php if (!isset($_SESSION['makh'])) { ?>
                <div class="add-cart">
                  <a class="btn"
                    href="/website_tmdt/customer/login-register/dangnhap_dangky.php?masp=<?= $masp ?>&math=<?= $math ?>"
                    name="btnThem">add to cart</a>
                </div>
                <div class="buy">
                  <a id="nothing_buy" class="btn"
                    href="/website_tmdt/customer/login-register/dangnhap_dangky.php?masp=<?= $masp ?>&math=<?= $math ?>"
                    name="btnMua">
                    Buy Now
                  </a>
                </div>
                <?php } else { ?>
                <form action="/../website_TMDT/customer/giohang.php" method="post">
                  <fieldset>
                    <input type="hidden" name="tenhang" value="<?= $row['tenhang'] ?>">
                    <input type="hidden" name="masp" value="<?= $row['masp'] ?>">
                    <input type="hidden" name="giasanpham" value="<?= $row['giamoi'] ?>">
                    <input type="hidden" name="hinhsanpham" value="<?= $row['hinhsp'] ?>">
                    <input type="hidden" name="soluong" value="1">
                    <input type="hidden" name="makh" value="<?= $kh['makh'] ?>">
                    <input type="submit" name="themgiohang" value="Add Cart" class="btn btn-outline-info "
                      style="padding: 20px;">
                  </fieldset>
                </form>
                <div class="buy">
                  <a id="buy" class="btn" href="#" name="btnMua">Buy Now </a>
                </div>
                <?php } ?>
                <div class="like">
                  <?php if (!isset($_SESSION['makh'])) { ?>
                  <i class="fa fa-heart-o" style="color: #ff424f;" aria-hidden="true"></i>
                  <a href="/website_tmdt/customer/login-register/dangnhap_dangky.php"
                    style="color: #ee4d2d;font-size: 16px; font-weight: bold;line-height: 19px;" class="btn"> Like </a>
                  <?php } else { ?>
                  <?php foreach ($danhsachyt as $yt) : {
                          if ($_SESSION['makh'] == $yt['makh'] && $masp == $yt['masp']) {
                            $check_yeuthich = true;
                            break;
                          }
                        }
                      endforeach; ?>
                  <?php if ($check_yeuthich == true) { ?>
                  <form action="/website_tmdt/page_main/detail_product.php?masp=<?= $row['masp'] ?>&math=<?= $math ?>"
                    method="POST" enctype="multipart/form-data">
                    <i class="fa fa-heart" style="color: red;" aria-hidden="true"></i>
                    <input style="color: #ee4d2d;font-size: 16px; font-weight: bold;line-height: 19px;" type="submit"
                      class="btn" name="btnxoa" value="Like"></input>
                  </form>
                  <?php } else { ?>
                  <form action="/website_tmdt/page_main/detail_product.php?masp=<?= $row['masp'] ?>&math=<?= $math ?>"
                    method="POST" enctype="multipart/form-data">
                    <i class="fa fa-heart-o" style="color: #ff424f;" aria-hidden="true"></i>
                    <input style="color: #ee4d2d;font-size: 16px; font-weight: bold;line-height: 19px;" type="submit"
                      class="btn" name="btnyeuthich" value="Like"></input>
                  </form>
                  <?php } ?>
                  <?php } ?>
                </div>
              </div>
              <?php } else { ?>

              <div class="number mt-3">
                <label for="" class="text-2"> Quantity </label>
                <div class="buttons_added">
                  <input class="het_minus is-form" type="button" value="-">
                  <input id="het_soluong" name="het_soluong" aria-label="quantity" class="input-qty" max='0' min="0"
                    type="number" value="0" disabled>
                  <input class="het_plus is-form" type="button" value="+">
                </div>
                <span class="text-2 ml-2"><?= $row['soluong'] ?> Products Available</span>
              </div>

              <div class="method mt-3">
                <?php if (!isset($_SESSION['makh'])) { ?>
                <div class="add-cart">
                  <a class="btn"
                    href="/website_tmdt/customer/login-register/dangnhap_dangky.php?masp=<?= $masp ?>&math=<?= $math ?>"
                    name="btnThem">Add to Cart </a>
                </div>
                <div class="buy">
                  <a id="nothing_buy" class="btn"
                    href="/website_tmdt/customer/login-register/dangnhap_dangky.php?masp=<?= $masp ?>&math=<?= $math ?>"
                    name="btnMua">
                    Buy Now
                  </a>
                </div>
                <?php } else { ?>
                <form action="/../website_TMDT/customer/giohang.php" method="post">
                  <fieldset>
                    <input type="hidden" name="tenhang" value="<?= $row['tenhang'] ?>">
                    <input type="hidden" name="masp" value="<?= $row['masp'] ?>">
                    <input type="hidden" name="giasanpham" value="<?= $row['giamoi'] ?>">
                    <input type="hidden" name="hinhsanpham" value="<?= $row['hinhsp'] ?>">
                    <input type="hidden" name="soluong" value="1">
                    <input type="hidden" name="makh" value="<?= $kh['makh'] ?>">
                    <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button">
                  </fieldset>
                </form>
                <div class="buy">
                  <a id="no_buy" class="btn" href="#" name="no_btnMua">Buy Now </a>
                </div>
                <?php } ?>
                <div class="like">
                  <?php if (!isset($_SESSION['makh'])) { ?>
                  <i class="fa fa-heart-o" style="color: #ff424f;" aria-hidden="true"></i>
                  <a href="/website_tmdt/customer/login-register/dangnhap_dangky.php"
                    style="color: #ee4d2d;font-size: 16px; font-weight: bold;line-height: 19px;" class="btn">Like </a>
                  <?php } else { ?>
                  <?php foreach ($danhsachyt as $yt) : {
                          if ($_SESSION['makh'] == $yt['makh'] && $masp == $yt['masp']) {
                            $check_yeuthich = true;
                            break;
                          }
                        }
                      endforeach; ?>
                  <?php if ($check_yeuthich == true) { ?>
                  <form action="/website_tmdt/page_main/detail_product.php?masp=<?= $row['masp'] ?>&math=<?= $math ?>"
                    method="POST" enctype="multipart/form-data">
                    <i class="fa fa-heart" style="color: red;" aria-hidden="true"></i>
                    <input style="color: #ee4d2d;font-size: 16px; font-weight: bold;line-height: 19px;" type="submit"
                      class="btn" name="btnxoa" value="Like"></input>
                  </form>
                  <?php } else { ?>
                  <form action="/website_tmdt/page_main/detail_product.php?masp=<?= $row['masp'] ?>&math=<?= $math ?>"
                    method="POST" enctype="multipart/form-data">
                    <i class="fa fa-heart-o" style="color: #ff424f;" aria-hidden="true"></i>
                    <input style="color: #ee4d2d;font-size: 16px; font-weight: bold;line-height: 19px;" type="submit"
                      class="btn" name="btnyeuthich" value="Like"></input>
                  </form>
                  <?php } ?>
                  <?php } ?>
                </div>
              </div>
              <?php } ?>

            </div>
          </div>
        </div>


      </div>
      <!-- section  -->
      <div class="w-100 mt-3"></div>
      <div class="col">
        <div class="tilte-sp">
          <h1 class="title">Product Information</h1>
          <div class="page">
            <p class="text-2"><?= $row['mota'] ?></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="detail">
          <h1 class="title">Detailed configuration: <?= $row['tenhang'] ?></h1>
          <div class="group-detail">
            <table class="table mt-3">
              <thead>
                <tr>
                  <th scope="col"> Brand:</th>
                  <td><?= $row['object1'] ?></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th> Color:</th>
                  <td><?= $row['object2'] ?></td>
                </tr>
                <tr>
                  <th> Weight:</th>
                  <td><?= $row['object3'] ?></td>
                </tr>
                <tr>
                  <th> Balance:</th>
                  <td><?= $row['object4'] ?></td>
                </tr>
                <tr>
                  <th> Level:</th>
                  <td><?= $row['object5'] ?></td>
                </tr>
                <tr>
                  <th> Playing style:</th>
                  <td><?= $row['object6'] ?></td>
                </tr>
                <tr>
                  <th> Gender:</th>
                  <td><?= $row['object7'] ?></td>
                </tr>
                <tr>
                  <th> Cover:</th>
                  <td><?= $row['object8'] ?></td>
                </tr>
                <tr>
                  <th> Grommets:</th>
                  <td><?= $row['object9'] ?></td>
                </tr>
                <tr>
                  <th> Flexibility:</th>
                  <td><?= $row['object10'] ?></td>
                </tr>
                <tr>
                  <th> Shaft:</th>
                  <td><?= $row['object10'] ?></td>
                </tr>
              </tbody>
              <!-- modal -->
              <!-- Button trigger modal -->
              <!-- Modal -->
              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog d-flex justify-content-center" role="document">
                  <div class="modal-content" style="width: 1000px;">
                    <div class="modal-header">
                      <h5 class="modal-title text-2" id="exampleModalLongTitle">The detail information of product</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">&times;</span> -->
                      </button>
                    </div>
                    <div class="modal-body container">
                      <div class="container">
                        <!--  -->
                        <div class="group">
                          <h4 class="text-3">Product <span class="badge badge-danger">HOT</span></h4>

                          <img src="/website_tmdt/assets/uploads/sanpham/<?= $row['hinhsp'] ?>" alt="..."
                            class="img-thumbnail">
                        </div>
                        <!-- info -->
                        <div class="content-detail">
                          <div class="main-title">
                            <p>Product </p>
                            <ul class="detailCT">
                              <li class="itemCT">
                                <div class="leftdetail">Brand:</div>
                                <div class="rightdetail"><?=$row['object1']?></div>
                              </li>
                              <li class="itemCT">
                                <div class="leftdetail">Color:</div>
                                <div class="rightdetail"><?=$row['object2']?></div>
                              </li>
                              <li class="itemCT">
                                <div class="leftdetail">Weight:</div>
                                <div class="rightdetail"><?=$row['object3']?></div>
                              </li>
                              <li class="itemCT">
                                <div class="leftdetail">Balance:</div>
                                <div class="rightdetail"><?=$row['object5']?></div>
                              </li>
                              <li class="itemCT">
                                <div class="leftdetail">Level:</div>
                                <div class="rightdetail"><?=$row['object7']?></div>
                              </li>
                              <li class="itemCT">
                                <div class="leftdetail">Playing style:</div>
                                <div class="rightdetail"><?=$row['object8']?></div>
                              </li>
                            </ul>

                          </div>
                        </div>
                        <!-- end info -->
                       
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">close </button>

                    </div>
                  </div>
                </div>
              </div>
              <!-- modal end -->
            </table>
          </div>
          <button type="button" class="center text-2" data-toggle="modal" data-target="#exampleModalLong">
          View Detailed Configuration
            <i class="fa fa-caret-right" aria-hidden="true"></i>
          </button>
        </div>
      </div>

      <!-- section comment -->
      <div class="w-100 mt-3"></div>

      <div class="container">
        <h2>Comment <span class="badge badge-secondary"> Here</span></h2>
        <form action="/website_tmdt/page_main/detail_product.php?masp=<?= $row['masp'] ?>&math=<?= $math ?>" name=""
          method="POST" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <textarea class="p-3" name="noidung" id="noidung" cols="167" rows="3"
              placeholder="Enter your comment"></textarea>
          </div>
          <input type="submit" class="btn btn-outline-secondary mb-3" name="btnBinhLuan" value=" post a comment"></input>
        </form>
        <div class="col">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4 text-muted"> Product comments</h1>
              <?php foreach ($binhLuan as $bl) : ?>
              <div class="col style">
                <div class="comment mt-4 text-justify d-flex style-1">
                  <div class="img">
                    <img class="img-custome" src="/website_tmdt/assets/uploads/khachhang/<?= $bl['hinhanhkh'] ?>" alt=""
                      class="rounded-circle" width="40" height="40">
                  </div>
                  <div class="group ml-3">
                    <h4 class="name"><?= $bl['tenkh'] ?></h4>
                    <span class="time"> <?= $bl['thoigianbl'] ?></span>
                    <br>
                  </div>

                </div>
                <p class="comment ml-3 mt-3"><?= $bl['noidung'] ?></p>
              </div>
              <?php endforeach ?>

            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  </div>

  <!-- end products -->

  <?php include_once(__DIR__ . '/../frontend/layouts/partials/footer.php'); ?>

  <script>
  <?php include_once(__DIR__ . '../assets/frontend/js/app.js'); ?>
  </script>
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/jquery/jscript_one.js"></script>
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
 
  var valueInputBtn = document.querySelector('.input-qty')


  var valueInput = document.querySelector('.input-qty').value
  var saveData = `/website_tmdt/customer/checkout.php?masp=<?= $row['masp'] ?>&soluongmua=${valueInput}`;
  const minus = document.querySelector('.minus')
  minus.onclick = function() {
    var valueInput = document.querySelector('.input-qty').value

    var convert = Number(valueInput)

    var num = convert - 1
    if (num == 0) {
      return num = 1;
    }
    var href = `/website_tmdt/customer/checkout.php?masp=<?= $row['masp'] ?>&soluongmua=${num}`
    saveData = href

  }
  const plus = document.querySelector('.plus')
  plus.onclick = function() {
    var valueInput = document.querySelector('.input-qty').value
    if (valueInput == valueInputBtn.getAttribute('max')) return;
    var convert = Number(valueInput)
    var num = convert + 1
    var href = `/website_tmdt/customer/checkout.php?masp=<?= $row['masp'] ?>&soluongmua=${num}`
    saveData = href
  }
  const btnBuy = document.querySelector('#buy')
  btnBuy.addEventListener('click', function() {
    btnBuy.setAttribute("href", saveData);
  })
  </script>
  <?php } ?>
</body>

</html>


<?php

if (isset($_POST['btnBinhLuan'])) {

  $noidung = $_POST['noidung'];
  $thoigianbl = date('Y-m-d H:i:s');

  $errors = [];

  if (empty($noidung)) {
    $errors['noidung'][] = [
      'rule' => 'required',
      'rule_value' => true,
      'value' => $noidung,
      'msg' => 'Can not be left empty'
    ];
  }
}
?>

<?php
if (isset($_POST['btnBinhLuan']) && !empty($errors)) :
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


if (isset($_POST['btnBinhLuan']) && empty($errors)) {


  $makhachhang = $_SESSION['makh'];
  $sqlThemBinhLuan = "INSERT INTO binhluan (masp, makh, noidung, thoigianbl)
    VALUES ('$masp','$makhachhang','$noidung','$thoigianbl')";


  mysqli_query($conn, $sqlThemBinhLuan);
}
?>


<?php

$errors = [];
if (isset($_POST['btnyeuthich']) && !empty($errors)) :
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

if (isset($_POST['btnyeuthich']) && empty($errors)) {


  $makhachhang = $_SESSION['makh'];
  $sqlThemYeuthich = "INSERT INTO yeuthich (masp,makh)
    VALUES ('$masp','$makhachhang')";


  mysqli_query($conn, $sqlThemYeuthich);
}
?>