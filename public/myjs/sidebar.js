function sideBar() {
    const open = document.getElementById("sidebar");
    open.classList.toggle("openSidebar");
    open.classList.remove("closeSidebar");
}

function closeSidebar() {
    const close = document.getElementById("sidebar");
    close.classList.toggle("closeSidebar");
    close.classList.remove("openSidebar");
}

function buttonDropSidebar() {
    const dropDown = document.getElementById("menuSidebar");
    dropDown.classList.toggle("drop-menu");
}

function dropbtn() {
    const dropbtn = document.getElementById("drop-content");
    dropbtn.classList.toggle("dropdown-content");
}