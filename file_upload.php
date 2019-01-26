<?php


upload();

function upload()
{
    $savePath = '/home/file_dir/uptest/'; //  upload/aaa/ 这样的相对路径也可以
    // var_dump($_FILES);
    if ($_FILES['file']['error'] >0) {
        echo "出错了，Error: " . $_FILES["file"]["error"] . "<br />";
        return ;
    }
    echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
    echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
    echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";

    // 判断当期目录下的目录是否存在该文件，不存在则创建
    if (!file_exists($savePath)) {
        @mkdir($savePath);
    }
    // 将文件上传到目录下
    move_uploaded_file($_FILES["file"]["tmp_name"],$savePath. $_FILES["file"]["name"]);
    echo "搞完了，文件存储在:". $savePat . $_FILES["file"]["name"];
}