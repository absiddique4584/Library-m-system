<?php
require_once 'header.php';

?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Manage Book</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Books information</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book Image</th>
                            <th>Publication Name</th>
                            <th>Author Name</th>
                            <th>Purchase Date</th>
                            <th>Book Price</th>
                            <th>Book Quantity</th>
                            <th>Available Qty</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $result = mysqli_query($con,"SELECT * FROM `books`");
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td> <?= $row['book_name'] ?> </td>
                                <td><img style="width: 70px;" src="../images/books/<?= $row['book_image'] ?>" alt=""> </td>
                                <td> <?= $row['book_publication_name'] ?> </td>
                                <td> <?= $row['book_author_name'] ?> </td>
                                <td> <?= $row['book_purchase_date'] ?> </td>
                                <td> <?= $row['book_price'] ?> </td>
                                <td> <?= $row['book_qty'] ?> </td>
                                <td> <?= $row['available_qty'] ?> </td>

                                <td>

                                    <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id'] ?>"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="delete.php?bookdelete=<?= base64_encode($row['id']) ?>" class="btn btn-danger" onclick="return confirm('are you sure to delete it ?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    $result = mysqli_query($con,"SELECT * FROM `books`");
    while ($row = mysqli_fetch_assoc($result)){
    ?>

    <!-- Modal -->
    <div class="modal fade" id="book-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i> Book Info</h4>
                </div>
                <div class="modal-body">
                   <table class="table table-bordered">
                       <tr>
                           <th>Book Name</th>
                           <td> <?= $row['book_name'] ?> </td>
                       </tr>
                       <tr>
                           <th>Book Image</th>
                           <td><img style="width: 70px;" src="../images/books/<?= $row['book_image'] ?>" alt=""> </td>
                       </tr>
                       <tr>
                           <th>Publication Name</th>
                           <td> <?= $row['book_publication_name'] ?> </td>
                       </tr>
                       <tr>
                           <th>Author Name</th>
                           <td> <?= $row['book_author_name'] ?> </td>
                       </tr>
                       <tr>
                           <th>Purchase Date</th>
                           <td> <?= $row['book_purchase_date'] ?> </td>
                       </tr>
                       <tr>
                           <th>Book Price</th>
                           <td> <?= $row['book_price'] ?> </td>
                       </tr>
                       <tr>
                           <th>Book Quantity</th>
                           <td> <?= $row['book_qty'] ?> </td>
                       </tr>
                       <tr>
                           <th>Available Qty</th>
                           <td> <?= $row['available_qty'] ?> </td>
                       </tr>
                   </table>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

        <?php
    }
    ?>



    <?php
    $result = mysqli_query($con,"SELECT * FROM `books`");
    while ($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $book_info = mysqli_query($con,"SELECT * FROM `books` WHERE `id` = '$id'");
        $book_info_row = mysqli_fetch_assoc($book_info);
        ?>

        <!-- Modal -->
        <div class="modal fade" id="book-update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header state modal-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i> Update Book Info</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                                            <div class="form-group">
                                                                <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="book_name" class="form-control" value="<?= $book_info_row['book_name']  ?>" id="book_name" placeholder="Book Name" required>
                                                                    <input type="hidden" name="id" class="form-control" value="<?= $book_info_row['id']  ?>" >
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                                                <div class="col-sm-8">

                                                                    <img style="height: 70px;" src="../images/books/<?= $book_info_row['book_image']  ?>" alt="">
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <label for="book_author_name" class="col-sm-4 control-label">Author Name</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" value="<?= $book_info_row['book_author_name']  ?>" name="book_author_name" class="form-control" id="book_author_name" placeholder="Author Name" required>
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <label for="book_publication_name" class="col-sm-4 control-label">Publica. Name</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" value="<?= $book_info_row['book_publication_name']  ?>" name="book_publication_name" class="form-control" id="book_author_name" placeholder="Book Publication Name" required>
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <label for="book_purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" value="<?= $book_info_row['book_purchase_date']  ?>" name="book_purchase_date" class="form-control" id="book_purchase_date" placeholder="Book mm/dd/yyyy" required>
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" value="<?= $book_info_row['book_price']  ?>" name="book_price" class="form-control" id="book_price" placeholder="Book Price" required>
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" name="book_qty" value="<?= $book_info_row['book_qty']  ?>" class="form-control" id="book_qty" placeholder="Book Quantity" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="available_qty" class="col-sm-4 control-label">Available Qty</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" value="<?= $book_info_row['available_qty']  ?>" name="available_qty" class="form-control" id="available_qty" placeholder="Available Quantity" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group pull-right">
                                                                <button type="submit" name="update-book" class="btn btn-primary "> <i class="fa fa-save"></i> update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                    </div>
               </div>

        <?php
    }
    ?>
<?php
    if (isset($_POST['update-book'])){
        $id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $librarian_username = $_SESSION['librarian_username'];

    $result = mysqli_query($con,"UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`librarian_username`='$librarian_username' WHERE `id`='$id'");

        if ($result){
            ?>
            <script type="text/javascript">
                alert('Book Update Success !');
                javascript:history.go(-1);
            </script>
        <?php
        }else{
        ?>
            <script type="text/javascript">
                alert('Something went Wrong !');
            </script>
            <?php
        }
    }
?>


    <?php require_once 'footer.php'; ?>
