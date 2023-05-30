// Sélection de l'icône du burger
let burgerIcon = document.getElementById('burger');

// Sélection du menu à dérouler
    let menu = document.querySelector('nav ul');
if(burgerIcon && menu){
    // Gestion de l'événement clic sur l'icône du burger
        burgerIcon.addEventListener('click', function() {
    // Vérification de l'état du menu
        let isMenuOpen = menu.style.display === 'block';

    // Modification de la visibilité du menu en fonction de son état actuel
    if (isMenuOpen) {
        menu.style.display = 'none'; // Fermer le menu
    } else {
        menu.style.display = 'block'; // Ouvrir le menu
    }
    });
}

