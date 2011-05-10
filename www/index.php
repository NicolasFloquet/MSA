<html>
	
	<head>
			
			<script type="text/javascript">
				var t;
				
				function getStatus(){
					if(window.XMLHttpRequest) { // Code for IE7+, Firefox, Chrome, Opera & Safari
						xmlhttp=new XMLHttpRequest();
					}
					else { // Code for IE < 7
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					
					xmlhttp.onreadystatechange=function() {
						if(xmlhttp.readyState==4 && xmlhttp.status==200) {
							xmlDoc=xmlhttp.responseXML;
							txt="Server is "
						
							status=xmlDoc.getElementsByTagName("status")[0].textContent;
							if(status=="ONLINE"){
								txt=txt+'<span style="color:green">ONLINE</span>';
							}
							else{
								txt=txt+'<span style="color:red">OFFLINE</span>';
							}
							document.getElementById("serverStatus").innerHTML=txt;

							document.getElementById("commandStatus").innerHTML=xmlDoc.getElementsByTagName("command")[0].textContent;

						}
					}
					xmlhttp.open("GET","backend.php?q=1");
					xmlhttp.send();
				}

				function getCommandStatus(){
					if(window.XMLHttpRequest) { // Code for IE7+, Firefox, Chrome, Opera & Safari
						xmlhttp=new XMLHttpRequest();
					}
					else { // Code for IE < 7
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					
					xmlhttp.onreadystatechange=function() {
						if(xmlhttp.readyState==4 && xmlhttp.status==200) {
							document.getElementById("commandStatus").innerHTML=xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","backend.php?q=0");
					xmlhttp.send();
					getStatus();
				}

				function ServerCmd(cmd){
					if(window.XMLHttpRequest) { // Code for IE7+, Firefox, Chrome, Opera & Safari
						xmlhttp=new XMLHttpRequest();
					}
					else { // Code for IE < 7
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.open("GET","backend.php?q="+cmd);
					xmlhttp.send();
				}
				
				function startTimer() {
					getStatus();
					t = setTimeout("startTimer()", 5000);
				}
				document.onload = startTimer();
				
			</script>
	</head>
	
	<body>
		<fieldset>
		<legend>Server status</legend>
 
			<a id="serverStatus"></a>
			<button type="startButton" onclick="ServerCmd(2)">Start server</button>	
			<button type="backupButton" onclick="ServerCmd(3)">Stop server</button>
			<button type="backupButton" onclick="ServerCmd(4)">Restart server</button>

		</fieldset>

		<fieldset>
		<legend>Backup</legend>

			<a id="backupStatus"></a>
			<button type="backupButton" onclick="ServerCmd(5)">Launch backup</button>

		</fieldset>

		<fieldset>
		<legend>Cartography</legend>

			<a id="cartoStatus"></a>
			<button type="cartoButton" onclick="ServerCmd(6)">Launch cartography</button>
			<a href="images/map.png" target=popup onclick="window.open('','popup','width=600,height=600,location=no,left=0,top=0,scrollbars=1')"><b>View Carto</b></a>
		
		</fieldset>

		<fieldset>
		<legend>Commands</legend>	
			<a id="commandStatus"></a>
		</fieldset>
	</body>
	
</html>
