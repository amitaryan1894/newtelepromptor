// Number Input Controls
jQuery(
    '<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>'
  ).insertAfter(".input-number input");
  jQuery(".input-number").each(function () {
    var spinner = jQuery(this),
      input = spinner.find('input[type="number"]'),
      btnUp = spinner.find(".quantity-up"),
      btnDown = spinner.find(".quantity-down"),
      min = input.attr("min"),
      max = input.attr("max");
  
    btnUp.click(function () {
      var oldValue = parseFloat(input.val());
      if (oldValue >= max) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue + 1;
      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });
  
    btnDown.click(function () {
      var oldValue = parseFloat(input.val());
      if (oldValue <= min) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue - 1;
      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });
  });

// font size script
  function owa_fontsize(fontsize){
    document.getElementById("owa_script").style.fontSize= fontsize.value+ "px";
}

// flip script
function flipstyle(){
    $("#owa_script").toggleClass('flipclass');
    var msg = $("#owa_script").val().replace(/\n/g, "");
    $("#owa_script").val(msg);
}

// script uploader
var openFile = function(event, scriptarea) {
    var input = event.target;
    var reader = new FileReader();
  
    var validExt = [ 'txt', 'TXT'];
    var ext = input.files[0].name.split('.').pop();
  
  if (validExt.indexOf(ext.toLowerCase()) == -1) {
    reader.onload = function() {
      var zip = new JSZip(reader.result);
      var doc = new window.docxtemplater().loadZip(zip);
      var text = doc.getFullText();
      var node = document.getElementById(scriptarea);
      node.innerHTML = text;
    };
    reader.readAsBinaryString(input.files[0]);
  }
  else {
    reader.onload = function (e) {
  var textArea = document.getElementById(scriptarea);
  textArea.innerHTML = e.target.result;
  };  
  reader.readAsText(input.files[0]);
  }
  };




  $(document).ready(function () {

    function loadLog() {
  
      var scr_speed = document.getElementById('owa_scrool_speed').value;
      var scr_noice = document.getElementById('owa_frequency').value;  
  
        $.ajax({
            url: "./log.html",
            cache: false,
            success: function (captured_frequence) {
  
                if(parseInt(captured_frequence) > parseInt(scr_noice)){
  
                  var y = $(window).scrollTop();   $(window).scrollTop(y+parseInt(scr_speed)); 
              }  
  
  
            }
            
        });
    }
  
    setInterval (loadLog, 50);
  
  });
  



    

