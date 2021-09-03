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
            Posts
          </h1>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>10</td>
                <td>Ken Tiet</td>
                <td>BS</td>
                <td>Boostrap</td>
                <td>approved</td>
                <td></td>
                <td>bootstrap</td>
                <td>hellooooooo</td>
                <td></td>
              </tr>
            </tbody>
          </table>
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