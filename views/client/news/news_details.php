<div class="container">
    <div class="breadcum">
        <ul>
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="/news">
                    News
                </a>
            </li>
            <li class="active">
                <a href="/news/<?php echo $news["id"]; ?>">
                    <?php echo $news["title"]; ?>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="shoppage">

        <div style="position: relative; width: 100%; margin: 0 auto;" class="col-9">
            <div class="news-content">
                <div class="title">
                    <h4><?php echo $news["title"]; ?></h4>
                    <small><b>Posted on: </b><?php echo $news["created_at"]; ?></small>
                </div>
                <hr>
                <div style="width: 60%; margin: 0 auto;">
                    <img style="border: 3pt solid #70b100;" class=" thumbnails" src="<?php echo $news["thumbnails"]; ?>" alt="">
                </div>
                <div class="body">
                    <?php echo $news["content"]; ?>
                </div>
                <hr>
            </div>

            <!-- bai viet gan day -->
            <?php if (sizeof($recentnews) != 0) { ?>
                <div class="relative">
                    <div style="background-color: #ddd;height: 40px;"></div>
                    <div class="absolute">
                        <p style="color: white">RECENT NEWS</p>
                    </div>
                    <br>
                    <div class="box">
                        <?php foreach ($recentnews as $recentnew) { ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                                <div class="card">
                                    <img src="<?php echo $recentnew["thumbnails"]; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $recentnew["title"]; ?></h4>
                                        <small><b>Posted on: </b><?php echo substr($recentnew["created_at"], 0, 10); ?></small>
                                        <hr>
                                        <p class="card-text"><?php echo $recentnew["description"]; ?></p>
                                        <a href="/news/<?php echo $recentnew["id"] ?>" class="btn">Continue</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <br>

                </div>
            <?php } ?>

            <!-- bai viet gan day-->
            <div class="comments-wrapper">
                <?php
                $comments = array_reverse($comments);
                ?>
                <h4>Comments</h4>
                <?php if (sizeof($comments) >= 5) { ?>
                    <button class="load-more-btn">Load more</button>
                <?php } ?>
                <div id="comments" data-page="0" data-news-id="<?php echo $news["id"]; ?>" data-last-comment="<?php echo sizeof($comments) > 0 ? $comments[0]["id"] : -1; ?>">
                    <?php
                    foreach ($comments as $comment) {
                    ?>
                        <div class="comment">
                            <div class="avatar">
                                <img src="<?php echo $comment["avatar"]; ?>" alt="">
                            </div>
                            <div class="body-comment">
                                <h5><b><?php echo $comment["first_name"] . " " . $comment["last_name"]; ?></b></h5>
                                <small><?php echo $comment["created_at"]; ?></small>
                                <p class="content"><?php echo $comment["content"]; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if (isset($_SESSION["user_id"])) { ?>
                    <div class="comment">
                        <div class="avatar">
                            <img src="<?php echo $user["avatar"]; ?>" alt="">
                        </div>
                        <div class="body-comment">
                            <h5><b><?php echo $user["first_name"] . " " . $user["last_name"]; ?></b></h5>
                            <form id="form-comment" class="form-comment" data-news-id="<?php echo $news["id"]; ?>">
                                <textarea name="content" id="input-comment" rows="2"></textarea>
                                <button>Submit</button>
                            </form>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="comment">
                        <a href="/redirectLogin?location=/news/<?php echo $news["id"]; ?>">Login to comment</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<template id="template-comment">
    <div class="comment">
        <div class="avatar">
            <img src="/upload/images/shin.jpg" alt="">
        </div>
        <div class="body-comment">
            <h5><b>Username</b></h5>
            <small>20:38 20/10/2021</small>
            <p class="content">Nội dung comment</p>
        </div>
    </div>
</template>