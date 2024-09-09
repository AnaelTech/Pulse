<div id="card-post" class="container my-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="d-flex justify-content-between p-2 px-3">
                    <div class="d-flex flex-row align-items-center">
                        <img src="uploads/user/<?php echo $post['user_picture']; ?>" width="50" class="rounded-circle img-fluid">
                        <div class="d-flex flex-column ms-3"> <span class="font-weight-bold"><?php echo $post['user_name']; ?></span> <small class="text-primary">Lyon</small> </div>
                    </div>
                    <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><?= $timeAgo ?></small> <i class="fa fa-ellipsis-h"></i> </div>
                </div> <img src="uploads/post/<?php echo $post['post_image']; ?>" class="img-fluid">
                <div class="p-2">
                    <div class="d-flex justify-content-start align-items-center">
                        <?php if ($isLiked) { ?>
                            <div class="d-flex flex-row muted-color like"><i onclick="window.location.href='?dislike=<?= $post['id_post'] ?>'" class="bi bi-heart-fill px-2 fs-3"></i><span class="me-2 py-2"><?= count($likedPosts) ?></span></div>
                        <?php } else { ?>
                            <div class="d-flex flex-row muted-color like"><i onclick="window.location.href='?like=<?= $post['id_post'] ?>'" class="bi bi-heart px-2 fs-3"></i><span class="me-2 py-2">0</span></div>
                        <?php } ?>
                        <div class="d-flex flex-row muted-color comments"><i class="bi bi-chat px-2 fs-3"></i><span class="me-2 py-2">0</span></div>
                    </div>
                    <hr>
                    <p class="post"><?php echo $post['post_content']; ?></p>
                    <hr>
                    <!-- <div class="comments">
                        <div class="d-flex flex-row align-items-center mb-2"> <img src="http://unsplash.it/g/50?random&gravity=center" width="50" class="rounded-circle img-fluid">
                            <div class="d-flex flex-row px-5 comment"> <span class="name">friends1 : </span> <small class="comment-text px-2">I like this alot!</small>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4"> <img src="http://unsplash.it/g/50?random&gravity=center" width="50" class="rounded-circle img-fluid">
                            <div class="d-flex flex-row px-5 comment"> <span class="name">friends2 : </span> <small class="comment-text px-2">Thanks for sharing!</small> </div>
                        </div>
                        <div class="comment-input"> <input type="text" class="form-control">
                            <div class="fonts"> <i class="fa fa-camera"></i></div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>