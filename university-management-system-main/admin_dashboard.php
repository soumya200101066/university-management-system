<!DOCTYPE html>
<html>

<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" type="image/jpg" href="images/icon.jpg">
</head>

<?php
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sdponedb");
?>

<body>
  <div>
    <div class="header">Admin Dashboard</div><br><br><br><br><br><br>
    <div class="login_status">
      Email: <?php echo $_SESSION['email']; ?> &nbsp&nbsp
      Name: <?php echo $_SESSION['name']; ?> &nbsp&nbsp
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <br><br>

  <div>
    <form action="" method="post">
      <table>
        <tr>
          <td>
            <input class="btn" type="submit" name="search_data" value="Search Data">
          </td>
        </tr>
        <tr>
          <td>
            <input class="btn" type="submit" name="update_data" value="Update Data">
          </td>
        </tr>
        <tr>
          <td>
            <input class="btn" type="submit" name="add_data" value="Add Data">
          </td>
        </tr>
        <tr>
          <td>
            <input class="btn" type="submit" name="delete_data" value="Delete Data">
          </td>
        </tr>
      </table>
    </form>
  </div>

  <div class="right_side"><br><br>
    <div id="demo">
      <?php
      if (isset($_POST['search_data'])) {
      ?>
        <center>
          <form action="" method="post">
            Enter ID Number:
            <input type="text" name="id">
            <input type="submit" name="search_data_using_id_for_search" value="Search">
          </form>
        </center>
        <?php
      }

      if (isset($_POST['search_data_using_id_for_search'])) {
        $query = "select * from student where id = '$_POST[id]'";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
          <table>

            <tr>
              <td><b>ID Number: </b></td>
              <td>
                <input type="text" value="<?php echo $row['id']; ?>" disabled>
              </td>
            </tr>

            <tr>
              <td><b>Name: </b></td>
              <td>
                <input type="text" value="<?php echo $row['name']; ?>" disabled>
              </td>
            </tr>

            <tr>
              <td><b>Address: </b></td>
              <td>
                <input type="text" value="<?php echo $row['address']; ?>" disabled>
              </td>
            </tr>

            <tr>
              <td><b>Contact No. : </b></td>
              <td>
                <input type="text" value="<?php echo $row['contact_no']; ?>" disabled>
              </td>
            </tr>

            <tr>
              <td><b>Level & Term: </b></td>
              <td>
                <input type="text" value="<?php echo $row['level_term_info']; ?>" disabled>
              </td>
            </tr>

            <tr>
              <td><b>CGPA: </b></td>
              <td>
                <input type="text" value="<?php echo $row['cgpa']; ?>" disabled>
              </td>
            </tr>

          </table>
      <?php
        }
      }

      ?>

      <?php
      if (isset($_POST['update_data'])) {
      ?>
        <center>
          <form action="" method="post">
            Enter ID Number:
            <input type="text" name="id">
            <input type="submit" name="search_data_using_id_for_update" value="Search">
          </form>
        </center>
        <?php
      }
      if (isset($_POST['search_data_using_id_for_update'])) {
        $query = "select * from student where id = '$_POST[id]'";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($query_run)) {
        ?>

          <form action="admin_update_data.php" method="post">
            <table>

              <tr>
                <td><b>ID Number: </b></td>
                <td>
                  <input type="text" name="id" value="<?php echo $row['id']; ?>">
                </td>
              </tr>

              <tr>
                <td><b>Name: </b></td>
                <td>
                  <input type="text" name="name" value="<?php echo $row['name']; ?>">
                </td>
              </tr>

              <tr>
                <td><b>Address: </b></td>
                <td>
                  <input type="text" name="address" value="<?php echo $row['address']; ?>">
                </td>
              </tr>

              <tr>
                <td><b>Contact No. : </b></td>
                <td>
                  <input type="text" name="contact_no" value="<?php echo $row['contact_no']; ?>">
                </td>
              </tr>

              <tr>
                <td><b>Level & Term: </b></td>
                <td>
                  <input type="text" name="level_term_info" value="<?php echo $row['level_term_info']; ?>">
                </td>
              </tr>

              <tr>
                <td><b>CGPA: </b></td>
                <td>
                  <input type="text" name="cgpa" value="<?php echo $row['cgpa']; ?>">
                </td>
              </tr><br>

              <tr>
                <td></td>
                <td><input type="submit" name="edit" value="Update"></td>
              </tr>

            </table>
          </form>
      <?php
        }
      }
      ?>

      <?php
      if (isset($_POST['add_data'])) {
      ?>
        <center>
          <h4>Fill Up The Blank Fields</h4>
        </center>

        <form action="admin_add_data.php" method="post">

          <table>
            <tr>
              <td>ID: </td>
              <td>
                <input type="text" name="id" required>
            </tr>
            <tr>
              <td>Name: </td>
              <td>
                <input type="text" name="name" required>
            </tr>
            <tr>
              <td>Email: </td>
              <td>
                <input type="text" name="email" required>
            </tr>
            <tr>
              <td>Password: </td>
              <td>
                <input type="text" name="password" required>
            </tr>
            <tr>
              <td>Address: </td>
              <td>
                <input type="text" name="address" required>
            </tr>
            <tr>
              <td>Contact No. : </td>
              <td>
                <input type="text" name="contact_no" required>
            </tr>
            <tr>
              <td>Level & Term: </td>
              <td>
                <input type="text" name="level_term_info" required>
            </tr>
            <tr>
              <td>CGPA: </td>
              <td>
                <input type="text" name="cgpa" required>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" name="add_data" value="Add Data">
              </td>
            </tr>
          </table>

        </form>
        <?php
      }
      ?>

      <?php 
        if(isset($_POST['delete_data'])){
          ?>
          <center>
            <form action="admin_delete_data.php" method="POST">
              Enter ID Number: 
              <input type="text" name="id">
              <input type="submit" name="search_data_using_id_for_delete" value="Delete">
            </form>
          </center>
          <?php
        }
      ?>

    </div>
  </div>

</body>

</html>