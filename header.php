<!--top bar-->
<?php

    $corner_image = "images/user_male.jpg";
    if(isset($user_data))
    {
        $corner_image = $user_data['profile_image'];
    }

?>
<div id="bluebar">
        <div style="width: 800px;margin: auto;font-size: 30px;">
            
            <a href="index.php" style="color: white;">Facebook</a> 
            
            &nbsp &nbsp <input type="text" id="searchbox" placeholder="Search">
            <a href="profile.php">
            <img src="<?php echo $corner_image ?>" style="width: 50px;float: right;">
            </a>
            <a href="logout.php">
            <span style="font-size: 11px;float: right;margin: 10px;color: white;">Logout</span>
            </a>
        </div>
    </div>