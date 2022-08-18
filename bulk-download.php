<?php

if(isset($_POST['download'])){

    $geturls = $_POST["bulkURL"];
    
    if(empty($geturls)){
        header('location: /bulk-youtube-thumbnail-downloader');
    }
    
    $urls = array_values(array_filter(explode(PHP_EOL, $geturls)));
    
    for($i=0;$i<count($urls);$i++){
        
        if(strpos($urls[$i],"youtu.be")==true){
		    $split=explode("https://youtu.be/", $urls[$i]);
		    $video_id[$i]=$split[1];

		}
		else{
		 	$split=explode("v=", $urls[$i]);
		    $video_id[$i]=$split[1];
		}
	    $split=NULL;
    }
    
}else{
    header('location:/bulk-youtube-thumbnail-downloader');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="dns-prefetch" href="//stackpath.bootstrapcdn.com" />
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />
    <link rel="dns-prefetch" href="//code.jquery.com" />
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <link rel="dns-prefetch" href="//i.ytimg.com" />
    <link rel="dns-prefetch" href="//img.youtube.com" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link rel="stylesheet" href="assets/y2img.css"/>
    <title>Download YouTube Thumbnail in Bulk</title>
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="icon" type="image/png" href="favicon.png">
  </head>
<body>
<?php include "includes/header.php";?>
<div class="container mt-3 mb-3">
<div class="row mx-auto">

</div>
    
	<?php
	
	for($i=0;$i<count($video_id);$i++){
	    $tcount = $i+1;
	 echo '<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="https://i.ytimg.com/vi/'.$video_id[$i].'/mqdefault.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">'.$tcount.'. Thumbnail</h5>
        <p><a href="saver.php?url=https://i.ytimg.com/vi/'.$video_id[$i].'/maxresdefault.jpg"><button class="btn btn-info">Download HD</button></a> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#timg'.$tcount.'">Preview</button></p>
        <h6 style="font-size:1.2em">Others Quality</h6>
        <p>
        
        <a href="saver.php?url=https://i.ytimg.com/vi/'.$video_id[$i].'/maxresdefault.jpg"><button class="btn btn-sm btn-primary">1280x720</button></a>
        <a href="saver.php?url=https://i.ytimg.com/vi/'.$video_id[$i].'/sddefault.jpg"><button class="btn btn-sm btn-success">640x480</button></a>
        
        <a href="saver.php?url=https://i.ytimg.com/vi/'.$video_id[$i].'/hqdefault.jpg"><button class="btn btn-sm btn-danger">480x360</button></a>
        
        <a href="saver.php?url=https://i.ytimg.com/vi/'.$video_id[$i].'/mqdefault.jpg"><button class="btn btn-sm btn-warning">320x180</button></a>
        
        <a href="saver.php?url=https://i.ytimg.com/vi/'.$video_id[$i].'/default.jpg"><button class="btn btn-sm btn-info">120x90</button></a>
        
        
        
        </p>
      </div>
    </div>
  </div>
</div>';

echo '<div class="modal" id="timg'.$tcount.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Preview Your Thumbnail</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body d-block mx-auto">
        <img src="https://img.youtube.com/vi/'.$video_id[$i].'/maxresdefault.jpg" class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>';
	    
	    
	}
	
	?>
</div>

<div class="container mt-2">
    <div class="d-flex justify-content-center">
            <a href="/bulk-youtube-thumbnail-downloader"><button class="btn btn-lg btn-primary"><i class="fas fa-undo-alt "></i> DOWNLOAD AGAIN</button></a><br>
    </div>
</div>

<?php include "includes/footer.php";?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>