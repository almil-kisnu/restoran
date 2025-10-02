// toggle active class
let lastScrollTop = 0;
let currentSlide = 0;
const navbarnav = document.querySelector('.navbar-nav');
const menu = document.querySelector('#menu');
const navbar = document.querySelector('.navbar');
const slides = document.querySelectorAll(".hero");
const dots = document.querySelectorAll(".dot");
const tabBtns = document.querySelectorAll('.tab-btn');
const tabContents = document.querySelectorAll('.tab-content');
const semuaTab = document.getElementById("semua");
const modal = document.getElementById("productModal");
const modalImg = document.getElementById("modalImg");
const modalTitle = document.getElementById("modalTitle");
const modalDesc = document.getElementById("modalDesc");
const modalPrice = document.getElementById("modalPrice");
const closeBtn = document.querySelector(".close");



// when menu onclick
menu.onclick = () => {
  navbarnav.classList.toggle('active');
};

// when onclick outside of the menu
document.addEventListener('click',function(e) {
    if(!menu.contains(e.target)&&!navbarnav.contains(e.target)){
        navbarnav.classList.remove('active');
    }
});

window.addEventListener('scroll', () => {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    // Jika di posisi paling atas (scrollY = 0), navbar transparan
    if (currentScroll <= 0) {
        navbar.classList.remove('hidden', 'visible'); 
    }
    // Jika scroll ke bawah, sembunyikan navbar
    else if (currentScroll > lastScrollTop) {
        navbar.classList.add('hidden');
        navbar.classList.remove('visible');
    }
    // Jika scroll ke atas, tampilkan navbar dengan background hitam
    else if (currentScroll < lastScrollTop) {
        navbar.classList.add('visible');
        navbar.classList.remove('hidden');
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Update posisi scroll terakhir
});

// hero sec
function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove("active");
    dots[i].classList.remove("active");
    if (i === index) {
      slide.classList.add("active");
      dots[i].classList.add("active");
    }
  });
}

// Auto change slide every 3s
setInterval(() => {
  currentSlide = (currentSlide + 1) % slides.length;
  showSlide(currentSlide);
}, 5000);

// Klik manual lewat dot
dots.forEach((dot, i) => {
  dot.addEventListener("click", () => {
    currentSlide = i;
    showSlide(i);
  });
});

function generateSemua() {
  semuaTab.innerHTML = ""; // reset isi

  ["bakso", "mieayam", "minuman"].forEach(id => {
    // buat judul kategori
    const sectionTitle = document.createElement("h2");
    sectionTitle.className = "section-title";
    sectionTitle.textContent = id.charAt(0).toUpperCase() + id.slice(1);
    semuaTab.appendChild(sectionTitle);

    // ambil semua card dari kategori itu
    const cards = document.querySelectorAll(`#${id} .card`);
    cards.forEach(card => {
      semuaTab.appendChild(card.cloneNode(true)); // clone biar gak hilang di tab aslinya
    });
  });
}

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      tabBtns.forEach(b => b.classList.remove('active'));
      tabContents.forEach(c => c.classList.remove('active'));

      btn.classList.add('active');
      const tab = document.getElementById(btn.dataset.tab);

      // kalau klik "semua", generate ulang
      if (btn.dataset.tab === "semua") {
        generateSemua();
      }

      tab.classList.add('active');
    });
  });

  // generate pertama kali biar isi "semua" langsung ada
  generateSemua();

function createKomposisiList(komposisiString) {
  if (!komposisiString) return "<li>Komposisi belum tersedia</li>";
  
  return komposisiString
    .split(",")
    .map(item => `<li>${item.trim()}</li>`)
    .join("");
}

function openModalFromCard(card) {
  modal.style.display = "flex";
  modalImg.src = card.querySelector("img").src;
  modalTitle.textContent = card.dataset.title;
  
  // Buat list komposisi dengan fungsi helper
  const modalKomposisi = document.getElementById("modalKomposisi");
  modalKomposisi.innerHTML = createKomposisiList(card.dataset.komposisi);
}

// Delegasi event ke document (atau bisa ke .tab-content juga)
document.addEventListener("click", (e) => {
  const card = e.target.closest(".card");
  if (card && card.closest(".tab-content.active")) {
    openModalFromCard(card);
  }
});

// Event: klik di luar modal -> tutup modal
window.onclick = (e) => {
  if (e.target === modal) {
    modal.style.display = "none";
  }
};