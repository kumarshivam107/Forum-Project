 <?php
include '_header.php';
include '_dbconnect.php';
$id = $_GET["cat_id"];
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    echo $title;
    $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_catid`, `thread_userid`, `date`) VALUES ('$title','$desc', '$id', '0', current_timestamp())";
    $result = mysqli_query($connection,$sql);
}
$sql ="SELECT * FROM `category` WHERE category_id= $id";
$result = mysqli_query($connection,$sql);
while ($catrow = mysqli_fetch_assoc($result)){
    echo '<div class="container my-2">
    <div class="jumbotron">
      <h1 class="display-4">'.$catrow["category_name"].'</h1>
      <p class="lead">'.$catrow["category_desc"].'</p>
      <hr class="my-4">
      <p>No Spam / Advertising / Self-promote in the forums.
        Do not post copyright-infringing material.
        Do not post “offensive” posts, links or images.
        Do not cross post questions.
        Do not PM users asking for help.
    </p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
    </div>';
}

?>

<div class="container py-2">
<h3>Start A Discussion</h3>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION["loggedin"]==true){
  echo '<form action='.$_SERVER['REQUEST_URI'].' method="POST">
  <div class="form-group">
    <label for="title">Problem Title</label>
    <input type="title" class="form-control" id="title" name="title" placeholder="Enter the Problem Title" required>
  </div>
  <div class="form-group">
    <label for="desc">Problem Description</label>
    <input type="desc" class="form-control" id="desc" name="desc" placeholder="Enter the Problem Description" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>';
}
else{
  echo '<p class="lead">You are not Loggedin. Login to Start A Discussion.</p>';
}
?>
</div>

<div class="container">
<h2>Browse Question</h2>
</div>
<?php
$threadsql ="SELECT * FROM `thread` WHERE thread_catid= $id";
$threadresult= mysqli_query($connection,$threadsql);
$noResult = true;
while ($threadrow = mysqli_fetch_assoc($threadresult)){
    $noResult = false; 
    $threadid = $threadrow["thread_id"];
    echo '<div class="container my-2">
    <div class="media my-2">
        <img src="images/userde.jpg" class="mr-3" style="height:80px; width:70px;" alt="User Default Image">
        <div class="media-body my-2">
            <h5 class="mt-0"><a href="/thread.php?threadid='.$threadid.'">'.$threadrow['thread_title'].'</a></h5>
            <p>'.$threadrow["thread_desc"].'</p>
        </div>
    </div>
</div>';
}
if ($noResult){
    echo '<div class="container">
    <div class="jumbotron">
    <h1 class="display-4">No Question Asked</h1>
    <p>Be the First Person to Asked the Questions.</p>
  </div>
  </div>';
}

?>

