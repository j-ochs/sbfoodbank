<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<title>Ally - Partner Locator</title>
		<meta name="description" content="An app to help people find food in Santa Barbara"/>
		<meta name="author" content="Westmont Inspired Computing Lab"/>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/styles.css"/>
	</head>
	<body>
		<div id="header" class="container">
			<div class="page-header">
				<h3>Map One</h3>
			</div>
		</div>
		<div id="map">
		</div>

		<footer class="footer">
			<div class="container">
				<div class="row-fluid text-center">
					<div class="col-xs-6">
						<a class="btn btn-default btn-lg" href="index.php" role="button" id="home_button">
							<img class="bw_logo_button" src="img/logos/black_and_white/black_on_clear.png"/>
							Home
						</a>
					</div>
					<div class="col-xs-6">
						<a class="btn btn-default btn-lg" href="feedback.php" role="button" id="feedback_button">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
							Feedback
						</a>
					</div>
				</div>
			</div>
		</footer>

		<!-- Load javascript at the end for speed -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		<script>

              function ally_initMap(){
                // A little jquery hacking to get the size that the map should be
                var b_h = $(window).height();
                var h_h = $("#header").height();
                var f_h = b_h- $("footer.footer").position().top;
                $("#map").height(b_h-h_h-f_h);

                var myPoint = {
                	lat:34.4208,
                	lng:-119.6982
                };

                var address = getParameterByName('address');
                var map = new google.maps.Map(document.getElementById('map'), {
                	zoom: 8,
                	center: myPoint
                });

				//If no address don't plot anything
                if(address == null){
					console.log("No address in URL");
                }
                else{
					reverse_geocode(address,function(lat, lng) {
                		myPoint.lat = lat
                		myPoint.lng = lng;
                		var marker1 = new google.maps.Marker({position: myPoint,map: map});
                	}); 
                }
            }
        </script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAivupYZInhP_RsRvPW5NByQy7qcCcoa0U&callback=ally_initMap"></script>
	</body>
</html>
