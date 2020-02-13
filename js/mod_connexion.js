function allerSurAuth(e) {
    document.location.href="connect";
}

function deco(e) {
    document.location.href="logout";
}

function creerCompte(e){
    document.location.href="createcompte";
}
export function init(){
    $('#connexion').click(allerSurAuth);
    $('#deconnexion').click(deco);
    $('#creerCompte').click(creerCompte);
}