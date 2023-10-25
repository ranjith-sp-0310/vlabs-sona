// function enablebutton()
// {
//     if(document.getElementById("email").value.length > 0)
//     {
        
//     }
//     else 
//     {
//         document.getElementById("login").disabled = true;
//     }
// }
function enablebutton()
{
    var count = 0
    if(document.getElementById("email").value.length >0)
    {
        count ++;
    }
    else
    {
        count = 0;
    }

    if(document.getElementById("password").value.length > 0)
    {
        count ++;
    }
    else
    {
        count = 0;
    }  

    if(document.getElementById("respassword").value.length > 0)
    {
        count ++;
    }
    else
    {
        count = 0;
    }

    if(count = 3)
    {
        document.getElementById("login").disabled= false;
    }
    else
    {
        document.getElementById("login").disabled= true;
    }
}

//email id - email
//password id - password 
//respassword id-respassword
//login id - login

