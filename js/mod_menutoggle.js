function toggleMenu(e){
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
}

export function init(){
    $('#menu-toggle').click(toggleMenu);
}