<?php

    include("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['facebook_userid']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>timeline | facebook</title>
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
            <!--friends area-->
            <div style="min-height: 400px;flex: 1;">
                <div id="friendsbar">
                    <img src="viratkohli.jpg" id="profilepic"><br>
                    <a href="profile.php" style="text-decoration: none;">
                        <?php echo $user_data['first_name'] . "<br>" . $user_data['last_name']; ?>

                    </a>
                </div>
            </div>
            <!--posts area-->
            <div style="min-height: 400px;flex: 2.5; padding: 20px;padding-right: 0px;">
                <div style="border: solid thin #aaa; padding: 10px; background-color: white;">
                    <textarea placeholder="what's on your mind"></textarea>
                    <input id="postbutton" type="submit" value="Post">
                    <br>
                </div>
                <!--posts-->
                <div id="postbar">
                    <!--post 1-->
                    <div id="post">
                        <div>
                            <img src="abd.jpg" style="width: 75px;margin-right: 4px;">
                        </div>
                        <div>
                            <div style="font-weight: bold;color: #405d9b;">ABD</div>
                            djfnjisdg ug afgn adfui jidfnb uidfbbi ehdfb i dffubndfnb h dfbj ndf nji assfido sd dfhh df hdfv sdfhfn u dfhu dufbf hudfnfbhj ndhb bhdf nfbh  df fdn udvvui sdhuf husdhgy bsbhb gyusdvhu sd nv ijdfjb nhjdjf j idfbn hdf j hja dfh naidf  hu dff guidfun i dfg ndf jguif jg uidfuig uidfjg jij jajsjk sjdn hjs dvdji n sijd v jisjfi shd v uis uiv ndfhbn isd vunsdi ijsd sdb nuisdjv ui sdu hyr g her rgyrui gjgjiae  jhnsdhdv uir gr  jk snhf fsh ngjs gu efb isd d jsdfjbsdfb hjshdv jidnfbi 
                            <br><br>
                            <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #999;">April 04 2023</span>
                        </div>
                    </div>
                    <!--post 2-->
                    <div id="post">
                        <div>
                            <img src="rohit.JPG" style="width: 75px;margin-right: 4px;">
                        </div>
                        <div>
                            <div style="font-weight: bold;color: #405d9b;">Rohit Sharma</div>
                            djfnjisdg ug afgn adfui jidfnb uidfbbi ehdfb i dffubndfnb h dfbj ndf nji assfido sd dfhh df hdfv sdfhfn u dfhu dufbf hudfnfbhj ndhb bhdf nfbh  df fdn udvvui sdhuf husdhgy bsbhb gyusdvhu sd nv ijdfjb nhjdjf j idfbn hdf j hja dfh naidf  hu dff guidfun i dfg ndf jguif jg uidfuig uidfjg jij jajsjk sjdn hjs dvdji n sijd v jisjfi shd v uis uiv ndfhbn isd vunsdi ijsd sdb nuisdjv ui sdu hyr g her rgyrui gjgjiae  jhnsdhdv uir gr  jk snhf fsh ngjs gu efb isd d jsdfjbsdfb hjshdv jidnfbi 
                            <br><br>
                            <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #999;">April 04 2023</span>
                        </div>
                    </div>
                </div>    
            </div>    
        </div> 
    </div>
</body>
</html>