<?php

class User
{

    public function get_data($id)
    {

        $query = "select * from users where userid = '$id' limit 1";
        $DB = new DataBase();
        $result = $DB->read($query);

        if($result)
        {
            $row = $result[0];
            return $row;
        }
        else
        {
            return false;
        }

    }

    public function get_user($id)
    {
        $query = "select * from users where userid = '$id' limit 1 ";
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

    public function get_friends($id)
    {
        $query = "select * from users where userid != '$id' ";
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

    public function get_following($id,$type)
    {
        $DB = new DataBase();
        //get following details
        $sql = "select following from likes where type='$type' && contentid = '$id' limit 1";
        $result = $DB->read($sql);
        if(is_array($result))
        {
            $following = json_decode($result[0]['following'],true);
            return $following;
        }

    }

    public function follow_user($id,$type,$facebook_userid)
    {
        
        
            
            $DB = new DataBase();
            

            //save likes details
            $sql = "select following from likes where type='$type' &&  contentid = '$facebook_userid' limit 1";
            $result = $DB->read($sql);
           
                $likes = json_decode($result[0]['following'],true);
                $user_ids = array_column($likes, "userid");

                if(!in_array($id, $user_ids))
                {
                    $arr["userid"] = $id;

                    $likes[] = $arr;
                    $likes_string = json_encode($likes);

                    $sql = "update likes set following = '$likes_string' where type='$type' &&  contentid = '$facebook_userid' limit 1";
                    $DB->save($sql);
                }
            else
            {
                $arr["userid"] = $id;

                $arr2[] = $arr;
                $following = json_encode($arr2);
                
                $sql = "insert into likes (type,contentid,following) values ('$type','$facebook_userid','$following')";
                $DB->save($sql);
            }
        
    }
}

?>