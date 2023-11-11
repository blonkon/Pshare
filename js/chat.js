
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
    images.setAttribute('src','../Pshare/profil/'+element.img);
    Paragraph.textContent = `${element.nom_complet}`;
    Paragraph.dataset.id = element.num_users;
    Paragraph.dataset.image = element.img;
    Div.appendChild(images);
    Div.appendChild(Paragraph);
    parentElement.appendChild(Div);
    Div.addEventListener('click', function() {
    
      const Profile = document.getElementById("chatp");
      const image = Profile.querySelector("img"); 
      image.setAttribute('src', images.getAttribute('src')); 
    
      const content = Profile.querySelector('p'); 
      content.textContent = Paragraph.textContent;
      getmessageforid(Paragraph.dataset.id,Paragraph.dataset.image);
      
  
      const previousIntervalID = localStorage.getItem('myIntervalID');

      // Effacez l'intervalle précédent avant de planifier un nouveau
      if (previousIntervalID) {
        clearInterval(parseInt(previousIntervalID, 10));
      }

      // Planifiez un nouveau intervalle avec la fonction souhaitée (ex : getmessageforid)
      const newIntervalID = setInterval(function() {
        console.log("juste un avec " + Paragraph.dataset.id);
        addnewmessage(Paragraph.dataset.id,Paragraph.dataset.image);
      }, 1000);

      // Stockez le nouvel ID de l'intervalle dans le localStorage
      localStorage.setItem('myIntervalID', newIntervalID.toString());
          
        });


});

})
.catch(error => {
  console.error('Une erreur s\'est produite :', error);
});

function getmessageforid(id,img) {
  fetch("messageforuserid.php?action=messagebox&user_id=" + id)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const parentElement = document.getElementById("content");
                    while (parentElement.firstChild) {
                      parentElement.removeChild(parentElement.firstChild);
                  }
                  
                  fetch("messageforuserid.php?action=getmyid")
                  .then(response => response.json())
                  .then(dataa => {
                    monid = dataa;
                    // console.log("ici l'id du gars connecte "+monid);
                    data.forEach(element => {
                      const Div = document.createElement('div');
                      const Div2 = document.createElement('div');
                      const Paragraph = document.createElement('p');
                      const images = document.createElement('img');
                      const span = document.createElement('span');
                      span.textContent=formatDateWithTime(element.date);
                     if (element.sender==monid) {
                      // console.log("ici l'id du gars connecte "+monid);
                      images.setAttribute('src','../Pshare/image/moi.png');
                      }else{
                       images.setAttribute('src','../Pshare/profil/'+img);
                       Paragraph.style.backgroundColor = "#06708e";
                       Paragraph.style.color = "#FFF";
                       Div.style.flexDirection = "row-reverse";
                       Paragraph.style.marginLeft = "43%";
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
                      Div.appendChild(input1);
                      Div.appendChild(input3);
                      Div.appendChild(input2);
                      input2.addEventListener('click', function() {
                        sending(id,input1.value,img)
                        input1.value="";

                      });
                      parentElement.appendChild(Div);
                  });
                 
                })
                .catch(error => {
                    console.log(error);
                });
  
}
function formatDateWithTime(value) {
  const aujourdHui = new Date();
  const hier = new Date(aujourdHui);
  hier.setDate(aujourdHui.getDate() - 1);

  const dateValue = new Date(value);

  if (dateValue.toDateString() === aujourdHui.toDateString()) {
    // Ajoutez l'heure pour aujourd'hui
    const options = { hour: 'numeric', minute: 'numeric' };
    return "Aujourd'hui " + dateValue.toLocaleTimeString(undefined, options);
  } else if (dateValue.toDateString() === hier.toDateString()) {
    // Ajoutez l'heure pour hier
    const options = { hour: 'numeric', minute: 'numeric' };
    return "Hier " + dateValue.toLocaleTimeString(undefined, options);
  } else {
    // Ajoutez l'heure pour les autres jours
    const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: 'numeric', minute: 'numeric' };
    return dateValue.toLocaleDateString(undefined, options);
  }
}

function sending(id,content,img) {  
  
  const data = {
    id: id,
    content: content
  };
 
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json' 
    },
    body: JSON.stringify(data)
  };
  
  
  // Utilisation de Fetch pour envoyer la requête
  fetch("sendmessage.php", options)
    .then(response => {
      if (!response.ok) {
        throw new Error('La requête a échoué');
      }
      return response.json(); 
    })
    .then(data => {
      console.log('Réponse reçue avec succès :', data);
      const Div = document.createElement('div');
      const Div2 = document.createElement('div');
      const Paragraph = document.createElement('p');
      const images = document.createElement('img');
      const span = document.createElement('span');
      span.textContent=formatDateWithTime(new Date());
      images.setAttribute('src','../Pshare/image/moi.png');
      Paragraph.textContent = `${content}`;
      Div.setAttribute('class','messagebox');
      // Paragraph.dataset.id = element.num_users;
      Div.appendChild(images);
      Div2.appendChild(Paragraph);
      Div2.appendChild(span);
      Div.appendChild(Div2);
      // parentElement.appendChild(Div);
      const parentElement1 = document.getElementById("content");
      parentElement1.prepend(Div);
     
    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors de la requête :', error);
    });
  
}
function addnewmessage(id,img) {

  fetch("messageforuserid.php?action=newmessage&user_id=" + id)
                .then(response => response.json())
                .then(data => {
                    // console.log(data);
                  //   const parentElement = document.getElementById("content");
                  //   while (parentElement.firstChild) {
                  //     parentElement.removeChild(parentElement.firstChild);
                  // }
                  if (data) {
                    fetch("messageforuserid.php?action=getmyid")
                  .then(response => response.json())
                  .then(dataa => {
                    monid = dataa;
                    if (data["nothing"]!=true) {
                      data.forEach(element=>{

                        //je supprimer l'element du newmessage
                        console.log("ici l'id du truc qui doit etre"+element.num_mes);
                        fetch("messageforuserid.php?action=delete&del=" + element.num_mes)
                        .then(response => {
                        const Div = document.createElement('div');
                        const Div2 = document.createElement('div');
                        const Paragraph = document.createElement('p');
                        const images = document.createElement('img');
                        const span = document.createElement('span');
                        span.textContent=formatDateWithTime(element.date);
                      if (element.sender==monid) {
                        images.setAttribute('src','../Pshare/image/moi.png');
                        }else{
                        images.setAttribute('src','../Pshare/profil/'+img);
                        Paragraph.style.backgroundColor = "#06708e";
                        Paragraph.style.color = "#FFF";
                        Div.style.flexDirection = "row-reverse";
                        Paragraph.style.marginLeft = "43%";
                        }
                        Paragraph.textContent = `${element.contenu}`;
                        Div.setAttribute('class','messagebox');
                        // Paragraph.dataset.id = element.num_users;
                        Div.appendChild(images);
                        Div2.appendChild(Paragraph);
                        Div2.appendChild(span);
                        Div.appendChild(Div2);
                        // parentElement.appendChild(Div);
                        const parentElement1 = document.getElementById("content");
                        parentElement1.prepend(Div);
                      })
                      })
                    }
                   
                  
})
                  }
                  
})
}



