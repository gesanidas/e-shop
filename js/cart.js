/* Function for cart and buy */
(function(){
    if (document.getElementById("purchase-button")){
        document.getElementById("purchase-button").addEventListener("click", addToCart);
    }

    /* Function addToCart */
    function addToCart() {

        /* Declare the cart array and get the name and price */
        var cart = [];
        var name = document.getElementById("paint-name").innerHTML;      
        var price = document.getElementById("price").innerHTML;   
        
        if (localStorage.getItem("savedCart") === null)           
        {
            cart.push(new item(name,price));                   
        } 
        else                                                       
        {
            cart.length = 0;                                      
            temp = JSON.parse(localStorage.getItem("savedCart"));  
            Array.prototype.push.apply(cart,temp);                
            cart.push(new item(name,price));		
	}
    
    localStorage.setItem("savedCart", JSON.stringify(cart)); 
    location.href = 'addedToCart.php';
    }

    function item(name,price)                          
    {
        this.name = name;
        this.price = price;
    }
})();