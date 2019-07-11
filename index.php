<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/9/2019
 * Time: 9:08 PM
 */
?>

<?php
include 'db-connaction.php';

if (!$connection) {
    echo mysqli_connect_error();
} else {
    $sql = "select * from customer";
    $resultset = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage|Ajax</title>
    <!--link bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
    <div class="row" style="margin-top: 30px">
        <div class="col-1"></div>
        <div class="col-5">
            <h3 style="margin: 0px">Manage Employee</h3>
            <!--onsubmit="return Validation();"-->
            <form style="padding-top: 20px" id="myForm">
                <div class="form-group">
                    <label>EID</label>
                    <input type="text" class="form-control" name="id" id="inputCID" placeholder="E000">
                    <small id="cidv" style="margin: 0px"></small>
                </div>

                <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="xxxxxxxx">
                    <small id="cnamev"></small>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="xx xxxx xxxxx">
                    <small id="add"></small>

                </div>

                <div class="form-group">
                    <label>Salary</label>
                    <input type="number" class="form-control" name="salary" id="inputsalary" placeholder="000000.00">
                    <small id="salaryv"></small>

                </div>

                <button type="button" class="btn btn-success" id="btnadd">Add</button>
                <button type="button" class="btn btn-warning" id="btnupdate">Update</button>
                <button type="button" class="btn btn-danger" id="btndelete">Delete</button>

            </form>
        </div>
        <div class="col-5">
            <table class="table table-hover" id="tbl" style="margin-top: 60px">
                <thead>
                <tr>
                    <th scope="col">CID</th>
                    <th scope="col">EName</th>
                    <th scope="col">Address</th>
                    <th scope="col">Salary</th>

                </tr>
                </thead>
                <tbody>
                <?php
                while ($rowdata = mysqli_fetch_row($resultset)) {
                    echo " <tr>
            <th scope=\"row\">$rowdata[0]</th>
            <td>$rowdata[1]</td>
            <td>$rowdata[2]</td>
            <td>$rowdata[3]</td>

        </tr>";
                }
                mysqli_close($connection);
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>