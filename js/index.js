let activeIndex = 0;

const html = document.getElementById("html");
const icon = document.getElementById("icon-mode");

const mode = document.getElementById("mode");
const body = document.getElementById("body");
const list = document.getElementById("list");

const sections = body.clientHeight / 4;

window.addEventListener("load", () => {
   const mode = localStorage.getItem("mode");
   if (mode === "dark") {
      html.classList.add("dark");
      icon.innerHTML = 'dark_mode';
      return;
   }
   icon.innerHTML = 'light_mode';
});

body.onscroll = (evt) => {
   const currentScroll = evt.currentTarget.scrollY;

}

function changeIndex(e) {
   e.preventDefault();
   const index = e.target.attributes.id.value;

   if(activeIndex != index)
      document.getElementById(activeIndex).removeAttribute('class');

   activeIndex = index;
   html.scroll({
      top: sections * index,
      behavior: 'smooth'
   });
}

function iconAnimation(theme) {

   mode.removeChild(mode.firstElementChild);

   let spanIcon = document.createElement('span');
   spanIcon.innerHTML = theme;
   spanIcon.classList.add("material-symbols-rounded", "theme-mode");

   document.querySelector("#mode").appendChild(spanIcon);

   if (theme === 'light_mode') {
      html?.classList.add("dark");
      localStorage.setItem("mode", "dark");
      return;
   }
   html?.classList.remove("dark");
   localStorage.clear();
}

mode.addEventListener("click", () => {
   const savedMode = localStorage.getItem("mode");
   savedMode ? iconAnimation('dark_mode') : iconAnimation('light_mode');
});

window.removeEventListener("load", () => { return; });