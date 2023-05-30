
// Récupérer tous les éléments avec la classe "accordion-header"
let accordions = document.getElementsByClassName("accordion-header");

if(accordions){
    // Parcourir tous les éléments récupérés
    for (let i = 0; i < accordions.length; i++) {

        // Ajouter un écouteur d'événement "click" pour chaque élément
        accordions[i].addEventListener("click", function() {

            // Ajouter ou retirer la classe "active" pour l'élément cliqué
            this.classList.toggle("active");

            // Récupérer l'élément suivant de l'élément cliqué
            let content = this.nextElementSibling;

            // Si la hauteur maximale est définie, la retirer pour cacher le contenu
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            }
            // Sinon, définir la hauteur maximale sur la hauteur réelle du contenu pour l'afficher
            else {
                content.style.maxHeight = content.scrollHeight + "px";
            }

            // Ajouter cette condition pour désactiver les autres sections actives
            let activeAccordion = document.querySelector(".accordion-header.active");
            if (activeAccordion && activeAccordion !== this) {
                // Retirer la classe "active" pour la section active
                activeAccordion.classList.remove("active");
                // Définir la hauteur maximale sur "null" pour cacher le contenu
                activeAccordion.nextElementSibling.style.maxHeight = null;
            }
        });
    }
}
