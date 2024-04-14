<div class="col-lg-4">
    <div class="card testimonial-card mt-2 mb-3">
        <div class="avatar white">
            <img src="uploads/user/<?php echo $user['user_picture']; ?>" class="img-fluid w-100" alt="avatar">
        </div>
        <div class="card-body text-center">
            <h4 class="card-title font-weight-bold"><?php echo $user['user_name']; ?></h4>
            <hr>
            <div class="col-lg">
                <form action="addfriendsProcess.php" method="POST" class="mb-3">
                    <input type="hidden" name="friend_id" value="<?php echo $user['id_user']; ?> ">
                    <button class="btn btn-primary pull-right"><a href=""></a>Add Friend</button>
                </form>
                <button class="btn btn-success pull-right"><a href="user_profil_search.php?user_id=<?php echo $user['id_user']; ?>" class="text-white">Show Profil</a></button>
            </div>
        </div>
    </div>
</div>