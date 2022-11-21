<div class="container">
    <?php
    $comment = new CommentModel();
    $result = $comment->getComment($set['masach']);
    $resultFetchAll = $result->fetchAll()

    ?>
    <div class=" mt-5">
        <div class="col-lg-8 ">
            <h5><?php echo isset($result) && isset($_SESSION['user']) ? count($resultFetchAll) : 0; ?> bình luận</h5>
            <div class="card p-3 border-0 shadow-sm">
                <form action="index.php?controller=comment&action=add_comment" method="post">
                    <textarea name="noidungbl" id="noidungbl" class="form-control" style="resize: none;" placeholder="Viết bình luận ..."></textarea>
                    <button class="btn btn-outline-dark d-flex ms-auto mt-3">Phản hồi</button>
                    <input type="hidden" name="masach" value="<?php echo $set['masach'] ?>">
                </form>
            </div>
        </div>
    </div>


    <!-- render comment -->

    <?php

    if (isset($_SESSION['user'])) :
        if (isset($resultFetchAll)) :
            foreach ($resultFetchAll as $key => $data) :
                $reply = $comment->getAllReplyComment($data['mabl'], $set['masach']);
                $replyFetchAll = $reply->fetchAll();
    ?>
                <div class="comment w-50 mx-auto mt-5">
                    <div class="comment__container opened" id="first-comment">
                        <div class="comment__card">
                            <p class="comment__title fw-bold"><?php echo $data["tensv"] ?><span class="ms-2 text-secondary" style="font-size: 12px;"><?php echo $data["ngaybl"] ?></span> </p>
                            <p><?php echo $data['noidung'] ?></p>
                            <div class="comment__card-footer">
                                <div class="show-replies"><?php echo isset($replyFetchAll) ? count($replyFetchAll) . " phản hồi" : "" ?></div>
                            </div>
                            <div id="feedback" class="check">
                                <div class="btn btn-primary feedback__btn">trả lời</div>
                                <div class="form__feedback">
                                    <form action="index.php?controller=comment&action=add_reply" method="post">
                                        <input type="text" name="noidungbl" class="form-control" autofocus required>
                                        <button type="submit" class="btn btn-info d-flex ms-auto">gửi</button>
                                        <input type="hidden" value="<?php echo $data['mabl'] ?>" name="mabl_cha">
                                        <input type="hidden" value="<?php echo $set['masach'] ?>" name="masach">
                                    </form>
                                </div>
                            </div>
                            <!-- <img src="./src/assets/images/face/2.jpg" alt="" class="rounded-circle position-absolute top-0 start-0 translate-middle  border border-light" style="width:50px;height:50px"> -->
                        </div>
                        <?php
                        foreach ($replyFetchAll as $key => $getReply) :
                        ?>
                            <div class="comment__container" dataset="first-comment" id="first-reply">
                                <div class="comment__card">
                                    <p class="comment__title fw-bold"><?php echo $getReply["tensv"] ?><span class="ms-2 text-secondary" style="font-size: 12px;"><?php echo $data["ngaybl"] ?></span> </p>
                                    <p><?php echo $getReply['noidung'] ?></p>
                                    <div class="comment__card-footer">
                                        <div class="show-replies">113 phản hồi</div>
                                    </div>
                                    <div id="feedback" class="check">
                                        <div class="btn btn-primary feedback__btn">trả lời</div>
                                        <div class="form__feedback">
                                            <form action="index.php?controller=comment&action=add_reply" method="post">
                                                <input type="text" name="noidungbl" class="form-control" autofocus required>
                                                <button type="submit" class="btn btn-info d-flex ms-auto">gửi</button>
                                                <input type="hidden" value="<?php echo $getReply['mabl'] ?>" name="mabl_cha">
                                                <input type="hidden" value="<?php echo $getReply['masach'] ?>" name="masach">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- <img src="./src/assets/images/face/2.jpg" alt="" class="rounded-circle position-absolute top-0 start-0 translate-middle  border border-light" style="width:50px;height:50px"> -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- <div class="comment__container" dataset="first-comment" id="first-reply">
                            <div class="comment__card">
                                <h6 class="comment__title">The first reply</h6>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Voluptatum eaque itaque sit tempora officiis, quisquam atque?
                                    Impedit dignissimos error laudantium!
                                </p>
                                <div class="comment__card-footer">
                                    <div class="show-replies">115 phản hồi</div>
                                </div>
                                <div id="feedback" class="check">
                                    <div class="btn btn-primary feedback__btn">trả lời</div>
                                    <div class="form__feedback">
                                        <input type="text" class="form-control" autofocus>
                                        <button class="btn btn-info">gửi</button>
                                    </div>
                                </div>
                                <img src="./src/assets/images/face/2.jpg" alt="" class="rounded-circle position-absolute top-0 start-0 translate-middle  border border-light" style="width:50px;height:50px">

                            </div>
                            <div class="comment__container" dataset="first-reply" id="first-first-reply">
                                <div class="comment__card">
                                    <h6 class="comment__title">The first reply to the first reply</h6>
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                        Voluptatum eaque itaque sit tempora officiis, quisquam atque?
                                        Impedit dignissimos error laudantium!
                                    </p>
                                    <div class="comment__card-footer">
                                        <div class="show-replies">114 phản hồi</div>
                                    </div>
                                    <div id="feedback" class="check">
                                        <div class="btn btn-primary feedback__btn">trả lời</div>
                                        <div class="form__feedback">
                                            <input type="text" class="form-control" autofocus>
                                            <button class="btn btn-info">gửi</button>
                                        </div>
                                    </div>
                                    <img src="./src/assets/images/face/2.jpg" alt="" class="rounded-circle position-absolute top-0 start-0 translate-middle  border border-light" style="width:50px;height:50px">

                                </div>
                                <div class="comment__container" dataset="first-first-reply">
                                    <div class="comment__card">
                                        <h6 class="comment__title">
                                            The first reply to the first reply to the first reply
                                        </h6>
                                        <p>
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                            Voluptatum eaque itaque sit tempora officiis, quisquam atque?
                                            Impedit dignissimos error laudantium!
                                        </p>
                                        <div class="comment__card-footer">
                                            <div class="show-replies">0 phản hồi</div>
                                        </div>
                                        <div id="feedback" class="check">
                                            <div class="btn btn-primary feedback__btn">trả lời</div>
                                            <div class="form__feedback">
                                                <input type="text" class="form-control" autofocus>
                                                <button class="btn btn-info">gửi</button>
                                            </div>
                                        </div>
                                        <img src="./src/assets/images/face/2.jpg" alt="" class="rounded-circle position-absolute top-0 start-0 translate-middle  border border-light" style="width:50px;height:50px">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
    <?php
            // endif;
            endforeach;
        endif;
    endif;
    ?>
</div>

<style>
    .form__feedback {
        display: none !important;
        transition: 2s;
    }

    .view__form {
        display: block !important;
        margin-top: 10px;
        transition: ease-in 2s;
    }

    .view__form form {
        display: flex !important;
        justify-content: space-around;
    }

    .view__form input:focus {
        box-shadow: none;
    }

    .view__form button:focus {
        box-shadow: none;
    }

    #noidungbl:focus {
        box-shadow: none;
        border: 2px solid #000;
    }
</style>


<script>
    const showContainers = document.querySelectorAll(".show-replies");

    showContainers.forEach((btn) =>
        btn.addEventListener("click", (e) => {
            // tìm gần nhất bộ chọn css  (class, id ...) nếu nhiều bộ chọn thì phân tách bởi dấu phẩy
            let parentContainer = e.target.closest(".comment__container");
            let _id = parentContainer.id;
            if (_id) {
                let childrenContainer = parentContainer.querySelectorAll(
                    `[dataset=${_id}]`
                );
                childrenContainer.forEach((child) => child.classList.toggle("opened"));
            }
        })
    );

    const showFormFeedback = document.querySelectorAll(".feedback__btn");

    showFormFeedback.forEach(btn => {
        btn.addEventListener("click", (e) => {
            var _children = e.target.closest("#feedback").children;
            _children[1].classList.toggle("view__form")
        })
    });
</script>