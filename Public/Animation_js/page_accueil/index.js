/**
 * @author Théo Cornu
*/
function main() {
    console.log("Hello, world");

    // Select all slider controls
    const sliderControls = document.querySelectorAll(".slider-control");

    // Select smiley elements
    const smiley1 = document.getElementById("smiley1");
    const smiley2 = document.getElementById("smiley2");
    const smiley3 = document.getElementById("smiley3");

    // Select the container for generated hearts
    const smiley3Div = document.getElementById("smiley3Div");

    // Initialize local variables to manage state
    let currentImage = 0;
    let id = setInterval(nextImage, 2000);
    let isSmiley2Hovered = false;
    let heartInterval = null;
    let idSmiley = null;

    // Function to add a CSS class to a set of elements
    function addClassToElements(elements, className) {
        elements.forEach((element) => element.classList.add(className));
    }

    // Function to remove a CSS class from a set of elements
    function removeClassFromElements(elements, className) {
        elements.forEach((element) => element.classList.remove(className));
    }

    // Handle rotation of smiley1 on mouseover
    function rotateSmiley1() {
        smiley1.style.transition = "transform 0.5s";
        smiley1.style.transformOrigin = "center center";
        smiley1.style.transform = "rotate(360deg)";
    }

    // Reset rotation of smiley1 when mouse leaves
    function resetSmiley1() {
        smiley1.style.transition = "transform 0.5s";
        smiley1.style.transform = "rotate(0deg)";
    }

    // Handle scaling and trembling of smiley2 on mouseover
    function scaleAndTrembleSmiley2() {
        isSmiley2Hovered = true;
        smiley2.style.transition = "transform 0.5s, scale 0.1s";
        smiley2.style.transformOrigin = "center center";
        smiley2.style.transform = "scale(5)";
        tremble();
    }

    // Reset scaling of smiley2 when mouse leaves
    function resetSmiley2() {
        isSmiley2Hovered = false;
        smiley2.style.transition = "transform 0.5s, scale 0.2s";
        smiley2.style.transformOrigin = "center center";
        smiley2.style.transform = "scale(1)";
        cancelAnimationFrame(idSmiley);
    }

    // Create a heart inside smiley3Div
    function createHeart() {
        console.log(smiley3);
        const heart = document.createElement("div");
        heart.classList.add("heart");
        heart.style.marginLeft = `${Math.random() * 80}%`;
        smiley3Div.appendChild(heart);
        setTimeout(() => {
            heart.remove();
        }, 3000);
    }

    // Show the next image in the slider
    function nextImage() {
        currentImage = (currentImage + 1) % sliderControls.length;
        print(currentImage);
    }

    // Make smiley2 tremble
    function tremble() {
        if (isSmiley2Hovered) {
            smiley2.style.transform = `translate(${getRandomOffset()}px, ${getRandomOffset()}px) scale(10)`;
            idSmiley = requestAnimationFrame(tremble);
        }
    }

    // Get a random offset between -50 and 50
    function getRandomOffset() {
        return (Math.random() * 1000) - 500;
    }

    // Activate a specific image in the slider
    function print(number) {
        const sliderPanels = document.querySelectorAll(".slider-panel");
        const sliderControls = document.querySelectorAll(".slider-control");

        removeClassFromElements(sliderPanels, "active");
        removeClassFromElements(sliderControls, "active");

        sliderPanels[number].classList.add("active");
        sliderControls[number].classList.add("active");
    }
    

    // Handle click on a slider control
    function click(evt) {
        const button = evt.target;
        const pos = [...sliderControls].indexOf(button);
        print(pos);
        currentImage = pos;
        clearInterval(id);
        id = setInterval(nextImage, 2000);
    }

    

    // Add event handlers for actions on smiley1
    smiley1.addEventListener("mouseover", rotateSmiley1);
    smiley1.addEventListener("mouseout", resetSmiley1);

    // Add event handlers for actions on smiley2
    smiley2.addEventListener("mouseover", scaleAndTrembleSmiley2);
    smiley2.addEventListener("mouseout", resetSmiley2);

    // Add event handlers for actions on smiley3
    smiley3.addEventListener("mouseover", () => {
        heartInterval = setInterval(createHeart, 200);
    });
    smiley3.addEventListener("mouseout", () => {
        clearInterval(heartInterval);
    });

    // Add event handlers for click on slider controls
    sliderControls.forEach((control) => {
        control.addEventListener("click", click);
    });


}

// Execute the main function when the page is fully loaded
window.addEventListener("load", main);
window.addEventListener('scroll', function() {
    var scrollValue = window.scrollY;
    var parallaxValue = scrollValue / 15; 

    document.getElementById('FAQprincipal').style.backgroundPositionY = '-' + parallaxValue + 'px';
});