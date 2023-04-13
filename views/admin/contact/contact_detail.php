<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="#">Contact</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact #<?php echo $contact["id"]; ?></li>
    </ol>
</nav>
<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Contact #<?php echo $contact["id"]; ?></h4>
        </div>
        <div class="noidung1">
            <div class="chude1"><span class="titleh5">Tin nhắn mới từ:</span> </div>
            <div class="noidungchude1"><span class="spancontantD"><?php echo $contact["name"]; ?></span></div>
        </div> <br>
        <div class="noidung1">
            <div class="chude1"><span  class="titleh5">Email liên lạc:</span> </div>
            <div class="noidungchude1"><span class="spancontantD"> <?php echo $contact["email"]; ?></span></div>
        </div> <br>
        <div class="noidung1">
            <div class="chude1"> <span class="titleh5">Chủ đề:</span> </div>
            <div class="noidungchude1"><span class="spancontantD"><?php echo $contact["title"]; ?></span></div>
        </div> <br>
        <div class="noidung1">
            <div class="chude2"> <span class="titleh5">Nội dung tin nhắn:</span> </div>
            <div class="noidungchude2"><span class="spancontantD"><?php echo $contact["message"]; ?></span></div>
        </div> <br>
        <form action="/admin/contact">
            <button class="buttonDetailContact" type="submit">Back</button>
        </form>
    </div>
</div>