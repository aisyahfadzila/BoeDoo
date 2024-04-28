function changeAttribute() {
  var button = document.getElementById("myBtn");
  var img = document.getElementById("arrowImg");
  // var hiddenImg = document.getElementById("myBtn");
  if (button.classList.contains("clicked")) {
    // Revert to original attributes
    button.classList.remove("clicked");
    img.src = "../views/img/arrow.svg";
  } else {
    // Change attributes
    button.classList.add("clicked");
    img.src = "../views/img/arrowup.svg";
  }
}

function copyLink() {
  var link = window.location.href; // Mendapatkan URL halaman saat ini
  var tempInput = document.createElement("input");
  tempInput.value = link;
  document.body.appendChild(tempInput);
  tempInput.select();
  document.execCommand("copy");
  document.body.removeChild(tempInput);
  alert("Link copied!");
}

function showTable(tableName) {
  var table = document.getElementById(tableName + "-table");
  table.classList.remove("hidden");
}

function changeDefaultImage() {
  var result = confirm('Are you sure you want to remove your profile picture?'); if (result) { var profilePicture = document.getElementById('pfp'); var deleteIcon = document.getElementById('delete_icon'); var defaultImagePath = '../views/img/user (1).png'; profilePicture.src = defaultImagePath; deleteIcon.value = "deleted"; }
}

function changeProfilePicture(event) {
  var input = event.target; var reader = new FileReader();
  reader.onload = function () { var output = document.getElementById('pfp'); output.src = reader.result; };
  reader.readAsDataURL(input.files[0]);
}

function removeCV() {
  var result = confirm('Are you sure you want to remove your cv?');
  if (result) {
    var deleteCV = document.getElementById('delete_cv');
    var cvName = document.getElementById('cvName');
    deleteCV.value = "deleted"; cvName.value = "";
  }
}