document.addEventListener("DOMContentLoaded", function() {

    let orderbySelect = document.getElementById('orderby');
    
    if (!orderbySelect) {
        console.error("Sorting dropdown not found!");
        return;
    }

    orderbySelect.addEventListener('change', function() {
        let orderby = this.value;


        let xhr = new XMLHttpRequest();
        xhr.open("POST", ajax_object.ajax_url, true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("product-grid").innerHTML = xhr.responseText;
            }
        };

        xhr.send("action=sort_products&orderby=" + orderby);
    });
});
