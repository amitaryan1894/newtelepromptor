
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="generator" content="Owaschool Teleproptor"> 
<title>Owaschool Teleproptor</title>
<link rel="stylesheet" type='text/css' href="./css/style.css">
<script src="./js/jquery.min.js"> </script> 
</head>
<body> 

<h1><div class="dashFooterBtn"><label for="show-foot">Settings</label></div><a href="https://www.youtube.com/owaschool">How to use this Telemproptor Software click here to watch  </a><a href="recorder.php" class="recbtn">Recording</a></h1>

    





<div id="owa_script" class="owa_script"></div>







    <footer class="dashFooterBox">
  <div class="dashFooterBoxInner">
    <input type="checkbox" id="show-foot" name="show-the-footer" class="r-foot-check">
    <nav class="dashFooter">
      <div class="default-width">
        <div class="dashFooterInner">
          <ul class="footNavUL">
              
              <div class="quantities">
                <div class="amitaryan ">
                  <input type="file"  onchange="openFile(event, 'owa_script')">
                </div>
                 <div class="input-number owafontsize">
                  <input  onchange="owa_fontsize(this)"  placeholder="Width" type="number" min="1" max=500 step="any" value="40">
                </div>
                <div class="input-number owanoice">
                  <input id="owa_frequency"  placeholder="Height" type="number" min="1" max=1000 step="any" value="200" >
                </div>
                <div class="input-number owaspeed">
                  <input id="owa_scrool_speed" placeholder="Height" type="number" min="1" max=60 step="any" value="2" >
                </div>
                <div class="amitaryan ">
                <input value="flip Text" type="button" onclick="flipstyle()" >   
              </div>

              </div>
          </ul>
        </div>
      </div>
    </nav>
    </div></footer>   




<script src="./js/docxtemplater.js"> </script> 
<script src="./js/jszip.js"> </script> 
<script src="./js/readscript.js"> </script>  


</body>
</html>