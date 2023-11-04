console.log("testons les bonne ");
const parentElement = document.getElementById("contactes");

for (let i = 1; i <= 14; i++) {
  const Div = document.createElement('div');
  const Paragraph = document.createElement('p');
  const images = document.createElement('img');

  images.setAttribute('src','../Pshare/image/man.png');
  Paragraph.textContent = `Ibrahim ${i}`;
  Div.appendChild(images);
  Div.appendChild(Paragraph);
  parentElement.appendChild(Div);
  Div.addEventListener('click', function() {
    console.log(`Titre du paragraphe cliqué : ${Paragraph.textContent}`);
    const Profile = document.getElementById("chatp");
    const image = Profile.querySelector("img"); 
    image.setAttribute('src', images.getAttribute('src')); 
  
    const content = Profile.querySelector('p'); 
    content.textContent = Paragraph.textContent;

  });
}