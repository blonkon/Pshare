
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
  console.log(element.num_users);
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
                    const parentElement = document.getElementById("content");
                    while (parentElement.firstChild) {
                      parentElement.removeChild(parentElement.firstChild);
                  }
                    data.forEach(element => {
                      const Div = document.createElement('div');
                      const Div2 = document.createElement('div');
                      const Paragraph = document.createElement('p');
                      const images = document.createElement('img');
                      const span = document.createElement('span');
                      span.textContent=formatDate(element.date);
                      
                      // apres changer le 1 avec l'id de l'element connecte 
                     if (element.sender==1) {
                     images.setAttribute('src','../Pshare/image/moi.png');
                     }else{
                      images.setAttribute('src','../Pshare/image/man.png');
                      Div.style.flexDirection = "row-reverse";
                     }
                      Paragraph.textContent = `${element.contenu}`;
                      Div.setAttribute('class','messagebox');
                      // Paragraph.dataset.id = element.num_users;
                      Div.appendChild(images);
                      Div2.appendChild(Paragraph);
                      Div2.appendChild(span);
                      Div.appendChild(Div2);
                      parentElement.appendChild(Div);
                    });
                    const Div = document.createElement('div');
                    const form = document.createElement('form');
                    const input1 = document.createElement('input');
                    const input2 = document.createElement('input');
                    const input3 = document.createElement('input');
                    Div.setAttribute('class','fixed-element');
                    input1.setAttribute('type','text');
                    input1.setAttribute('name','content');
                    input1.setAttribute('placeholder',"Votre message");
                    input2.setAttribute('type','submit');
                    input2.setAttribute('value','Envoyer');
                    input3.setAttribute('name','id');
                    input3.setAttribute('value',`${id}`);
                    input3.style.display='none';
                    form.setAttribute('method','POST');
                    form.setAttribute('action','sendmessage.php');
                    Div.appendChild(input1);
                    Div.appendChild(input3);
                    Div.appendChild(input2);
                    
                    form.appendChild(Div);
                    parentElement.appendChild(form);
                })
                .catch(error => {
                    console.log(error);
                });
  
}
function formatDate(value) {
  const aujourdHui = new Date();
  const hier = new Date(aujourdHui);
  hier.setDate(aujourdHui.getDate() - 1);

  const dateValue = new Date(value);

  if (dateValue.toDateString() === aujourdHui.toDateString()) {
    return "Aujourd'hui";
  } else if (dateValue.toDateString() === hier.toDateString()) {
    return "Hier";
  } else {
    const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    return dateValue.toLocaleDateString(undefined, options);
  }
}