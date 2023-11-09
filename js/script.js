var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 600,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

//   Ajout d'element
function corps() {
var newPara=document.createElement('p');
newPara.id='Nouveau';
var texte=document.createTextNode('Ceci est une palteforme qui vise a aider les jeunes a partager leurs projets');
newPara.appendChild(texte);
var cible=document.querySelector('.conteneur');
document.body.insertBefore(newPara,cible);
    
}