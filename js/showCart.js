/* Function the cart */
(function(){
    window.addEventListener("load", function(){
        var new_cart = JSON.parse(localStorage.getItem("savedCart"));
        if (new_cart == null) 
        {
            document.getElementById("cart-circle").innerHTML = 0;
        } 
        else {
            document.getElementById("cart-circle").innerHTML = new_cart.length;
        }

    });
})();