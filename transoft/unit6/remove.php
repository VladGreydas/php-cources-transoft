<?php
//task2
$directory = __DIR__;
$upload_files = scandir($upload_dir);

for ($i = 2; $i < count($upload_files); $i++) {
    if (preg_match('/\.txt$/', $upload_files[$i]) === 1) {
        $arr = file_get_contents('upload/' . $upload_files[$i]);
        if (preg_match('/[\s]тест[\s\,\.]/', $arr) === 1) unlink('upload/' . $upload_files[$i]);
    }
}
?>
<!DOCTYPE html>
<html>

<body>
    <a href="javascript:history.go(-1)">Back</a>
</body>

</html>