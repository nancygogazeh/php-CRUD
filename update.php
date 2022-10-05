<?php
include('database.php');
$id=$_GET['id'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$salary=$_POST['salary'];
$img=time() . '-' . $_FILES['pimage']['name'];
 
$mysqli->query("update employee_basics set name='$name', gender='$gender', 
address='$address', salary='$salary', image='$img' where id=$id");
 
 
// Set a constant
define ("FILEREPOSITORY","profile_images/");
 
// Make sure that the file was POSTed.
if (is_uploaded_file($_FILES['pimage']['tmp_name']))
{
// Was the file a JPEG?
if ($_FILES['pimage']['type'] != "image/jpeg") {
echo "<p>Profile image must be uploaded in JPEG format.</p>";
} else {
 
//$name = $_FILES['classnotes']['name'];
$filename=$id.".jpg";
 
unlink(FILEREPOSITORY.$filename);
$result = move_uploaded_file($_FILES['pimage']['tmp_name'],
FILEREPOSITORY.$filename);
//$result = move_uploaded_file($_FILES['pimg']['tmp_name'],
("http://localhost/phpcrud/profile_images/28.jpg");
if ($result == 1) echo "<p>File successfully uploaded.</p>";
else echo "<p>There was a problem uploading the file.</p>";
}
}
 
header('location:index.php');
 
?>