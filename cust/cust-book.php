<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection){
    die('Could not connect: '.mysqli_connect_error());
}
mysqli_select_db($connection, "test2");
$searchas_real = $_POST['searchas'];
$keyword = $_POST["search-info"];
if($searchas_real == "id") {
    $sql = "SELECT * from people where id like '%$keyword%'";
}
// if ($searchas_real == "id"){
//     $sql = "SELECT DISTINCT bk_isbn, bk_title, auth_fname, auth_lname, bkcpy_id, bkcpy_stat FROM ydzc_cust_book_v WHERE bk_isbn like '%$keyword%'";
// } else if ($searchas_real == "title"){
//     $sql = "SELECT DISTINCT bk_isbn, bk_title, auth_fname, auth_lname, bkcpy_id, bkcpy_stat FROM ydzc_cust_book_v WHERE bk_title like '%$keyword%'";
// } else if ($searchas_real == "anthor") {
//     $sql = "SELECT DISTINCT bk_isbn, bk_title, auth_fname, auth_lname, bkcpy_id, bkcpy_stat FROM ydzc_cust_book_v WHERE  like '%$keyword%'";
// } else {
//     $sql = "SELECT DISTINCT bk_isbn, bk_title, auth_fname, auth_lname, bkcpy_id, bkcpy_stat FROM ydzc_cust_book_v WHERE top_name like '%$keyword%'";
// }
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Search Result </title>
        <link href="../bootstrap.min.css" rel=stylesheet>
        <link href="../bootstrap-table.min.css" rel="stylesheet">
        <script src="../bootstrap.min.js"></script>
        <script src="../jquery-3.6.0.min.js"></script>
        <script src="../bootstrap-table.min.js"></script>
        <script>
            function confirmrent() {
            // //console.log("here");
            // document.getElementById("confirmbox").style.display='block';
            // document.getElementById("confirmbox").style.display='block';
            alert("tanchuang");
            }
            $("#rantclickid2").on('click', function(){
                alert("nihao");
            });
        </script>
    </head>

    <body>
        <header>
            <img src="../pictures/header-image.png" width=100% />
        </header>

        <div class="container">
            <div class="row">
                <a href="javascript:;" οnclick="alert(tanchuang);" id="rantclickid2">Rant</a>
                <ul class="nav nav-pills">
                    <li><a href="cust-home.html">Home</a></li>
                    <li class="active"><a href="cust-book.html">Book</a></li>
                    <li><a href="cust-event.html">Event</a></li>
                    <li><a href="cust-room.html">Study room</a></li>
                    <li class="pull-right"><a href="login.html">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <form id="searchbookform" action="cust-book.php" method="post">
                    <select class="selectpicker" name="searchas">
                        <option value="id">ISBN</option>
                        <option value="title">Title</option>
                        <option value="author">Author</option>
                        <option value="topic">Topic</option>
                    </select>
                    <div class="input-group">
                        <input type="text" class="form-control" name="search-info" />
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <table class="table table-striped">
                    <?php
                    echo "<tr><td>ISBN</td><td>Name</td><td>copyID</td><td>state</td><td>rant</td></tr>";
                    $row=mysqli_fetch_assoc($result);
                    while ($row) {
                    echo "<tr><td>{$row["id"]}</td>";
                    echo "<td>{$row["name"]}</td>";
                    echo "<td>{$row["sal"]}</td>";
                    echo "<td>{$row["age"]}</td>";
                    if($row["id"]==$row["name"]){
                        echo "<td><a href=\"javascript:void(0);\" οnclick=\"confirmrent();\" id=\"rantclickid\">Rant</a></td></tr>";
                    } else {
                        echo "<td>Borrowed</td></tr>";
                    }
                    // echo "<tr><td>{$row["BK_ISBN"]}</td>";
                    // echo "<td>{$row["BK_TITLE"]}</td>";
                    // echo "<td>{$row["BKCPY_ID"]}</td>";
                    // echo "<td>{$row["BKCPY_STAT"]}</td>";
                    // $bck_id=$row["BKCPY_ID"];
                    // if($row["BKCPY_STAT"]=="A"){
                    //     echo "<td><a href='javascript:void(0);' οnclick='confirmrent($bck_id)'>Rant</a></td></tr>";
                    // } else {
                    //     echo "<td>Borrowed</td></tr>";
                    // }
                    $row=mysqli_fetch_assoc($result);
                    }
                    ?>
            </table>
            </div>
        </div>
        <div id="confirmbox2">
            <div style="width:500px;height:40px;">
                <form action="rant.php">
                    <input type="hidden" name="cus_ID" value="$_COOKIE['user']" >
                    <!-- <input type="hidden" name="bck_ID" value="$bname" > -->
                </form>
            </div>
        </div>
        <div id="confirmbox" class=box></div>
    </body>
</html>