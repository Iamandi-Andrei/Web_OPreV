function getVisits() {
	var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("results").innerHTML = "There are "+this.responseText+" visits to the site.";
    }
  };
  xmlhttp.open("GET", "./../admin/visits-check.php?visit_type=visits", true);
  xmlhttp.send();
    
}

function getTable() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("results").innerHTML = "There are "+this.responseText+" searches for table.";
    }
  };
  xmlhttp.open("GET", "./../admin/visits-check.php?visit_type=table", true);
  xmlhttp.send();
}

function getLine() {
	var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("results").innerHTML = "There are "+this.responseText+" searches for line.";
    }
  };
  xmlhttp.open("GET", "./../admin/visits-check.php?visit_type=line", true);
  xmlhttp.send();
    
}

function getBar(value) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("results").innerHTML = "There are "+this.responseText+" searches for bar.";
    }
  };
  xmlhttp.open("GET", "./../admin/visits-check.php?visit_type=bar", true);
  xmlhttp.send();
}