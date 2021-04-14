<!DOCTYPE html>
<html>

<head>
    <title>Tài Liệu PTIT</title>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    </script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="color-danger"><b>Tài Liệu PTIT</b></h2>
        <input type="text" class="form-control mt-5" id="myInput" placeholder="Nhập mã môn hoặc tên môn..." style="width: 700px; margin: auto">
        <div>
            <h3>Đề Thi:</h3>
            <?php
            $connection = mysqli_connect('localhost', 'root', '') or die("Không kết nối được Server!");
            mysqli_select_db($connection, "ptit_tailieu");
            $query = "SELECT * FROM dethi";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                printf("Error: %s\n", mysqli_error($connection));
                exit();
            }
            echo "<table class=\"table table-bordered table-striped table-hover\">";
            echo '<thead><tr><th>Tên Môn</th><th>Đường dẫn</th></tr></thead>';
            echo "<tbody id = \"myTable\" >";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>" . $row['tenMon'] . "</td><td>" .
                    "<a href=\"DeThi\\" . $row['tenFile'] . "\" target=\"blank\">" . $row['tenFile'] . "</a></td></tr>";
            }
            echo "</tbody></table>";
            ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>