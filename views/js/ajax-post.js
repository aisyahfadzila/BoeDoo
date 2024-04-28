$(document).ready(function () {
  $("#approve-btn").click(function (e) {
    e.preventDefault();
    var adminChoice = $("#adminApprove").val();
    var job_id = $("#job_id").val();
    $.ajax({
      url: "../controllers/jobs_approval.php",
      method: "post",
      data: {
        adminChoice: adminChoice,
        job_id: job_id,
      },
      success: function (response) {
        alert("Update Success.");
        window.location.href = "admin.php?page=dashboard";
      },
      error: function (xhr, status, error) {
        alert("Error: " + error);
      },
    });
  });

  $("#reject-btn").click(function (e) {
    e.preventDefault();
    var adminChoice = $("#adminReject").val();
    var job_id = $("#job_id").val();
    console.log(adminChoice);
    $.ajax({
      url: "../controllers/jobs_approval.php",
      method: "post",
      data: {
        adminChoice: adminChoice,
        job_id: job_id,
      },
      success: function (response) {
        alert("Update Success.");
        window.location.href = "admin.php?page=dashboard";
      },
      error: function (xhr, status, error) {
        alert("Error: " + error);
      },
    });
  });
});
