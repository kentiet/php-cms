<div class="row-12">
  <a href="posts.php?source=add_post" class="btn btn-primary" role="button">Add post</a>
</div>
<br>
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
    <?php
    $get_posts = "SELECT *, cat_title FROM posts join categories as c Where post_category_id = cat_id";
    $get_posts_res = mysqli_query($connection, $get_posts);

    while ($get_posts_row = mysqli_fetch_assoc($get_posts_res)) {
      $post_id = $get_posts_row['post_id'];
      $post_title = $get_posts_row['post_title'];
      $post_author = $get_posts_row['post_author'];
      $post_category_id = $get_posts_row['post_category_id'];
      $post_category_title = $get_posts_row['cat_title'];
      $post_date  = $get_posts_row['post_date'];
      $post_image = $get_posts_row['post_image'];
      $post_content = $get_posts_row['post_content'];
      $post_tags  = $get_posts_row['post_tags'];
      $post_comment_count = $get_posts_row['post_comment_count'];
      $post_status   = $get_posts_row['post_status'];
    ?>
      <tr>
        <td><?php echo $post_id ?></td>
        <td><?php echo $post_author ?></td>
        <td><?php echo $post_title ?></td>
        <td><?php echo $post_category_title ?></td>
        <td><?php echo $post_status ?></td>
        <td><img width="50px" height="40px" src="../images/<?php echo $post_image ?>"></td>
        <td><?php echo $post_tags ?></td>
        <td><?php echo $post_comment_count ?></td>
        <td><?php echo $post_date ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>