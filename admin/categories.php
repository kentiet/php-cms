<?php include '../admin/includes/header.php'; ?>
<?php include 'functions.php' ?>

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
            insert_categories();
            //Delete query for category
            delete_categories();
            //Update query for category
            update_categories();
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