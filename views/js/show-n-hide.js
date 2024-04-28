https: $(document).ready(function () {
  var buttons = $(
    "a.loginNav, a.login, a.signupNav, a.create, a.forgotpw, a.back, .close"
  );
  var modals = $("#id01, #id02, #id03, #id04");
  var activeModal = null;

  buttons.on("click", function () {
    console.log("Button clicked");
    if (activeModal !== null) {
      activeModal.hide();
      activeModal = null;
    }

    if (
      $(this).hasClass("loginNav") ||
      $(this).hasClass("login") ||
      $(this).hasClass("back")
    ) {
      activeModal = $("#id01");
    } else if ($(this).hasClass("signupNav") || $(this).hasClass("create")) {
      activeModal = $("#id02");
    } else if ($(this).hasClass("forgotpw")) {
      activeModal = $("#id03");
    } else if ($(this).hasClass("close")) {
      modals.hide();
    }
    activeModal.show();
  });

  $("#profileBtn").click(function () {
    // Show or hide the mini profile depending on its current visibility
    if ($("#miniprofile").is(":visible")) {
      $("#miniprofile").hide(200);
    } else {
      $("#miniprofile").show(200);
    }
  });

  $("#dropdownBtn").click(function () {
    // Show or hide the mini profile depending on its current visibility
    if ($("#dropdownFilter").is(":visible")) {
      $("#dropdownFilter").hide(200);
    } else {
      $("#dropdownFilter").show(200);
    }
  });

  // When the user clicks anywhere outside of the modal, close it
  window.addEventListener("click", function (event) {
    var signin = document.getElementById("id01");
    var signup = document.getElementById("id02");
    var recover = document.getElementById("id03");
    var form = document.getElementById("forms");
    if (event.target == signin && !form.contains(event.target)) {
      signin.style.display = "none";
    }

    if (event.target == signup && !form.contains(event.target)) {
      signup.style.display = "none";
    }

    if (event.target == recover && !form.contains(event.target)) {
      recover.style.display = "none";
    }
  });
});
