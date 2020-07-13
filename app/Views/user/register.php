<!DOCTYPE html>
<?php
	$errors = $errors ?? [];
	$user = $user ?? new App\Entities\User();
?>
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
			html,
			body {
				height: 100%;
				/* The html and body elements cannot have any padding or margin. */
			}

			/* Wrapper for page content to push down footer */
			#wrapper {
				min-height: 100%;
				height: auto;
				/* Negative indent footer by its height */
				margin: 0 auto -128px;
				/* Pad bottom by footer height */
				padding: 0 0 128px;
			}

			/* Set the fixed height of the footer here */
			#footer {
				height: 128px;
				background-color: #f5f5f5;
			}

			.alert-inline {
				border: 1px solid transparent;
				border-radius: 4px;
				padding: 0.20em;
			}

			header.make-me-a-princess {
				animation: scrolling-background 8s linear 0s infinite;
				margin-top: 0;
			}

			.account-details strong:before {
				content: "\1F464";
				margin: 0 0.25em 0 0;
			}

			.alert li {
				margin-left: 1em;
			}

			.form-group label {
				color: #470079;
			}

			.form-group label:after {
				content: ":";
				margin-left: -0.25em;
			}

			.form-group label.has-error {
				color: #8b0000;
			}

			.form-group label.required:before {
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


			@media (max-width: 767px) {
				.navbar-inverse .container-fluid {
					padding-right: 15px;
				}

				header h1 {
					font-size: 45px;
				}

				footer {
					font-size: 1.25em;
				}
			}
		</style>
	</head>

	<body>
		<div id="wrapper">
			<header class="make-me-a-princess">
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
										<small class="pull-right text-disclaimer text-info">
											Your information will be kept private
										</small>
									</legend>

									<?php if (count($errors) > 0): ?>
										<ul class="alert alert-danger hide">
											<h4>Please fix errors below...</h4>
											<?php foreach ($errors as $fieldName => $message): ?>
												<li data-field-name="user[<?= $fieldName; ?>]"><?= $message; ?></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>

									<div class="form-group">
										<label for="user[first_name]" class="required">
											<span><?= label('user.first_name'); ?></span>
										</label>
										<?php if (array_key_exists('first_name', $errors)): ?>
											<span class="alert-inline alert-danger"><?= $errors['first_name']; ?></span>
										<?php endif; ?>
										<input type="text" id="user[first_name]" name="user[first_name]"
											   class="form-control input-lg" placeholder="Will"
											   value="<?= $user->getFirstName(); ?>" autocomplete="off"/>
									</div>

									<div class="form-group">
										<label for="user[last_name]" class="required">
											<span><?= label('user.last_name'); ?></span>
										</label>
										<?php if (array_key_exists('last_name', $errors)): ?>
											<span class="alert-inline alert-danger"><?= $errors['last_name']; ?></span>
										<?php endif; ?>
										<input type="text" id="user[last_name]" name="user[last_name]"
											   class="form-control input-lg" placeholder="Smith"
											   value="<?= $user->getLastName(); ?>" autocomplete="off"/>
									</div>

									<div class="form-group">
										<label for="user[email_address]" class="required">
											<span><?= label('user.email_address'); ?></span>
										</label>
										<?php if (array_key_exists('email_address', $errors)): ?>
											<span
												class="alert-inline alert-danger"><?= $errors['email_address']; ?></span>
										<?php endif; ?>
										<input type="email" id="user[email_address]" name="user[email_address]"
											   class="form-control input-lg" placeholder="will@smith.co"
											   value="<?= $user->getEmailAddress(); ?>" autocomplete="off"/>
									</div>

									<div class="form-group">
										<label for="user[username]" class="required">
											<span><?= label('user.username'); ?></span>
										</label>
										<?php if (array_key_exists('username', $errors)): ?>
											<span class="alert-inline alert-danger"><?= $errors['username']; ?></span>
										<?php endif; ?>
										<input type="text" id="user[username]" name="user[username]"
											   class="form-control input-lg" placeholder="wsmith"
											   value="<?= $user->getUsername(); ?>" autocomplete="off"/>
									</div>

									<div class="form-group">
										<label for="user[password]" class="required">
											<span><?= label('user.password'); ?></span>
										</label>
										<?php if (array_key_exists('password', $errors)): ?>
											<span class="alert-inline alert-danger"><?= $errors['password']; ?></span>
										<?php endif; ?>
										<input type="password" id="user[password]" name="user[password]"
											   class="form-control input-lg" placeholder="********"
											   autocomplete="off"/>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-block btn-lg btn-success">
											Register Account
										</button>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>

		<footer id="footer">
			<div id="footer-top">&nbsp;</div>
			<div id="footer-bottom">
				<small>
					Copyright &copy; <?= date('Y'); ?> - Handcrafted with <span class="text-danger">&hearts;</span> by
					<a href="https://github.com/W3G33K" class="text-underline">Ryan K. Clark</a>
				</small>
			</div>
		</footer>

		<script type="text/javascript">
			window.addEventListener("load", function() {
				let errorElements = document.querySelectorAll("[data-field-name]");
				if (errorElements.length > 0) {
					let errorNodes = Array.from(errorElements);
					errorNodes.forEach(function(errorNode) {
						let dataSet = errorNode.dataset;
						let fieldName = dataSet.fieldName;
						let fieldElement = document.querySelector(`label[for="${fieldName}"]`);
						if (fieldElement !== null) {
							fieldElement.classList.add("has-error");
						}
					});
				}
			}, false);
		</script>
	</body>
</html>
