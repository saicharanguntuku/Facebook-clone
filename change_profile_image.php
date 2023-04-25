<?php


    include("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['facebook_userid']);

    //posting starts here
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "")
        {

            if($_FILES['file']['type'] == "image/jpeg")
            {
                $filename = "uploads/" . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $filename);
 

                if(file_exists($filename))
                {
    
                    $userid = $user_data['userid'];
                    $change = "profile";

                    //check for profile or cover
                    if(isset($_GET['change']))
                    {
                        $change = $_GET['change'];
                    }

                    if($change == "cover")
                    {
                        $query = "update users set cover_image = '$filename' where userid = '$userid' limit 1";

                    }
                    else
                    {
                        $query = "update users set profile_image = '$filename' where userid = '$userid' limit 1";

                    }

                    $DB = new DataBase();
                    $DB->save($query);
    
                    header("Location: profile.php");
                    die;
                }
    

            }
            else
            {
                echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey'>";
                echo "The following restrictions occured:<br><br>";
                echo "only images of jpg type are allowed";
                echo "</div>";   
            }

        }
        else
        {
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey'>";
            echo "The following restrictions occured:<br><br>";
            echo "please add a valid image";
            echo "</div>";
        }
        
    }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change profile image | facebook</title>
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
    
    #postbutton{
        float: right;
        background-color: #405d9b;
        border: none;
        color: white;
        padding: 4px;
        font-size: 14px;
        border-radius: 2px;
        width: 100px;
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
                <form method="post" enctype="multipart/form-data">
                    <div style="border: solid thin #aaa; padding: 10px; background-color: white;">
                        <input type="file" name="file">
                        <input id="postbutton" type="submit" value="Change">
                        <br>
                    </div>
                </form>
   
            </div>    
        </div> 
    </div>
</body>
</html>