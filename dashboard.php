<!-- <?php
  include("auth_session.php");
  $exp_category_dc = mysqli_query($con, "SELECT expensetype FROM expenses WHERE id = '$id' GROUP BY expensetype");
  $exp_amt_dc = mysqli_query($con, "SELECT SUM(expense) FROM expenses WHERE id = '$id' GROUP BY expensetype");

  $exp_date_line = mysqli_query($con, "SELECT expensedate FROM expenses WHERE id = '$id' GROUP BY expensedate");
  $exp_amt_line = mysqli_query($con, "SELECT SUM(expense) FROM expenses WHERE id = '$id' GROUP BY expensedate");
?> -->

<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>EzXpense</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">
		<link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet'>
    </head>

    <body>
	
    	<div class="wrapper">
			<nav class="sidebar">
				<div class="dismiss">
					<i class="fas fa-arrow-left"></i>
				</div>
				
				<div class="logo">
					<h3><a href="abcd.html"></a></h3>
				</div>
				
				<ul class="list-unstyled menu-elements">
					<li class="active">
						<a class="scroll-link" href="#top-content"><i class="fas fa-home"></i>Dashboard</a>
					</li>
					<li>
						<a class="scroll-link" onclick="location.href='addexpense.php'"><i class="fas fa-cog"></i>Add/Manage expenses</a>
					</li>
					<li>
						<a class="scroll-link"><i class="fas fa-pencil-alt" onclick="location.href='suggestion.php'"></i>Get Suggestions</a>
					</li>
					<li>
						<a class="scroll-link"><i class="fas fa-user" onclick="location.href='profile.html'"></i>Profile</a>
					</li>
					<li>
						<a onclick="location.href='login.php'">Logout</a>
					</li>
				
				</ul>
			
			</nav>
    		<div class="overlay"></div>
			<div class="content">
			
				<!-- open sidebar menu -->
				<a class="btn btn-primary btn-customized open-menu" href="#" role="button">
                    <i class="fas fa-align-left"></i> <span>Menu</span>
                </a>
			
		        <!-- Top content -->
		        <div class="top-content section-container" id="top-content" >
			        <div class="container">
			            <div class="row">
			                <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2">
								<h1 style="color:rgb(8, 4, 1); font-family: 'Aladin';font-size: 42px;"><b>EZEXPENSE</b></h1>
			                	
			                	<div class="description wow fadeInLeft">
			                		<p>
										<span style="color:#050403; font-family: 'Amaranth';font-size: 18px;"> We believe in a world that people don't have to worry about managing finances.One of the key <br>
											functions of an ezxpense is helping you to maintain a well-organized and consolidated <br>
											record of different expenses. For managing transaction records and arranging them nearly through <br>
											the tracker website.</b></span>
			                		</p>
			                	</div>
									<a class="btn btn-primary btn-customized-2 scroll-link" onclick="location.href='addexpense.php'" role="button">
										<i class="fas fa-pencil-alt"></i> ADD OR MANAGE YOUR EXPENSES
									</a>
								</div>
			                </div>
			            </div>
			        </div>
		        </div>
		
		        
		        <!-- Section 2
		        <div class="section-2-container section-container section-container-gray-bg" id="section-2">
					<div class="container">
						<div class="row">
							<div class="col section-2 section-description wow fadeIn">
							</div>
						</div>
						<div class="row">
							<div class="col-8 section-2-box wow fadeInLeft">
								<h3>DASHBOARD</h3>
								<p class="medium-paragraph">
							
								</p>
							</div>
						</div>
					</div>
				</div>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/feather.min.js"></script>
  <script src="js/popper.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script>
    feather.replace()
  </script>
  <script>
    var ctx = document.getElementById('expense_category_pie').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?php while ($a = mysqli_fetch_array($exp_category_dc)) {
                    echo '"' . $a['expensetype'] . '",';
                  } ?>],
        datasets: [{
          label: 'Expense by Category',
          data: [<?php while ($b = mysqli_fetch_array($exp_amt_dc)) {
                    echo '"' . $b['SUM(expense)'] . '",';
                  } ?>],
          backgroundColor: [
            '#6f42c1',
            '#dc3545',
            '#28a745',
            '#007bff',
            '#ffc107',
            '#20c997',
            '#17a2b8',
            '#fd7e14',
            '#e83e8c',
            '#6610f2'
          ],
          borderWidth: 1
        }]
      }
    });

    var line = document.getElementById('expense_line').getContext('2d');
    var myChart = new Chart(line, {
      type: 'line',
      data: {
        labels: [<?php while ($c = mysqli_fetch_array($exp_date_line)) {
                    echo '"' . $c['expensedate'] . '",';
                  } ?>],
        datasets: [{
          label: 'Expense by Month (Whole Year)',
          data: [<?php while ($d = mysqli_fetch_array($exp_amt_line)) {
                    echo '"' . $d['SUM(expense)'] . '",';
                  } ?>],
          borderColor: [
            '#adb5bd'
          ],
          backgroundColor: [
            '#6f42c1',
            '#dc3545',
            '#28a745',
            '#007bff',
            '#ffc107',
            '#20c997',
            '#17a2b8',
            '#fd7e14',
            '#e83e8c',
            '#6610f2'
          ],
          fill: false,
          borderWidth: 2
        }]
      }
    });
  </script> -->
		        <!-- <div class="section-6-container section-container section-container-image-bg">
			        <div class="container">
			            <div class="row">
			                <div class="col section-6 section-description wow fadeIn">
			                    <h2 style="color:rgb(8, 4, 1);font-family: 'Anton';" >Contact Us</h2>
			                    <div class="divider-1 wow fadeInUp"><span></span></div>
			                    <p style="color:rgb(8, 4, 1);font-family: 'Anton';">Send us an email using the form below.</p>
			                </div>
			            </div>
			            <div class="row">
		                	<div class="col-md-6 section-6-box wow fadeInUp">
		                	
		                    	<div class="section-6-form w-50 m-auto">
		                    		<form>
				                    	<div class="form-group">
				                    		<label class="sr-only" for="contact-email">Email</label>
				                        	<input type="text" name="email" placeholder="Email..." class="form-control" id="contact-email">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="contact-subject">Subject</label>
				                        	<input type="text" name="subject" placeholder="Subject..." class="contact-subject form-control" id="contact-subject">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="contact-message">Message</label>
				                        	<textarea name="message" placeholder="Message..." class="contact-message form-control" id="contact-message"></textarea>
				                        </div>
				                        <button type="submit" class="btn btn-primary btn-customized"><i class="fas fa-paper-plane"></i> Send Message</button>
				                    </form>
		                    	</div>
		                    </div>
		               
			            </div>
			        </div>
		        </div> -->
				<section class="my-5">
					<div class="py-5">
						<h2 class="text-center"><b>Contact Us</b></h2>
                    </div>
					<div class="w-50 m-auto">
						<form action="userinfo.php" method="post">
							<div class="mb-3">
								<lable>Username</lable>
								<input type="text" name="user" class="form-control">
                            </div>
							<div class="mb-3">
								<lable>Email Id</lable>
								<input type="text" name="email" class="form-control">
                            </div>
							<div class="mb-3">
								<lable>Mobile</lable>
								<input type="text" name="mobile" class="form-control">
                            </div>
							<div class="mb-3">
								<lable>Comments</lable>
								<textarea class="form-control" name="comments">
                            </textarea>
                            </div>
							<button type="submit" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                </section>
<footer>
	<p class="p-3 bg-dark text-white">@ezexpense</p>

		
        </div>
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>
