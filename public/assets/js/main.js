
function search() {
    //Если элемент с id-шником element_id существует
    if (document.querySelector('.header__search-form') ) {
        //Записываем ссылку на элемент в переменную obj
        var obj = document.querySelector('.header__search-form');
        var icon = document.querySelector('.header__search-icon');

        if (obj.style.display != "block") {
            obj.style.display = "block"; //Показываем элемент
            icon.style.display = "none";
        } else {
            obj.style.display = "none";
            icon.style.display = "block";
        } //Скрываем элемент
    }
}
