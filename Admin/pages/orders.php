<?php
    error_reporting(0);
    session_start(); 
    if(isset($_POST['i_search'])){
        $_SESSION['content_search'] = $_POST['search']; 
        header('location: search.php');
    } 
    try {
        $conn = new PDO("mysql:host=localhost; dbname=nis_shop",'root','');
        $conn-> query("set name utf8");
        $conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "kết nối thành công";
    } catch (PDOException $e) {
        echo "Connection failed".$e->getMessage();
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <title>
        Orders
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="home.php" target="_blank">
                <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white"> E.SHOP </span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/home.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10"> account_balance </i>
                        </div>
                        <span class="nav-link-text ms-1"> Home </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/category.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10"> table_view </i>
                        </div>
                        <span class="nav-link-text ms-1"> Category </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/products.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10"> receipt_long </i>
                        </div>
                        <span class="nav-link-text ms-1"> Products </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/users.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10"> person </i>
                        </div>
                        <span class="nav-link-text ms-1"> Users </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  active bg-gradient-primary" href="../pages/orders.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10"> shopping_cart </i>
                        </div>
                        <span class="nav-link-text ms-1"> Orders </span>
                    </a>
                </li>
<!--                 <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/notifications.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10"> notifications </i>
                        </div>
                        <span class="nav-link-text ms-1"> Notifications </span>
                    </a>
                </li> -->
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none"> 
                                <?php
                                    if(isset($_SESSION["name"])){
                                        echo "<a href='http://localhost/NiShop/Nis-Shop/logout.php'> Log Out </a>";
                                    } else {
                                        echo "<a href='http://localhost/NiShop/Nis-Shop/login.php'> Log In </a>";
                                    }
                                ?>  
                            </span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    </li>
                  </ul>
            </div>
          </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-4"> Add Products</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <form action="" method="post">
                            <?php
                                if (isset($_POST['save'])) {
                                    $id = $_POST['id'];
                                    $name = $_POST['name'];
                                    if ($_POST['category'] == "Mac") {
                                        $category = "1";
                                    } else if($_POST['category'] == "iPad"){
                                        $category = "2";
                                    } else if($_POST['category'] == "iPhone"){
                                        $category = "3";
                                    } else if($_POST['category'] == "Watch"){
                                        $category = "4";
                                    } else {
                                        $category = "5";
                                    }
                                    $image = $_POST['image'];
                                    $price = $_POST['price'];
                                    $description = $_POST['description'];
                                    $dateadd = $_POST['dateadd'];
                                    $quantity = $_POST['quantity'];

                                    $sql = "SELECT * FROM `products`";
                                    $dl=$conn-> query($sql); 
                                    foreach ($dl as $value) {
                                        if ($value[0] == $id) {
                                            $sqlUpdate = "UPDATE `products` SET `product_name`='$name',`id_category`=$category,`image`='$image',`price`='$price',`description`='$description',`date_add`='$dateadd',`quantity`='$quantity'";
                                            mysql_query($conn, $sqlUpdate) or die("Error");
                                        } else {
                                            $sqlInsert = "INSERT INTO `products`(`product_name`, `id_category`, `image`, `price`, `description`, `date_add`, `quantity`) VALUES ($name,$category,$image,$price,$description,$dateadd,$quantity)";
                                            mysql_query($conn, $sqlInsert) or die("Error");
                                        }
                                    }

                                }
                            ?>
                                <div class="form-group" >
                                    <h6 class="mb-0 text-sm"> ID </h6>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="mb-0" style="padding: 3px; width: 340px;" name="id">
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top: 10px;">
                                    <h6 class="mb-0 text-sm"> Name </h6>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="mb-0" style="padding: 3px; width: 340px;" name="name">
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top: 10px;">
                                    <h6 class="mb-0 text-sm"> Category </h6>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select id="heard" class="mb-0" style="padding: 3px;" name="category">
                                            <option value="net"> Mac </option>
                                            <option value=""> iPad </option>
                                            <option value="press"> iPhone</option>
                                            <option value="net"> Watch </option>
                                            <option value="mouth"> AirPods </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top: 10px;">
                                    <h6 class="mb-0 text-sm"> Image </h6>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="mb-0" style="padding: 3px; width: 340px;" name="image">
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top: 10px;">
                                    <h6 class="mb-0 text-sm"> Price </h6>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="text" class="mb-0" style="padding: 3px; width: 340px;" name="price">
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top: 10px;">
                                    <h6 class="mb-0 text-sm"> Description </h6>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea type="text" class="mb-0" style="padding: 3px; width: 340px;" name="description"> </textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top: 10px;">
                                    <h6 class="mb-0 text-sm"> Date add </h6>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input class="date-picker mb-0" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" style="padding: 3px; width: 340px;" name="dateadd">
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top: 10px;">
                                    <h6 class="mb-0 text-sm"> Quantity </h6>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="text" class="mb-0" style="padding: 3px; width: 340px;" name="quantity">
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 30px;" align="center">
                                    <div class="col-md-5 col-sm-3">
                                        <input type="submit" class="btn btn-success" name="save" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-4"> Products Manager </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <form action="" method="post">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> ID </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Product </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Category </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Price </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Date add </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Quantity </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql="SELECT * FROM `products` JOIN `category` ON products.id_category = category.id_category ORDER BY date_add ASC"; 
                                        $dl=$conn-> query($sql); 
                                        foreach ($dl as $value) {
                                    ?>
                                    <tr >
                                        <td> 
                                            <p class="mb-0"> <?php echo $value[0]; ?> </p>
                                        </td>
                                        <td> 
                                            <h6 class="mb-0 text-sm"> <?php echo $value[1]; ?> </h6>
                                        </td>
                                        <td align="center">
                                            <p class="mb-0"> <?php echo $value[8]; ?> </p>
                                        </td>
                                        <td>
                                            <p class="mb-0"> $<?php echo $value[4]; ?> </p>
                                        </td>
                                        <td>
                                            <p class="mb-0"> <?php echo date("d-m-Y",strtotime($value[6])); ?> </p>
                                        </td>
                                        <td align="center">
                                            <p class="mb-0 "> <?php echo $value[7]; ?> </p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                              <i class="material-icons ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-4"> Products Manager </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <form action="" method="post">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> ID </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Product </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Category </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Price </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Date add </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2"> Quantity </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql="SELECT * FROM `products` JOIN `category` ON products.id_category = category.id_category ORDER BY date_add ASC"; 
                                        $dl=$conn-> query($sql); 
                                        foreach ($dl as $value) {
                                    ?>
                                    <tr >
                                        <td> 
                                            <p class="mb-0"> <?php echo $value[0]; ?> </p>
                                        </td>
                                        <td> 
                                            <h6 class="mb-0 text-sm"> <?php echo $value[1]; ?> </h6>
                                        </td>
                                        <td align="center">
                                            <p class="mb-0"> <?php echo $value[8]; ?> </p>
                                        </td>
                                        <td>
                                            <p class="mb-0"> $<?php echo $value[4]; ?> </p>
                                        </td>
                                        <td>
                                            <p class="mb-0"> <?php echo date("d-m-Y",strtotime($value[6])); ?> </p>
                                        </td>
                                        <td align="center">
                                            <p class="mb-0 "> <?php echo $value[7]; ?> </p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                              <i class="material-icons ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer py-4  ">
                <div class="container-fluid">
                   <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                <p> Copyright © <script> document.write(new Date().getFullYear()) </script> Nis Inc. All Rights Reserved. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2"> settings </i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0"> SETTING </h5>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
            <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0"> Sidebar Colors </h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
    <!-- Short Text -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="jquery.shorten.1.0.js"></script>
    <script>
        $(".description").shorten({
            "showChars" : 200,
            "moreText"  : "More",
            "lessText"  : "Less",
        });
    </script>
</body>
</html>