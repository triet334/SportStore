order_list = document.querySelector(".order_list");
let max_order_show = document.getElementById('max_order');
let search_box = document.getElementById('search_box');
var unique_id=document.getElementById('unique_id');
var admin_code=document.getElementById('admin_code');
setInterval(() => {
    
    let xhr = new XMLHttpRequest();
    xhr.open("get", "order_list_main_content.php?show=" + max_order_show.value + "&search_term=" + search_box.value + "&unique_id=" + unique_id.value + "&admin_code=" + admin_code.value, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                order_list.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);
