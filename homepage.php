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
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap-grid.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap-grid.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap-reboot.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="external_css/css/bootstrap-reboot.min.css" media="screen,projection" />

    <title>Document</title>
</head>

<body>
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

</body>

</html>