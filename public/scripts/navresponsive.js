import { Nav } from "./Nav.js";

const navigation = new Nav
/*
* activate/deactivate hamburger menu on click
*/
hamburger.addEventListener('click', function (event) {
    event.preventDefault();
    if (navigation.hamburgerClicked === false) {
        navigation.responsive("visible")
        navigation.hamburgerClicked = true

        /* Make sure the menu turns opaque to prevent overlapping text */
        navigation.recolour("scrolled")
    }
    else {
        navigation.responsive("hidden")
        navigation.hamburgerClicked = false
    }
});

/*
* activate/deactivate hamburger menu on window resize
*/
window.addEventListener('resize', function (event) {
    event.preventDefault();
    if (window.innerWidth >= navigation.navBreakPoint) {
        navigation.responsive("visible")
    }
    else {
        navigation.responsive("hidden")
        navigation.hamburgerClicked = false
    }
});

/*
* determine if the navigation menu should be shown on load
*/
window.addEventListener('load', function (event) {
    event.preventDefault();
    if (window.innerWidth >= navigation.navBreakPoint) {
        navigation.responsive("visible")
    }
    else {
        navigation.responsive("hidden")
        navigation.hamburgerClicked = false
    }
});

/*
* hide the nav menu on scroll
*/
window.addEventListener('scroll', function (event) {
    if (window.innerWidth < navigation.navBreakPoint) {
        navigation.responsive("hidden")
        navigation.hamburgerClicked = false
    }
});