function optionFunction(){
	
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("country").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "./../html/javascrpt/getOptions.php?filter=country", true);
    xmlhttp.send();
	
	
	
		var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("year").innerHTML = this.responseText;
      }
    };
    xmlhttp2.open("GET", "./../html/javascrpt/getOptions.php?filter=year", true);
    xmlhttp2.send();
	
			var xmlhttp3 = new XMLHttpRequest();
    xmlhttp3.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("age").innerHTML = this.responseText;
      }
    };
    xmlhttp3.open("GET", "./../html/javascrpt/getOptions.php?filter=age", true);
    xmlhttp3.send();
	
				var xmlhttp4 = new XMLHttpRequest();
    xmlhttp4.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("BMI_type").innerHTML = this.responseText;
      }
    };
    xmlhttp4.open("GET", "./../html/javascrpt/getOptions.php?filter=BMI_type", true);
    xmlhttp4.send();
	
				var xmlhttp5 = new XMLHttpRequest();
    xmlhttp5.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("gender").innerHTML = this.responseText;
      }
    };
    xmlhttp5.open("GET", "./../html/javascrpt/getOptions.php?filter=gender", true);
    xmlhttp5.send();
	
	
	
	
}