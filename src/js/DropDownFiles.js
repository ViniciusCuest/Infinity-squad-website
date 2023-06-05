const divContainer = document.getElementById('divReference');
const fileContainer = document.getElementById('fileInputReference');
const uploadContainer = document.getElementById("uploadContainer");

const EventTypes = ['dragenter', 'dragleave', 'dragover', 'drop'];

let imagePath = [];

$("#uploadContainer").append('<h1 id="file-text">Insira suas imagens aqui</h1>');

const getFileInformation = (file) => {
   const reader = new FileReader();
   reader.readAsDataURL(file);
   reader.onload = () => {
      $(".img-click").remove();
      $("#file-text").remove();
      imagePath.push(reader.result);
      imagePath.map(item => {
         $("#uploadContainer").append("<img id='img-click' class='img-click' height='40%' src='" + item + "'/>");
      });
   }
}

$("#removeAll").click((e) => {
   e.preventDefault();

   if(imagePath.length) 
      $("#uploadContainer").append('<h1 id="file-text">Insira suas imagens aqui</h1>');

   imagePath = [];
   $(".img-click").remove();
});

const validateFileRequirements = (file) => {
   const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
   if (sizeInMB > 5)
      return;

   getFileInformation(file);
}

fileContainer.addEventListener("change", (e) => {
   if (e.currentTarget.files.length)
      for (let i = 0; i < e.currentTarget.files.length; i++)
         validateFileRequirements(e.currentTarget.files[i]);
});

divContainer.addEventListener("click", () => {
   fileContainer.click();
});

EventTypes.forEach((item) => {
   divContainer.addEventListener(item, (e) => {
      e.preventDefault();
      e.stopPropagation();

      if (e.currentTarget.style[0] == 'opacity')
         return;

      if (item === 'dragenter')
         e.dataTransfer.clearData();
      if (item === 'drop') {
         const files = e.dataTransfer.files;
         if (files.length)
            validateFileRequirements(files[0]);
      }
   });
});

EventTypes.forEach((item) => {
   divContainer.removeEventListener(item, (e) => {
      e.preventDefault();
      e.stopPropagation();
   });
});
