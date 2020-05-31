<?php require_once 'header.php'; ?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="javascript: avoid(0)">Books</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">

    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <form method="post" action="">
                        <div class="row pt-md">
                            <div class="form-group col-sm-9 col-lg-10">
                                                <span class="input-with-icon">
                                            <input type="text" name="result" class="form-control" id="lefticon" placeholder="Search" required>
                                            <i class="fa fa-search"></i>
                                        </span>
                            </div>
                            <div class="form-group col-sm-3  col-lg-2 ">
                                <button type="submit" name="books" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['books'])){
        $result = $_POST['result'];

        ?>
        <div class="col-sm-12 ">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM `books` WHERE `book_name` LIKE '%$result%'");
                        $temp = mysqli_num_rows($result);

                        if ($temp > 0){
                            ?>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <div class="col-sm-3 col-md-2">
                                    <img style="width: 100px; height: 120px;" src="../images/books/<?= $row['book_image'] ?>" alt="">
                                    <p><?= $row['book_name'] ?></p>
                                    <span><b>Available: <?= $row['available_qty'] ?></b></span>
                                </div>
                            <?php } ?>
                            <?php
                        }else{
                            echo "<h1 style='margin-left: 300px;'>Books Not Found</h1>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <?php
    }else{
    ?>
        <div class="col-sm-12 ">
     <div class="panel">
         <div class="panel-content">
             <div class="row">
                 <?php
                 $result = mysqli_query($con, "SELECT * FROM `books` ");
                while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="col-sm-3 col-md-2">
                        <img style="width: 100%; height: 120px;" src="../images/books/<?= $row['book_image'] ?>" alt="">
                        <p><?= $row['book_name'] ?></p>
                        <span><b>Available: <?= $row['available_qty'] ?></b></span>
                    </div>
                 <?php
                }
                 ?>

             </div>
         </div>
     </div>
    </div>
    <?php
    }
    ?>

<?php require_once 'footer.php'; ?>
