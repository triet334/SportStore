(function () {

    let field = document.querySelector('.items');
    let li = Array.from(field.children);
    let select = document.getElementById('select');
    let select_gender = document.getElementById('select-gender');
    let indicator = document.querySelector('.indicator').children;
    // console.log(li);
    function FilterProduct() {
        for (let i of li) {
            const name = i.querySelector('strong');
            const x = name.textContent;
            i.setAttribute("data-category", x);
        }

        let indicator = document.querySelector('.indicator').children;

        this.run = function () {
            for (let i = 0; i < indicator.length; i++) {
                indicator[i].onclick = function () {
                    for (let x = 0; x < indicator.length; x++) {
                        indicator[x].classList.remove('active');
                    }
                    this.classList.add('active');
                    const displayItems = this.getAttribute('data-filter');
                    // select.value="Default";
                    // select_gender.value="Default";
                    for (let z = 0; z < li.length; z++) {
                        li[z].style.transform = "scale(0)";
                        setTimeout(() => {
                            li[z].style.display = "none";
                        }, 500);

                        if ((li[z].getAttribute('data-category') == displayItems) || displayItems == "all") {
                            li[z].style.transform = "scale(1)";
                            setTimeout(() => {
                                li[z].style.display = "block";
                            }, 500);
                        }
                    }
                };
            }
        }
    }
    function FilterGender() {

        let ar = [];
        for (let i of li) {
            const name = i.querySelector('.gender');
            const x = name.textContent;
            i.setAttribute("data-gender", x);
            ar.push(i);

        }

        this.run = () => {
            addevent();
        }
        function addevent() {
            select_gender.onchange = sortingValueGender;
        }
        function sortingValueGender() {

            if (this.value === 'Default') {
                while (field.firstChild) { field.removeChild(field.firstChild); }
                field.append(...ar);
            }
            if (this.value === 'male') {
                let gender = this.value;
                Match(field, li, gender)
            }
            if (this.value === 'female') {
                let gender = this.value;
                Match(field, li, gender)
            }
        }
        function Match(field, li, gender) {
            const arr = [];
            for (let i = 0; i < li.length; i++) {

                if ((li[i].getAttribute('data-gender') == gender)) {
                    arr.push(li[i]);
                }

                // if ((li[i].getAttribute('data-gender') == gender) || gender == "Default") {
                //     li[i].style.transform = "scale(1)";
                //     setTimeout(() => {
                //         li[i].style.display = "block";
                //     }, 500);
                // } else {
                //     li[i].style.transform = "scale(0)";
                //     setTimeout(() => {
                //         li[i].style.display = "none";
                //     }, 500);
                // }
            }
            while (field.firstChild) { field.removeChild(field.firstChild); }
            field.append(...arr);
            // console.log(arr);
        }
    }


    function searchbyname() {
        for (let i of li) {
            const name = i.querySelector('.name');
            const x = name.textContent;
            i.setAttribute("data-name", x);
        }

        this.run = function () {
            const searchbar = document.getElementById('name2search');
            searchbar.addEventListener('keyup', (e) => {
                const searchstring = e.target.value;
                const filtered = [];

                for (let i = 0; i < li.length; i++) {
                    if (li[i].getAttribute('data-name').includes(searchstring)) {
                        filtered.push(li[i]);
                    }
                }
                // const filtered = li.filter(li => {
                //     return li.getAttribute('data-name').includes(searchstring);
                // });
                while (field.firstChild) { field.removeChild(field.firstChild); }
                field.append(...filtered);
                // console.log(field);
            });
        }
    }


    function SortProduct() {

        let ar = [];
        for (let i of li) {
            const last = i.lastElementChild;
            const x = last.textContent.trim();
            const y = Number(x.substring(0));
            i.setAttribute("data-price", y);
            ar.push(i);
        }
        this.run = () => {
            addevent();
        }
        function addevent() {
            select.onchange = sortingValue;
        }
        function sortingValue() {

            if (this.value === 'Default') {
                while (field.firstChild) { field.removeChild(field.firstChild); }
                field.append(...ar);
            }
            if (this.value === 'LowToHigh') {
                SortElem(field, li, true)
            }
            if (this.value === 'HighToLow') {
                SortElem(field, li, false)
            }
        }
        function SortElem(field, li, asc) {
            let dm, sortli;
            dm = asc ? 1 : -1;

            sortli = li.sort((a, b) => {
                const ax = parseFloat(a.getAttribute('data-price'));
                const bx = parseFloat(b.getAttribute('data-price'));

                if (ax > bx) {
                    return 1 * dm;
                } else if (ax < bx) {
                    return -1 * dm
                } else {
                    return 0;
                }
            });

            while (field.firstChild) { field.removeChild(field.firstChild); }
            field.append(...sortli);
        }
    }

    new searchbyname().run();
    new FilterProduct().run();
    new SortProduct().run();
    new FilterGender().run();

})();
// pagination


// var current_page = 1;
// var records_per_page = 4;
// let field = document.querySelector('.items');
// let li = Array.from(field.children);

// function prevPage() {
//     if (current_page > 1) {
//         current_page--;
//         changePage(current_page);
//     }
// }
// function nextPage() {
//     if (current_page < numPages()) {
//         current_page++;
//         changePage(current_page);
//     }
// }
// function changePage(page) {
//     var btn_next = document.getElementById("btn_next");
//     var btn_prev = document.getElementById("btn_prev");
//     var page_span = document.getElementById("page");

//     // Validate page
//     if (page < 1) page = 1;
//     if (page > numPages()) page = numPages();

//     // listing_table.innerHTML = "";
//     var arr = [];

//     // for (var i = (page - 1) * records_per_page; i < (page * records_per_page); i++) {
//     //     arr[i]=li[i];
//     //     field.removeChild(field.firstChild);
//     // }
//     z = 0;
//     last = Math.ceil(li.length / records_per_page);
//     if (page != last) {
//         for (var i = records_per_page * (page - 1); i < records_per_page * page; i++) {
//             arr[z] = li[i];
//             z++;

//         }
//     }else{
//         for (var i = records_per_page * (page - 1); i < li.length; i++) {
//             arr[z] = li[i];
//             z++;

//         }
//     }

//     while (field.firstChild) { field.removeChild(field.firstChild); }
//     field.append(...arr);





//     page_span.innerHTML = page;

//     if (page == 1) {
//         btn_prev.style.visibility = "hidden";
//     } else {
//         btn_prev.style.visibility = "visible";
//     }

//     if (page == numPages()) {
//         btn_next.style.visibility = "hidden";
//     } else {
//         btn_next.style.visibility = "visible";
//     }
// }
// function numPages() {
//     return Math.ceil(li.length / records_per_page);
// }

// window.onload = function () {
//     changePage(1);
// };


