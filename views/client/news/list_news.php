<div class="container">
    <div class="breadcum" style="margin-bottom: 0px;">
        <ul>
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="active">
                <a href="#">
                    My account
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="shoppage">
        <div class="row">
            <div class="filter">
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-column flex-sm-row justify-content-between align-items-left align-items-sm-center">
                    <h4 style="color: #80bb01; font-weight:bolder;">News</h4>
                    <form class="search" action="/news" method="GET">
                        <input type="text" name="q" placeholder="Enter to search ..." value="<?php echo isset($_GET["q"]) ? $_GET["q"] : ""; ?>">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="row" style="margin: 0px;">
                <?php foreach ($list_news as $news) { ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                        <div class="card">
                            <img src="<?php echo $news["thumbnails"]; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $news["title"]; ?></h4>
                                <small><b>Posted on: </b><?php echo substr($news["created_at"],0,10); ?></small>
                                <hr>
                                <p class="card-text"><?php echo $news["description"]; ?></p>
                                <a href="/news/<?php echo $news["id"] ?>" class="btn">Continue</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="pagination-container">
                <ul>
                    <li class="<?php echo $_GET["page"] == 1 ? "disabled" : ""; ?> prev">
                        <a href="/news?q=<?php echo isset($_GET["q"]) ? $_GET["q"] : ""; ?>&page=<?php echo $_GET["page"] - 1; ?>"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <?php
                    $num_pages = ceil(floatval($number_news) / 9);
                    for ($i = 0; $i < $num_pages; $i++) { ?>
                        <li class="<?php echo $_GET["page"] == $i + 1 ? "active" : ""; ?>"><a href="/news?q=<?php echo isset($_GET["q"]) ? $_GET["q"] : ""; ?>&page=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                    <?php } ?>
                    <li class="<?php echo $_GET["page"] == $num_pages ? "disabled" : ""; ?> next">
                        <a href="/news?q=<?php echo isset($_GET["q"]) ? $_GET["q"] : ""; ?>&page=<?php echo $_GET["page"] + 1; ?>" title="Next »"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>