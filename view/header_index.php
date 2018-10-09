<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= getPengaturan()['nama'];?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?= getPengaturan()['logo'];?>">

    <!-- Core Stylesheet -->
    <link href="<?= assets('style.css') ?>" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?= assets('css/responsive.css') ?>" rel="stylesheet">

</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="mosh-preloader"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    
    <header class="header_area clearfix" style="background-color: #25499f">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Menu Area Start -->
                <div class="col-12 h-100">
                    <div class="menu_area h-100">
                        <nav class="navbar h-100 navbar-expand-lg align-items-center">
                            <!-- Logo -->
                            <a class="navbar-brand" href="index.html"><img src="<?= getPengaturan()['logo'];?>" alt="logo"></a>

                            <!-- Menu Area -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mosh-navbar" aria-controls="mosh-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse justify-content-end" id="mosh-navbar">

                                <ul class="navbar-nav animated" id="nav">
                                    <?php foreach(getMenus() as $menu){ 
                                        if(isset($menu['child'])){?>
                                            <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="moshDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $menu['nama'] ?></a>
                                            <div class="dropdown-menu" aria-labelledby="moshDropdown">
                                                <?php foreach($menu['child'] as $child){ ?>
                                                <a class="dropdown-item" href="<?= $child['url'] ?>"><?= $child['nama'] ?></a>
                                                <?php } ?>
                                            </div>
                                            </li>
                                    <?php }else{ ?>
                                        <li class="nav-item"><a class="nav-link" href="<?= $menu['url'] ?>"><?= $menu['nama'] ?></a></li>
                                    <?php } }?>
                                </ul>

                                <!-- Search Form Area Start -->
                                <div class="search-form-area animated">
                                    <form action="berita.php" method="get">
                                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; hit enter">
                                        <button type="submit" class="d-none"><img src="<?= assets('img/core-img/search-icon.png')?>" alt="Search"></button>
                                    </form>
                                </div>
                                <!-- Search btn -->
                                <div class="search-button">
                                    <a href="#" id="search-btn"><img src="<?= assets('img/core-img/search-icon.png')?>" alt="Search"></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->