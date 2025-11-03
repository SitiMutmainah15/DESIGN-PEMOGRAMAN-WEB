document.addEventListener('DOMContentLoaded', () => {
// === FADE IN JQUERY ===
$(document).ready(function() {
  function fadeInOnScroll() {
    $('.fade-in').each(function() {
      const top = $(this).offset().top;      
      const scrollTop = $(window).scrollTop(); 
      const windowHeight = $(window).height(); 

      // Jika elemen sudah masuk ke area pandang
      if (top < scrollTop + windowHeight - 100) {
        $(this).addClass('visible');
      }
    });
  }

  // Jalankan saat halaman di-scroll
  $(window).on('scroll', fadeInOnScroll);

  // Jalankan sekali saat pertama kali halaman dibuka
  fadeInOnScroll();
});


  // === FILTER MENU ===
  const filterBtns = document.querySelectorAll('.filter-btn');
  const cards = document.querySelectorAll('.menu-card');
 //console.log(cards);
  function applyFilter(filter) {
   cards.forEach(card => {
    //console.log(filter);
    const cat = card.getAttribute('data-category');
    //console.log(cat);
      if (filter === 'all' || cat === filter) { //jika filter === all / cat === filter 
        card.style.display = '';
        console.log(card.style.display);
        card.classList.add('fade-in');
      } else {
        card.style.display = 'none';
      }
    });
  }

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      applyFilter(btn.getAttribute('data-filter'));
    });
  });

  applyFilter('all');

});

// === Tampilkan resep sesuai klik ===
const recipeBtns = document.querySelectorAll('.view-recipe');
const recipes = document.querySelectorAll('.recipe-card');

recipeBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    const targetId = btn.getAttribute('data-target');

    // sembunyikan semua resep
    recipes.forEach(r => r.style.display = 'none');

    // tampilkan resep yang dipilih
    const targetRecipe = document.getElementById(targetId);
    if (targetRecipe) {
      targetRecipe.style.display = 'block';
      targetRecipe.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

