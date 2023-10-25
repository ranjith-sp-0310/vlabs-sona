//Getting the user inputs for the password 
var myInput = document.getElementById("PWD");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

  


  // When the user clicks on the password field, show the message box
  myInput.onfocus = function () {
    document.getElementById("message").style.display = "block";
  };

  // When the user clicks outside of the password field, hide the message box
  myInput.onblur = function () {
    document.getElementById("message").style.display = "none";
  };

  // When the user starts to type something inside the password field
  myInput.onkeyup = function () {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 5) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  };


//Not letting to proceed the submission until checking the checkbox
document.getElementById("sub").disabled = true;

function enableClick(){
    var checkBox = document.getElementById("Check_box").checked;
    if (checkBox){
        document.getElementById("sub").disabled = false;
    }
    else{
        document.getElementById("sub").disabled= true;
    }
}

//check wether the password re-entered is the same
function CheckPassword() {
    var Password = document.getElementById("PWD").value;
    var Re_Password = document.getElementById("RPWD").value;
      
    if (Password != Re_Password) {
        alert("Sorry, Password Mismatched!!! Rgistration failed!!!");
       return false;
    }
    else {
        getRegistered();
    }
}

function getRegistered() {
    alert("You are registered!!!");
    return true;
}