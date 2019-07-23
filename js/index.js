function categorie(id_categorie){
    location = `categorie.php?id_categorie=${id_categorie}`;
}

let n=0;
function increaseCart(){
    n += 1;
    document.getElementById('number').innerHTML= n;
}

