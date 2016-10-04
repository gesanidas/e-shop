(function(){
    if (document.getElementById("clearForm")){
        document.getElementById("clearForm").addEventListener("click", function(){
            document.getElementById("clearName").value = '';
            document.getElementById("clearEmail").value = '';
            document.getElementById("clearPass").value = '';
            document.getElementById("clearTel").value = '';
            document.getElementById("clearJob").value = '';
            document.getElementById("clearCC").value = '';
        });
    }
})();