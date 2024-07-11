<!DOCTYPE html>
<html>

<head>
  <title>Board of Studies</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Imoprting Page AND Table CSS-->
  <link rel="stylesheet" href="/Project/CSS/Page.css" />
  <link rel="stylesheet" href="/Project/CSS/Table.css" />

  <!-- Importing Lato Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet" />

  <!-- Importing Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet" />

  <!-- Importing Dropdown Symbol -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
  <nav>
    <a href="/Project/1.Home/Home.html">Home</a>
    <a href="/Project/2.PEO/PEO.html">PEO,PO & PSO</a>
    <a href="/Project/3.Board/board.php">Board of Studies</a>
    <a href="/Project/4.Curriculum/curriculum.php">Curriculum Details</a>
    <a href="/Project/5.Faculty/Faculty_Member.html">Faculty Members</a>
    <a href="/Project/6.Lab/Lab_Details.html">Laboratory Details</a>
    <a href="/Project/7.Research/Research.html">Research</a>
    <div class="dropdown">
      <button class="more">More</button>
      <div class="dropdown-content">
        <a href="/Project/9.Publication/Publication.html">Publications</a>
        <a href="/Project/10.MOU/MOU.html">MOU</a>
        <a href="/Project/11.Consultancy/Consultancy.html">Consultancy</a>
        <a href="/Project/12.Placement/Placement.html">Placement Records</a>
        <a href="/Project/13.Activities/Activities.html">Activities</a>
        <a href="/Project/14.Gallery/Gallery.html">Events Gallery</a>
      </div>
    </div>
    <div class="material-symbols-outlined">arrow_drop_down</div>
  </nav>
  <div class="container">
    <img class="thumbnail" src="photos for file/sample16.jpg" alt="hlo" />
    <div class="heading">Research</div>
  </div>
  <section>
    <table class=" styled-table">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Author Name</th>
          <th>Paper Title</th>
          <th>Journal Name</th>
          <th>Volume & Issue</th>
          <th>File</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $flag = 1;
        $connect = mysqli_connect("localhost", "root", "", "department");
        if ($connect == false)  die("Error in Connecting with MySQL");


        $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'lab';");
        $check = mysqli_fetch_array($check_query);
        if ($check == null) {
          $flag = 0;
        }
        if ($flag) {
          $rows = mysqli_query($connect, "SELECT * FROM lab ;");
          $num_rows = mysqli_num_rows($rows);
          for ($i = 0; $i < $num_rows; $i++) {
            $row = mysqli_fetch_array($rows);
            echo "<tr>";
            echo "<td>" . $row['s_no'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['journal_name'] . "</td>";
            echo "<td>" . $row['volume'] . "</td>";
            echo "<td>" . '<a href="Files/' . $row['file'] . '">' . $row['file'] . '</a>' . "</td>";
          }
        }
        if ($_SESSION['user'] == 'teacher') {
          $form = <<<ANYTHING
                  <form action="curriculum_add_form.php">
                      <button type="submit">Add</button>
                  </form>
                  <form action="curriculum_edit_from.php">
                      <button type="submit">Edit</button>
                  </form>
            ANYTHING;
          echo $form;
        }
        ?>
      </tbody>
    </table>
  </section>
</body>

</html>