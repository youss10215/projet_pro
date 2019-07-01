function ajouter(id_categorie) {
	location = `editer.php?id_categorie=${id_categorie}`;
}

function modifier(id_produit) {
    console.log(id_produit);
	location = `editer.php?id_produit=${id_produit}`;
}

function supprimer(id_produit) {
    if (confirm("Vraiment supprimer ?")) {
    let url = `supprimer.php?id_produit=${id_produit}`;
    fetch(url).then(response => {
        if (response.ok)
            location.reload();
    })
    .catch(error => console.error(error));
}
    location = `index.php`;
}