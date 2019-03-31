<?php
session_start();

if(!isset($_SESSION['email'])){
	header("Location:account.php"); 
}

?>


<!DOCTYPE html>

<html>

<head>

	<title>PHP Jquery Ajax CRUD Example</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap4.css">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.js"></script>

	<script type="text/javascript" src="js/bootstrap4.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

				

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
  <script type="text/javascript" src="js/item-ajax.js"></script>

</head>

<body>


	<div class="container">

		<div class="data">

		    <div class="col-lg-12 margin-tb">					

		        <div class="pull-left">

		            <h2>PHP Jquery Ajax CRUD Example</h2>

		        </div>

		        <div class="pull-right">

				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">

					  Create Item

				</button>
				<button type="button" class="btn btn-success">

					 <a style="color:#fff" href="api/logout.php">Log Out</a>

				</button>

		        </div>

		    </div>

		</div>


		<table class="table table-bordered">

			<thead>

			    <tr>

						<th>University</th>

						<th>Year</th>

						<th>Owned Land</th>

						<th>Total Faculties</th>

						<th>Total Depts</th>

						<th>Admited Students</th>
						
						<th>Total Students</th>
					
						<th>Graduated Students</th>
					
						<th>Total Teachers</th>
						
						<th>Total Professors</th>
					
						<th>Total Earns</th>
					
						<th>Total Expens</th>
						<th>Actions</th>
				
					</tr>
				
			</thead>

			<tbody>

			</tbody>

		</table>


		<ul id="pagination" class="pagination-sm"></ul>


	        <!-- Create Item Modal -->

		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

		        <h4 class="modal-title" id="myModalLabel">Create Item</h4>

		      </div>


		      <div class="modal-body">

		      <form id="wtf" data-toggle="validator" action="api/create.php" method="POST">


		      	<div class="form-group">
						
							<label class="control-label" for="title">University:</label>			
							<input class="form-control" type="text" name="university" id="" required>
						</div>


						<div class="form-group">
							<label class="control-label" for="title">Year:</label>
							<input class="form-control" required type="number" name="year" id="">
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Owned Land:</label>
							<input class="form-control" step=".01" required  type="number" name="owned_land" id="">

						</div>
						<div class="form-group">
							<label class="control-label" for="title">Total Faculities:</label>
							<input class="form-control" step=".01" required type="number" name="total_faculties" id="">

						</div>
						<div class="form-group">
							<label class="control-label" for="title">Total Depts:</label>
							<input class="form-control" step=".01" required type="number" name="total_depts" id="">

						</div>
						<div class="form-group">
							<label class="control-label" for="title">Admited Students:</label>
							<input class="form-control" step=".01" required type="number" name="admited_students" id="">

						</div>
						<div class="form-group">
							<label class="control-label" for="title">Total Students:</label>
							<input class="form-control" step=".01" required type="number" name="total_students" id="">

						</div>
						<div class="form-group">
							<label class="control-label" for="title">Graduated Students:</label>
							<input class="form-control" step=".01" required type="number" name="graduated_students" id="">

						</div>
						<div class="form-group">
							<label class="control-label" for="title">Total Teachers:</label>
							<input class="form-control" step=".01" required type="number" name="total_teachers" id="">

						</div>
						<div class="form-group">
							<label class="control-label" for="title">Total Professors:</label>
							<input class="form-control" step=".01" required type="number" name="total_professors" id="">

						</div>
						<div class="form-group">
							<label class="control-label" for="title">Total Earnings:</label>
							<input class="form-control" step=".01" required type="number" name="total_earns" id="">

						</div>
						<div class="form-group">
							<label class="control-label" for="title">Total Expences:</label>
							<input class="form-control" step=".01" required type="number" name="total_expens" id="">

						</div>


						<div class="form-group">

							<button class="btn crud-submit btn-success">Submit</button>

						</div>


		      		</form>


		      </div>

		    </div>


		  </div>

		</div>


		<!-- Edit Item Modal -->

		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

		        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>

		      </div>


		      <div class="modal-body">

		      		<form data-toggle="validator" action="api/update.php" method="put">

		      			<input type="hidden" name="id" class="edit-id">


		      			<div class="form-group">

							<label class="control-label" for="title">Title:</label>

							<input type="text" name="title" class="form-control" data-error="Please enter title." required />

							<div class="help-block with-errors"></div>

						</div>


						<div class="form-group">

							<label class="control-label" for="title">Description:</label>

							<textarea name="description" class="form-control" data-error="Please enter description." required></textarea>

							<div class="help-block with-errors"></div>

						</div>


						<div class="form-group">

							<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>

						</div>


		      		</form>


		      </div>

		    </div>

		  </div>

		</div>


	</div>
<div class="container">
<div class="row">
<div class="col-md-6">
	<canvas id="myChart" width="400" height="400"></canvas>

</div>	

</div>

</div>

</body>

</html>