import './bootstrap';
import 'bootstrap';
import 'bootstrap/js/dist/carousel';

// // import Swiper JS
// import Swiper from 'swiper';
// // import Swiper styles
// import 'swiper/css';



// var swiper = new Swiper(".mySwiper", {
//     slidesPerView: 3,
//     grid: {
//       rows: 2,
//     },
//     spaceBetween: 30,
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },
//   });


import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init(); 




  let items = document.querySelectorAll('.carousel .carousel-item')

  items.forEach((el) => {
      const minPerSlide = 4
      let next = el.nextElementSibling
      for (var i=1; i<minPerSlide; i++) {
          if (!next) {
              // wrap carousel by using first child
            next = items[0]
          }
          let cloneChild = next.cloneNode(true)
          el.appendChild(cloneChild.children[0])
          next = next.nextElementSibling
      }
  })


//   document.addEventListener('DOMContentLoaded', function () {
//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//     const emailInput = document.getElementById('email');
//     const validationStatus = document.getElementById('email-validation-status');
//     let emailToCheck = '';
//     let timeoutId;
//     emailInput.addEventListener('input', function () {
//         const email = emailInput.value;
//         clearTimeout(timeoutId);
//         if (email.includes('@')) {
//             emailToCheck = email;
//             timeoutId = setTimeout(() => {
//                 verificaEmail(emailToCheck).then(data => {
//                     if (data.isRegistered) {
//                         validationStatus.textContent = 'Email già registrata, Riprova!';
//                     } else {
//                         validationStatus.textContent = '';
//                     }
//                 }).catch(error => {
//                     console.error('Errore durante la verifica dell\'email:', error);
//                     validationStatus.textContent = ''; 
//                 });
//             }, 300);
//         } else {
//             validationStatus.textContent = '';
//         }
//     });
//     function verificaEmail(email) {
//         return new Promise((resolve, reject) => {
//             fetch('/check-email', {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/json',
//                     'X-CSRF-TOKEN': csrfToken,
//                 },
//                 body: JSON.stringify({ email: email }),
//             })
//                 .then(response => response.json())
//                 .then(data => {
//                     resolve(data);
//                 })
//                 .catch(error => {
//                     reject(error);
//                 });
//         });
//     }
// });

