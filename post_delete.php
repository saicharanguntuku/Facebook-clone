<div id="post">
    <div>
        <?php

            $image = "images/user_male.jpg";
            if($ROW_USER['gender'] == "Female")
            {
                $image = "images/user_female.jpg";
            }

            if(file_exists($ROW_USER['profile_image']))
            {
                $image = $ROW_USER['profile_image'];
            }

        ?>

        <img src="<?php echo $image ?>" style="width: 75px;margin-right: 4px;border-radius: 50%">
    </div>
    <div style="width: 100%;">
        <div style="font-weight: bold;color: #405d9b;width: 100%;">
            <?php echo $ROW_USER['first_name'] . " " . $ROW_USER['last_name']; ?>
        </div>
        <?php echo $ROW['post'] ?>

        <br><br>

        <?php 
            
            if($ROW['image'])
            {
                $post_image = $ROW['image'];
                echo "<img src='$post_image' style='width:80%' />";
            }

        ?>
  
    </div>
</div>