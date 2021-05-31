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

            <form class="form-inline my-2 my-lg-0" action="#" method="POST">
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
                        <!--  -->

                        <?php
                        if (isset($_POST['submit'])) {
                            $search_post = $_POST['search'];
                            stripslashes($search_post);
                            trim($search_post);
                            htmlspecialchars($search_post);
                            $showAllPost = "select * from posts where post_tags like '%$search_post%' Limit 10 ";
                            $query = mysqli_query($conn, $showAllPost);
                            if (!$query) {
                                echo "something went wrong";
                            }
                            $count_rows = mysqli_num_rows($query);
                            if ($count_rows == 0) {
                                echo "No resuls found for $search_post";
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
                                                <!-- <div class="text-left"> -->

                                                <div class="text-left">
                                                    <h6>By <?php echo "$post_author"; ?></h6>

                                                </div>
                                            </div>
                                            <div class="card-read-more ">

                                                <a href='<?php echo "showposts.php?show={$post_id}" ?>' class="btn btn-link btn-block">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                    </div>
        <?php
                                }
                            }
                        }
        ?>





                </div>
            </div>
        </div>

    </section>

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