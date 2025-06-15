const burgerBtnElem = document.querySelector("[data-burger-btn]");
const mobileMenuElem = document.querySelector("[data-mobile-menu]");

const searchBtnElem = document.querySelector("[data-search-btn]");
const mobileSearchElem = document.querySelector("[data-mobile-search-block]");

burgerBtnElem.addEventListener("click", () => {
    // mobileMenuElem.classList.toggle("active");
    // mobileMenuElem.toggleAttribute("inert");
    // document.body.classList.toggle("disable-scrolling");
    handleActivate(mobileMenuElem);
});

searchBtnElem.addEventListener("click", () => {
    // mobileSearchElem.classList.toggle("active");
    // mobileSearchElem.toggleAttribute("inert");
    // document.body.classList.toggle("disable-scrolling");
    handleActivate(mobileSearchElem);
});

function handleActivate(elem) {
    elem.classList.toggle("active");
    elem.toggleAttribute("inert");
    document.body.classList.toggle("disable-scrolling");
}
