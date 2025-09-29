// 언어 드롭다운 토글
document.addEventListener("DOMContentLoaded", () => {
  const dropbtn = document.querySelector(".dropbtn");
  const dropdown = document.querySelector(".dropdown-content");

  dropbtn.addEventListener("click", (e) => {
    e.stopPropagation();
    dropdown.classList.toggle("show");
  });

  // 외부 클릭 시 닫힘
  document.addEventListener("click", () => {
    dropdown.classList.remove("show");
  });
});

