var cookie = document.cookie
var loginButton = document.getElementById("loginbutton");
 var logoutButton = document.getElementById("logoutbutton");

if(getCookieName(cookie)==="isLogged")
{
        loginButton.classList.add("hidden");
        logoutButton.classList.remove("hidden");
}else
{
    loginButton.classList.remove("hidden");
    logoutButton.classList.add("hidden");
}

function getCookieName(ck)
{
    var cookieTemp = ck;
    return cookieTemp.substring(0, cookieTemp.search('='))
}