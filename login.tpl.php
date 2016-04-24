<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon.png">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="icon" href="img/favicon.ico" type="image/vnd.microsoft.icon">

	<title><?=$title?></title>

	<!--<link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">-->
	<link href="bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">

		<!--login modal-->
		<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h1 class="text-center">Login</h1>
			</div>
			<div class="modal-body">
				<form class="form col-md-12 center-block" action="<?= basename($_SERVER['SCRIPT_NAME']) ?>" method="POST">
					<!--<div class="form-group">
					<input type="text" class="form-control input-lg" placeholder="User" name="user">
					</div>-->
					<div class="form-group">
					<input type="password" class="form-control input-lg" placeholder="<?= $hint ?>" name="pass">
					</div>
					<div class="form-group">
					<button class="btn btn-primary btn-lg btn-block">Sign In</button>
					<!--<span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>-->
					</div>
					<?= $auth_msg ?>
				</form>
			</div>
			<!--<div class="modal-footer">
				<div class="col-md-12">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
				</div>
			</div>-->
		</div>
		</div>
		</div>

	</div>
</body>
</html>
