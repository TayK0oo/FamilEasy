
/**
 * @author Théo Cornu
 * @author Théo Deguin
*/
function Sidebar() {
    // Get references to the menu button, menu, and the menu overlay
    const menuButton = document.getElementById("bars");
    const menu = document.getElementById("menu");
    const menuOverlay = document.getElementById("menuF");

    // Check if the menu is open (left position is 0px)
    if (menu.style.left === "0px") {
        // If open, move the menu button to the right
        menuButton.style.left = "250px";
    } else {
        // If closed, reset the menu button position and remove box shadow
        menuButton.style.left = "0px";
        menu.style["box-shadow"] = "0px 0px 0px black";
    }

    // Toggle menu visibility when the menu button is clicked
    menuButton.addEventListener("click", function () {
        if (menu.style.left === "0px") {
            // Close the menu and overlay
            menu.style.left = "-250px";
            menuOverlay.style.left = "-800vw";
            menu.style["box-shadow"] = "0px 0px 0px black";
        } else {
            // Open the menu and overlay, add box shadow
            menu.style.left = "0px";
            menuOverlay.style.left = "0px";
            menu.style["box-shadow"] = "0px 0px 30px black";
        }
    });

    // Close the menu and overlay when clicking outside
    document.addEventListener("click", function (event) {
        if (event.target !== menuButton && event.target !== menu) {
            menu.style.left = "-250px";
            menuOverlay.style.left = "-800vw";
            menu.style["box-shadow"] = "0px 0px 0px black";
        }
    });

    // Ensure the DOM is loaded before attaching event listeners
    document.addEventListener('DOMContentLoaded', function () {
        const menuIcon = document.getElementById('bars');
        const sideMenu = document.getElementById('menu');
        const sideOverlay = document.getElementById('menuF');
    
        menuIcon.addEventListener('click', function () {
            if (sideMenu.style.left === '-250px') {
                // Open the sidebar and overlay, remove box shadow
                sideMenu.style.left = '0';
                sideOverlay.style.left = '0';
                menu.style["box-shadow"] = "0px 0px 0px black";
            } else {
                // Close the sidebar and overlay, add box shadow
                sideMenu.style.left = '-250px';
                sideOverlay.style.left = '-800vw'
                menu.style["box-shadow"] = "0px 0px 30px black";
            }
        });
    });
};

// Attach the Sidebar function to the 'load' event
window.addEventListener('load', Sidebar);
