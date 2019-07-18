function supprimerPanier(id_produit){
    let url = `supprimerPanier.php?id_produit=${id_produit}`;
    fetch(url).then(response => {
        if (response.ok)
            location.reload();
    })
    .catch(error => console.error(error));
}




