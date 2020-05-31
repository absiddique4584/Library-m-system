<?php
require_once '../dbcon.php';
$result =mysqli_query($con, "SELECT * FROM `students` ");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print All Students</title>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <style type="text/css">
        body{
            margin: 0;

        }
        .print-area{
            width: 755px;
            height: 1050px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
        }
        .header{
            text-align: center;
        }
        .header h3{
            margin: 0;
        }
        .data-info{

        }
        .data-info table{
            width: 100%;
            border-collapse: collapse;
        }
        .data-info table th,
        . data-info table td{
            border: 1px solid #0b0b0b;
            padding: 4px;
            line-height: 1em;
        }

    </style>
</head>
<body onload="window.print()">
<?php
$Sl = 1;
$Page = 1;
$total = mysqli_num_rows($result);
$par_page = 25;
while ($row = mysqli_fetch_assoc($result)){

    if ($Sl % $par_page == 1){
        echo page_header();
    } ?>
    <tr>
        <td><?= $Sl ?></td>
        <td><?= $row['fname'].' '.$row['lname'] ?></td>
        <td><?= $row['roll'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['phone'] ?></td>
    </tr>
<?php
    if ($Sl % $par_page == 1 || $total == $par_page){
        echo page_footer($Page++);
    }
    $Sl++;
}
?>


</body>
</html>

<?php
function page_header(){
  $data = '<div class="print-area">
        <div class="header">
            <h3>SUMON\'S GUIDLINE</h3>
        </div>
        <div class="data-info">
            <table class="table table-bordered">
                <tr>
                    <th style="text-align: center;">Sl NO </th>
                    <th style="text-align: center;">Student Name </th>
                    <th style="text-align: center;">Student Roll</th>
                    <th style="text-align: center;">Student Email</th>
                    <th style="text-align: center;">Student Phone </th>
                </tr>';
  return $data;
}
function page_footer($Page){
    $data = '
    </table>
            <div style="text-align: center;">Page: -'.$Page.'</div>
        </div>
    </div>
    ';
    return $data;
}

?>
