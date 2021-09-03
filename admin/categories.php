<?php include '../admin/includes/header.php';



?>

<div id="wrapper">

  <!-- Navigation -->
  <?php include '../admin/includes/nav.php' ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome to admin
            <small>Author</small>
          </h1>
          <div class="col-xs-6">
            <form action="categories.php" method="post">
              <div class="form-group">
                <label for="cat_title">Category tile:</label>
                <input class="form-control" type="text" name="cat_title" />
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category" />
              </div>
            </form>

            <?php
            // Add query for category
            if (isset($_POST['submit'])) {

              $new_cat = $_POST['cat_title'];
              if ($new_cat == "" || empty($new_cat)) {
                echo "<p style='color: red;'>This field can't be empty</p>";
              } else {
                $post_cat = "INSERT INTO categories (cat_title) values ('{$new_cat}')";
                $post_cat_res = mysqli_query($connection, $post_cat);
                if (isset($post_cat_res) && !$post_cat_res) {
                  die("Query failed" . mysqli_error($connection));
                }
              }
            }


            //Delete query for category
            if (isset($_GET['delete'])) {
              $delete_cat_id = $_GET['delete'];

              $delete_cat = "DELETE FROM categories WHERE cat_id='{$delete_cat_id}'";
              $delete_cat_res = mysqli_query($connection, $delete_cat);

              if (!$delete_cat_res) {
                die("Query fail" . mysqli_error($connection));
              }

              header("Location: categories.php"); //redirect to categories.php page if the page is not refresh automatically
            }


            if (isset($_POST['update'])) {
              $update_cat_title = $_POST['cat_title'];
              $update_cat_id = $_POST['cat_id'];
              if ($update_cat_title == "" || empty($update_cat_title)) {
                echo "<p style='color: red;'>This field can't be empty</p>";
              } else {
                $update_cat = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id='{$update_cat_id}'";
                $update_cat_res = mysqli_query($connection, $update_cat);

                if (!$update_cat_res) {
                  die("Query fail" . mysqli_error($connection));
                } else {
                  echo "<p style='color: #367aba;'>This field has been update to {$update_cat_title}</p>";
                }
              }
            }
            ?>

          </div> <!--  Add Cat form -->

          <div class="col-xs-4">
            <table class="table">
              <thead>
                <tr>
                  <!-- <th>Id</th> -->
                  <th>Category Title</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!--  find all categories -->
                <?php
                $get_cat = "SELECT * FROM categories";
                $get_cat_res = mysqli_query($connection, $get_cat);

                while ($get_cat_row = mysqli_fetch_assoc($get_cat_res)) {
                  $cat_id = $get_cat_row['cat_id'];
                  $cat_title = $get_cat_row['cat_title'];
                ?>
                  <tr>
                    <!-- <td><?php echo $cat_id ?></td> -->
                    <td><?php echo $cat_title ?></td>
                    <td><?php echo "<a href='categories.php?delete={$cat_id}'>Delete</a>" .
                          " | " .
                          "<a href='categories_edit.php?edit={$cat_id}'>Edit</a>" ?></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div> <!-- Categories List -->
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include '../admin/includes/footer.php' ?>