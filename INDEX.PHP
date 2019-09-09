<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <title>NANO RPC</title>
  </head>
  <body>
<nav class="navbar sticky-top navbar-light bg-light">
  <div class="float-right"><i class="fas fa-sync-alt fa-spin" style="color:lightblue"></i></div>
</nav>
<div class="container-fluid text-center">
	<img src="https://media1.tenor.com/images/ba1f0536529a7447afd92358613b23ff/tenor.gif?itemid=14374455" width="50px";>
  <h1>NANO DASHBOARD</h1>
  <p>Control Nano Node with PHP</p>
<p><b>nano_1tamzxykxs5bm6zgzbdpxj6azjibwnjpze6idpmuqhw71dpmdsuo8ot3yjay</b></p>
<center>
<button data-toggle="collapse" data-target="#qr" class="btn btn-dark">QR Code</button>

<div id="qr" class="collapse">
<img style='display:block; width:100px;height:100px;' id='nano_addr'                 
       src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAAGQAQMAAAC6caSPAAAABlBMVEX///
            8AAABVwtN+AAACWElEQVR4nO2aO47DMAxECbhwmSP4KD6afTQdxUdImSIAVxQ/koLsx97dSjNNHMpP1Y
            CkKBNB0Ckt7Dryv5n3G9PypJUb5ZjrDmR05GnO4WPilBHb5qFRjeVtVBsQIFeQtdit2DJLl1dFdLVYtW
            wDBEhFJs9ZAhe31RgQIH+BdGZ8iEGZ/QkIkDeFT4J5SUogOUxf10ogQL5F2HVEI6W23O5UYy4goyOdVg
            3mbdRj8lLSDv0zARkMWdw75UedxdqDy/LksXq4AwLkJFIK38ZcxwGCiG78UgyBAPEum/XF+dVZJDHPbU
            CAXEEogqZorty0c5wHub4HZGBEHiVTkc0o3W03zW16aFOPAQFyASk1MKsdFnTbPJp5+QZkdES9U51VXv
            TCV9SNvAkIkETqohIsaWdquyfSkTfXQTcQIJcQkZY2XXczprYbZyBAynJ4bK+fBPRPU+sxIEB+jpCPl8
            yWu8bMllE//QMUAjI4svjFSeO22peb2twGBMhJJFoqa9u9kWJvs9y0vg2QsZGl/RIpmbNevlPauB8RAA
            ESd25bvYczS81xpPM8BgTIeWSLnGWnO37EtQrHd0qdLYEMi4j0+j/NTbkTHVoWmb0vBwLkNNLIRwT1Cs
            Uk2Wthv4cDMjSyhImOdljAkdvYjnQBAwFyEmnvdUmv7uzsFxvu3ROQ0ZGVfUSQ5pgpxb2ulUCO2RMQID
            FT8jGjDQasBEp6Ci8CAfIbRC1YunFb9m68/Jnf5zEggyEqP6rpiCDpdKk73FkxBALkJMKuox0RMPefCY
iS2xLIwAgE/a8+AJDlDrn664grAAAAAElFTkSuQmCC' />
</div> 
</center><br>
  <div class="row">
    <div class="col-sm-4" style="background-color:lavender;">
  		<button type="button" class="btn btn-success" onclick="ping()" > Ping cURL</button>
		<button type="button" class="btn btn-success" onclick="terminal()">TERMINAL</button>
		<button type="button" class="btn btn-success" onclick="myTest()" >TEST</button>
  	</div>
    <div class="col-sm-4" style="background-color:lavenderblush;">
  		<button type="button" class="btn btn-warning" id="version">Version</button>
		<button type="button" class="btn btn-warning" id="block_count">Block Count</button>
		<button type="button" class="btn btn-warning" id="account_history">Account History</button>
  	</div>
    <div class="col-sm-4" style="background-color:lavender;">
    	<button type="button" class="btn btn-danger" id="send">Send</button>
  	</div>

  </div>
<br>
<button data-toggle="collapse" data-target="#logBox" class="btn btn-dark">Log</button>
<div id="logBox" class="collapse">
<textarea class="form-control" rows="10" id="log"></textarea>
<button type="button" class="btn btn-warning" id="clearLog">Clear Log</button>
</div>
</div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
		
		$("#version").click(function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "/api.php",
				data: JSON.stringify({ 
				"action": "version" 
				}),
				success: function(result) {
				//alert(result);
				console.log(result);
				},
				error: function(result) {
				//alert(result);
				console.log(result);
				}
			});
		});
    
		$("#block_count").click(function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "/api.php",
				data: JSON.stringify({ 
				"action": "block_count" 
				}),
				success: function(result) {
				//alert(result);
				console.log(result);
				},
				error: function(result) {
				//alert(result);
				console.log(result);
				}
			});
		});

		$("#account_history").click(function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "/api.php",
				data: JSON.stringify({"action": "account_history",
                                      "account": "nano_1tamzxykxs5bm6zgzbdpxj6azjibwnjpze6idpmuqhw71dpmdsuo8ot3yjay",
                                      "count": "-1"}),
				success: function(result) {
				//alert(result);
				console.log(result);
				},
				error: function(result) {
				//alert(result);
				console.log(result);
				}
			});
		});
    
    
		$("#send").click(function(e) {
		e.preventDefault();
		$.ajax({
		type: "POST",
		url: "/api.php",
		data: JSON.stringify({ 
		"action": "send", 
		"wallet": "7D127006921DECAD3799296A3FB2025ACB0B9E7C8CCF84FAF220EE14AD80D08B", 
		"source": "nano_1tamzxykxs5bm6zgzbdpxj6azjibwnjpze6idpmuqhw71dpmdsuo8ot3yjay", 
		"destination": "nano_3xemzomy4atzmq5u55mzzixqw9zxykyeyeiqia7rb1xy1saufpr8wzder1xh",
		"amount": "1",
		"id": "a0b1c2d3e4f5g6h7i8j9"
		}),
		success: function(result) {
		//alert('ok');
		console.log(result);
		},
		error: function(result) {
		//alert('err');
		console.log(result);
		}
		});
		});

		
		function myTest() {
			$.ajax({
				type: "POST",
				url: 'ajax.php',
				data:{action:'test'},
				success:function(html) {
					alert(html);
				}
		
			});
		}
		
		function ping() {
			$.ajax({
				type: "POST",
				url: 'ajax.php',
				data:{action:'ping'},
				success:function(html) {
					alert(html);
				}
		
			});
		}
		
		function terminal() {
			$.ajax({
				type: "POST",
				url: 'ajax.php',
				data:{action:'terminal'},
				success:function(html) {
					alert(html);
				}
		
			});
		}
    

// LOG FUNCTION
(function () {
    var old = console.log;
    var logger = document.getElementById('log');
    console.log = function () {
      for (var i = 0; i < arguments.length; i++) {
        if (typeof arguments[i] == 'object') {
            logger.innerHTML += (JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]) ;
        } else {
            logger.innerHTML += arguments[i] ;
        }
      }
    }
})();

var textarea = document.getElementById('log');
setInterval(function(){
    textarea.scrollTop = textarea.scrollHeight;
}, 1);
    
    $( "#clearLog" ).click(function() {
  $( "#log" ).empty();
});
		
  </script>

</body>
</html>

