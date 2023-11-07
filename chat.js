
fetch('data.php')
.then(response => {
  if (!response.ok) {
    throw new Error('La requête a échoué.');
  }
  return response.json();
})
.then(data => {
  console.log(data);
  const parentElement = document.getElementById("contactes");
data.forEach(element => {
  const Div = document.createElement('div');
  const Paragraph = document.createElement('p');
  const images = document.createElement('img');

  images.setAttribute('src','../Pshare/image/man.png');
  Paragraph.textContent = `${element.nom_complet}`;
  Paragraph.dataset.id = element.num_users;
  Div.appendChild(images);
  Div.appendChild(Paragraph);
  parentElement.appendChild(Div);
  Div.addEventListener('click', function() {
    console.log(`id de l'element clique cliqué : ${Paragraph.dataset.id}`);
    const Profile = document.getElementById("chatp");
    const image = Profile.querySelector("img"); 
    image.setAttribute('src', images.getAttribute('src')); 
  
    const content = Profile.querySelector('p'); 
    content.textContent = Paragraph.textContent;
    getmessageforid(Paragraph.dataset.id);

  });
});

})
.catch(error => {
  console.error('Une erreur s\'est produite :', error);
});

function getmessageforid(id) {
  fetch("messageforuserid.php?action=messagebox&user_id=" + id)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const parentElement = document.getElementById("contents");
                    data.forEach(element => {
                      const Div = document.createElement('div');
                      const Paragraph = document.createElement('p');
                      const images = document.createElement('img');
                      // apres changer le 1 avec l'id de l'element connecte 
                     if (element.sender===1) {
                     images.setAttribute('src','../Pshare/image/moi.png');
                     }else{
                      images.setAttribute('src','');
                      Div.style.float = "right";
                     }
                      Paragraph.textContent = `${element.contenu}`;
                      Div.setAttribute('class','messagebox');
                      // Paragraph.dataset.id = element.num_users;
                      Div.appendChild(images);
                      Div.appendChild(Paragraph);
                      parentElement.appendChild(Div);
                    });
                })
                .catch(error => {
                    console.log("Erreur lors de l'appel de la fonction PHP : " + error);
                });
  
}