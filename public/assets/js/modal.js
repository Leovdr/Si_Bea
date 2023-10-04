// Mengambil elemen-elemen yang dibutuhkan
const openModalBtn = document.getElementById("openModalBtn");
const closeModalBtn = document.getElementById("closeModalBtn");
const modal = document.getElementById("myModal");
const overlay = document.getElementById("overlay");

// Menampilkan modal saat tombol buka modal diklik
openModalBtn.addEventListener("click", () => {
  modal.style.display = "block";
  overlay.style.diasplay = "block";
});

// Menutup modal saat tombol tutup modal diklik
closeModalBtn.addEventListener("click", () => {
  modal.style.display = "none";
  overlay.style.display = "none";
});

// Menutup modal saat overlay diklik
overlay.addEventListener("click", () => {
  modal.style.display = "none";
  overlay.style.display = "none";
});
