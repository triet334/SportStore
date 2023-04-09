admin_online = document.querySelector(".admin_online");
total_order = document.querySelector(".total_order");
total_sale = document.querySelector(".total_sale");
recent_sale = document.querySelector(".recent_sale");
customer = document.querySelector(".customer_count");
top_sale = document.querySelector(".top-sales-details");
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "staff_box_admin_online.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                admin_online.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "staff_box_total_order.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                total_order.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "staff_box_total_sale.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                total_sale.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "staff_box_recent_sale.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                recent_sale.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "staff_box_customer.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                customer.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "staff_box_top_sale.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                top_sale.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);
