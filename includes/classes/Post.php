<?php

class Post{
    private $user_obj;
    private $con;
    
    public function __construct($con, $user){
        $this->con = $con;
        $this->user_obj = new User($con, $user);
    }
    
    public function submitPost($body, $user_to, $imageName){
        $body = strip_tags($body);
        $body = mysqli_real_escape_string($this->con, $body);
        $check_empty = preg_replace('/\s+/', '', $body);
        
        if($check_empty != ""){
            $body_array = preg_split("/\s+/", $body);
            $body = implode(" ", $body_array);
            
            $date_added = date("Y-m-d H:i:s");
            
            $added_by = $this->user_obj->getUsername();
            
            if($user_to == $added_by)
                $user_to = "none";
            
            $query = mysqli_query($this->con, "INSERT INTO posts (body, added_by, user_to, date_added, user_closed, deleted, likes, image) VALUES('$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0', '$imageName')");
            $returned_id = mysqli_insert_id($this->con);
            
            $num_posts = $this->user_obj->getNumPosts();
            $num_posts++;
            $update_query = mysqli_query($this->con, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'");
        }
    }
    
    public function indexPosts ($data, $limit) {
		$page = $data['page']; 
		$userLoggedIn = $this->user_obj->getUsername();

		if($page == 1) 
			$start = 0;
		else 
			$start = ($page - 1) * $limit;


		$ret_str = "";
		$data_query = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

		if(mysqli_num_rows($data_query) > 0) 
        {


			$num_result_checked = 0;
			$count = 1;

			while($row = mysqli_fetch_array($data_query)) {
				$id = $row['id'];
				$body = $row['body'];
				$added_by = $row['added_by'];
				$date_time = $row['date_added'];
                $imagePath = $row['image'];

				
                
				$user_logged_obj = new User($this->con, $userLoggedIn);
				if($user_logged_obj->isFriend($added_by)){

					if($num_result_checked++ < $start)
						continue; 


					//Once 10 posts have been loaded, break
					if($count > $limit) {
						break;
					}
					else {
						$count++;
					}
                        
                $user_details_query = mysqli_query($this->con, "SELECT first_name, last_name, profile_pic FROM users WHERE username='$added_by'");
                $user_row = mysqli_fetch_array($user_details_query);
                $first_name = $user_row['first_name'];
                $last_name = $user_row['last_name'];
                $profile_pic = $user_row['profile_pic'];
                    
                ?>
                
                
                <script>
                    function toggle<?php echo $id; ?>(){
                      
                        var target = $(event.target);
                        if(!target.is("a")){
                            var element = document.getElementById("toggleComment<?php echo $id; ?>");
                            
                            if(element.style.display == "block")
                                element.style.display = "none";
                            else
                                element.style.display = "block";
                        }
                    }
                        
                </script>
                
                <?php
                $comments_check = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id='$id'");
                $comments_check_num = mysqli_num_rows($comments_check);
                
                
                
                $date_time_now = date("Y-m-d H:i:s");
                $start_date = new DateTime($date_time);
                $end_date = new DateTime($date_time_now);
                $interval = $start_date->diff($end_date);
                
                if($interval->m >= 1){
                    if($interval->d == 0){
                        $days = " ago";
                    }
                    else if($interval->d == 1){
                        $days = $interval->d . " day ago";
                    }
                    else{
                        $days = $interval->d . " days ago";
                    }
                    
                    if($interval->m == 1){
                        $time_message = $interval->m . " month" .
                        $days;
                    }
                    else{
                        $time_message = $interval ->m . " months".
                        $days;
                    }
                }
                
                else if($interval->d >= 1){
                    if($interval->d == 1){
                        $time_message = "Yesterday";
                    }
                    else{
                        $time_message = $interval->d . " days ago";
                    }
                }
                
                else if($interval->h >= 1){
                    if($interval->h == 1){
                        $time_message = $interval->h . " hour ago";
                    }
                    else{
                        $time_message = $interval->h . " hours ago";
                    }
                }
                
                else if($interval->i >= 1){
                    if($interval->i == 1){
                        $time_message = $interval->i . " minute ago";
                    }
                    else{
                        $time_message = $interval->i . " minutes ago";
                    }
                }
                
                else{
                    if($interval->s < 30){
                        $time_message = "Just Now";
                    }
                    else{
                        $time_message = $interval->s . " seconds ago";
                    }
                }
                
                   
                $ret_str .= "<div class='status_post'
                onClick='javascript:toggle$id()'>
                                <div class='post_profile_pic'>
                                    <img src='$profile_pic' width='50'>
                                </div>
                                
                                <div class='posted_by'
                                    style='color:#ACACAC;'>
                                    <a href='$added_by'> $first_name
                                    $last_name </a> 
                                    <div class='time'>$time_message</div>
                                </div>
                                
                                <br>
                                <br>
                                
                                <div class='post_body' id='post_body'>
                                    $body
                                    <br>
                                  
                                    <br>
                                    <br>
                                </div>
                            </div>
                            
                            <div class='newsfeedPostOptions'>
                            Comments ($comments_check_num)
                            </div>
                                
                                <div class='post_comment' id='toggleComment$id' style='display:none;'>
                                    <iframe src='comment_frame.php?post_id=$id' id='comment_iframe' frameborder='0'></iframe>
                                    
                                </div>
                                
                                <hr>";
                }                
            }
            
                if($count > $limit)
                    $ret_str .= "<input type='hidden'
                     class='nextPage' value='" . ($page + 1) . "'>
                     <input type='hidden' class='noMorePosts' value='false'>";
                else
                    $ret_str .= "<input type='hidden' class= 'noMorePosts' value='true'>
                    <p style='text-align: centre;'> No more posts to show! </p>";  
        }
        echo $ret_str;
    }
}

























































?>