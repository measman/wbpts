
<?php 
// Get Project path
define('_PATH', dirname(__FILE__));

// Unzip selected zip file
if(isset($_POST['upload']) && isset($_FILES['shpfiles'])){
 $filename = $_FILES['shpfiles']['name'];

 // Get file extension
 $ext = pathinfo($filename, PATHINFO_EXTENSION);

 $valid_ext = array('zip');

 // Check extension
 if(in_array(strtolower($ext),$valid_ext)){
  $tmp_name = $_FILES['shpfiles']['tmp_name'];
// print_r( $_FILES);
  $zip = new ZipArchive;
  $res = $zip->open($tmp_name);
  if ($res === TRUE) {

   // Unzip path
   $path = _PATH."/shpfiles/";

   // Extract file
   $zip->extractTo($path);
   $zip->close();

   echo 'Unzip! success!';
  } else {
   echo 'failed!';
  }
 }else{
  echo 'Invalid file';
 }
 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>File Uploader</title>        
        <style>
            /* Style for demo, not required */
            body { font-size: 62.5%; margin: 50px; }
            fieldset { padding: .6em 0;border:0;border-top: 1px dotted #ddd; }
            legend { font-size: 1.5em; font-weight: bold; color: #555; padding: .5em 1em .5em 0; background: #fff;  }
            label { font-size: 1.4em; display: block; margin: .5em 10px .5em 0;  }
            input#convert { padding: .4em 1.2em;border: 1px solid #aaa; color: #222; font-size: 1.2em; font-weight: bold; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; cursor: pointer; margin: 2em 0; }
            input#convert:hover { background: #eee; color: #111; border-color:#777; }
            #loading{display: none;}
        </style>
		 <link rel="stylesheet" href="style.css">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body> 
        
    <!-- realistic form attributes: <form action="#" method="post" enctype="multipart/form-data"> -->
    <div class="container">
<div class="row" style="margin:auto 200px;"> 
      
	<form id="convert_form" action="" method="POST" enctype='multipart/form-data'>
  		<legend>Web Based Projection Transformation System</legend>
  		<div class="row" style="border:1px solid #000; padding:100px;">
  		<input type="file" id="flup" name="shpfiles" onchange="getfolder(event)"/> <input type="submit" name="upload" value="Upload" />
		</div>
	</br>
		<label for="filename">File Name</label>
			<!-- <select multiple class="form-control" id="filename"> -->
			<select  id="filename">
			<?php
			$dir    = 'D:\xampp\htdocs\wbpts\shpfiles';
					
			$files = scandir($dir, 1);
			//$shpfiles_list = new array();
			$shpfiles_list=array();
			foreach ($files as $key => $value) {
				$shp_ext = explode (".", $value);  
				//print_r($shp_ext);
				if ($shp_ext[1]!="" && $shp_ext[1]=="shp") { 
				echo "<option value=\"".$shp_ext[0]."\">".$shp_ext[0].".shp</option>"; 
				// array_push($shpfiles_list,$shp_ext[0]); 
				}
				
			}
			?>
			</select>

</br>
		
		<label for="from_srid">Projection From</label>
		
			<select id="from_srid">            	
                 <option value="4326">WGS 1984</option>
                 <option value="32645">WGS 1984 UTM Zone 45N</option>
                 <option value="432644">WGS 1984 UTM Zone 44N</option>
                 <option value="900913">Google Projection</option>
                 <option value="910006">Everest 1830</option>
                 <option value="910000">MUTM 81 Everest 1830</option>
                 <option value="910003">MUTM 84 Everest 1830</option>
                 <option value="910004">MUTM 87 Everest 1830</option>
                 <option value="910005">Everest Adj 1937</option>
                 <option value="910007">MUTM 81 Everest Adj 1937</option>
                 <option value="910008">MUTM 84 Everest Adj 1937</option>
                 <option value="910009">MUTM 87 Everest Adj 1937</option>
            </select></br>
            
			<label for="to_srid">Projection To</label>
	
			<select id="to_srid">            	
            	 <option value="4326">WGS 1984</option>
                 <option value="32645">WGS 1984 UTM Zone 45N</option>
                 <option value="432644">WGS 1984 UTM Zone 44N</option>
                 <option value="900913">Google Projection</option>
                 <option value="910006">Everest 1830</option>
                 <option value="910000">MUTM 81 Everest 1830</option>
                 <option value="910003">MUTM 84 Everest 1830</option>
                 <option value="910004">MUTM 87 Everest 1830</option>
                 <option value="910005">Everest Adj 1937</option>
                 <option value="910007">MUTM 81 Everest Adj 1937</option>
                 <option value="910008">MUTM 84 Everest Adj 1937</option>
                 <option value="910009">MUTM 87 Everest Adj 1937</option>
            </select></br>

			

			</br>
				<!-- <label for="path">File Path</label> -->
				<input type="text" id="path" value="<?php echo $dir."\\"; ?>" disabled hidden />
			 	<!-- <input type="file" name="file" id="file_D" webkitdirectory directory multiple />  
			 	<span><?php echo $dir."\\"; ?></span>-->
			</br>
	
			 <input type="button" name="convert" id="convert" value="Convert" /></br>
			 
</form>

   </div>
    <div class="row" style="margin:auto 200px;" id="loading_container">
		<img id="loading" src="loading.gif" width="100" /><span id="loading_msg" style="color:red"></span>
    </div>
    </div>



    
	<script type="text/javascript">

	
			function exportShp(filename){
				  	// alert(filename);
					// $("#loading").show();
					$("#loading_msg").text("Exporting Data. loading....");
					$.ajax('pg2shp.php',
						  {   type:"POST",
						  	  data: { filename : filename},
							  success: function(data) {
							  	if (data=='0') {
							  		$("#loading_msg").text('Data exported successfully!');
									// alert('Data from the server' + data);
							  	} else{
							  		alert('Data from the server' + data);
							  	}
							  	$("#loading").hide();						
							  },
							  error: function() {
								alert('There was some error performing the Export!');
							  }
						   }
						);
			}

		$(document).ready(function(){
		  $("#convert").click(function(){
		  	var from_srid = $("#from_srid").val();
			var to_srid = $("#to_srid").val();
			var path = $("#path").val();
			var filename = $("#filename").val();
		  	// alert(from_srid+to_srid+path+filename);
		  	
			// var files = <?php echo json_encode($shpfiles_list); ?>;
			// if  (!files || !files.length) {
			
			// console.log("no files");
			// }else{
			// console.log(files);
			
			$("#loading").show();
			$("#loading_msg").html("");
			$("#loading_msg").text("loading....");
					$.ajax('shp2pg.php',
						  {   type:"POST",
						  	  data: {from_srid : from_srid,to_srid : to_srid, path : path,filename : filename},
							  success: function(data) {
								$("#loading_msg").text("Data loading....");
							  	if (data=='0') {
							  		$("#loading_msg").text('Data Loaded successfully!');
									// alert('Data from the server' + data);
									exportShp(filename);
							  	} else{
							  		alert('Data from the server' + data);
							  	}
							  	// $("#loading").hide();						
							  },
							  error: function() {
								alert('There was some error performing the Data Load!');
							  }
						   }
						);
			// }
		  });		  
		  
		});
	</script>
    </body>

</html>

