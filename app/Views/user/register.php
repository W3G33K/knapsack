<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<title>Register Your Account :: Knapsack</title>

		<link type="image/png" rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png"/>
		<link type="image/png" rel="icon" sizes="32x32" href="/favicon-32x.png"/>
		<link type="image/png" rel="icon" sizes="16x16" href="/favicon-16x.png"/>
		<link type="image/x-icon" rel="shortcut icon" href="/favicon.ico"/>

		<!-- Styles -->
		<link type="text/css" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet"
			  href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900"/>
		<link type="text/css" rel="stylesheet" href="/css/whiskeybox-styles.css"/>
		<style type="text/css">
			header.make-me-a-princess {
				animation: scrolling-background 8s linear 0s infinite;
				margin-top: 0;
			}

			.account-details strong:before {
				content: "\1F464";
				margin: 0 0.25em 0 0;
			}

			.form-group label {
				color: #470079;
			}

			.form-group label:after {
				content: ":";
			}

			.required:before {
				content: "*";
			}

			.text-disclaimer {
				color: #470079;
				font-size: 50%;
			}

			.text-underline, a.text-underline {
				text-decoration: underline !important;
			}

			@keyframes scrolling-background {
				from {
					background-position-x: 0;
				}

				to {
					background-position-x: 360px;
				}
			}
		</style>
	</head>

	<body>
		<header class="make-me-a-princess">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">
							&#x1f392;
						</a>
					</div>
				</div>
			</nav>

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h1>
							Register Your Account
						</h1>
					</div>
				</div>
			</div>
		</header>

		<section class="intro make-me-a-princess add-padding">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<form method="post" action="<?= route_to('register_user'); ?>" accept-charset="utf-8">
							<fieldset>
								<legend class="account-details text-uppercase">
									<strong>Account Details</strong>
									<small class="pull-right text-disclaimer text-info">Your information will be kept
										private</small>
								</legend>
								<div class="form-group required">
									<label for="user[first_name]">First Name</label>
									<input type="text" id="user[first_name]" name="user[first_name]"
										   class="form-control input-lg" placeholder="Will"/>
								</div>

								<div class="form-group required">
									<label for="user[last_name]">Last Name</label>
									<input type="text" id="user[last_name]" name="user[last_name]"
										   class="form-control input-lg" placeholder="Smith"/>
								</div>

								<div class="form-group required">
									<label for="user[email_address]">Email Address</label>
									<input type="email" id="user[email_address]" name="user[email_address]"
										   class="form-control input-lg" placeholder="will@smith.co"/>
								</div>

								<div class="form-group required">
									<label for="user[username]">Username</label>
									<input type="text" id="user[username]" name="user[username]"
										   class="form-control input-lg" autocomplete="off" placeholder="wsmith"/>
								</div>

								<div class="form-group required">
									<label for="user[password]">Password</label>
									<input type="password" id="user[password]" name="user[password]"
										   class="form-control input-lg" autocomplete="off" placeholder="********"/>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-block btn-lg btn-success">Register Account
									</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</section>

		<footer>
			<div id="footer-top">&nbsp;</div>
			<div id="footer-bottom">
				<small>
					Copyright &copy; <?= date('Y'); ?> - Handcrafted with <span class="text-danger">&hearts;</span> by
					<a href="https://github.com/W3G33K" class="text-underline">Ryan K. Clark</a>
				</small>
			</div>
		</footer>
	</body>
</html>
