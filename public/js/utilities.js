const modal = document.querySelector('.modal-container');

function closeModal(){
    modal.style.display = "none";
}

function getProductCookie() {
    var cookies = document.cookie.split(";");
    
    for (var i = 0; i < cookies.length; i++) {
        var cookiePair = cookies[i].split("=");
                
        if ('products' == cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }   

    return null;
}

function addToCart(id, quantity = 1, remove = false) {
    let item = { ...JSON.parse(getProductCookie()) };

    if (remove)
        delete item[id];
    else
        item[id] = parseInt(quantity);
    

    value   = encodeURIComponent(JSON.stringify(item));
    cookie  = "products="+value;
    cookie += "; path=/; max-age=" + (30*24*60*60);
    document.cookie = cookie;

    location.reload();
}

document.onkeydown = function (event) {
    if (event.key == '/') {
        document.querySelector('input').focus();
        return false;
    }
};
