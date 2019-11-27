class Nav {
    constructor () {
        this.elements = {
            nav: document.getElementById('navigation'), // whole nav element
            menu: document.getElementById('navMenu'), // container for the navigation options
            logo: document.getElementById('navlogo'), // navigation logo
            options: document.querySelectorAll('.navoption:nth-child(n)'), // array of navigation options
            hamburger: document.getElementById('hamburger'), // hamburger menu icon
        }
        this.breakPoint = 1000 // width in px where the navigation changes from desktop to mobile
        this.hamburgerClicked = false // whether the hamburger menu is active or not
    }
    
    recolour (state) {
        switch (state) {
            case "nonscrolled":
            case 0:
                this.elements.nav.classList.add("navigation--nonscrolled")
                this.elements.nav.classList.remove("navigation--scrolled")

                this.elements.menu.classList.add("navmenu--nonscrolled")
                this.elements.menu.classList.remove("navmenu--scrolled")

                this.elements.hamburger.classList.add("hamburger--nonscrolled")
                this.elements.hamburger.classList.remove("hamburger--scrolled")

                this.elements.logo.src = "/images/logo.png"
                for (let i = 0; i < this.elements.options.length; ++i) {
                    this.elements.options[i].classList.add("navoption--nonscrolled")
                    this.elements.options[i].classList.remove("navoption--scrolled")
                }
                break
            case "scrolled":
            case 1:
                this.elements.nav.classList.add("navigation--scrolled")
                this.elements.nav.classList.remove("navigation--nonscrolled")

                this.elements.menu.classList.add("navmenu--scrolled")
                this.elements.menu.classList.remove("navmenu--nonscrolled")

                this.elements.hamburger.classList.add("hamburger--scrolled")
                this.elements.hamburger.classList.remove("hamburger--nonscrolled")

                this.elements.logo.src = "/images/logo-blacktext.png"
                for (let i = 0; i < this.elements.options.length; ++i) {
                    this.elements.options[i].classList.add("navoption--scrolled")
                    this.elements.options[i].classList.remove("navoption--nonscrolled")
                }
                break
            default:
                break
        }
    }

    responsive (state) {
        switch (state) {
            case "hidden":
            case "invisible":
            case 0:
                this.elements.menu.classList.add("navmenu--invisible")
                this.elements.menu.classList.remove("navmenu--visible")
                this.hamburgerClicked = false
                break
            case "visible":
            case 1:
                this.elements.menu.classList.add("navmenu--visible")
                this.elements.menu.classList.remove("navmenu--invisible")
                break
            default:
                break
        }
    }
}

export { Nav }