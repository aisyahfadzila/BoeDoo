<?php
function generateRandomName()
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = '';

    for ($i = 0; $i < 8; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $name .= $characters[$randomIndex];
    }

    return $name;
}

function uploadFile($file, $targetDirectory)
{
    $fileName = "";
    if ($file["name"] !== "") {
        $fileType = explode("/", $file["type"])[1];
        $fileName = basename(generateRandomName()) . "." . $fileType;
        $targetFile = $targetDirectory . $fileName;
        $uploadOk = 1;

        if ($file["size"] > 10000000) {
            echo '<script>alert("Your file exceeded the maximum size of 10MB");
        window.location.href = "../public/my_profile.php";
        </script>';
            die;
        }

        if ($uploadOk == 0) {
            echo '<script>alert("Upload failed, please try again.");
        window.location.href = "../public/my_profile.php";
        </script>';
        } else {
            if (!move_uploaded_file($file["tmp_name"], $targetFile)) {
                echo '<script>alert("There is a problem in processing your request, please try again.");
          window.location.href = "../public/my_profile.php";
          </script>';
                die;
            }
        }
    }

    return $fileName;
}
?>