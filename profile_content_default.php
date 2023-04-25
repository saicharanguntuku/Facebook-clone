<div style="display: flex;">
            <!--friends area-->
            <div style="min-height: 400px;flex: 1;">
                <div id="friendsbar">
                    Friends<br>
                    <?php
                        if($friends)
                        {
                            foreach ($friends as $FRIEND_ROW) 
                            {

                                include("user.php");     
                            }
                        }
                        

                    ?>
                    
                    
                </div>
            </div>
            <!--posts area-->
            <div style="min-height: 400px;flex: 2.5; padding: 20px;padding-right: 0px;">
                <div style="border: solid thin #aaa; padding: 10px; background-color: white;">
                    <form method="post" enctype="multipart/form-data">
                        <textarea name="post" placeholder="what's on your mind"></textarea>
                        <input type="file" name="file">
                        <input id="postbutton" type="submit" value="Post">
                        <br>
                    </form>
                </div>
                <!--posts-->
                <div id="postbar">
                    
                    <?php
                        if($posts)
                        {
                            foreach ($posts as $ROW) 
                            {
                                $user =new User();
                                $ROW_USER = $user->get_user($ROW['userid']);

                                include("post.php");     
                            }
                        }
                        //collect posts
                        $post = new Post();
                        $id = $_SESSION['facebook_userid'];
                        $posts = $post->get_posts($id);

                        //collect friends
                        $user = new User();
                        $id = $_SESSION['facebook_userid'];
                        $friends = $user->get_friends($id); 

                    ?>
                    
                </div>    
            </div>    
        </div> 