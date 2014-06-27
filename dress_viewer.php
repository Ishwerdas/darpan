<?php
  include 'db_connect.php';
  $name=$_FILES["file"]["name"];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="css/heading.css" />
   
 <script src="js/fabric.min.js"></script>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-7243260-2']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      }
      )();
   </script>
    
  </head>
  
  <body>
  <div id="container1">
  <canvas id="c" width="700" height="700" style="border: 1px solid black";></canvas>
  <!-- file upload form -->
<p><strong>File upload:</strong></p>

<menu id="control">
<form method="post" enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="Upload">
</form>
</menu>
</div>

<script type="text/javascript">
      
      canvas = this.__canvas = new fabric.Canvas('c');
   
      function setBG(name) {
     
     // var img = '<?php echo $name; ?>';
      var pathtoimage = "customer/"+"<?php echo $name; ?>";
      canvas.setBackgroundImage(pathtoimage, canvas.renderAll.bind(canvas), {
        // Needed to position backgroundImage at 0/0
        originX: 'left',
        originY: 'top'
      });
      canvas.add(pathtoimage);
    };

    function drawCanvas(path) {

var $ = function(id){return document.getElementById(id)};
//  var canvas = this.__canvas = new fabric.Canvas('c');
    
  fabric.Image.fromURL(path, function(oImg) {
     oImg.set({
  top: 100,
      left: 100,
  });
 // canvas.setBackgroundImage('customer/1.png', canvas.renderAll.bind(canvas));                
  canvas.add(oImg);
  canvas.bringForward(oImg);

  var angleControl = $('angle-control');
  angleControl.onchange = function() {
    oImg.setAngle(parseInt(this.value, 10)).setCoords();
    canvas.renderAll();
  };

  var scaleControl = $('scale-control');
  scaleControl.onchange = function() {
    oImg.scale(parseFloat(this.value)).setCoords();
    canvas.renderAll();
  };

  var topControl = $('top-control');
  topControl.onchange = function() {
    oImg.setTop(parseInt(this.value, 10)).setCoords();
    canvas.renderAll();
  };

  var leftControl = $('left-control');
  leftControl.onchange = function() {
    oImg.setLeft(parseInt(this.value, 10)).setCoords();
    canvas.renderAll();
  };

  function updateControls() {
    scaleControl.value = oImg.getScaleX();
    angleControl.value = oImg.getAngle();
    leftControl.value = oImg.getLeft();
    topControl.value = oImg.getTop();
  }
  canvas.on({
    'object:moving': updateControls,
    'object:scaling': updateControls,
    'object:resizing': updateControls,
    'object:rotating': updateControls
  });
});};

</script>



<div>
<?php

$uploaddir = 'customer/';

 if ($_POST['submit'])
{
 if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  }
  else {
    if (file_exists($uploaddir . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    }
    else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $uploaddir . $_FILES["file"]["name"]);
      echo " and file has been Uploaded to: " . $uploaddir;
    }
  }
?>

<!--<script type="text/javascript">
var pathtoimage = '<?php // echo $uploaddir. "1.png" ?>';
var canvas = this.__canvas = new fabric.Canvas('c');

canvas.setBackgroundImage(pathtoimage, canvas.renderAll.bind(canvas), {
  // Needed to position backgroundImage at 0/0
  originX: 'left',
  originY: 'top'
});
canvas.add(pathtoimage);

</script>-->
<?php

}
echo '<script type="text/javascript"> setBG(name); </script>';
?>
</div>

    <div class="controls">

  <p>
    <label><span>Angle:</span> <input type="range" id="angle-control" value="0" min="-90" max="90"></label>
  </p>
  <p>
    <label><span>Left:</span> <input type="range" id="left-control" value="150" min="0" max="300"></label>
  </p>
  <p>
    <label><span>Top:</span> <input type="range" id="top-control" value="150" min="0" max="300"></label>
  </p>
  <p>
    <label><span>Scale:</span> <input type="range" id="scale-control" value="1" min="0.1" max="3" step="0.1"></label>
  </p>
</div>
    <div class="container">
      <header class="clearfix">
        <h1>
          Select Dresses
        </h1>
      </header>
      <div id="tabs" class="tabs">
        <nav>
          <ul>
            <li>
              <a href="#section-1">
                <span>
                  Dress-Type1
                </span>
              </a>
            </li>
            <li>
              <a href="#section-2">
                <span>
                  Dress-Type2
                </span>
              </a>
            </li>
            <li>
              <a href="#section-3">
                <span>
                  Dress-Type3
                </span>
              </a>
            </li>
            <li>
              <a href="#section-4">
                <span>
                  Dress-Type4
                </span>
              </a>
            </li>
          </ul>
        </nav>
        <div class="content">
          
          <section id="section-1">
            <div class="mediabox">
              <?php
               $result = mysql_query("SELECT * FROM dresses WHERE dress_category=1");
               while ($row = mysql_fetch_array($result)) {
               $path = "dresses/".$row{'dress_name'}.".png";
               ?>
		<img onclick="drawCanvas('<?php echo $path;?>');" src ="<?php echo $path;?>"><br>
		<?php
               }
             ?>    
            </div>                                
          </section>
  
          <section id="section-2">
            <div class="mediabox">              
               <?php
                $result = mysql_query("SELECT * FROM dresses WHERE dress_category=2");
                while ($row = mysql_fetch_array($result)) {
		$path = "dresses/".$row{'dress_name'}.".png";
		?>
		<img onclick="drawCanvas('<?php echo $path;?>');" src ="<?php echo $path;?>"><br>
		<?php
                }
                ?>                        
             </div>
          </section>

            <section id="section-3">
              <div class="mediabox">                                
                 <?php
                  $result = mysql_query("SELECT * FROM dresses WHERE dress_category=3");
                  while ($row = mysql_fetch_array($result)) {
                  $path = "dresses/".$row{'dress_name'}.".png";
                  ?>
		<img onclick="drawCanvas('<?php echo $path;?>');" src ="<?php echo $path;?>"><br>
		<?php
                  }
                 ?>                                                 
               </div>
             </section>
                      
             <section id="section-4">
               <div class="mediabox">          
                  <?php
                   $result = mysql_query("SELECT * FROM dresses WHERE dress_category=4");
                   while ($row = mysql_fetch_array($result)) {
                   $path = "dresses/".$row{'dress_name'}.".png";
                   ?>
		<img onclick="drawCanvas('<?php echo $path;?>');" src ="<?php echo $path;?>"><br>
		<?php
                   }
                  ?>                                                  
               </div>
             </section>
                      
        </div><!-- /content -->
    </div><!-- /tabs -->
    </div>
    <script src = "js/tab.js">
    </script>
    <script>
      new CBPFWTabs( document.getElementById( 'tabs' ) );
    </script>
    <script>


  /*  function drawCanvas(path) {


  var canvas = this.__canvas = new fabric.Canvas('c');
  fabric.Object.prototype.transparentCorners = false;

  var $ = function(id){return document.getElementById(id)};
    
  fabric.Image.fromURL(path, function(oImg) {
     oImg.set({
	top: 100,
    	left: 100,
	});
  canvas.setBackgroundImage('customer/1.png', canvas.renderAll.bind(canvas));                
  canvas.add(oImg);


  var angleControl = $('angle-control');
  angleControl.onchange = function() {
    oImg.setAngle(parseInt(this.value, 10)).setCoords();
    canvas.renderAll();
  };

  var scaleControl = $('scale-control');
  scaleControl.onchange = function() {
    oImg.scale(parseFloat(this.value)).setCoords();
    canvas.renderAll();
  };

  var topControl = $('top-control');
  topControl.onchange = function() {
    oImg.setTop(parseInt(this.value, 10)).setCoords();
    canvas.renderAll();
  };

  var leftControl = $('left-control');
  leftControl.onchange = function() {
    oImg.setLeft(parseInt(this.value, 10)).setCoords();
    canvas.renderAll();
  };

  function updateControls() {
    scaleControl.value = oImg.getScaleX();
    angleControl.value = oImg.getAngle();
    leftControl.value = oImg.getLeft();
    topControl.value = oImg.getTop();
  }
  canvas.on({
    'object:moving': updateControls,
    'object:scaling': updateControls,
    'object:resizing': updateControls,
    'object:rotating': updateControls
  });
});};*/
</script>
    
    </body>
  </html>
<?php
 mysql_close($dbhandle);
?>
