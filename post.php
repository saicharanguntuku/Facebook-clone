<?php

class Post
{
    private $error = "";

    public function create_post($userid, $data, $files)
    {

        if(!empty($data['post']) || !empty($files['file']['name']))
        {

            $myimage = "";
            $has_image = 0;
            if(!empty($files['file']['name']))
            {
                $myimage = "uploads/" . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $myimage);
                $has_image = 1;
            }

            $post = addslashes($data['post']);
            $postid = $this->create_postid();

            $query = "insert into posts (userid,postid,post,image,has_image) values ('$userid','$postid','$post','$myimage','$has_image')";

            $DB = new DataBase();
            $DB->save($query);

        }
        else
        {
            $this->error .= "Please type something to post!<br>";
        }

        return $this->error;

    }

    public function get_posts($id)
    {

        $query = "select * from posts where userid = '$id' order by id desc limit 10 ";

        $DB = new DataBase();
        $result = $DB->read($query);

        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }

    }

    public function get_one_post($postid)
    {

        $query = "select * from posts where postid = '$postid' limit 1 ";

        $DB = new DataBase();
        $result = $DB->read($query);

        if($result)
        {
            return $result[0];
        }
        else
        {
            return false;
        }

    }

    public function delete_post($postid)
    {

        $query = "delete from posts where postid = '$postid' limit 1 ";

        $DB = new DataBase();
        $DB->save($query);

    }

    public function i_own_post($postid,$facebook_userid)
    {

        $query = "select * from posts where postid = '$postid' limit 1 ";
        $DB = new DataBase();
        $result = $DB->read($query);

        if(is_array($result))
        {
            if($result[0]['userid'] == $facebook_userid)
            {
                return true;
            }
        }
        
        return false;

    }

    public function get_likes($id,$type)
    {
        $DB = new DataBase();
        //get like details
        $sql = "select likes from likes where type='$type' && contentid = '$id' limit 1";
        $result = $DB->read($sql);
        if(is_array($result))
        {
            $likes = json_decode($result[0]['likes'],true);
            return $likes;
        }

    }

    public function like_post($id,$type,$facebook_userid)
    {
        
        
            //incriment posts table
            $sql = "update {$type}s set likes = likes + 1 where {$type}id = '$id' limit 1";
            $DB = new DataBase();
            $DB->save($sql);

            //save likes details
            $sql = "select likes from likes where type='$type' &&  contentid = '$id' limit 1";
            $result = $DB->read($sql);
            if(is_array($result))
            {
                $likes = json_decode($result[0]['likes'],true);
                $user_ids = array_column($likes, "userid");

                if(!in_array($facebook_userid, $user_ids))
                {
                    $arr["userid"] = $facebook_userid;

                    $likes[] = $arr;
                    $likes_string = json_encode($likes);

                    $sql = "update likes set likes = '$likes_string' where type='$type' &&  contentid = '$id' limit 1";
                    $DB->save($sql);
                }
            }
            else
            {
                $arr["userid"] = $facebook_userid;

                $arr2[] = $arr;
                $likes = json_encode($arr2);
                
                $sql = "insert into likes (type,contentid,likes) values ('$type','$id','$likes')";
                $DB->save($sql);
            }
        
    }

    private function create_postid()
    {
        $length = rand(4,19);
        $number="";
        for ($i=0; $i < $length; $i++) 
        { 
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }

}

?>