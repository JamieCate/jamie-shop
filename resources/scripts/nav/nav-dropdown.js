document.addEventListener('DOMContentLoaded', function () {
    const shopBtn = document.querySelector(".shop-btn");
    const dropdown = document.querySelector(".shop-dropdown-menu");

    if (!shopBtn || !dropdown) return;

    shopBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        dropdown.classList.toggle("active");
    });

    document.addEventListener("click", function (e) {
        if (!shopBtn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove("active");
        }
    });
});
