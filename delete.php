<?php

    include("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['facebook_userid']);

    $Post = new Post();

    $ERROR = "";
    if(isset($_GET['id']))
    {
        $ROW = $Post->get_one_post($_GET['id']);

        if(!$ROW)
        {
            $ERROR = "No such post was found"; 
        }
    }
    else
    {
       $ERROR = "No such post was found"; 
    }    

    //if something was posted
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Post->delete_post($_POST['postid']);
        header("Location: profile.php");
        die;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete | facebook</title>
</head>
<style>
    #bluebar{
        height: 50px;
        background-color: #405d9b;
        color: #d9dfeb;
    }
    #searchbox{
        width: 400px;
        height: 20px;
        border-radius: 5px;
        border: none;
        padding: 4px;
        font-size: 14px;
        background-image: url(search.png);
        background-repeat: no-repeat;
        background-position: right;
    }
    #profilepic{
        width: 150px;
        border-radius: 50%;
        border: solid 2px white;
    }
    #menubuttons{
        width: 100px;
        display: inline-block;
        margin: 2px;
    }
    #friendsimg{
        width: 75px;
        float: left;
        margin: 8px;
    }
    #friendsbar{
        min-height: 400px;
        margin-top: 20px;
        padding: 8px;
        text-align: center;
        font-size: 20px;
        color: #405d9b;
    }
    #friends{
        clear: both;
        font-size: 12px;
        font-weight: bold;
        color: #405d9b;
    }
    textarea{
        width: 100%;
        border: none;
        font-family: tahoma;
        font-size: 14px;
        height: 60px;
    }
    #postbutton{
        float: right;
        background-color: #405d9b;
        border: none;
        color: white;
        padding: 4px;
        font-size: 14px;
        border-radius: 2px;
        width: 50px;
    }
    #postbar{
        margin-top: 20px;
        background-color: white;
        padding: 10px;
    }
    #post{
        padding: 4px;
        font-size: 13px;
        display: flex;
        margin: 20px;
    }
</style>
<body style="font-family: tahoma;background-color: #d0d8e4;">
    <br>
    
    <!--top bar-->
    <?php include("header.php"); ?>

    <!--cover area-->
    <div style="width: 800px;margin: auto;min-height: 400px;">
        
        <!--below cover area-->
        <div style="display: flex;">
            
            <!--posts area-->
            <div style="min-height: 400px;flex: 2.5; padding: 20px;padding-right: 0px;">
                <div style="border: solid thin #aaa; padding: 10px; background-color: white;">
                    
                    <form method="post">

                            <?php 
                                if($ERROR != "")
                                {
                                    echo $ERROR;
                                }

                                if($ROW)
                                {
                                echo "Are you sure you want to delete this post?<br><br>";

                                $user = new User();
                                $ROW_USER = $user->get_user($ROW['userid']);

                                include("post_delete.php");
                                }
                            ?>

                        <input type="hidden" name="postid" value="<?php echo $ROW['postid']; ?>">
                        <input id="postbutton" type="submit" value="Delete">

                        <br>
                    </form>
                </div>
                   
            </div>    
        </div> 
    </div>
</body>
</html>