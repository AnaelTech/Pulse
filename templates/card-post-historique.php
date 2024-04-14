<div class="card mb-3 ms-2 w-100">
    <div class=" row g-0">
        <div class="col-md-4 mx-auto">
            <img src="uploads/post/<?php echo $postUser['post_image']; ?>" alt="Trendy Pants and Shoes" class="img-fluid w-100 rounded-start" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Your posts</h5>
                <p class="card-text">
                    <?php
                    echo $postUser['post_content']; ?>
                </p>
                <p class="card-text">
                    <small class="text-muted">Nbr Like and comments ?</small>
                </p>
            </div>
        </div>
    </div>
</div>