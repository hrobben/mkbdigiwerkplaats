import { hamburger, nav, navMenu, navOptions, navBreakPoint } from "./globalvars.js";
let hamburgerClicked = false; // whether the hamburger menu is active or not

/*
* activate/deactivate hamburger menu on click
*/
hamburger.addEventListener('click', function (event) {
    event.preventDefault();
    if (hamburgerClicked === false) {
        navMenu.classList.add("navmenu--visible");
        navMenu.classList.remove("navmenu--invisible");
        hamburgerClicked = true;

        /*
        * Make sure the menu turns opaque to prevent overlapping text
        */
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
    }
    else {
        navMenu.classList.add("navmenu--invisible");
        navMenu.classList.remove("navmenu--visible");
        hamburgerClicked = false;
    }
});

/*
* activate/deactivate hamburger menu on window resize
*/
window.addEventListener('resize', function (event) {
    event.preventDefault();
    if (window.innerWidth >= navBreakPoint) {
        navMenu.classList.add("navmenu--visible");
        navMenu.classList.remove("navmenu--invisible");
    }
    else {
        navMenu.classList.add("navmenu--invisible");
        navMenu.classList.remove("navmenu--visible");
        hamburgerClicked = false;
    }
});

/*
* determine if the navigation menu should be shown on load
*/
window.addEventListener('load', function (event) {
    event.preventDefault();
    if (window.innerWidth >= navBreakPoint) {
        navMenu.classList.add("navmenu--visible");
        navMenu.classList.remove("navmenu--invisible");
    }
    else {
        navMenu.classList.add("navmenu--invisible");
        navMenu.classList.remove("navmenu--visible");
        hamburgerClicked = false;
    }
});

/*
* hide the nav menu on scroll
*/
window.addEventListener('scroll', function (event) {
    if (window.innerWidth < navBreakPoint) {
        navMenu.classList.add("navmenu--invisible");
        navMenu.classList.remove("navmenu--visible");
        hamburgerClicked = false;
    }
});