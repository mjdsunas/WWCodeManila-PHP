<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    
</head>
<body>
<?= form_open_multipart('item/do_upload');?>
<input type="file" name="userfile" size="20" />
<input type="submit" value="upload" />
<?= form_close() ?>

</body>
</html>