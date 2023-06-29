const theme = document.getElementById("theme");


function CheckCurrentTheme() {
    if (getCookieValue("themevalue") == null) {
        setCookie("themevalue", 0);
    }

    if (getCookieValue("themevalue") == 0) {
        theme.setAttribute("src", "/images/light-off.png");
    }
    else {
        theme.setAttribute("src", "/images/light-on.png");
    }
}
CheckCurrentTheme();

function WarnUser() {
    const button = document.getElementById('Warn');
    if (confirm("Are you sure you want to delete this code?")) { // Make prompt to confirm deletion of every single file
        button.setAttribute('name', 'deletecode'); // Change the name of the form to match the PHP code
        return true; // Yes delete all
    }
    else {
        return false; // No cancel
    }
}

function setCookie(cookieName, cookieValue) {
    var expirationDate = new Date();
    expirationDate.setFullYear(expirationDate.getFullYear() + 10);

    var cookie = encodeURIComponent(cookieName) + '=' + encodeURIComponent(cookieValue);
    cookie += '; expires=' + expirationDate.toUTCString();
    cookie += '; max-age=' + (10 * 365 * 24 * 60 * 60);
    cookie += '; path=/';
    cookie += '; SameSite=None';
    cookie += '; Secure';

    document.cookie = cookie;
}

function getCookieValue(cookieName) {
    var cookies = document.cookie.split(';');

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();

        if (cookie.indexOf(cookieName + '=') === 0) {
            return decodeURIComponent(cookie.substring(cookieName.length + 1));
        }
    }

    return null;
}

function ChangeTheme() {

    if (getCookieValue("themevalue") == 0) {
        setCookie("themevalue", 1);
    }
    else {
        setCookie("themevalue", 0);
    }
    CheckCurrentTheme();

}