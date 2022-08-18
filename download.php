<?php
$url=$_POST['url'];

$parse = parse_url($url);
$host = $parse['host'];


if(isset($_POST['download'])){		
    
       if($host == 'www.youtube.com' || $host == 'youtu.be' || $host == 'm.youtube.com'){
            if(strpos($url,"youtu.be")==true){
		    $split=explode("https://youtu.be/", $url);
		    $video_id=$split[1];
		}
		else{
		 	$split=explode("v=", $url);
		    $video_id=$split[1];
		}
           
    }
    else{
            header('location:/');

    }

        $img120x90="https://img.youtube.com/vi/".$video_id."/default.jpg";
		$img320x180="https://img.youtube.com/vi/".$video_id."/mqdefault.jpg";
		$img480x360="https://i3.ytimg.com/vi/".$video_id."/hqdefault.jpg";
		$img640x480="https://img.youtube.com/vi/".$video_id."/sddefault.jpg";
		$img1280x720="https://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";
}
else{
   if(!$video_id){
    header('location:/');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link rel="stylesheet" href="assets/y2img.css"/>
    <title>Download Your Thumbnail Now!</title>
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="icon" type="image/png" href="favicon.png">
  </head>
<body>
<?php include "includes/header.php";?>
<div class="container mt-3 mb-3">
<div class="row">
	<div class="col-sm-3">
		<div class="card">
			<div class="card-header text-white bg-jumbo">High Quality (1280x720)</div>
			<div class="card-body"> <img src="<?php echo $img1280x720;?>" alt="" width="200" height="150"> </div>
			<div class="card-footer">
			    <p><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#img1280x720">Preview</button>
                <a href="saver?url=<?php echo $img1280x720;?>"><button class="btn btn-info">Download</button></a> 
                </p>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
			<div class="card-header text-white bg-jumbo">Medium Quality (640x480)</div>
			<div class="card-body"> <img src="<?php echo $img640x480;?>" width="200" height="150"> </div>
			<div class="card-footer">
			    <p><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#img640x480">Preview</button>
                <a href="saver.php?url=<?php echo $img640x480;?>"><button class="btn btn-info">Download</button></a> </p>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
			<div class="card-header text-white bg-jumbo">Normal Quality (480x360)</div>
			<div class="card-body"> <img src="<?php echo $img480x360;?>" alt="" width="200" height="150"> </div>
			<div class="card-footer">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#img480x360">Preview</button>
            <!-- DOWNLOAD Button -->
            <a href="saver.php?url=<?php echo $img480x360;?>"><button class="btn btn-info">Download</button></a> 
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
			<div class="card-header text-white bg-jumbo">Default Quality (320x180)</div>
			<div class="card-body"> <img src="<?php echo $img320x180;?>" alt="" width="200" height="150"> </div>
			<div class="card-footer">
			    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#img320x180">Preview</button>
			    <!-- DOWNLOAD Button -->
                <a href="saver.php?url=<?php echo $img320x180;?>"><button class="btn btn-info">Download</button></a> 
			</div>
		</div>
	</div>
	</div>
</div>

<div class="container mt-2">
    <div class="d-flex justify-content-center">
            <a href="/"><button class="btn btn-lg btn-primary"><i class="fas fa-undo-alt "></i> DOWNLOAD AGAIN</button></a><br>
    </div>
</div>

<!--- HQ 1280x720------>
<div class="modal" id="img1280x720">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">High Quality (1280x720)</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body d-block mx-auto">
        <img src="<?php echo $img1280x720;?>" class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End --->

<!--- Medium Quality ------>
<div class="modal" id="img640x480">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Medium Quality (640x480)</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body d-block mx-auto">
        <img src="<?php echo $img640x480;?>" class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End --->

<!--- Normal Quality ------>
<div class="modal" id="img480x360">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Normal Quality (480x360)</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body  d-block mx-auto">
        <img src="<?php echo $img480x360;?>" class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End --->

<!--- Default Quality ------>
<div class="modal" id="img320x180">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Quality (320x180)</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body  d-block mx-auto">
        <img src="<?php echo $img320x180;?>" class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End --->
<?php include "includes/footer.php";?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>