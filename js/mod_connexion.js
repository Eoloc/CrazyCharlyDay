function allerSurAuth(e) {
    document.location.href="connect";
}

export function init(){
    $('#connexion').click(allerSurAuth);
}