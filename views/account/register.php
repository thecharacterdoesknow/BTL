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
                    Create Account
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="wrapper-register-form">
        <div class="title-form">
            <h3>Create Account</h3>
            <p>Please Register using account detail bellow</p>
        </div>
        <div class="register-form">
            <form action="user/register" method="POST" onsubmit=" return validateFormRegist()" name="formreg">
                <div class="form-group">
                    <input type="text" name="firstName" id="first-name" placeholder="First Name">
                    <span id="spanfnamer" class="spanreg"></span>
                </div>
                <div class="form-group">
                    <input type="text" name="lastName" id="last-name" placeholder="Last Name">
                    <span id="spanlnamer" class="spanreg"></span>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <span id="spanemailr" class="spanreg"></span>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <span id="spanpass" class="spanreg"></span>
                </div>
                <div class="form-group">
                    <input type="password" name="rePassword" id="re-password" placeholder="Re-Password">
                    <span id="spanrepass" class="spanreg"></span>
                </div>
                <div class="_row">
                    <button type="submit">
                        Register
                    </button>
                    <a href="/login">
                        <p>Have an account?</p>
                    </a>
                </div>
                <div class="form-group">
                    <a href="#">
                        <p>
                            Back to shop
                        </p>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    

function validateFormRegist() {
  let firstName = document.forms["formreg"]["firstName"].value;
  let lastName = document.forms["formreg"]["lastName"].value;
  let email = document.forms["formreg"]["email"].value;
  let password = document.forms["formreg"]["password"].value;
  let rePassword = document.forms["formreg"]["rePassword"].value;
  let dem = 0;
  if (firstName == "") {
    var errName = document.getElementById("spanfnamer");
    errName.textContent = " first name not null please!";
    dem++;
  }
  else{
    var errName = document.getElementById("spanfnamer");
    errName.textContent = "";
  }
  if (lastName == "") {
    var errlName = document.getElementById("spanlnamer");
    errlName.textContent = " last name not null please!";
    dem++;
  }
  else{
    var errlName = document.getElementById("spanlnamer");
    errlName.textContent = "";
  }
  if (email == "") {
    var errEmail = document.getElementById("spanemailr");
    errEmail.textContent = " Email not null please!";
    dem++;
  }
  else if(!validateEmail(email)){
    var errEmail = document.getElementById("spanemailr");
    errEmail.textContent = " Type email sth@sth.sth";
    dem++;
  }
  else{
    var errEmail = document.getElementById("spanemailr");
    errEmail.textContent = "";
  }
  if (password == "") {
    var errPass = document.getElementById("spanpass");
    errPass.textContent = " password not null please!";
    dem++;
  }
  else{
    var errPass = document.getElementById("spanpass");
    errPass.textContent = "";
  }
  if (rePassword == "") {
    var errrePass = document.getElementById("spanrepass");
    errrePass.textContent = " Repassword not null please!";
    dem++;
  }
  else if(password != rePassword){
    var errrePass = document.getElementById("spanrepass");
    errrePass.textContent = " Repassword not the same password";
    dem++;
  }
  else{
    var errrePass = document.getElementById("spanrepass");
    errrePass.textContent = "";
  }
  if(dem != 0){

      return false;

  }

 
    
  

    
}

function validateEmail(email) 
    {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
</script>