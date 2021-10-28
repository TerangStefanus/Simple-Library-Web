<?php
    include '../dbconnect.php';
    $id = $_GET['id'];
    $queryDelete = mysqli_query($conn, "DELETE FROM books WHERE id='$id'") or die(mysqli_error($conn));
    if($queryDelete){
        echo
            '<script>
                alert("Delete Success"); window.location = "../admin/book_list.php"
            </script>';
    }else{
        echo
            '<script>
                 alert("Delete Failed"); window.location = "../admin/book_list.php"
            </script>';
    }
