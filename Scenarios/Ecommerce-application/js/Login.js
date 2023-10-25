function enablebutton()
{
    if(document.getElementById("email").value.length > 0)
    {
        document.getElementById("login").disabled = false;
    }
    else 
    {
        document.getElementById("login").disabled = true;
    }
}


// function enablebutton1()
// {
//     if(document.getElementById("resetemail").value.length > 0)
//     {
//         document.getElementById("resetbtn").disabled = true;
//     }
//     else
//     {
//         document.getElementById("resetbtn").disabled = false;
//     }
// }


