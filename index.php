<?php
$count = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$files = glob('upload/*');
    //$files = glob('path/to/temp/*'); // get all file names
foreach($files as $file){ // iterate files
 // if(is_file($file))
    unlink($file); // delete file
}
    foreach ($_FILES['files']['name'] as $i => $name) {
        if (strlen($_FILES['files']['name'][$i]) > 1) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], 'upload/'.$name)) {
                $count++;
            }
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>FILES UPLOAD</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            a{
                text-decoration: none;
                color: #333;
            }
            body {
                text-align:center;
                background-color:#1E1E1E;
                font-family:Arial, Helvetica, sans-serif;
                font-size:98%;
/*                color:#666;*/
            }
            .wrap {
                background: #f3f8fb;
                width:730px;
                margin:30px auto;
                /*border: 4px dashed #61b3de;*/
                border-radius:4px;
                padding: 60px 5px;
				font-weight: bold;
            }
            h1 {
                /*font-family:Georgia, "Times New Roman", Times, serif;*/
                /*font-family:Arial, Helvetica, sans-serif;*/
                
                font-weight: normal;
                font-size: 27px;
                color: #ccc;
                font-family: sans-serif;
                font-weight:100;

            }	
            .button {
                border-radius: 10px;
                background-color: #61b3de;
                border: 0;
                color: #fff;
                font-weight: bold;
                font-style: italic;
                padding: 6px 15px 5px;
                cursor: pointer;
            }
            input[type="file"]{
               /* color: transparent;*/
            }
            input[type="submit"]:hover,:focus{  
                background-position:100px;
            }  
            .msg{
                background: #ddeff8;
                padding: 5px;
                margin-bottom: 15px;
                border: #61b3de dotted 1px;
            }
            .copy{
                margin-top: 20px;
                clear: both;
            }
            .hed
            {
               margin-top: 2px; 
            }
            .log{
                margin-top: 24px;
                margin-left: -591px;
            }
            .lin{
                margin-top: -35px
            }
			#admin_footer {
    color: #fff;
    background: #204562;
    border-top: 1px solid #1d3b53;
    padding-left: 20px;
    /* margin-top: 602px; */
    height: 40px;
    line-height: 35px;
    margin-bottom: 0px;
    font-weight: normal;
}
        </style>
    </head>
    <body>
	  <div class="hed">  
             <div  id="admin_footer" style=" margin-top: -1px;margin-left: -80px;">FILES UPLOAD FROM A FOLDER  </div>
        <div style=" margin-top: 100px;"  ><h1></h1></div></div>
        <div class="wrap">
            <?php
            if ($count > 0) {
                echo "<p class='msg'>{$count} files uploaded</p>\n\n";
            }
            ?>
            <!--<h1>Folder Upload</h1>-->
            <form method="post" enctype="multipart/form-data">
			<label for="file">Choose A Folder: </label>
                <input type="file" name="files[]" id="files" multiple="" directory="" webkitdirectory="" mozdirectory="">
                <input class="button" type="submit" value="Upload" />
            </form>
        </div>
		
          
 <div  id="admin_footer" style=" margin-top: 378px;margin-left: -1180px;">Copyright By BackPacker @ All Rights Reserved. </div>
    </body>
</html>