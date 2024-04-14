<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="d-flex justify-content-between p-2 px-3">
                    <div class="d-flex flex-row align-items-center"> <img src="uploads/user/<?php echo $post['user_picture']; ?>" width="50" class="rounded-circle img-fluid">
                        <div class="d-flex flex-column ms-3"> <span class="font-weight-bold"><?php echo $post['user_name']; ?></span> <small class="text-primary">Lyon</small> </div>
                    </div>
                    <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2">20 mins</small> <i class="fa fa-ellipsis-h"></i> </div>
                </div> <img src="uploads/post/<?php echo $post['post_image']; ?>" class="img-fluid">
                <div class="p-2">
                    <p class="text-justify"><?php echo $post['post_content']; ?></p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row icons d-flex align-items-center"> <i class="fa fa-heart"></i> <i class="fa fa-smile-o ml-2"></i> </div>
                        <div class="d-flex flex-row muted-color"> <span class="me-2">2 comments</span> <span class="me-2">Share</span> </div>
                    </div>
                    <hr>
                    <div class="comments">
                        <div class="d-flex flex-row align-items-center mb-2"> <img src="http://unsplash.it/g/50?random&gravity=center" width="50" class="rounded-circle img-fluid">
                            <div class="d-flex flex-row px-5"> <span class="name">friends1 : </span> <small class="comment-text px-2">I like this alot!</small>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4"> <img src="http://unsplash.it/g/50?random&gravity=center" width="50" class="rounded-circle img-fluid">
                            <div class="d-flex flex-row px-5"> <span class="name">friends2 : </span> <small class="comment-text px-2">Thanks for sharing!</small> </div>
                        </div>
                        <div class="comment-input"> <input type="text" class="form-control">
                            <div class="fonts"> <i class="fa fa-camera"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>