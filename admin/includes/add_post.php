<?php
if (isset($_POST['add_post'])) {
  $post_category_id = (int)$_POST['post_category'];
  $post_title = $_POST['post_title'];
  $post_author = $_POST['post_author'];
  $post_date = $_POST['post_date'];
  $post_image = $_FILES['post_image']['name'];
  $post_image_temp = $_FILES['post_image']['tmp_name'];
  $post_content = $_POST['post_content'];
  $post_tags = $_POST['post_tags'];
  $post_comment_count = 0;
  // echo "$post_category_id \n
  // $post_title \n
  // $post_author \n
  // $post_date \n
  // $post_image \n
  // $post_content \n
  // $post_tags \n";

  $add_post_query = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, 
  `post_date`, `post_image`, `post_content`, 
  `post_tags`, `post_comment_count`) 
  VALUES ($post_category_id, '{$post_title}', '{$post_author}', '{$post_date}', '{$post_image}', 
  '{$post_content}', '{$post_tags}', $post_comment_count)";

  $add_post_res = mysqli_query($connection, $add_post_query);

  if ($add_post_res) {
    move_uploaded_file($post_image_temp, "../images/$post_image");
    header("Location: posts.php");
  } else {
    die('Query failed' . mysqli_error($connection));
  }
}
?>

<form action="posts.php?source=add_post" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="post_category">Category</label>:
    <select class="form-control" name="post_category">
      <?php
      $get_cat = "SELECT * FROM categories";
      $get_cat_res = mysqli_query($connection, $get_cat);

      while ($get_cat_row = mysqli_fetch_assoc($get_cat_res)) {
        $cat_id = $get_cat_row['cat_id'];
        $cat_title = $get_cat_row['cat_title'];
      ?>
        <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="post_title">Title</label>:
    <input class="form-control" type="text" name="post_title">
  </div>
  <div class="form-group">
    <label for="post_author">Author</label>:
    <input class="form-control" type="text" name="post_author">
  </div>
  <div class="form-group">
    <label for="post_date">Date</label>:
    <input class="form-control" type="date" name="post_date">
  </div>
  <div class="form-group">
    <label for="post_image">Image</label>:
    <input class="form-control" type="file" name="post_image">
  </div>
  <div class="form-group">
    <label for="post_content">Content</label>:
    <textarea class="form-control" name="post_content" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <label for="post_tags">Tags</label>:
    <input class="form-control" type="text" name="post_tags">
  </div>
  <button type="submit" class="btn btn-primary" name='add_post'>Publish Post</button>
</form>