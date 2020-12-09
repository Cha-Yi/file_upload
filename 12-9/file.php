<?php
    if (isset($_FILES['file'])) {

        // 允许上传的图片后缀
        $allowedfile = array("pdf", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
 
        $extension = end($temp);     // 获取文件后缀名
        if ((($_FILES["file"]["type"] == "image/pdf") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png")) && in_array($extension, $allowedfile) && ($_FILES["file"]["size"] < 204800))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "错误：: " . $_FILES["file"]["error"] . "<br>";
            }
            else
            {
                // echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
                // echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
                // echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                // echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
                
                // 判断当前目录下的 upload 目录是否存在该文件
                // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
                if (file_exists("upload/" . $_FILES["file"]["name"]))
                {
                    echo $_FILES["file"]["name"] . " 文件已经存在。 ";
                }
                else
                {
                    // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                    //将文件临时文件存储在 upload
                    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                    echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
                    $data['name'] = $_FILES["file"]["name"];
                    $data['size'] = $_FILES["file"]["size"];
                    $data['time'] = time();

                    $link = mysqli_connect($host='127.0.0.1',$user='root',$pas='root123',$db='file');
                    mysqli_query($link,'set name utf8');
                    $name = $data['name'];
                    $size = $data['size'];
                    $time = $data['time'];
                    $sql = " insert into files(`name`,`size`,`time`)values('$name','$size','$time')";
                    $row = mysqli_query($link,$sql);
                    
                }
            }
        }
        else
        {
            echo "文件格式错误";
        }
    }

    function show()
    {
        $link = mysqli_connect($host='127.0.0.1',$user='root',$pas='root123',$db='file');
        mysqli_query($link,'set name utf8');
        $sql = "SELECT * from files order by id DESC";
        
        $row = mysqli_query($link,$sql);
        $array = [];
            while ($res = mysqli_fetch_assoc($row)) {
                $array[] = $res;
            }
            return $array;
    }

    $listarr = show();

    include('file.html');
?>