function allerSurAuth(e) {
    document.location.href="connect";
    console.log("test");
}

export function init(){
    $('#connexion').click(allerSurAuth);
}