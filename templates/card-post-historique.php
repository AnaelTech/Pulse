<div class="col-lg-6 col-md-12  mb-3">
    <div class="card w-100">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="uploads/post/<?php echo $postUser['post_image']; ?>" alt="Post Image" class="img-fluid w-100 rounded-start" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Your posts</h5>
                    <p class="card-text">
                        <?php echo $postUser['post_content']; ?>
                    </p>
                    <p class="card-text">
                        <i class="bi bi-heart"></i> <small class="text-muted px-2"><?= count($likedPosts) ?></small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>