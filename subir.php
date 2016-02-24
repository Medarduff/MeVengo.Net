

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="http://malsup.github.com/jquery.form.js"></script>    
<script type="text/javascript">
$(document).ready(function() { 

    var bar = $('.barra_progreso');
    var percent = $('.porcentaje_progreso');
    var status = $('#status');

    $('form').ajaxForm({
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(err || statusText);
        }
		
		
    });
}); 

</script>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />

</head>

<style >
.barra_progreso{
	background-color: #B4F5B4;
	width: 0%;
	height: 25px;
	border-radius: 3px;
}

.cuadro_progreso {
	width: 40%;
    float: left;
    position: relative;
    border: 1px solid #ddd;
    padding: 1px;
    border-radius: 3px;
}
.porcentaje_progreso{
	position: absolute;
	display: inline-block;
	top: 3px;
	left: 48%;
}

</style>
<body>


<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Selecciona un archivo a subir: <input name="file" type="file" /> &nbsp;
<input type="submit" value="Subir" /></form>




<br/>

<div class="cuadro_progreso">
    <div class="barra_progreso"></div >
    <div class="porcentaje_progreso">0%</div >
</div>

<?php 

if (!empty($_FILES["file"]))
{
	
    if ($_FILES["file"]["error"] > 0)
       {echo "Error: " . $_FILES["file"]["error"] . "<br>";}
    else
       {
	   
	   $file_tmp =$_FILES['file']['tmp_name'];
	   $file_name = $_FILES['file']['name'];
       move_uploaded_file($file_tmp,"archivos/".$file_name);
       }
}

    
	
	?>

