<div class="container">
    <div class="breadcum">
        <ul>
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="active">
                <a href="#">
                    Contact
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="coverContactPage">
        <div class="contactpage">
            <div class="col1">
                <div class="titleContact">
                    <span>Contact Us</span>
                </div>
                <div class="address">
                    <div class="row1">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span>Address</span>
                    </div>
                    <div class="row2">
                        <p>Bach Khoa Tp.HCM, Dong Hoa, Di An</p>
                    </div>
                </div>
                <div class="phone">
                    <div class="row1">
                        <div class="icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>         
                        <span>Phone</span>
                    </div>
                    <div class="row2">
                        <p>Hotline: 0848 806 872</p>
                    </div>
                </div>
                <div class="email">
                    <div class="row1">
                        <div class="icon">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <span>Email</span>
                    </div>
                    <div class="row2">
                        <p>Email: hovaten@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="titleContact">
                    <span>Tell Us Your Message</span>
                </div>
                <form action="contact/addnewcontact" method="POST" id="ismForm" class="formContact" name="formContact" onsubmit="return validateFormContact()">
                    <div class="inputform">
                        <div class="nametext">
                            <span>Your Name *</span> <span id="spanNameCon"></span>
                        </div>
                        <input type="text" name="name">
                    </div>
                    <div class="inputform">
                        <div class="nametext">
                            <span>Your Email *</span> <span id="spanEmailCon"></span>
                        </div>
                        <input type="text" name="email">
                    </div>
                    <div class="inputform">
                        <div class="nametext">
                            <span>Title *</span> <span id="spanTitleCon"></span>
                        </div>  
                        <input type="text" name="title">
                    </div>
                    <div class="inputMess">
                        <div class="nametext">
                            <span>Your Message *</span> <span id="spanMessCon"></span>
                        </div>
                        <textarea  id="messContact" cols="30" rows="8" name="message"></textarea>
                    </div>
                    <button type="submit" id="submitFormContact">Send</button>
                </form>
            </div>
            <div class="row3">
    
            </div>
        </div>
    </div> 


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast_err" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header" style="background: #f23333;">
      <strong class="me-auto" style="color:#fff;">Error</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Một số thông tin nhập bị lỗi, vui lòng kiểm tra kỹ!!
    </div>
  </div>
</div>






<script>
function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}
    

function validateFormContact() {
  let name = document.forms["formContact"]["name"].value;
  let email = document.forms["formContact"]["email"].value;
  let title = document.forms["formContact"]["title"].value;
  let message = document.forms["formContact"]["message"].value;
  let dem = 0;
  if (name == "") {
    var errName = document.getElementById("spanNameCon");
    errName.textContent = " Name not null please!";
    dem++;
  }
  else{
    var errName = document.getElementById("spanNameCon");
    errName.textContent = "";
  }
  if (email == "") {
    var errEmail = document.getElementById("spanEmailCon");
    errEmail.textContent = " Email not null please!";
    dem++;
  }
  else if(!validateEmail(email)){
    var errEmail = document.getElementById("spanEmailCon");
    errEmail.textContent = " Type email sth@sth.sth";
    dem++;
  }
  else{
    var errEmail = document.getElementById("spanEmailCon");
    errEmail.textContent = "";
  }
  if (title == "") {
    var errTitle = document.getElementById("spanTitleCon");
    errTitle.textContent = " Title not null please!";
    dem++;
  }
  else{
    var errTitle = document.getElementById("spanTitleCon");
    errTitle.textContent = "";
  }
  if (message == "") {
    var errMess = document.getElementById("spanMessCon");
    errMess.textContent = " Message not null please!";
    dem++;
  }
  else{
    var errMess = document.getElementById("spanMessCon");
    errMess.textContent = "";
  }
  if(dem != 0){
    var toastLiveExample = document.getElementById('liveToast_err');
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
      return false;

  }
  else{
    return true;
  }  
 
}



function validateEmail(email) 
    {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
</script>