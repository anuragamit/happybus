<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('student/addstudent');?>

<input type="file" name="student_photo" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>