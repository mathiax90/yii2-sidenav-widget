/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function toggleNav()
{

    if (document.getElementById("mySidenav").clientWidth == "0")
    {
        document.getElementById("mySidenav").style.width = "250px";
        
    } else
    {
        document.getElementById("mySidenav").style.width = "0";
        
    }
}