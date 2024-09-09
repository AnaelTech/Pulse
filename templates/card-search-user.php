<div id="card-search-user" class="col-lg-4 col-md-12">
    <div class="card testimonial-card mt-2 mb-3">
        <div class="avatar white">
            <img src="<?php if ($user['user_picture']) echo 'uploads/user/' . $user['user_picture'];
                        else echo 'assets/default-img-friends.jpg'; ?>" class="img-fluid w-100" alt="avatar">
        </div>
        <div class="card-body text-center">
            <h4 class="card-title font-weight-bold"><?php echo $user['user_name']; ?></h4>
            <hr>
            <div class="col-lg">
                <form action="<?php echo $isFriend ? 'removeFriendProcess.php' : 'addfriendsProcess.php'; ?>" method="POST" class="mb-3">
                    <input type="hidden" name="friend_id" value="<?php echo $user['id_user']; ?> ">
                    <button class="btn btn-outline-secondary pull-right rounded-pill"><a href=""></a><i class="bi bi-plus"></i> <?php echo $isFriend ? 'Unfollow' : 'Add Friend'; ?></button>
                </form>
                <button class="btn btn-outline-primary pull-right rounded-pill "><a href="user_profil_search.php?user_id=<?php echo $user['id_user']; ?>" class="text-white text-decoration-none"><i class="bi bi-eye"></i> Show Profil</a></button>
            </div>
        </div>
    </div>
</div>