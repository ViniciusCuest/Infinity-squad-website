const divContainer = document.getElementById('divReference');
const fileContainer = document.getElementById('fileInputReference');
const uploadContainer = document.getElementById("uploadContainer");

const EventTypes = ['dragenter', 'dragleave', 'dragover', 'drop'];

let imagePath = [];

$("#uploadContainer").append('<h1>Insira suas imagens aqui</h1>');

const getFileInformation = (file) => {
   const reader = new FileReader();
   reader.readAsDataURL(file);
   reader.onload = () => {
      //$("#uploadContainer").empty();
      imagePath.push(reader.result);
      imagePath.map(item => {
         $("#uploadContainer").append("<img id='img-click' height='40%' src='" + item + "'/>");
      });
   }
}

$("#removeAll").click((e) => {
   e.preventDefault();

   if (imagePath.length === 1) {
      imagePath.pop();
      $("#img-click").remove();
      $("#uploadContainer").append('<h1>Insira suas imagens aqui</h1>');
      return;
   }
   imagePath.pop();
   $("#img-click").remove();
});

const validateFileRequirements = (file) => {
   const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
   if (sizeInMB > 5)
      return;

   getFileInformation(file);
}

fileContainer.addEventListener("change", (e) => {
   if (e.currentTarget.files.length)
      validateFileRequirements(e.currentTarget.files[0]);
});

divContainer.addEventListener("click", () => {
   fileContainer.click();
});

EventTypes.forEach((item) => {
   divContainer.addEventListener(item, (e) => {
      e.preventDefault();
      e.stopPropagation();
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
