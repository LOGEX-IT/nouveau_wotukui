@extends('root.template')
@section('title', 'AJOUT EVENEMENTS | AEC ADMIN')
@section('sectionTitle', 'Ajout d\'un évènement')
@section('sectionDescription')
	Ajouter un nouvel evenement
@endsection

@section('mainContent') 

<style type="text/css">
	::placeholder{
		text-transform: uppercase !important;
		font-size: 0.8em;
	}
</style>
	<div class="row align-items-center justifiy-content-center">
        <div class="col-md">
            <div class="main-card mb-3 card" style="padding:  0 20px 50px 20px">
                <div class="card-body">
                	<h5 class="card-title">Nouvel évènement</h5>
                    <p>Ajouter un nouvel evenement</p></div>

                    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="eventForm">
	                    <div class="form-row">
	                        <div class="col-md-4 align-items-center">
	                            <label for="eventName" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Nom attribué à l'évènement
	                            </label>
	                            <input type="text" class="form-control" name="eventName" id="eventName" placeholder="Nom évènement" >
	                        </div>

	                        <div class="col-md-4 align-items-center">
	                            <label for="eventDate" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Date de l'évènement
	                            </label>
	                            <input type="date" class="form-control" name="eventDate" id="eventDate" placeholder="date évènement" >
	                        </div>

	                        <div class="col-md-4 align-items-center">
	                            <label for="eventLocation" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Adresse de l'évènement
	                            </label>
	                            <input type="text" class="form-control" name="eventLocation" id="eventLocation" placeholder="Adresse évènement" >
	                        </div>

	                    </div>

	                    <br>
	                    <div class="form-row">
	                      	<div class="col-md-8">
	                            <label style="text-transform: uppercase; font-size: 0.7em;" for="eventDescription">Description de l'évènement</label>
	                        	<textarea class="form-control" name="eventDescription" id="eventDescription" placeholder="Description évènement" rows="5"></textarea>
	                        </div>

	                       <div class="col-md-4">
	                        	<label for="eventCover" style="cursor: pointer; margin-top: 30px; margin-left: 20px; display: inline-block;">
			            			<img class="img-fluid animated infinite pulse" src="{{ URL::to('/storage/defaultCovers/default_1.jpg') }}" id="coverPreview" style="display: block; width: 150px; height: auto; border-radius: 6px;">
		              				<p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 20px">Couverture de l'évènement</p>
			            		</label>

		            			<input type="file" accept="image/*" name="eventCover" id="eventCover" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">

		            			<div class="" style="position: absolute; margin: 60px 0 0 30px; display: inline-block; ">
		                        	<div>
			                        	<input type="checkbox" name="eventStatus" id="eventStatus">
			                        	<label for="eventStatus" style="text-transform: uppercase; font-size: 0.8em;">Activer</label>
			                        </div>

		                        	<div>
		                        		<input type="submit" id="submitForm" class="btn btn-primary" value="VALIDER">
		                        	</div>
			                       
		                        </div>

		                        {{ csrf_field() }}
		            		</div>
	                    </div>

	                   
	                </form>
            </div>

        </div>
    </div>
@endsection


@section('jsSheets')

	<script type="text/javascript">

			$("#eventCover").on('change', function(){
                readPictureURL(this);
            });

			function readPictureURL(input) {
                if (input.files && input.files[0]) {
                    if(input.files.length==1){
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#coverPreview').attr('src', e.target.result).fadeIn('slow');
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                    else{
                        $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_1.jpg") }}').fadeIn('slow');
                    }
                }
                else{
                    $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_1.jpg") }}').fadeIn('slow');
                }
            }

            $('#eventForm').on('submit', function(e){
            	e.preventDefault();
            })

			$('#submitForm').on('click', function(){
				
            	var eventName = $('#eventName');
            	var eventDate = $('#eventDate');
            	var eventLocation = $('#eventLocation');
            	var eventDescription = $('#eventDescription');
				var eventStatus = $('#eventStatus');
				var eventCover = $("#eventCover").get(0).files;
            	var _token = $('input[name="_token"]').val();

	            if(eventName.val().length >3){
	            	if (eventDate.val().length==10) {
	            		if(eventLocation.val().length >3){
			            	if(eventDescription.val().length>3){
		        				if (eventCover.length == 0) {
					                swalWithBootstrapButtons.fire({
					                    title: 'Oops',
					                    text: "Sélectionner une couverture pour l'évènement !",
					                    type: 'error',
					                    showCancelButton: true,
					                    showConfirmButton: false,
					                    confirmButtonText: 'D\'accord'
					                })

								} else{
					                showWaitingMask(true);

					                var form = $('#eventForm')[0];
									var data = new FormData(form);
					                //AJAX REQUEST
					                $.ajax({
					                    type: 'POST',
										enctype: 'multipart/form-data',
										url: '{{ route("storeEvent") }}',
										data:data,
										processData: false,  // Important!
								        contentType: false,
								        cache: false,
								        timeout: 600000,

					                    success:function(result) {
					                        showWaitingMask(false);
					                        if(result == '1'){
					                            swalWithBootstrapButtons.fire({
					                                title: 'Good Job',
					                                text: 'Evènement ajouté avec succès !',
					                                type: 'success',
					                                showConfirmButton: true,
					                                confirmButtonText: 'Super'
					                            })
					                
					                            eventName.val('');
					                            eventDate.val('');
					                            eventLocation.val('');
								            	eventDescription.val('');
					                            readPictureURL($('#eventCover'));
					                        }
					                        else if (result == '-1') {
					                            swalWithBootstrapButtons.fire({
					                                title: 'Oops',
					                                text: 'Evènement existant',
					                                type: 'warning',
					                                showCancelButton: true,
					                                showConfirmButton: false,
					                                cancelButtonText: 'D\'accord'
					                            })
					                        }
					                        else{
					                            console.log(result)
					                            swalWithBootstrapButtons.fire({
					                                title: 'Oops',
					                                text: 'Echec de l\'opération',
					                                type: 'error',
					                                showCancelButton: true,
					                                showConfirmButton: false,
					                                cancelButtonText: 'Hummmm'
					                            })
					                        }
					                    },

					                    error:function(result){
					                        showWaitingMask(false);
					                        console.log(result)
					                        swalWithBootstrapButtons.fire({
					                            title: 'Oops',
					                            text: 'Echec de l\'opération',
					                            type: 'error',
					                            showCancelButton: true,
					                            showConfirmButton: false,
					                            cancelButtonText: 'Hummmm'
					                        })
					                    }
					                });
						        }
				            } else{
				            	swalWithBootstrapButtons.fire({
				                    title: 'Oops',
				                    text: 'Description évènement invalide !',
				                    type: 'error',
				                    showCancelButton: true,
				                    showConfirmButton: false,
				                    cancelButtonText: 'Réessayez'
				                })
			            	}
			            } else{
			            	swalWithBootstrapButtons.fire({
			                    title: 'Oops',
			                    text: 'Adresse évènement invalide !',
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    cancelButtonText: 'Réessayez'
			                })
			            }
			        } else{
			        	swalWithBootstrapButtons.fire({
		                    title: 'Oops',
		                    text: 'Date évènement invalide !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'Réessayez'
		                })
			        }
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Nom évènement trop court !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'Réessayez'
	                })
	            }
        	});
		
	</script>

@endsection