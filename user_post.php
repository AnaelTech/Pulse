<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/layout/navbar.php";
?>
<section class="section4 mt-4">
    <div class="container">
        <div class="row ligne space-between">
            <div class="col-lg">
                <div class="row ligne space-between">
                    <div class="col-lg-3">
                        <div class="border-none mb-4">
                            <div class="text-center">
                                <h3>Friends</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="border-none mb-4">
                            <div class="text-center">
                                <h3>Post</h3>
                            </div>
                            <form action="user_postProcess.php" method="POST" class="mt-5" enctype="multipart/form-data">

                                <div class="form-group has-error">
                                    <label for="avatar">Choose a post picture:</label>
                                    <input type="file" id="image" name="postPicture" accept="image/png, image/jpeg" />
                                </div>

                                <div class="form-group mt-3">
                                    <label for="description">Description</label>
                                    <textarea rows="10" class="form-control mt-3" name="description"></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Post
                                    </button>
                                    <button class="btn btn-default">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>