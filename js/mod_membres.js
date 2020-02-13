let exemple = "<div class=\"col-sm-6\"><div class=\"card\"><div class=\"card-body\"><h5 class=\"card-title\">Personne</h5><p class=\"card-text\">Information</p><a href=\"#\" class=\"btn btn-primary\">Profil</a></div></div></div>"


function lancerAffichage(e) {
    for(let i = 0;i<10;i++)
        $("#membres").append(exemple);
}

function creerBesoin(e) {
    document.location.href = "creabesoin";
}

export function init(){
    $('#membres').ready(lancerAffichage);
    $('#submit').click(creerBesoin);
}