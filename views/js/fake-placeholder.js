// Fake PlaceHolder
var fakePlaceholder = document.getElementById("fake-placeholder");
var jobDescription = document.getElementById("job-description");

fakePlaceholder.addEventListener("click", function() {
  jobDescription.style.display = "block";
  jobDescription.focus();
});

jobDescription.addEventListener("focus", function() {
  fakePlaceholder.style.display = "none";
});

jobDescription.addEventListener("blur", function() {
  if (jobDescription.value.length === 0) {
    fakePlaceholder.style.display = "block";
    jobDescription.style.display = "none";

  }
});