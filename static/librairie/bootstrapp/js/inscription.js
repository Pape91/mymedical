
function getRole() {
    // Ajouter un écouteur d'événements sur l'élément de formulaire avec l'ID "role"
    document.getElementById("role").addEventListener("change", (event) => {
      
      // Récupérer la valeur de l'élément "role"
      var role = document.getElementById("role").value;
  
      // Si la valeur de "role" est "patient", changer le texte de l'élément "libelle_role" en "numéro sécurité sociale"
      if(role=="patient") {
        document.getElementById("libelle_role").innerHTML = "numéro sécurité sociale";
      }
      
      // Sinon, changer le texte de l'élément "libelle_role" en "numéro professionnel"
      else {
        document.getElementById("libelle_role").innerHTML = "numéro professionnel";
      }
    });
  }
  
  // Appeler la fonction "getRole"
  getRole();
  