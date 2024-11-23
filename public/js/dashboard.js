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

// auto hide 2nd nav when scrolled
const lowernav = document.querySelector('nav')
const upperLeftContainer = document.querySelector('.upper-left-container')
const upperRightContainer = document.querySelector('.upper-right-container')
let prev = window.scrollY;
window.onscroll = function (){
    let curent = window.scrollY
    if (prev>curent){
        document.querySelector('.post-status-container').style.top ="75px"
        lowernav.style.boxShadow ="none"
        upperLeftContainer.style.top = '155px'
         upperRightContainer.style.top = '155px'
    } else {
          document.querySelector('.post-status-container').style.top ="-35px"
        lowernav.style.boxShadow ="0px 3px 6px -4px grey"
        upperLeftContainer.style.top = "85px"
        upperRightContainer.style.top = "85px"
    }
    prev = curent
}

