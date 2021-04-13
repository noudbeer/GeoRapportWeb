function openDropdown() {
    var menu = document.getElementById("menu")
    if(menu.className == "absolute inset-y-0 transform -translate-x-full transition duration-250 ease-in-out")
        menu.className = "absolute inset-y-0 w-full bg-green-500 divide-y-2 divide-black divide-solid transition duration-250 ease-in-out sm:origin-top-left sm:absolute sm:w-auto"; 
    else
        menu.className = "absolute inset-y-0 transform -translate-x-full transition duration-250 ease-in-out";
}