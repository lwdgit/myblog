<?php 
    function fileext($filename) {    
        return strtolower(substr(strrchr($filename,'.'),1,10));    
    }  
    
    function file_exists1($file)
    {
        $file_headers = @get_headers($file);
        if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $exists = false;
        }
        else {
        $exists = true;
}       return $exists;
    }  
    function create_thumb ($src_file,$thumb_file,$t_width=80,$t_height=80) {    

        if (!file_exists1($src_file)) {echo "图片不存在!";return false;}
        if(class_exists('SaeStorage')) {
                $saeStorage = new SaeStorage();
                $saeImage = new SaeImage();
                $saeImage->setData(file_get_contents($src_file));
                $saeImage->resize($t_width, $t_height);
                $thumbname=preg_replace('/http:\/\/[^\/]*\/(.*)/i','${1}',$thumb_file); 
                return $saeStorage->write('uploads', $thumbname, $saeImage->exec());
            }    
   
        $src_info = getImageSize($src_file); 
        //如果来源图像小于或等于缩略图则拷贝源图像作为缩略图    
        if ($src_info[0] <= $t_width && $src_info[1] <= $t_height) {    
            if (!copy($src_file,$thumb_file)) {    
                return false;    
            }    
            return true;    
        }    
   
        //按比例计算缩略图大小    
        if ($src_info[0] - $t_width > $src_info[1] - $t_height) {    
            $t_height = ($t_width / $src_info[0]) * $src_info[1];    
        } else {    
            $t_width = ($t_height / $src_info[1]) * $src_info[0];    
        }    
   
        //取得文件扩展名    
        $fileext = fileext($src_file);    
   
        switch ($fileext) {    
            case 'jpg' :    
                $src_img = ImageCreateFromJPEG($src_file); break;    
            case 'png' :    
                $src_img = ImageCreateFromPNG($src_file); break;    
            case 'gif' :    
                $src_img = ImageCreateFromGIF($src_file); break;    
        }    
   
        //创建一个真彩色的缩略图像    
        $thumb_img = @ImageCreateTrueColor($t_width,$t_height);    
   
        //ImageCopyResampled函数拷贝的图像平滑度较好，优先考虑    
        if (function_exists('imagecopyresampled')) {    
            @ImageCopyResampled($thumb_img,$src_img,0,0,0,0,$t_width,$t_height,$src_info[0],$src_info[1]);    
        } else {    
            @ImageCopyResized($thumb_img,$src_img,0,0,0,0,$t_width,$t_height,$src_info[0],$src_info[1]);    
        }    
   
        //生成缩略图    
        switch ($fileext) {    
            case 'jpg' :    
                ImageJPEG($thumb_img,$thumb_file); break;    
            case 'gif' :    
                ImageGIF($thumb_img,$thumb_file); break;    
            case 'png' :    
                ImagePNG($thumb_img,$thumb_file); break;    
        }    
   
        //销毁临时图像    
        @ImageDestroy($src_img);    
        @ImageDestroy($thumb_img);    
   
        return true;    
   
    }    
 ?>
