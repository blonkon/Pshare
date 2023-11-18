fetch("listeproject.php?action=liste")
.then(response => response.json())
.then(data => {
    console.log(data);
    if (data["nothing"]!=true) {

    document.getElementById('add').addEventListener('click', function () {
        var detailsContainer = document.getElementById("details");
        while (detailsContainer.firstChild) {
            detailsContainer.removeChild(parentElement.firstChild);
       }
        creerFormulaire();
    });

        var parentElement = document.getElementById("details");
         while (parentElement.firstChild) {
             parentElement.removeChild(parentElement.firstChild);
        }
        parentElement1 = document.getElementById("ul");
        data.forEach(element => {
            const Div = document.createElement('li');
            Div.setAttribute('class','liste1');
            Div.textContent = element.nom_pt;
            parentElement1.appendChild(Div); 
            Div.addEventListener('click', function() {
                console.log(element);
                
    // Création du conteneur principal
    var detailsContainer = document.getElementById("details");
    while (detailsContainer.firstChild) {
        detailsContainer.removeChild(parentElement.firstChild);
   }
    // Création des éléments à ajouter
    var nomHeading = createHeading('Nom');
    var nomContent = createParagraph(element.nom_pt);

    var descriptionHeading = createHeading('Description');
    var descriptionContent = createParagraph(element.description);

    var statusHeading = createHeading('Status');
    var statusContent = createParagraph(element.statut);

    var closeButton = createButton('Fermer le projet', '#06708e');
    var chargeButton = createButton('Cahier de charge', '#06708e');

    var deleteText = createParagraph('Supprimer cet projet', 'red');
    //  var br = document.createElement('br');
    // detailsContainer.appendChild(br);
    // Ajout des éléments au conteneur principal
    detailsContainer.appendChild(nomHeading);
    detailsContainer.appendChild(nomContent);

    detailsContainer.appendChild(descriptionHeading);
    detailsContainer.appendChild(descriptionContent);

    detailsContainer.appendChild(statusHeading);
    detailsContainer.appendChild(statusContent);

    detailsContainer.appendChild(createCenteredDiv(closeButton));
    detailsContainer.appendChild(createCenteredDiv(chargeButton));

    detailsContainer.appendChild(deleteText);
                console.log(detailsContainer)
            })
        });
        
    }
}).catch(error => {
    console.error('Une erreur s\'est produite :', error);
  });


    // Fonctions utilitaires pour créer des éléments
    function createHeading(text) {
        var heading = document.createElement('P');
        heading.setAttribute('class',"titre");
        heading.textContent = text;
        return heading;
    }

    function createParagraph(text, color) {
        var paragraph = document.createElement('p');
        paragraph.innerHTML = text;
        if (color) {
            paragraph.style.color = color;
        }
        paragraph.style.paddingLeft = "20px";
        paragraph.style.paddingRight = "20px";
        paragraph.style.overflowWrap = "anywhere";
        return paragraph;
    }

    function createButton(text, backgroundColor) {
        var button = document.createElement('div');
        button.style.display = 'flex';
        button.style.width = 'auto';
        button.style.borderRadius = '20px';
        button.style.height = '40px';
        button.style.justifyContent = 'center';
        button.style.alignItems = 'center';
        button.style.background = backgroundColor || '#06708e';
        button.innerHTML = '<p style="color: #fff;">' + text + '</p>';
        button.style.margin = "10px";
        return button;
    }

    function createCenteredDiv(content) {
        var centeredDiv = document.createElement('div');
        centeredDiv.style.display = 'flex';
        centeredDiv.style.justifyContent = 'center';
        centeredDiv.appendChild(content);
        return centeredDiv;
    }

    // Fonction pour créer le formulaire
    function creerFormulaire() {
        // Création du formulaire
        var formulaire = document.createElement('form');
        formulaire.action = ''; // Ajoutez l'action appropriée
        formulaire.method = 'post';
        formulaire.id = 'formp';
        formulaire.enctype = 'multipart/form-data';

        // Ajout des éléments du formulaire
        formulaire.innerHTML = `
            <p><br></p>
            <input type="text" name="nom" class="input" placeholder="Entrer le nom du projet" required><br><br>
            <label><h5>Le statut du projet</h5></label><br>
            <input type="radio" name="statut" value="actif" required>Actif
            <input type="radio" name="statut" value="clos" required>Clos <br><br>
            <textarea name="desc" cols="40" rows="10" placeholder="Un résumé de votre projet" required></textarea><br>
            <label for="selectBox">Langages de base :</label>
            <select id="selectBox" name="selectedItems" multiple style="width:100%"></select>
           <h5>Ajout le pdf du cahier de charge:</h5></label> <br>
            <input type="file" class="input" name="cahier"><br>
            <center><button type="submit" name="send1" class="button">Ajouter</button></center>
            <p><br></p>
        `;

        // Ajout du formulaire à l'endroit spécifié
        document.getElementById('details').appendChild(formulaire);

        fetch("listeproject.php?action=comp")
        .then(response => response.json())
        .then(data => {
            console.log(data);
            var optionsArray = data;
            var selectBox = document.getElementById("selectBox");
                
            // Ajouter chaque option à la boîte de sélection
            optionsArray.forEach(function(option) {
                var optionElement = document.createElement("option");
                optionElement.value = option.id_comp;
                optionElement.text = option.nom_comp;
                selectBox.add(optionElement);
            });
        }).catch(error => {
            console.error('Une erreur s\'est produite :', error);
          });
       
    }
    