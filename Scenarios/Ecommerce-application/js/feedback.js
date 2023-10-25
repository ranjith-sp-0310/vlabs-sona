function submit_form() {
    var fName = document.getElementById("firstName").value;
    var lName = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
  
    //Displaying user input to console

    console.log(fName);
    console.log(lName);
    console.log(email);
    console.log(message);
    return true;
    
  }