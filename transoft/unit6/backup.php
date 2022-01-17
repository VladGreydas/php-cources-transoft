<?php
//task1
$directory = __DIR__;
$upload_files = scandir($upload_dir);

if(!file_exists('Backup')){
        mkdir("Backup");
}
for($i = 2; $i < count($upload_files); $i++){
    if(preg_match('/\.[a-z]+$/', $upload_files[$i]) === 1){
        $currentTime = time();
        if($currentTime - filectime('upload/'.$upload_files[$i]) >= 72){
            copy('upload/'.$upload_files[$i], "Backup/".$upload_files[$i]);
            unlink('upload/'.$upload_files[$i]);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <body>
        <a href="javascript:history.go(-1)">Back</a>
    </body>
</html>