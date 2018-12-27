<?php

$post = $wp_query->post;



if (in_category(array(5))) {
    include('wp-content/themes/4U/singlegallery.php');
} else {
    include('wp-content/themes/4U/singlenews.php');
}
?>