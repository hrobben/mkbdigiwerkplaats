import { Nav } from "./Nav.js";

const navigation = new Nav
/*
* change navigation colour on scroll
*/
window.addEventListener('scroll', function (event) {
    event.preventDefault();

    if (window.scrollY >= 5) {
        navigation.recolour("scrolled")
    } else {
        navigation.recolour("nonscrolled")
    }
});