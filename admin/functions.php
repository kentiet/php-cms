<?php
function insert_categories()
{
  global $connection;
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
}

function delete_categories()
{
  global $connection;
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
}

function update_categories()
{
  global $connection;
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
}
