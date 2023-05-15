let listElement = document.querySelectorAll('.link');
listElement.forEach((e) => {
    e.addEventListener("click", function () {
        // kiểm tra class active được thêm vào có tồn tại hay không
        if (e.classList.contains("active")) { // nếu có thì
            e.classList.remove("active");
        } else { // nếu không thì
            listElement.forEach((list) => {
                list.classList.remove("active");
            });
            e.classList.toggle("active"); 
        }
    });
});
