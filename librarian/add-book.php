<?php
require_once 'header.php';

if (isset($_POST['save_book'])){
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $librarian_username = $_SESSION['librarian_username'];

    $image = explode('.', $_FILES['book_image']['name']);
    $image_ext = end($image);
    $image = date('YMdhm .').$image_ext;

    $result = mysqli_query($con,"INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES ('$book_name','$image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$librarian_username')");
if ($result){
  move_uploaded_file($_FILES['book_image']['tmp_name'],'../images/books/'.$image);
    $success = 'BOOK save successfully !';
}else{
    $error = ' Something Went wrong !';
    }

}

?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Add Book</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12 col-lg-9" style="margin-left: 120px;">
        <div class="row">
            <div class="panel">

                <?php
                if (isset($success)){
                    ?>
                    <div class="alert alert-info" role="alert">
                        <?= $success; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($error)){

                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>

                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <h1 style="color: #33ddba; text-align:center" class="mb-lg"><strong>Add Book Form</strong></h1>

                                <div class="form-group">
                                    <label for="book_name" class="col-sm-2 control-label">Book Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="book_name" class="form-control" id="book_name" placeholder="Book Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_image" class="col-sm-2 control-label">Book Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="book_image" class="form-control" id="book_image" placeholder="Book Image" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_author_name" class="col-sm-2 control-label">Author Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="book_author_name" class="form-control" id="book_author_name" placeholder="Author Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_publication_name" class="col-sm-2 control-label">Publica. Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="book_publication_name" class="form-control" id="book_author_name" placeholder="Book Publication Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_purchase_date" class="col-sm-2 control-label">Purchase Date</label>
                                    <div class="col-sm-10">
                                        <input type="date"  name="book_purchase_date" class="form-control" id="book_purchase_date" placeholder="Book mm/dd/yyyy" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_price" class="col-sm-2 control-label">Book Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="book_price" class="form-control" id="book_price" placeholder="Book Price" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_qty" class="col-sm-2 control-label">Book Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="book_qty" class="form-control" id="book_qty" placeholder="Book Quantity" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="available_qty" class="col-sm-2 control-label">Available Qty</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="available_qty" class="form-control" id="available_qty" placeholder="Available Quantity" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        require_once 'footer.php';

        ?>
