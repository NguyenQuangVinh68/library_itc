<div class="container" style="margin-top: 100px;">
    <p>250 bình luận</p>
    <div class="row">
        <div class="col-lg-8 col-md-8 ">
            <div class="comment">
                <div class="box_content">
                    <div class="avata">
                        <img src="./src/assets/images/face/8.jpg" alt="" class="w-100">
                    </div>
                    <div class="content">
                        <form action="index.php?controller=comment&action=add_comment" method="post">
                            <div class="mb-2">
                                <textarea class="form-control" id="comment" name="noidungbl"></textarea>
                                <input type="hidden" name="masach" value="<?php echo $set['masach'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Post comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- view comment -->
    <div class="row mt-5">
        <div class="col-lg-4 col-md-4 "></div>
        <div class="col-lg-8 col-md-8 ">
            <!-- phản hồi cha -->
            <?php
            $comment = new CommentModel();
            $result = $comment->getComment($set['masach']);
            if (isset($result)) :
                while ($item = $result->fetch()) :
                    $user = new UserModel();
                    $tensv = $user->getUserById($item['masv']);
            ?>
                    <div class="comment mb-3">
                        <div class="box_content">
                            <div class="avata">
                                <img src="./src/assets/images/face/2.jpg" alt="" class="w-100">
                            </div>
                            <div class="content">
                                <h5><?php echo $tensv['tensv'] ?></h5>
                                <p class="fs-6"><?php echo $item['ngaybl'] ?></p>
                                <p class="mb-1"><?php echo $item['noidung'] ?></p>
                                <button class="btn-feedback" data-bs-toggle="collapse" data-bs-target="#commentParent" aria-expanded="false" aria-controls="commentParent">Phản hồi</button>
                            </div>
                        </div>
                        <!-- form feedback -->
                        <div class="collapse mt-2" id="commentParent">
                            <input type="text" class="form-control  " autofocus>
                            <a class="btn btn-primary d-flex justify-content-end ms-auto mt-2" href="index.php?controller=comment&action=<?php echo $item['mabl'] ?>">Phản hồi</a>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
            <!-- phản hồi con -->
            <div class="row mt-3">
                <div class="col-1"></div>
                <div class="col-11">
                    <div class="comment">
                        <div class="box_content">
                            <div class="avata">
                                <img src="./src/assets/images/face/4.jpg" alt="" class="w-100">
                            </div>
                            <div class="content">
                                <h5>auther</h5>
                                <h6>Time</h6>
                                <p class="mb-1">content</p>
                                <button class="btn-feedback" data-bs-toggle="collapse" data-bs-target="#commentChild" aria-expanded="false" aria-controls="commentChild">Phản hồi</button>
                            </div>
                        </div>
                        <!-- form feedback -->
                        <div class="collapse mt-2" id="commentChild">
                            <input type="text" class="form-control" autofocus>
                            <button class="btn btn-primary d-flex justify-content-end ms-auto mt-2">Phản hồi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .comment {
        width: 100%;
        padding: 20px;
        background-color: #eee;
        border-radius: 10px;
    }

    .comment .box_content {
        display: flex;
        justify-content: space-around;
    }

    .comment .box_content .avata {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
    }

    .comment .box_content .avata img {
        border-radius: 100%;
    }

    .comment .box_content .content {
        width: 100%;
        margin: 0 0 0 10px;
    }

    .comment .box_content .content textarea {
        padding-top: 0;
        width: 100%;
        resize: none;
    }

    .comment .box_content .content .btn-feedback {
        border: none;
        font-size: 13px;
        padding: 5px 10px;
        transition: 0.4s;
        cursor: pointer;
    }

    .comment .box_content .content .btn-feedback:hover {
        background-color: #222;
        color: #fff;
        border-radius: 20px;
    }

    .collapse input:focus {
        box-shadow: none;
    }
</style>