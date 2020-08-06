<?php
$showAlert=false;
include '_dbconnect.php';
include '_header.php';
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact= $_POST['contact'];
    $sql ="INSERT INTO `contact` (`name`, `email`, `contact`, `timestamp`) VALUES ('$name', '$email', '$contact', current_timestamp())";
    $result = mysqli_query($connection,$sql);
    $showAlert= true;
}
if ($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success!</strong> Your Details are Successfully Submitted. We will contcat you soon.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
<div class="container my-2">
<form action="/contact.php" method="post">
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email  Id">
  </div>
  <div class="form-group">
    <label for="contact">Reason for Contact</label>
    <input type="contact" class="form-control" id="contact" name="contact" placeholder="Enter Your Contacting Me">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>