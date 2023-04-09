var msg_noti = document.querySelector(".msg_noti");
var value_noti = document.querySelector(".value_noti");
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "msg_noti.php?admin_code=" + value_noti.value, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if(data==0){
                    msg_noti.style.display="none";
                }else{
                    msg_noti.innerHTML=data;
                }
            }
        }
    }
    xhr.send();
}, 500);