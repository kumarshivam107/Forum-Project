<?php
include '_header.php';
include '_dbconnect.php';
$id = $_GET["threadid"];
$sql ="SELECT * FROM `thread` WHERE thread_id= $id";
$result = mysqli_query($connection,$sql);
while ($threadrow = mysqli_fetch_assoc($result)){
        echo '<div class="container my-2">
        <div class="jumbotron">
        <h1 class="display-4">'.$threadrow["thread_title"].'</h1>
        <p class="lead">'.$threadrow["thread_desc"].'</p>
        <hr class="my-4">
        <p>No Spam / Advertising / Self-promote in the forums.
            Do not post copyright-infringing material.
            Do not post “offensive” posts, links or images.
            Do not cross post questions.
            Do not PM users asking for help.
        </p>
        <h5>Posted By:Shivam Kumar</h5>
        </div>
        </div>';  
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
  $comment = $_POST["comment"];
  $comment_by = $_POST["comment_name"];
  // $commentsql = "INSERT INTO `comment` (`comment_content`, `thread_id`,`comment_by`, `timetamp`) VALUES ('$comment','$id', '$comment_by',current_timestamp())";
  $commentsql ="INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`, `timestamp`) VALUES ('$comment', '$id', '$comment_by',current_timestamp())";
  $commentresult = mysqli_query($connection,$commentsql);
}
?>

<div class="container my-2">
    <h2>Post A Comment</h2>
    <?php
if (isset($_SESSION['loggedin']) && $_SESSION["loggedin"]==true){
  echo '
  <form action='.$_SERVER['REQUEST_URI'].' method="POST">
<div class="form-group">
    <label for="comment">Type Your Comment</label>
    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
  </div>
  <input type="hidden" name="comment_name" value="'.$_SESSION["username"].'">
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>';
}
else{
  echo '<p class="lead">Login to Post A Comment.</p>';
}
?>

    <div class="container">
        <h2>Discussion</h2>
    </div>

    <div class="container">
        <?php
$commentsql ="SELECT * FROM `comment` WHERE thread_id= '$id'";
$commentresult = mysqli_query($connection,$commentsql);
$noResult = true;
while ($commentRow =mysqli_fetch_assoc($commentresult)){
    $noResult = false;
    echo '<div class="media">
    <img src="images/userde.jpg" class="mr-3" style="height:80px; width:70px;" alt="User Default Image">
    <div class="media-body">
    <p><strong>'.$commentRow['comment_by'].'</strong>&nbsp;'.$commentRow['timestamp'].'</p>
      <p>'.$commentRow["comment_content"].'</p>
    </div>
  </div>';
}
if($noResult){
    echo '<div class="container">
    <div class="jumbotron">
    <h1 class="display-4">No Comment Found</h1>
    <p>Be the First Person to Post a Comment.</p>
  </div>
  </div>';
}
?>
    </div>