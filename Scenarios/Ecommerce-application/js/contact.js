var navlinks = document.getElementById("nav_links");

function showMenu()
{
    navlinks.style.right = "0";

}

function hideMenu()
{
    navlinks.style.right = "-200px";
    
}

var p1counter = 1;
setInterval(function (){
  document.getElementById("radio" + p1counter).checked = true;
  p1counter++;
  if (p1counter > 5) {
    p1counter = 1;
  }
}, 6000);
