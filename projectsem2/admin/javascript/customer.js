var customer = document.querySelector('.wrapper-customer');
var autocom_box = document.querySelector('.autocom-box');
var search_box = document.getElementById('search_box');
var searchbtn = document.querySelector('.searchbtn');



search_box.onkeyup = () => {
    setInterval(() => {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "autocom.php?id=" + search_box.value, true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    autocom_box.innerHTML = data;
                }
            }
        }
        xhr.send();
    }, 500);
}
