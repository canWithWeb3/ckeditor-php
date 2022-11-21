<?php 
    if(isset($_FILES["upload"]["name"])){
        $dosya = $_FILES["upload"]["tmp_name"];
        $dosyaadi = $_FILES["upload"]["name"];
        $dosyaadi_array = explode(".",$dosyaadi);
        $yeni = end($dosyaadi_array);
        $resim_yeni = rand().".".$yeni;
        chmod("../upload/img/",0777);
        $kabul = array("jpg","gif","png","jpeg");
        if(in_array($yeni,$kabul)){
            move_uploaded_file($dosya,"../upload/img/".$resim_yeni);
            $fonksiyon_numarasi = $_GET["CKEditorFuncNum"];
            $url = "../upload/img/".$resim_yeni;
            $mesaj = "";
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($fonksiyon_numarasi,'$url','$mesaj');</script>";
        }
    }
?>

<!-- ckeditor -->
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace("description", {
        height: 200,
        filebrowserUploadUrl: "upload.php"
    })
</script>