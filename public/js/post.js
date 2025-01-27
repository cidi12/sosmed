function hoverFunction() {
    var popup = document.getElementById("myPopup");
    popup.style.visibility = 'visible';
}
const hoverElement = document.getElementById('beranda');
hoverElement.addEventListener('mouseleave', hidePopupOutside);
function hidePopupOutside() {
    var popup = document.getElementById("myPopup");
    popup.style.visibility = 'hidden';
}

function hoverFunction2() {
    var popup = document.getElementById("myPopup2");
    popup.style.visibility = 'visible';
}
const hoverElement2 = document.getElementById('komunitas');
hoverElement2.addEventListener('mouseleave', hidePopupOutside2);
function hidePopupOutside2() {
    var popup = document.getElementById("myPopup2");
    popup.style.visibility = 'hidden';
}

function hoverFunction3() {
    var popup = document.getElementById("myPopup3");
    popup.style.visibility = 'visible';
}
const hoverElement3 = document.getElementById('marketplace');
hoverElement3.addEventListener('mouseleave', hidePopupOutside3);
function hidePopupOutside3() {
    var popup = document.getElementById("myPopup3");
    popup.style.visibility = 'hidden';
}

function hoverFunction4() {
    var popup = document.getElementById("myPopup4");
    popup.style.visibility = 'visible';
}
const hoverElement4 = document.getElementById('pesan');
hoverElement4.addEventListener('mouseleave', hidePopupOutside4);
function hidePopupOutside4() {
    var popup = document.getElementById("myPopup4");
    popup.style.visibility = 'hidden';
}

function hoverFunction5() {
    var popup = document.getElementById("myPopup5");
    popup.style.visibility = 'visible';
}
const hoverElement5 = document.getElementById('notifikasi');
hoverElement5.addEventListener('mouseleave', hidePopupOutside5);
function hidePopupOutside5() {
    var popup = document.getElementById("myPopup5");
    popup.style.visibility = 'hidden';
}

// hamburger menu 
const menuToggle = document.getElementById("mobile-menu");
const menuToggle2 = document.getElementById("mobile-menu-close");

const menuToggleWeb = document.getElementById("web-menu");
const menuToggleWeb2 = document.getElementById("web-menu-close");
//   Toggle navbar when menuToggle is clicked
menuToggle.addEventListener("click", function () {
    // navbar.classList.toggle('active');
    var sidebar = document.getElementById("hamburger-items");
    // sidebar.classList.toggle("show");
    sidebar.style.display = 'flex'
    menuToggle.style.display = 'none'
    menuToggle2.style.display = 'block'
});

menuToggleWeb.addEventListener("click", function () {
    // navbar.classList.toggle('active');
    var sidebar = document.getElementById("hamburger-items");
    // sidebar.classList.toggle("show");
    sidebar.style.display = 'flex'
    menuToggleWeb.style.display = 'none'
    menuToggleWeb2.style.display = 'block'
});

//   Toggle navbar when menuToggle is clicked
menuToggle2.addEventListener("click", function () {
    // navbar.classList.toggle('active');
    var sidebar2 = document.getElementById("hamburger-items");
    // sidebar.classList.toggle("show");
    sidebar2.style.display = 'none'
     menuToggle.style.display = 'block'
    menuToggle2.style.display = 'none'

});
menuToggleWeb2.addEventListener("click", function () {
    // navbar.classList.toggle('active');
    var sidebar2 = document.getElementById("hamburger-items");
    // sidebar.classList.toggle("show");
    sidebar2.style.display = 'none'
     menuToggleWeb.style.display = 'block'
    menuToggleWeb2.style.display = 'none'

});

const lowernav = document.querySelector("nav");
const upperLeftContainer = document.querySelector(".upper-left-container");
const upperRightContainer = document.querySelector(".upper-right-container");
let prev = window.scrollY;
window.onscroll = function () {
    let curent = window.scrollY;
    if (prev > curent) {
        document.querySelector(".post-status-container").style.top = "75px";
        lowernav.style.borderStyle = "none";
        lowernav.style.boxShadow ='none'
        upperLeftContainer.style.top = "145px";
        upperRightContainer.style.top = "145px";
    } else {
        document.querySelector(".post-status-container").style.top = "-35px";
     
        lowernav.style.borderBottom = "2px solid #d4a373";
        lowernav.style.borderTop = "none"
        lowernav.style.borderLeft= "none"
        lowernav.style.borderRight= "none"
        lowernav.style.boxShadow = " rgba(99, 99, 99, 0.3) 0px 8px 8px -4px"
        upperLeftContainer.style.top = "75px";
        upperRightContainer.style.top = "75px";
    }
    prev = curent;
};

const textarea = document.querySelectorAll('.txtarea');
document.body.addEventListener('htmx:afterRequest', (event) => {
    if (event.detail.successful) { // Check if the request was successful
        for (let i = 0; i < textarea.length; i++) {
            textarea[i].value = "";
            textarea[i].style.height = 'auto';
          }
         // Clear the textarea
       
    }
});
const txarea = document.querySelectorAll('#post-input');
for (let i = 0; i < txarea.length; i++) {
    txarea[i].addEventListener('input', () => {
        txarea[i].style.height = 'auto'; // Reset height to calculate new size
        txarea[i].style.height = `${txarea[i].scrollHeight}px`; // Adjust height to scrollHeight
    });
  }
    