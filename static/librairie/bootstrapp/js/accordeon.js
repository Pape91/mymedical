var accordions = document.getElementsByClassName("accordion-header");
for (var i = 0; i < accordions.length; i++) {
    accordions[i].addEventListener("click", 
        function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;

    if (content.style.maxHeight) {
        content.style.maxHeight = null;

    } else {
            content.style.maxHeight = content.scrollHeight + "px";
    }
    // Ajouter cette condition pour désactiver les autres sections actives
    
    var activeAccordion = document.querySelector(".accordion-header.active");
    if (activeAccordion && activeAccordion !== this) {
        activeAccordion.classList.remove("active");
        activeAccordion.nextElementSibling.style.maxHeight = null;
    }
});
}