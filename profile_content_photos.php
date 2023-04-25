<div style="min-height: 400px;width:100%;flex: 2.5;background-color:white;text-align:center;">
    <div style="padding: 20px">
    <?php

        $DB = new DataBase();
        $sql = "select image,postid from posts where has_image = 1 && userid = $user_data[userid] order by id desc limit 30";
        $images = $DB->read($sql);

        if(is_array($images))
        {
            foreach ($images as $image_row) {
                echo "<img src='$image_row[image]' style='width:150px;margin:10px;' />";
            }

        }
        else
        {
            echo "No images were found"; 
        }
    ?>
    </div>
</div>