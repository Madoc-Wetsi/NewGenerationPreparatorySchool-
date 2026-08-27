document.addEventListener("DOMContentLoaded", function () {
  let lightbox = document.getElementById("lightbox");
  let lightboxImg = document.getElementById("lightboximg");
  let closeBtn = document.getElementById("close");
  let galleryItems = document.querySelectorAll(".gallery-item");
  let filterBtns = document.querySelectorAll(".filter-btn");

  galleryItems.forEach(function (item) {
    item.addEventListener("click", function () {
      let img = item.querySelector("img");
      if (img && lightbox && lightboxImg) {
        lightboxImg.src = img.src;
        lightboxImg.alt = img.alt;
        lightbox.style.display = "flex";
        document.body.style.overflow = "hidden";
      }
    });
  });

  if (closeBtn) {
    closeBtn.addEventListener("click", function () {
      lightbox.style.display = "none";
      document.body.style.overflow = "";
    });
  }

  if (lightbox) {
    lightbox.addEventListener("click", function (e) {
      if (e.target === lightbox) {
        lightbox.style.display = "none";
        document.body.style.overflow = "";
      }
    });
  }

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && lightbox && lightbox.style.display === "flex") {
      lightbox.style.display = "none";
      document.body.style.overflow = "";
    }
  });

  filterBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
      filterBtns.forEach(function (b) {
        b.classList.remove("active");
      });
      btn.classList.add("active");

      let filter = btn.getAttribute("data-filter");

      galleryItems.forEach(function (item) {
        if (filter === "all" || item.getAttribute("data-category") === filter) {
          item.classList.remove("hidden");
        } else {
          item.classList.add("hidden");
        }
      });
    });
  });
});
