/* Function for checkout */
(function(){
        window.addEventListener("load", displayCart);
        document.getElementById("button-clear").addEventListener("click", clear_all);
        if (document.getElementById("button-complete")) {
            document.getElementById("button-complete").addEventListener("click", foo);            
        }

        function displayCart()
        {
        new_cart = [];                      
    	new_cart = JSON.parse(localStorage.getItem("savedCart"));
	    var table = document.getElementById("myTable");   
	    var sum = 0;
        
        if (new_cart == null) {

        } 
        else
        {
            for (var i = 0; i < new_cart.length; i++) {
                sum += parseInt(new_cart[i].price);         
                var row = table.insertRow(-1);             
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                cell1.innerHTML = new_cart[i].name;        
                cell2.innerHTML = new_cart[i].price;
                cell3.innerHTML = '<a id="deletePaintJS" data-id="'+i+'" class="btn btn-xs btn-danger">Διαγραφη</a>';
            }
            
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            
            cell1.innerHTML = "<b>Σύνολο : </b>";
            cell2.innerHTML = "<b>" + sum + " Ευρώ</b>"; 
        }
        
        var x = document.querySelectorAll("#deletePaintJS");
        
        for (var i = 0; i < x.length; i++) {
            x[i].addEventListener("click", function() {
                delete_particular_item(this.dataset.id); 
            });
        }
        
        function delete_particular_item(pr) {
            delete_cart = [];                      
    	    delete_cart = JSON.parse(localStorage.getItem("savedCart"));
            if (delete_cart.length > 1) {
                delete_cart.splice(pr,1);
                localStorage.setItem("savedCart", JSON.stringify(delete_cart)); 
                location.reload();
            } else {
                localStorage.clear();
                location.reload();
            }
        }
        }

        function clear_all()                      
        {									
            localStorage.clear();
            location.reload();
        }

         function foo () 
         {

            names=[];
            for (i=0;i<new_cart.length;i++)
            {
                names.push(new_cart[i].name.trim());
                
            }
            
              $.ajax({
                url:"auto_cart.php",
                type: "GET",
                data: { var_p: names },
                success:function(result)
                {
                    alert(result);
                    localStorage.clear();
                    location.reload();
                }
         });
 }
})();





