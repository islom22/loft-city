const callToActionBtns = document.querySelectorAll(".list__wrapper__li");
const color1 = document.querySelector(".list__wrapper li:nth-child(1)");
const color2 = document.querySelector(".list__wrapper li:nth-child(2)");
const color3 = document.querySelector(".list__wrapper li:nth-child(3)");
callToActionBtns.forEach((btn, _, AllBtn) => {
  btn.onclick = (e) => {
    if (btn.classList.toggle("color__select__active"))
      AllBtn.forEach((btx) =>
        btx.classList.toggle("color__select__active", btx === btn)
      );
  };
});

color1.addEventListener("click", () => {
  document.querySelector(".colorChangeSpan").textContent = "Black";
});
color2.addEventListener("click", () => {
  document.querySelector(".colorChangeSpan").textContent = "Brown";
});
color3.addEventListener("click", () => {
  document.querySelector(".colorChangeSpan").textContent = "Blue";
});

function infofunc(e, info) {
  var i, content, links;
  content = document.getElementsByClassName("product__tab__content");
  for (i = 0; i < content.length; i++) {
    content[i].style.display = "none";
  }
  links = document.getElementsByClassName("product__tab");
  for (i = 0; i < links.length; i++) {
    links[i].className = links[i].className.replace(
      " active__link__product",
      ""
    );
  }
  document.getElementById(info).style.display = "block";
  e.currentTarget.className += " active__link__product";
}
