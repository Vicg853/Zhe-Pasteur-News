/*Open and close menu nav*/
function openNav() 
{
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() 
{
    document.getElementById("mySidenav").style.width = "0";
}

/*Open and close Menu articles*/
function openInternationalMenu()
{
    document.getElementById("InternationalMenu").style.height = "100%";
    document.getElementById("mySidenav").style.width = "0";
}
function openFranceMenu()
{
    document.getElementById("FranceMenu").style.height = "100%";
    document.getElementById("mySidenav").style.width = "0";
}
function openBresilMenu()
{
    document.getElementById("BresilMenu").style.height = "100%";
    document.getElementById("mySidenav").style.width = "0";
}
function openTechnologieMenu()
{
    document.getElementById("TechnologieMenu").style.height = "100%";
    document.getElementById("mySidenav").style.width = "0";
}
function openLyceePasteurMenu()
{
    document.getElementById("LyceePasteurMenu").style.height = "100%"; 
    document.getElementById("mySidenav").style.width = "0";
}
function CloseMenu()
{
    document.getElementById("InternationalMenu").style.height = "0%";
    document.getElementById("FranceMenu").style.height = "0%";
    document.getElementById("BresilMenu").style.height = "0%";
    document.getElementById("TechnologieMenu").style.height = "0%";
    document.getElementById("LyceePasteurMenu").style.height = "0%";
}