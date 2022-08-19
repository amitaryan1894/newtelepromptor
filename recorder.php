<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="generator" content="Owaschool Teleproptor"> 
<title>Owaschool Teleproptor</title>
<link rel="stylesheet" type='text/css' href="./css/style.css">
</head>
<body>
<script src="./js/jquery.min.js"> </script> 
<script src="./js/popper.min.js"> </script> 
<script src="./js/mustache.min.js"> </script> 
<script src="./js/recordscript.js"> </script>   

</body>
</html>

<div class="headr"><a href="index.php" class="recbtn">Home</a></div>

<div id="content">
<!--   <input type="file" id="thefile" accept="audio/*" /> -->
  <canvas id="canvas"></canvas>
<!--   <audio id="audio" controls></audio> -->
</div>
    


<script>
window.onload = function() {

  navigator.mediaDevices
    .getUserMedia({ audio: true, video: false })
    .then(function(stream) {
      var context = new AudioContext();
      var gainNode = context.createGain();

      var src = context.createMediaStreamSource(stream);
      src.connect(gainNode);
      gainNode.connect(context.destination);
    
      gainNode.gain.setTargetAtTime(0, context.currentTime, 0);

      var analyser = context.createAnalyser();

      var canvas = document.getElementById("canvas");
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      var ctx = canvas.getContext("2d");

      src.connect(analyser);
      gainNode.connect(analyser);
      var WIDTH = canvas.width;
      var HEIGHT = canvas.height;
     analyser.fftSize = 64;
      var bufferLength = 50;
      //var bufferLength = analyser.frequencyBinCount;
      console.log(bufferLength);
      var dataArray = new Uint8Array(bufferLength);
      var barWidth = WIDTH / bufferLength * 2.5;
      var barHeight;
      var x = 0;
   
      function renderFrame() {


var maxfriquenc = Math.max(...dataArray) // 4

        $.post("./post.php", { text: maxfriquenc });
        

        requestAnimationFrame(renderFrame);
        x = 0;
        analyser.getByteFrequencyData(dataArray);
        ctx.fillStyle = "#000";
        ctx.fillRect(0, 0, WIDTH, HEIGHT);
        for (var i = 0; i < bufferLength; i++) {
          barHeight = dataArray[i];
          var r = barHeight + 25 * (i / bufferLength);
          var g = 250 * (i / bufferLength);
          var b = 50;
          ctx.fillStyle = "rgb(" + r + "," + g + "," + b + ")";
          ctx.fillRect(x, HEIGHT-barHeight, barWidth, barHeight);
          x += barWidth + 1;
        }
      }
      renderFrame();
          
    })
    .catch(function(err) {
      console.log("error:");
      console.log(err);
      });
};

</script>
    
