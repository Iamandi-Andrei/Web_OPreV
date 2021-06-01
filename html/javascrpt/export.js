function download_csv(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV FILE
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // We have to create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Make sure that the link is not displayed
    downloadLink.style.display = "none";

    // Add the link to your DOM
    document.body.appendChild(downloadLink);

    downloadLink.click();
}

function export_table_to_csv(html, filename) {
	var csv = [];
	var rows = document.querySelectorAll("table tr");
	
    for (var i = 0; i < rows.length; i++) {
		var row = [], cols = rows[i].querySelectorAll("td, th");
		
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
		csv.push(row.join(","));		
	}

    // Download CSV
    download_csv(csv.join("\n"), filename);
}

function toPNG() {
    var png2;
    var svgString = new XMLSerializer().serializeToString(document.getElementById('svgg'));

    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    var DOMURL = self.URL || self.webkitURL || self;
    var img = new Image();
    var svg = new Blob([svgString], {type: "image/svg+xml;charset=utf-8"});
    var url = DOMURL.createObjectURL(svg);
    img.onload = function() {
        ctx.drawImage(img, 0, 0);
        var png = canvas.toDataURL("image/png");
        document.getElementById('png').innerHTML = '<img id="exp" src="'+png+'"/>';
        DOMURL.revokeObjectURL(png);
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = "representation.png";

        // We have to create a link to the file
        var c = document.getElementById("canvas");
        downloadLink.href = document.getElementById("exp").getAttribute("src");//c.toDataURL("image/png");

        // Make sure that the link is not displayed
        downloadLink.style.display = "none";

        // Add the link to your DOM
        document.body.appendChild(downloadLink);

        downloadLink.click();
    };
    img.src = url;
    //return document.getElementById("exp").getAttribute("src");
}

function download(url) {
    //url = "http://localhost/Web_OPreV/";
    var export_type = document.getElementById("export").value;
    if (export_type == "CSV") {
        var html = document.querySelector("table").outerHTML;
	    export_table_to_csv(html, "table.csv");
    }

    if (export_type == "SVG") {
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = "representation.svg";

        // We have to create a link to the file
        //document.getElementById("display-area").innerHTML = url + "api/views/representation.svg";
        downloadLink.href = url + "api/views/representation.svg";

        // Make sure that the link is not displayed
        downloadLink.style.display = "none";

        // Add the link to your DOM
        document.body.appendChild(downloadLink);

        downloadLink.click();
    }

    if (export_type == "PNG") {
        toPNG();
    }
}
