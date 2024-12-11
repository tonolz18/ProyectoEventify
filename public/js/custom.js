document.addEventListener("DOMContentLoaded", () => {
    const nav = document.querySelector(".navbar");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            nav.classList.add("shadow-sm");
        } else {
            nav.classList.remove("shadow-sm");
        }
    });
});
