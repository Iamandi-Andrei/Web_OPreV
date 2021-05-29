function submitResult(){
	
	var xmlhttp = new XMLHttpRequest();
	var last_index = 0;

	
	document.getElementById("display-area").innerHTML=""
	
	function parse(){
		   var curr_index = xmlhttp.responseText.length;
    if (last_index == curr_index) return; // No new data
    var s = xmlhttp.responseText.substring(last_index, curr_index);
    last_index = curr_index;
		if(document.getElementById("svgg"))
			document.getElementById("svgg").innerHTML+=s;
		else
        document.getElementById("display-area").innerHTML += s;
		
		
	}
	var interval = setInterval(parse, 30);

	
	var inputs = document.getElementById("main-form").elements;
	
	var url="";
	var type="";
	var aux;
	
	function checkSelected(inp){
		var j;
		for(j=0;j<inp.options.length;j++)
			if(inp.options[j].selected==true)
				return 1;
			
		return 0;
		
	}
	
	for(i=0;i<inputs.length;i++){
		if(inputs[i].name!="view"){
			if(inputs[i].name!="button"){
				if(checkSelected(inputs[i])!=0){
			url+=inputs[i].name+"=";
			aux=inputs[i];
			var opt;
			for(j=0;j<aux.options.length;j++){
				opt=aux.options[j];
				if(opt.selected==true)
				url+=opt.value+",";
				
					
				
				
				
			}
			url = url.substring(0, url.length - 1);
			url+="&";
			}
			
			}
			
		}
		else {
			aux=inputs[i];
			type=aux.options[aux.selectedIndex].value;}
	}
	url = url.substring(0, url.length - 1);
	

	var finalUrl="./../api/views/"+type+".php?"+url;
	//document.getElementById("display-area").innerHTML=finalUrl;
	xmlhttp.open("GET", finalUrl, true);
		document.getElementById("display-area").innerHTML=finalUrl;
    xmlhttp.send();


	
	
	
		
	
	
	
	
}