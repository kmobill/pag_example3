<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdn.tiny.cloud/1/9ahtp79e8ypr1al3zsjg7gty6mumfotgpzftj4u5x179ng4o/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head>
    <body>
        <form action="guardar.php" method="post" name="frm">
            <textarea name="comentario">
            </textarea>
            <button type="submit" id="save">Save</button>
        </form>
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
            });
        </script>
    </body>
</html>