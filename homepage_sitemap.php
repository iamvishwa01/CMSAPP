<?php
include 'includes/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="external_css/homepage.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/footer.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap-grid.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap-grid.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap-reboot.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap-reboot.min.css" media="screen,projection" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Dedsec.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Linux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Java</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="#">WebDevelopment</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="#">Selenium</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" actipn="" method="POST">
                <input class="form-control mr-sm-2" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name='submit' type="submit">Search</button>
            </form>
        </div>
    </nav>
    <section class="wrapper">

        <div class="container-fostrap">

            <div class="content">

                <div class="container">

                    <div class="row">
                        <?php

                        $showAllPost = "select * from posts";
                        $query = mysqli_query($conn, $showAllPost);
                        if (!$query) {
                            echo "something went wrong";
                        } else {
                            while ($row = mysqli_fetch_assoc($query)) {
                                $post_id = $row['post_id'];
                                $post_category_id = $row['post_category_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_desp = $row['post_desp'];
                                $post_content = $row['post_content'];

                                $post_desp_cut_data = substr($post_desp, 0, 80);

                        ?>


                                <div class="col-xs-12 col-sm-4">
                                    <div class="card">
                                        <a class="img-card" href="">
                                            <img src="uploads/<?php echo $post_image; ?>" />
                                        </a>
                                        <div class="card-content">
                                            <h4 class="card-title">
                                                <a href="#"> <?php echo "$post_title"; ?>
                                                </a>
                                            </h4>
                                            <p class="">
                                                <?php echo "$post_content"; ?>
                                            </p>
                                            <div class="text-left">

                                                <div class="text-left">
                                                    <h6>By <?php echo "$post_author"; ?></h6>

                                                </div>
                                            </div>
                                            <div class="card-read-more ">

                                                <a href='<?php echo "showposts.php?edit={$post_id}" ?>' class="btn btn-link btn-block">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                        <?php
                            }
                        }

                        ?>


                    </div>
                </div>
            </div>

    </section>
    <!-- Footer -->
    <footer class="page-footer font-small footer">

        <div style="background-color: #5a03fc">
            <div class="container">

                <!-- Grid row-->
                <div class="row py-4 d-flex align-items-center">

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0">Get connected with us on social networks!</h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">

                        <!-- Facebook -->
                        <a class="fb-ic" href="#">
                            <i class="fab fa-facebook-f  mr-4"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic" href="#">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>


                        <!--Linkedin -->
                        <a class="li-ic" href="#">
                            <i class="fab fa-linkedin-in white-text mr-4"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic" href="#">
                            <i class="fab fa-instagram white-text"> </i>
                        </a>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row-->

            </div>
        </div>

        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-5" style="background-color: black;">

            <!-- Grid row -->
            <div class=" row mt-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold foothead">Company name</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                        consectetur
                        adipisicing elit.</p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 foothead">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold foothead">Products</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">MDBootstrap</a>
                    </p>
                    <p>
                        <a href="#!">MDWordPress</a>
                    </p>
                    <p>
                        <a href="#!">BrandFlow</a>
                    </p>
                    <p>
                        <a href="#!">Bootstrap Angular</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 ">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold foothead">Useful links</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Your Account</a>
                    </p>
                    <p>
                        <a href="#!">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!">Help</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 ">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold foothead">Contact</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fas fa-home mr-3"></i> New York, NY 10012, US
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> info@example.com
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> + 01 234 567 88
                    </p>
                    <p>
                        <i class="fas fa-print mr-3"></i> + 01 234 567 89
                    </p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© <?php echo date('Y'); ?>
            <a href="dedsec.com"> dedsec.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="external_css/js/bootstrap.bundle.js"></script>
    <script src="external_css/js/bootstrap.bundle.min.js"></script>
    <script src="external_css/js/bootstrap.js"></script>
    <script src="external_css/js/bootstrap.min.js"></script> -->

</body>

</html>