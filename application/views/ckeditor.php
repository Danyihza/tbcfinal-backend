<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url('assets/ckeditor/') ?>ckeditor.js"></script>
    <title>CKEDITOR</title>
</head>

<body>
    <textarea name="editor1" id="editor1" rows="10" cols="80">
        This is my textarea to be replaced with CKEditor 4.
    </textarea>
</body>


<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor1', {
        enterMode: CKEDITOR.ENTER_BR,
        // Pressing Shift+Enter will create a new <p> element.
        shiftEnterMode: CKEDITOR.ENTER_BR,
        filebrowserUploadUrl: "<?= base_url('Home/uploads')?>"
    });
</script>



</html>