@extends('layouts.apps')

@section('content')

	<div class="card-header border-transparent" style="margin:-10px; pading:-10px;">
		<div class="container-fluid">
            <!-- <div class="card card-info">			 -->
              <!-- <div class="card-header">			  	
                <h3 class="card-title">Produksi Joint</h3>				
              </div>               -->
              <!-- <div class="card-body">			   -->
			  <form id="myForm" action="{{ route('index.store')}}" method="post" enctype="multipart/form-data">
				@csrf
								
				<div class="row">
					<div class="col-2">
						<div class="form-group">						
							<label><a class="text-primary" onclick="startTimer()">Start Time </a></label>						
							<input type="text" name="start" id="start" class="form-control " required readonly>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
							<label>End Time</label>
							<input type="text" name="end" id="end" class="form-control" required readonly>					
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label>Scan</label>
							<button type="button" class="btn btn-primary form-control" onclick="">Scan WOS</button>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
							<div class="form-group">
								<label>Kode Joint</label>
								<input type="text" class="form-control" name="kode_joint" id="kode_joint" required="" placeholder="type here">
							</div>	
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label>No Lot</label>
							<input type="text" class="form-control" name="no_lot" id="no_lot" required="" placeholder="type here">
						</div>         
					</div>
				</div>

				<div class="row">
					<div class="col-9">
						<img src="{{ asset('dist/img/skema_joint.jpg') }}" id="imagedisplay" name="imagedisplay" class="img-fluid" alt="Responsive image">
					</div>
					<div class="col-3">

				<!-- <div class="form-group"> -->
                  <!-- <label>Nomor Register</label> -->
                  <input type="text" class="form-control" name="no_reg" id="no_reg" required="" placeholder="type here" value="{{ Auth::user()->no_reg }}" readonly hidden>
                <!-- </div> -->
                <!-- <div class="form-group">
                  <label>No Lot</label>
                  <input type="text" class="form-control" name="no_lot" id="no_lot" required="" placeholder="type here">
                </div>                				                                           
                <div class="form-group">
                  <label>Kode Joint</label>
                  <input type="text" class="form-control" name="kode_joint" id="kode_joint" required="" placeholder="type here">
                </div>				 -->				
				<div class="form-group">
                  <label>Std CH</label>
                  <input type="text" class="form-control" name="std_ch" id="std_ch" placeholder="type here">
                </div>                

				<div class="row"?>
					<div class="col-4">
						<div class="form-group">
							<label>N1</label>
							<input type="text" class="form-control" required="" name="n1" id="n1" placeholder="type here">
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>N2</label>
							<input type="text" class="form-control" required="" name="n2" id="n2" placeholder="type here">
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label>N3</label> 
							<input type="text" class="form-control" required="" name="n3" id="n3" placeholder="type here">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Std Tes Tarik</label>
					<input type="text" class="form-control" name="std_tes" id="std_tes" placeholder="type here">
					</div>
				<div class="form-group">
					<label>N1 Tes Tarik</label>
					<input type="text" class="form-control" name="n1_tes" id="n1_tes" placeholder="type here">
					</div>
				<div class="form-group">
					<label>Hasil</label>
					<input type="text" class="form-control" required="" name="hasil" id="hasil" placeholder="type here">
					</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label>Waste Setting</label>
							<input type="text" class="form-control" name="w_set" id="w_set" placeholder="type here">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Waste Tes</label>
							<input type="text" class="form-control" name="w_tes" id="w_tes" placeholder="type here">
						</div>
						<div class="form-group">							
					</div>
						<!-- <label>Shift</label> -->
						<input type="datetime-local" class="form-control" name="shift" id="shift" placeholder="type here" readonly hidden>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-3">						
							<input id="myForm" type="submit" value="Submit" class="btn btn-success">
						</div>
						<div class="col-6">							
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Call Maintenance</button>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Call Maintenance</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<label for="recipient-name" class="col-form-label">No Reg:</label>
													<input type="text" class="form-control" id="recipient-name">
												</div>
												<div class="form-group">
													<label for="message-text" class="col-form-label">Problem:</label><br>
													<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExampleA" aria-expanded="false" aria-controls="collapseExampleA">
														A
													</button>
													<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExampleB" aria-expanded="false" aria-controls="collapseExampleB">
														B
													</button>
													<button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseExampleC" aria-expanded="false" aria-controls="collapseExampleC">
														C
													</button>
													<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExampleD" aria-expanded="false" aria-controls="collapseExampleD">
														D
													</button>
													<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExampleE" aria-expanded="false" aria-controls="collapseExampleE">
														E
													</button>
												</div>

												<div class="collapse" id="collapseExampleA">													
													<div class="form-group">
														<label for="problem-a-description" class="col-form-label">Waiting For Maintenance</label><br>
														<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExampleA1" aria-expanded="false" aria-controls="collapseExampleA1">
															Lakukan Perbaikan
														</button>
													</div>
												</div>
												<div class="collapse" id="collapseExampleB">
													<div class="form-group">
														<label for="problem-b-description" class="col-form-label">Waiting For Maintenance</label><br>
														<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExampleB1" aria-expanded="false" aria-controls="collapseExampleB1">
															Lakukan Perbaikan
														</button>
													</div>
												</div>
												<div class="collapse" id="collapseExampleC">
													<div class="form-group">
														<label for="problem-c-description" class="col-form-label">Waiting For Maintenance</label><br>
														<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExampleC1" aria-expanded="false" aria-controls="collapseExampleC1">
															Lakukan Perbaikan
														</button>											
													</div>
												</div>
												<div class="collapse" id="collapseExampleD">
													<div class="form-group">
														<label for="problem-d-description" class="col-form-label">Waiting For Maintenance</label><br>
														<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExampleD1" aria-expanded="false" aria-controls="collapseExampleD1">
															Lakukan Perbaikan
														</button>
													</div>
												</div>
												<div class="collapse" id="collapseExampleE">
													<div class="form-group">
														<label for="problem-e-description" class="col-form-label">Waiting For Maintenance</label><br>
														<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExampleE1" aria-expanded="false" aria-controls="collapseExampleE1">
															Lakukan Perbaikan
														</button>
													</div>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary" id="closeModalButton">Send message</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-3">
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal2">downtime</button>
								<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Downtime</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form>
													<div class="form-group">
														<label for="problem" class="col-form-label">Problem:</label><br>
														<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
															Problem Aplikator
														</button>														
														<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
															Problem Mesin
														</button>														
													</div>																																								
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" id="closeModalButton">Send message</button>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
              </div>			  
				
			  
			  </div>
				</div>


				<div class="row">
					
			  </div>
              <!-- /.card-body -->
			  </form>			  			  
            
            <!-- /.card -->
			
	
	

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>	
	<script>
		$(document).ready(function() {
			$('#no_lot').on('input', function() {
				var no_lot = $('#no_lot').val();
				var kode_joint = $('#kode_joint').val();

				if (no_lot !== '' && kode_joint !== '') {
					

					$.ajax({
						url: '{{route("create.getdata")}}',
						type: 'GET',
						data: { no_lot: no_lot, kode_joint : kode_joint
						},
						success: function(data, row) {
							$('#imagedisplay').attr('src', "{{ asset('img/BEJ-H2590-10.jpg') }}").trigger('change');
							$('#std_ch').val(data.std_ch);
							$('#n1').val(data.n1);
							$('#n2').val(data.n2);
							$('#n3').val(data.n3);
							$('#std_tes').val(data.std_tes);
							$('#n1_tes').val(data.n1_tes);
							$('#hasil').val(data.hasil);
							$('#w_set').val(data.w_set);
							$('#w_tes').val(data.w_tes);
							$('#shift').val(data.shift);								
						},
						error: function(xhr, status, error) {						
							console.log(xhr.responseText);
						}
					});
				}
			});

			$('#kode_joint').on('input', function() {
				var no_lot = $('#no_lot').val();
				var kode_joint = $('#kode_joint').val();

				if (no_lot !== '' && kode_joint !== '') {
					$.ajax({
						url: '{{route("create.getdata")}}',
						type: 'GET',
						data: { no_lot: no_lot, kode_joint : kode_joint
						},
						success: function(data, row) {
							$('#imagedisplay').attr('src', "{{ asset('img/BEJ-H2590-10.jpg') }}").trigger('change');
							$('#std_ch').val(data.std_ch);
							$('#n1').val(data.n1);
							$('#n2').val(data.n2);
							$('#n3').val(data.n3);
							$('#std_tes').val(data.std_tes);
							$('#n1_tes').val(data.n1_tes);
							$('#hasil').val(data.hasil);
							$('#w_set').val(data.w_set);
							$('#w_tes').val(data.w_tes);
							$('#shift').val(data.shift);												
						},
						error: function(xhr, status, error) {						
							console.log(xhr.responseText);
						}
					});
				}
			});
		});
	</script>	

<script>
    let timerInterval; // Variable to store the interval ID for the timer
	let startTime; // Variable to store the start time when the button is clicked

	function startTimer() {
		console.log('Timer started');
		const startTimeField = document.getElementById('start');
		const endTimeField = document.getElementById('end');

		// Disable the "Start" button and the "End Time" field
		startTimeField.disabled = false;
		endTimeField.disabled = false;

		// Get the current time in 'HH:mm' format
		const now = new Date();
		const hours = now.getHours().toString().padStart(2, '0');
		const minutes = now.getMinutes().toString().padStart(2, '0');
		const seconds = now.getSeconds().toString().padStart(2, '0');
		startTime = `${hours}:${minutes}:${seconds}`; // Capture the start time when the button is clicked

		startTimeField.value = startTime; // Display the captured start time

    // Start the timer
    timerInterval = setInterval(() => {
        const currentTime = new Date();
        const elapsedTimeInSeconds = Math.floor((currentTime - now) / 1000);

        const elapsedHours = Math.floor(elapsedTimeInSeconds / 3600);
        const elapsedMinutes = Math.floor((elapsedTimeInSeconds % 3600) / 60);
        const elapsedSeconds = elapsedTimeInSeconds % 60;

        // Calculate the end time based on the elapsed time from start
        const endHours = (parseInt(hours) + elapsedHours) % 24;
        const endMinutes = (parseInt(minutes) + elapsedMinutes) % 60;
        const endSeconds = (parseInt(seconds) + elapsedSeconds) % 60;

        // Update the end time field
        endTimeField.value = `${endHours.toString().padStart(2, '0')}:${endMinutes.toString().padStart(2, '0')}:${endSeconds.toString().padStart(2, '0')}`;
    }, 1000);
}

</script>
<script>
    $(document).ready(function() {
		// Initialize Select2
		$('.select2').select2();
	});
</script>
<!-- <script>
    // Flag variable to control modal closing
    let canCloseModal = false;

    // Event handler for the modal's show event
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes

        // Check if the modal can be closed
        if (!canCloseModal) {
            // Prevent modal from closing
            event.preventDefault();
        }

        // Update the modal's content
        var modal = $(this);
        modal.find('.modal-title').text('New message to ' + recipient);
        modal.find('.modal-body input').val(recipient);
    });

    // Event handler for the custom close button
    $('#closeModalButton').click(function () {
        // Set the flag to allow modal closing
        canCloseModal = true;

        // Close the modal
        $('#exampleModal').modal('hide');
    });
</script> -->

<!-- <script>
    // Flag variable to control modal closing
    let canCloseModal = false;

    // Event handler for the modal's show event
    $('#modal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes

        // Check if the modal can be closed
        if (!canCloseModal) {
            // Prevent modal from closing
            event.preventDefault();
        }

        // Update the modal's content
        var modal = $(this);
        modal.find('.modal-title').text('New message to ' + recipient);
        modal.find('.modal-body input').val(recipient);
    });

    // Event handler for the custom close button
    $('#closeModalButton').click(function () {
        // Set the flag to allow modal closing
        canCloseModal = true;

        // Close the modal
        $('#exampleModal').modal('hide');
    });
	</script> -->
</div>
</div>
</div>
</div>
@endsection
