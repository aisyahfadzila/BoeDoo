<?php
include "config.php";
if (isset($_POST['job_id'])) {
    $job_id = $_POST['job_id'];
    $cvDirectory = "../assets/cv/";


    // Query database untuk mendapatkan daftar pelamar berdasarkan job_id
    $i = 1;
    $applicants_query = mysqli_query($conn, "SELECT CONCAT(u.first_name, ' ', u.last_name) AS 'full_name', p.profession AS 'profession', a.proposal AS 'proposal', p.cv AS 'cv'
    FROM apply a
    JOIN users u ON a.employees_id = u.id
    JOIN profiles p ON u.id = p.user_id
    WHERE a.job_id = '$job_id'");

    if (mysqli_num_rows($applicants_query) > 0) {
        echo "<table id='jobs-table'>";
        echo "<tr>";
        echo "<td>No</td>";
        echo "<td>Name</td>";
        echo "<td>Profession</td>";
        echo "<td>Proposals</td>";
        echo "<td>CV</td>";
        echo "</tr>";

        foreach ($applicants_query as $row_list) {
            $name = $row_list['full_name'];
            $title = $row_list['profession'];
            $proposal = $row_list['proposal'];
            $cv = $row_list['cv'];

            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $title . "</td>";
            echo "<td>" . $proposal . "</td>";
            ?>
            <td><a href='" . $cvDirectory . $cv . "'download="<?php echo $name . "'s CV.pdf" ?>" class='download'>Download</a></td>
            <?php
            echo "</tr>";
            $i++;
        }
        echo "</table>";

    } else {
        echo "<p>No applicants found.</p>";
    }
}
?>