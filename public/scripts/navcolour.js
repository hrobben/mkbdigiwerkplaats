import { nav , navLogo, navOptions, hamburger, navMenu } from "./globalvars.js";

/*
* change navigation colour on scroll
*/
window.addEventListener('scroll', function (event) {
    event.preventDefault();

    if (window.scrollY >= 5) {
        nav.classList.add("navigation--scrolled");
        nav.classList.remove("navigation--nonscrolled");

        navMenu.classList.add("navmenu--scrolled");
        navMenu.classList.remove("navmenu--nonscrolled");

        hamburger.classList.add("hamburger--scrolled");
        hamburger.classList.remove("hamburger--nonscrolled");

        navlogo.src = "/images/logo-blacktext.png";
        for (let i = 0; i < navOptions.length; ++i) {
            navOptions[i].classList.add("navoption--scrolled");
            navOptions[i].classList.remove("navoption--nonscrolled");
        }
    } else {
        nav.classList.add("navigation--nonscrolled");
        nav.classList.remove("navigation--scrolled");

        navMenu.classList.add("navmenu--nonscrolled");
        navMenu.classList.remove("navmenu--scrolled");

        hamburger.classList.add("hamburger--nonscrolled");
        hamburger.classList.remove("hamburger--scrolled");

        navlogo.src = "/images/logo.png";
        for (let i = 0; i < navOptions.length; ++i) {
            navOptions[i].classList.add("navoption--nonscrolled");
            navOptions[i].classList.remove("navoption--scrolled");
        }
    }
});