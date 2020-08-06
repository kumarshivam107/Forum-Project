<?php
include '_header.php';
include '_dbconnect.php';
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://source.unsplash.com/1000x300/?programing,coding" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1000x300/?programing,python" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1000x300/?website, coder" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container my-2">
<div class="row">
        <?php
            $sql= "SELECT * FROM `category`";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                $id = $row["category_id"];
                echo '<div class="col-lg-4 col-md-4 col-12 my-2">
                <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/300x150/?nature,water" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">'.$row["category_name"].'</h5>
                    <p class="card-text">'.substr($row["category_desc"],0,90).'...</p>
                    <a href="/threadlist.php?cat_id='.$id.'" class="btn btn-primary">View Threads</a>
                </div>
            </div>
            </div>';
            }
        ?>
    </div>
</div>
<?php
include '_footer.php';
?>