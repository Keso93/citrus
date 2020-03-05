<!doctype html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/toastify.css">

    <title>Citrus!</title>
</head>
<body>

<!-- Main Header -->
<header class="main-header">

    <!-- Top Bar -->
    <div class="top-bar">
        <!-- Container -->
        <div class="container">
            <a href="#" class="phone-info">+381 11 555 55 555</a>
            <?php if ($params['is_logged']) { ?>
                <a href="/admin/logout" class="login">Logout</a>
                <a href="/admin/dashboard" class="login" style="margin-right: 20px">Dashboard</a>
            <?php } else { ?>
                <a href="/admin/login" class="login">Sign in</a>
            <?php } ?>
            <div style="clear: both"></div>
        </div>
        <!-- Container END -->
    </div>
    <!-- Top Bar END -->

    <!-- Navbar -->

    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="logo"><a href="/"><img src="/assets/img/logo.png" alt="logo" class="img-fluid"></a>
            </h1>


            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Search Cart Holder -->
            <div class="search-cart-holder">
                <div class="search">
                    <input aria-label="Trazi" class="form-control">
                    <button type="submit" class="btn"></button>
                </div>
                <a href="#" class="cart">
                    <img src="/assets/img/cart-icon.png" alt="Korpa">
                    <span class="badge badge-pill badge-danger">2</span>
                </a>
            </div>
            <!-- Search Cart Holder END -->
        </div>
        <!-- Container END -->


    </nav>
    <!-- Navbar END -->
</header>
<!--Main Header END -->

<main>
    <!-- Intro Header -->
    <header class="intro-header">
        <img src="/assets/img/slide-1.jpg" alt="Background intro" class="img-fluid">
        <!-- Carousel -->
        <div id="intro-slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#intro-slider" data-slide-to="0" class="active"></li>
                <li data-target="#intro-slider" data-slide-to="1"></li>
                <li data-target="#intro-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/img/slide-1.jpg" class="d-block w-100" alt="slide 1">
                </div>
                <div class="carousel-item">
                    <img src="/assets/img/slide-2.jpg" class="d-block w-100" alt="slide 2">
                </div>
                <div class="carousel-item">
                    <img src="/assets/img/slide-3.jpg" class="d-block w-100" alt="slide 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#intro-slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#intro-slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Carousel END -->
        <h2 class="frame"><span>Citrus</span> fresh fruits</h2>
    </header>
    <!-- Intro Header END -->
    <!-- Main Container -->
    <div class="container">
        <!-- Products Section -->
        <section class="products-section">

            <!-- Collections Holder END -->
            <!-- Products Holder -->
            <div class="products-holder">
                <div class="container-fluid">
                    <div class="row" id="mainRow">
                        <script id="template" type="template">
                            <div class="col-md-6 col-lg-4 col-xl-4 article-clear">
                                <!-- Product -->
                                <article class="product">
                                    <!-- Image Holder -->
                                    <div class="product-image-holder">
                                        <a href="#">
                                            <img src="{{img_src}}" alt="{{title}}" class="w-100 img-fluid">
                                        </a>
                                        <!-- Hover List -->
                                        <ul class="hover-list list-reset">
                                            <li><a href="#"><img src="/assets/img/shop-icon.png"
                                                                 alt="shop icon"></a></li>
                                            <li><a href="#"><img src="/assets/img/view-icon.png"
                                                                 alt="view icon"></a></li>
                                            <li><a href="#"><img src="/assets/img/like-icon.png"
                                                                 alt="like icon"></a></li>
                                        </ul>
                                        <!-- Hover List END -->
                                    </div>
                                    <!-- Image Holder END -->
                                    <!-- Product Title -->
                                    <div class="product-title clearfix">
                                        <h4 style="text-align: center">{{title}}</h4>
                                        <p>{{description}}</p>
                                    </div>
                                    <!-- Product Title END -->
                                </article>
                                <!-- Product END -->
                            </div>
                        </script>

                    </div>
                </div>
            </div>
            <h2 class="products-title">Comments</h2>
            <!-- Collections Holder -->
            <div class="comments-holder">
                <div class="row" style="background:white; padding: 10px 0">
                    <table class="table table-striped" id="comment-row">
                        <script id="template-comment" type="template-comment">
                            <thead>
                            <tr>
                                <th>{{name}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    {{text}}
                                </td>
                            </tr>
                            </tbody>
                        </script>
                    </table>
                </div>
            </div>

            <h2 class="products-title" style="margin-top: 30px">Add comment</h2>
            <!-- Collections Holder -->
            <div class="comments-holder">
                <form>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Name" id="name">
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Email" id="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text"></label>
                        <textarea class="form-control" rows="3" placeholder="Comment"
                                  id="text"></textarea>
                    </div>
                    <div class="form-group row">
                        <div style="display: flex; justify-content: center; width: 100%">
                            <button id="comment" type="button" class="btn btn-lg btn-outline-info"
                                    style="margin: 0 auto">Add comment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Products Holder END -->
        </section>
        <!-- Products Section END -->
    </div>
    <!-- Main Container END -->
</main>

<!-- Main Footer -->
<footer class="main-footer">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <!-- Info -->
            <div class="row" style="display: flex; justify-content: space-between">
                <div class="col-md-3">
                    <h3>Citrus</h3>
                    <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias cupiditate dolorum
                        esse expedita
                        fugiat nobis omnis praesentium suscipit ut. Aut.</p>
                    <p><a href="mailto:citrus@gmail.com">citrus@gmail.com</a><br>
                        <a href="tel:+381651234123">+381 65 123 4 123</a><br>
                        Citrus 3, Novi Beograd, Srbija
                    </p>
                </div>
                <!-- Info END -->
                <!-- Users -->

                <!-- Users END -->
                <!-- Tags -->
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <h4>Tags</h4>
                    <ul class="list-reset tags clearfix">
                        <li><a href="#">Fruits</a></li>
                        <li><a href="#">Fresh</a></li>
                        <li><a href="#">Citrus</a></li>
                        <li><a href="#">Lemon</a></li>
                        <li><a href="#">Orange</a></li>
                        <li><a href="#">Tangarine</a></li>
                        <li><a href="#">Oroblanco</a></li>
                        <li><a href="#">Mandarine</a></li>
                    </ul>
                </div>
                <!-- Tags END -->
            </div>
        </div>
        <span class="back-to-top">Back to top</span>
    </div>

    <!-- Footer Top END -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <!-- Soc Net List -->
            <ul class="soc-net list-reset">
                <li><a href="#" target="_blank" class="fb">Facebook</a></li>
                <li><a href="#" target="_blank" class="tw">Twitter</a></li>
                <li><a href="#" target="_blank" class="in">Instagram</a></li>
                <li><a href="#" target="_blank" class="yt">YouTube</a></li>
            </ul>
            <!-- Soc Net List END -->
            <!-- Footer Nav -->
            <!-- Footer Nav END -->
        </div>
    </div>
    <!-- Footer Bottom END -->
</footer>
<!-- Main Footer END -->

<script src="/assets/js/jquery-3.4.1.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/toastify.js"></script>
<script src="/assets/js/comment.js"></script>
<script src="/assets/js/product.js"></script>

</body>
</html>
