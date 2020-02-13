function allerSurAuth(e) {
    document.location.href="connect";
}

function deco(e) {
    document.location.href="logout";
}

export function init(){
    $('#connexion').click(allerSurAuth);
    $('#deconnexion').click(deco);
}