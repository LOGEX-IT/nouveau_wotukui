@extends('root.template')
@section('title', 'AJOUT FORMATEUR | AEC ADMIN')
@section('sectionTitle', 'Ajout de Formateur')
@section('sectionDescription')
	Ajouter un nouveau Formateur
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
                	<h5 class="card-title">formateur aec</h5>
                    <p>Ajouter un nouveau Formateur</p></div>

                    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="trainerForm">
	                    <div class="form-row">
	                        <div class="col-md-4">
	                            <label for="trainerFullName" style="text-transform: uppercase; font-size: 0.7em;">
	                            	nom complet formateur
	                            </label>
	                            <input type="text" class="form-control" name="trainerFullName" id="trainerFullName" placeholder="Nom complet formateur" >
	                        </div>
	                        <div class="col-md-4">
	                            <label for="trainerEmail" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Email Formateur
	                            </label>
	                            <input type="email" class="form-control" name="trainerEmail" id="trainerEmail" placeholder="Email formateur" >
	                        </div>

	                        <div class="col-md-4">
	                            <label for="trainerPhone" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Contact Formateur
	                            </label>
	                            <input type="number" class="form-control" name="trainerPhone" id="trainerPhone" placeholder="Contact formateur" >
	                        </div>
	                    </div>

	                    <br>

	                    <div class="form-row">
	                    	<div class="col-md-3">
	                            <label for="trainerSpeciality" style="text-transform: uppercase; font-size: 0.7em; margin-top: 20px">
	                            	Specialité Formateur
	                            </label>
	                            <input type="text" class="form-control" name="trainerSpeciality" id="trainerSpeciality" placeholder="Specialité formateur" >
	                        </div>

	                        <div class="col-md-6 align-items-center justify-content-center">
	                        	<label style="text-transform: uppercase; font-size: 0.7em; margin-top: 10px" for="trainerDescription">Description du formateur</label>
	                        	<textarea class="form-control" name="trainerDescription" id="trainerDescription" placeholder="Description Formateur"></textarea>
	                        </div>

	                        <div class="col-md-3">
	                            <label for="trainerAnotherInfos" style="text-transform: uppercase; font-size: 0.7em; margin-top: 20px">
	                            	Autre infos Formateur
	                            </label>
	                            <input type="text" class="form-control" name="trainerAnotherInfos" id="trainerAnotherInfos" placeholder="Autre infos formateur">
	                        </div>
	                        
	                    </div>

	                    <div class="form-row justify-content-center">

		                    <div class="col-md-3">
	                    		<div style="margin: 50px 0 0 35px; display: inline-block;">
		                        	<label for="trainerSexe" style="text-transform: uppercase; font-size: 0.8em;">Sexe formateur</label>
		                        	<select class="form-control" name="trainerSexe" id="trainerSexe">
		                        		<option disabled selected>Choisissez</option>
		                        		<option value="0">Sexe Masculin</option>
		                        		<option value="1">Sexe Féminin</option>
		                        		<option value="null">Personne morale</option>
		                        	</select>
		                        </div>
		                    </div>

	                        <div class="col-md-3 align-items-center text-center">
	                        	 <label for="trainerAvatar" style="cursor: pointer; margin-top: 20px">
			            			<img class="img-fluid animated infinite pulse" src="{{ URL::to('/storage/defaultCovers/default_6.jpg') }}" id="coverPreview" style="display: block; width: 150px; height: 150px; border-radius: 100%;">
		              				<p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 15px">Profil formateur</p>
			            		</label>

		            			<input type="file" accept="image/*" name="trainerAvatar" id="trainerAvatar" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">
	                        </div>

	                        <div class="col-md-3">
	                        	<div style="margin: 50px 0 0 35px;">
		                        	<input type="checkbox" name="trainerStatus" id="trainerStatus">
		                        	<label for="trainerStatus" style="text-transform: uppercase; font-size: 0.8em;">Activer</label>
		                        </div>

	                        	<div style="margin: 0px 0 0 30px;">
	                        		<input type="submit" id="submitForm" class="btn btn-primary" value="VALIDER">
	                        	</div>
	                        </div>

	                        {{ csrf_field() }}
	                    </div>
	                </form>
            </div>

        </div>
    </div>
@endsection


@section('jsSheets')

	<script type="text/javascript">

			$("#trainerAvatar").on('change', function(){
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
                        $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_6.jpg") }}').fadeIn('slow');
                    }
                }
                else{
                    $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_6.jpg") }}').fadeIn('slow');
                }
            }

            $('#trainerForm').on('submit', function(e){
            	e.preventDefault();
            })

			$('#submitForm').on('click', function(){
				
            	var trainerFullName = $('#trainerFullName');
            	var trainerEmail = $('#trainerEmail');
            	var trainerPhone = $('#trainerPhone');
            	var trainerSpeciality = $('#trainerSpeciality');
            	var trainerDescription = $('#trainerDescription');
            	var trainerAnotherInfos = $('#trainerAnotherInfos');
            	var trainerSexe = $('#trainerSexe');
				var trainerStatus = $('#trainerStatus');
				var trainerAvatar = $("#trainerAvatar").get(0).files;
            	var _token = $('input[name="_token"]').val();

            	var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	            if(trainerFullName.val().length >3){
	            	if(emailRegex.test(trainerEmail.val())){
	            		if ($.isNumeric(trainerPhone.val())) {
	            			if (trainerSpeciality.val().length>4) {
		            			if (trainerDescription.val().length>4) {
		            				if (trainerAvatar.length == 0) {

						                swalWithBootstrapButtons.fire({
						                    title: 'Oops',
						                    text: "Veuillez choisir la photo de profil du formateur !",
						                    type: 'error',
						                    showCancelButton: true,
						                    showConfirmButton: false,
						                    cancelButtonText: 'D\'accord'
						                })

									} else{
						                showWaitingMask(true);

						                var form = $('#trainerForm')[0];
										var data = new FormData(form);
						                //AJAX REQUEST
						                $.ajax({
						                    type: 'POST',
											enctype: 'multipart/form-data',
											url: '{{ route("storeTrainer") }}',
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
						                                text: 'Formateur ajouté avec succès !',
						                                type: 'success',
						                                showConfirmButton: true,
						                                confirmButtonText: 'Super'
						                            })
						                
						                            trainerFullName.val('');
									            	trainerEmail.val('');
									            	trainerPhone.val('');
									            	trainerSpeciality.val('');
									            	trainerDescription.val('');
									            	trainerAnotherInfos.val('');
						                            readPictureURL($('#trainerAvatar'));
						                        }
						                        else if (result == '-1') {
						                            swalWithBootstrapButtons.fire({
						                                title: 'Oops',
						                                text: 'Formateur existant',
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
					                    text: 'Description formateur invalide !',
					                    type: 'error',
					                    showCancelButton: true,
					                    showConfirmButton: false,
					                    cancelButtonText: 'Réessayez'
					                })
							    }
							} else{
								swalWithBootstrapButtons.fire({
				                    title: 'Oops',
				                    text: 'Specialité formateur invalide !',
				                    type: 'error',
				                    showCancelButton: true,
				                    showConfirmButton: false,
				                    cancelButtonText: 'Réessayez'
				                })
							}
						} else{
							swalWithBootstrapButtons.fire({
			                    title: 'Oops',
			                    text: 'Contact formateur invalide !',
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    cancelButtonText: 'Réessayez'
			                })
						}
		            } else{
		            	swalWithBootstrapButtons.fire({
		                    title: 'Oops',
		                    text: 'Email formateur invalide !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'Réessayez'
		                })
		            } 
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Nom formateur trop court !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'Réessayez'
	                })
	            }
        	});
		
	</script>

@endsection