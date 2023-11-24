<?php
include 'connection.php'; 

$id = $_GET['id'];
$select = "SELECT * FROM books WHERE id='$id'";
$data = mysqli_query($con, $select);
$row = mysqli_fetch_array($data);
?>

<div>
    <form action="" method="POST">
        <input value="<?php echo $row['bookname'] ?>" type="text" name="bookname" placeholder="bookname"> <br><br>
        <input type="text" name="author" placeholder="author" value="<?php echo $row['author'] ?>"> <br><br>
        <input type="submit" name="update_btn" value="Update"> <br><br>
        <button><a href="view.php">Back</a></button>
    </form>
</div>

<?php
if (isset($_POST['update_btn'])) {
    $bookname = $_POST['bookname'];
    $authorname = $_POST['author'];
    $update = "UPDATE books SET bookname='$bookname', author='$authorname' WHERE id ='$id'";    
    $data = mysqli_query($con, $update);

    if ($data) {
        ?>
        <script type="text/javascript">
            alert("Data Updated Successfully");
        </script>
        <?php   
    } else {
        ?>
        <script type="text/javascript">
            alert("Please try again");
            window.open("http://localhost:80/pranee/view.php","_self");
        </script>
        <?php
    }
}
?>