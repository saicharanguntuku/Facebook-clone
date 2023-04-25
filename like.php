<?php

    
    include("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['facebook_userid']);

    if(isset($_SERVER['HTTP_REFERER']))
    {
        $return_to = $_SERVER['HTTP_REFERER'];
    }
    else
    {
        $return_to = "profile.php";
    }

    if(isset($_GET['type']) && isset($_GET['id']))
    {
        $post = new Post();
        $user_class = new User();
        $post->like_post($_GET['id'],$_GET['type'],$_SESSION['facebook_userid']);

        if($_GET['type'] == "user")
        {
            $user_class->follow_user($_GET['id'],$_GET['type'],$_SESSION['facebook_userid']);
        }
    }

    header("Location: ". $return_to);
    die;
?>