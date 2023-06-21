document.addEventListener('DOMContentLoaded', () => {
    let uploadImage = document.getElementById("imageUpload");
    let imageChosen = document.getElementById("imageChosen");
    let fileName = document.getElementById("fileName");
  
    uploadImage.onchange = () => {
      let reader = new FileReader();
      reader.readAsDataURL(uploadImage.files[0]);
      console.log(uploadImage.files[0]);
      reader.onload = () => {
        imageChosen.setAttribute("src", reader.result);
      }
    }
  });
  