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
<?php




// if (isset($POST['submit'])) {
//     $search_post = $_POST['search'];
//     echo $search_post;
//     $query_post = "select * from posts where post_tags = '{$search_post}' ";
//     $exec_query = mysqli_query($conn1, $query_post);
//     if (!$exec_query) {
//         echo '<script>alert("can not execute query!!")</script>';
//     } else {
//         while ($row = mysqli_fetch_assoc($exec_query)) {
//             if ($exec_query > 0) {
//                 echo "<script>alert('No result found for '{$search_post}'!!')</script>";
//             } else {

//                 $post_id = $row['post_id'];
//                 $post_category_id = $row['post_category_id'];
//                 $post_title = $row['post_title'];
//                 $post_author = $row['post_author'];
//                 $post_date = $row['post_date'];
//                 $post_image = $row['post_image'];
//                 $post_desp = $row['post_desp'];
//                 $post_content = $row['post_content'];
//             }
//         }
//     }
// } -->