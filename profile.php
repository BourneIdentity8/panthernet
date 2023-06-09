<?php
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");

if(isset($_GET['profile_username'])) {
    $username = $_GET['profile_username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $user_array = mysqli_fetch_array($user_details_query);
    
    $num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
	
	$last_online = $user_array['last_online'];

	if(is_null($last_online)) {
		$last_online = "Unknown";
	}
}

if(isset($_POST['remove_friend'])) {
    $user = new User($con, $userLoggedIn);
    $user->removeFriend($username);
}

if(isset($_POST['add_friend'])) {
    $user = new User($con, $userLoggedIn);
    $user->sendRequest($username);
}

if(isset($_POST['respond_request'])) {
    header("Location: requests.php");
}
?>
<div class=row>
    
    <div class="profile_left">
        <div class="profile_info">
            <h1><?php echo $username; ?></h1>
            <p><?php echo "Posts: " . $user_array['num_posts'];?></p>
            <p><?php echo "Friends: " . $num_friends;?></p>
			<p><?php echo "Last Online: " . $last_online;?></p>
        </div>

        <form action="<?php echo $username; ?>" method="POST">
            <?php
            $profile_user_obj = new User($con, $username);

            $logged_in_user_obj = new User($con, $userLoggedIn);

            if($userLoggedIn != $username) {

                if($logged_in_user_obj->isFriend($username)) {
                    echo '<input type="submit" name="remove_friend" class="danger" value="Remove Friend"><br>';
                }
                else if($logged_in_user_obj->didReceiveRequest($username)) {
                    echo '<input type="submit" name="respond_request" class="warning" value="Respond to Request"><br>';
                }
                else if($logged_in_user_obj->didSendRequest($username)) {
                    echo '<input type="submit" name="" class="default" value="Request Sent"><br>';
                } else {
                    echo '<input type="submit" name="add_friend" class="success" value="Add Friend"><br>';
                }
            }
            ?>

        </form>
    </div>

    <div class="column" id="main_column">
        Hello World!
    </div>

</div>

</body>
</html>