const mode = document.getElementById("mode");

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