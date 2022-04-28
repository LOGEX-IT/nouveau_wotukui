@extends('root.template')
@section('title', 'AJOUT FORMATION | AEC ADMIN')
@section('sectionTitle', 'Ajout de Formation')
@section('sectionDescription')
	Ajouter un nouvelle Formation
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
                	<h5 class="card-title">formation aec</h5>
                    <p>Ajouter un nouvelle Formation</p></div>

                    <form action="#" method="POST" autocomplete="off" id="trainingForm" enctype="multipart/form-data">

	                    <div class="form-row">
	                        <div class="col-md-3">
	                        	<label for="idTrainingSubCat" style="text-transform: uppercase; font-size: 0.7em;">Veuillez choisir la sous catégorie</label>

	                            <select name="idTrainingSubCat" class="form-control" id="idTrainingSubCat">
	                            	<option selected="" disabled="">Choisissez la sous catégorie</option>
	                            	@foreach($trainingSubCats as $trainingSubCat)
	                            		<option value="{{  $trainingSubCat->idTrainingSubCat }}">
	                            			{{ $trainingSubCat->trainingSubCatName }}
	                            		</option>
	                            	@endforeach
	                            </select>
	                        </div>

	                        
	                        <div class="col-md-3">
	                           <label for="idTrainer" style="text-transform: uppercase; font-size: 0.7em;">Veuillez choisir le formateur</label>

	                            <select name="idTrainer" class="form-control" id="idTrainer">
	                            	<option selected="" disabled="">Choisissez le formateur</option>
	                            	@foreach($trainers as $trainer)
	                            		<option value="{{  $trainer->idTrainer }}">
	                            			{{ $trainer->trainerFullName }}
	                            		</option>
	                            	@endforeach
	                            </select>
	                        </div>

	                        <div class="col-md-3">
	                             <label for="trainingName" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Nom Formation
	                            </label>
	                            <input type="text" class="form-control" name="trainingName" id="trainingName" placeholder="Nom Formation" >
	                        </div>


	                        <div class="col-md-3">
	                            <label for="trainingPrice" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Prix Formation
	                            </label>
	                            <input type="number" class="form-control" name="trainingPrice" id="trainingPrice" placeholder="Prix Formation" >
	                        </div>
	                    </div>

	                    <br>

	                    <div class="form-row">
	                    	<div class="col-md-3">
	                            <label for="trainingLocalisation" style="text-transform: uppercase; font-size: 0.7em; margin-top: 20px">
	                            	Adresse de la formation
	                            </label>
	                            <input type="text" class="form-control" name="trainingLocalisation" id="trainingLocalisation" placeholder="Adresse de la formation" >
	                        </div>

	                        <div class="col-md-3">
	                            <label for="trainingDateStart" style="text-transform: uppercase; font-size: 0.7em; margin-top: 20px">
	                            	Date debut de la formation
	                            </label>
	                            <input type="date" class="form-control" name="trainingDateStart" id="trainingDateStart" placeholder="Date debut formation" >
	                        </div>

	                        <div class="col-md-3">
	                            <label for="trainingDateEnd" style="text-transform: uppercase; font-size: 0.7em; margin-top: 20px">
	                            	Date fin de la formation
	                            </label>
	                            <input type="date" class="form-control" name="trainingDateEnd" id="trainingDateEnd" placeholder="Date fin formation" >
	                        </div>

	                        <div class="col-md-3">
	                            <label for="trainingPublic" style="text-transform: uppercase; font-size: 0.7em; margin-top: 20px">
	                            	Public cible de la formation
	                            </label>
	                            <input type="text" class="form-control" name="trainingPublic" id="trainingPublic" placeholder="Public ciblé" >
	                        </div>
	                    </div>

	                    <br>

	                    <div class="form-row">
	                    	<div class="col-md-4 align-items-center justify-content-center">
	                        	<label style="text-transform: uppercase; font-size: 0.7em; margin-top: 10px" for="trainingObjective">Objectif de la formation</label>
	                        	<textarea class="form-control" name="trainingObjective" id="trainingObjective" placeholder="Objectif formation"></textarea>
	                        </div>

	                        <div class="col-md-4 align-items-center justify-content-center">
	                        	<label style="text-transform: uppercase; font-size: 0.7em; margin-top: 10px" for="trainingDescription">Description de la formation</label>
	                        	<textarea class="form-control" name="trainingDescription" id="trainingDescription" placeholder="Description Formation"></textarea>
	                        </div>

	                        <div class="col-md-4 align-items-center justify-content-center">
	                        	<label style="text-transform: uppercase; font-size: 0.7em; margin-top: 10px" for="trainingEligibility">Eligibilité de la formation</label>
	                        	<textarea class="form-control" name="trainingEligibility" id="trainingEligibility" placeholder="Eligibilité Formation"></textarea>
	                        </div>
	                    </div>

	                    <br>

	                    <div class="form-row">

	                    	<div class="col-md-4 align-items-center justify-content-center">
	                        	<label style="text-transform: uppercase; font-size: 0.7em; margin-top: 10px" for="trainingProgram">Programme de la formation</label>
	                        	<textarea class="form-control" name="trainingProgram" id="trainingProgram" placeholder="Programme Formation"></textarea>
	                        </div>

	                        <div class="col-md-4 align-items-center justify-content-center">
	                        	<label style="text-transform: uppercase; font-size: 0.7em; margin-top: 10px" for="trainingAnotherInfos">Autre infos de la Formation</label>
	                        	<textarea class="form-control" name="trainingAnotherInfos" id="trainingAnotherInfos" placeholder="Autre infos Formation"></textarea>
	                        </div>

	                        <div class="col-md-2 align-items-center text-center">
	                        	 <label for="trainingCover" style="cursor: pointer; margin-top: 15px; margin-left: 30px">
			            			<img class="img-fluid animated infinite pulse" src="{{ URL::to('/storage/defaultCovers/default_4.jpg') }}" id="coverPreview" style="display: block; width: 150px; height: auto; border-radius: 5px;">
		              				<p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 15px">Couverture formation</p>
			            		</label>
		            			<input type="file" accept="image/*" name="trainingCover" id="trainingCover" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">
	                        </div>

	                        <div class="col-md-2 align-items-center text-center">
	                        	 <label for="trainingFile" style="cursor: pointer; margin-top: 15px">
			            			<i class="fa fa-archive animated infinite pulse slower" style="font-size: 6em; color: blue"></i>

		              				<p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 5px">Fichier Formation</p>
			            		</label>

		            			<input type="file" accept="document/*" name="trainingFile" id="trainingFile" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">
	                        </div>

	                        {{ csrf_field() }}
	                    </div>

	                    <div class="form-row">
	                    	<div class="col justify-content-center">
	                        	<div style="margin: 0 0 0 35px; display: inline-block;">
		                        	<input type="checkbox" name="trainingPayingType" id="trainingPayingType">
		                        	<label for="trainingPayingType" style="text-transform: uppercase; font-size: 0.8em;">Payement par tranche</label>
		                        </div>

	                        	<div style="margin: 0 0 0 35px; display: inline-block;">
		                        	<input type="checkbox" name="trainingStatus" id="trainingStatus">
		                        	<label for="trainingStatus" style="text-transform: uppercase; font-size: 0.8em;">Activer</label>
		                        </div>

	                        	<div style="margin: 0px 0 0 30px; display: inline-block;">
	                        		<input type="submit" id="submitForm" class="btn btn-primary" value="VALIDER">
	                        	</div>
	                        </div>
	                    </div>
	                </form>
            </div>

        </div>
    </div>
@endsection


@section('jsSheets')

	<script type="text/javascript">

			$("#trainingCover").on('change', function(){
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
                        $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_4.jpg") }}').fadeIn('slow');
                    }
                }
                else{
                    $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_4.jpg") }}').fadeIn('slow');
                }
            }

            $('#trainingForm').on('submit', function(e){
            	e.preventDefault();
            })

			$('#submitForm').on('click', function(){
				
            	var idTrainingSubCat = $('#idTrainingSubCat');
            	var idTrainer = $('#idTrainer');
            	var trainingName = $('#trainingName');
            	var trainingPrice = $('#trainingPrice');
            	var trainingPayingType = $('#trainingPayingType');
            	var trainingLocalisation = $('#trainingLocalisation');
            	var trainingDateStart = $('#trainingDateStart');
            	var trainingDateEnd = $('#trainingDateEnd');
            	var trainingDescription = $('#trainingDescription');
            	var trainingObjective = $('#trainingObjective');
            	var trainingEligibility = $('#trainingEligibility');
            	var trainingPublic = $('#trainingPublic');
            	var trainingProgram = $('#trainingProgram');
            	var trainingAnotherInfos = $('#trainingAnotherInfos');
				var trainingStatus = $('#trainingStatus');
				var trainingCover = $("#trainingCover").get(0).files;
				var trainingFile = $("#trainingFile").get(0).files;
            	var _token = $('input[name="_token"]').val();

            	if (idTrainingSubCat.val()!==null && $.isNumeric(idTrainingSubCat.val())) {
            		if (idTrainer.val()!==null && $.isNumeric(idTrainer.val())) {
			            if(trainingName.val().length >3){
		            		if ($.isNumeric(trainingPrice.val())) {
		            			if (trainingLocalisation.val().length>4) {
		            				if (trainingDateStart.val().length==10) {
		            					if (trainingDateEnd.val().length==10) {
		            						if (trainingPublic.val().length>4) {
		            							if (trainingObjective.val().length>4) {
		            								if (trainingDescription.val().length>4) {
		            									if (trainingEligibility.val().length>4) {
		            										if (trainingProgram.val().length>4) {
										            			if (trainingAnotherInfos.val().length>4) {
										            				if (trainingCover.length !== 0) {
														                if (trainingFile.length == 0) {
														                	swalWithBootstrapButtons.fire({
															                    title: 'Oops',
															                    text: "Veuillez ajouter un fichier pdf à la formation !",
															                    type: 'error',
															                    showCancelButton: true,
															                    showConfirmButton: false,
															                    cancelButtonText: 'D\'accord'
															                })
														                } else{
														                	showWaitingMask(true);

															                var form = $('#trainingForm')[0];
																			var data = new FormData(form);
															                //AJAX REQUEST
															                $.ajax({
															                    type: 'POST',
																				enctype: 'multipart/form-data',
																				url: '{{ route("storeTraining") }}',
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
															                                text: 'Formation ajoutée avec succès !',
															                                type: 'success',
															                                showConfirmButton: true,
															                                confirmButtonText: 'Super'
															                            })
															                
																					trainingName.val('');
																	            	trainingPrice.val('');
																	            	trainingLocalisation.val('');
																	            	trainingDateStart.val('');
																	            	trainingDateEnd.val('');
																	            	trainingDescription.val('');
																	            	trainingObjective.val('');
																	            	trainingEligibility.val('');
																	            	trainingPublic.val('');
																	            	trainingProgram.val('');
																	            	trainingAnotherInfos.val('');
				
															                            readPictureURL($('#trainingCover'));
															                        } else if(result == '-2'){
															                        	swalWithBootstrapButtons.fire({
															                                title: 'Oops',
															                                text: 'Fichier formation invalide',
															                                type: 'warning',
															                                showCancelButton: true,
															                                showConfirmButton: false,
															                                cancelButtonText: 'D\'accord'
															                            })
															                        } else if (result == '-1') {
															                            swalWithBootstrapButtons.fire({
															                                title: 'Oops',
															                                text: 'Formation déjà existante',
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
														                    text: "Veuillez choisir la couverture de la formation !",
														                    type: 'error',
														                    showCancelButton: true,
														                    showConfirmButton: false,
														                    cancelButtonText: 'D\'accord'
														                })
															        }
															    } else{
															    	swalWithBootstrapButtons.fire({
													                    title: 'Oops',
													                    text: 'Informations complémentaires trop courtes !',
													                    type: 'error',
													                    showCancelButton: true,
													                    showConfirmButton: false,
													                    cancelButtonText: 'Réessayez'
													                })
															    }
															} else{
																swalWithBootstrapButtons.fire({
												                    title: 'Oops',
												                    text: 'Programme formation trop court !',
												                    type: 'error',
												                    showCancelButton: true,
												                    showConfirmButton: false,
												                    cancelButtonText: 'Réessayez'
												                })
															}
														} else{
															swalWithBootstrapButtons.fire({
											                    title: 'Oops',
											                    text: 'Eligibilité formation trop courte !',
											                    type: 'error',
											                    showCancelButton: true,
											                    showConfirmButton: false,
											                    cancelButtonText: 'Réessayez'
											                })
														}
													} else{
														swalWithBootstrapButtons.fire({
										                    title: 'Oops',
										                    text: 'Description formation trop courte !',
										                    type: 'error',
										                    showCancelButton: true,
										                    showConfirmButton: false,
										                    cancelButtonText: 'Réessayez'
										                })
													}
												} else{
													swalWithBootstrapButtons.fire({
									                    title: 'Oops',
									                    text: 'Objectif formation trop court !',
									                    type: 'error',
									                    showCancelButton: true,
									                    showConfirmButton: false,
									                    cancelButtonText: 'Réessayez'
									                })
												}
											}else{
												swalWithBootstrapButtons.fire({
								                    title: 'Oops',
								                    text: 'Public cible trop court !',
								                    type: 'error',
								                    showCancelButton: true,
								                    showConfirmButton: false,
								                    cancelButtonText: 'Réessayez'
								                })
											}

										} else{
											swalWithBootstrapButtons.fire({
							                    title: 'Oops',
							                    text: 'Date fin formation invalide !',
							                    type: 'error',
							                    showCancelButton: true,
							                    showConfirmButton: false,
							                    cancelButtonText: 'Réessayez'
							                })
										}
									} else{
										swalWithBootstrapButtons.fire({
						                    title: 'Oops',
						                    text: 'Date debut formation invalide !',
						                    type: 'error',
						                    showCancelButton: true,
						                    showConfirmButton: false,
						                    cancelButtonText: 'Réessayez'
						                })
									}
								} else{
									swalWithBootstrapButtons.fire({
					                    title: 'Oops',
					                    text: 'Adresse de formation invalide !',
					                    type: 'error',
					                    showCancelButton: true,
					                    showConfirmButton: false,
					                    cancelButtonText: 'Réessayez'
					                })
								}
							} else{
								swalWithBootstrapButtons.fire({
				                    title: 'Oops',
				                    text: 'Prix formation invalide !',
				                    type: 'error',
				                    showCancelButton: true,
				                    showConfirmButton: false,
				                    cancelButtonText: 'Réessayez'
				                })
							}
				             
			            } else{
			                swalWithBootstrapButtons.fire({
			                    title: 'Oops',
			                    text: 'Nom formation trop court !',
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    cancelButtonText: 'Réessayez'
			                })
			            }
			        } else{
			        	swalWithBootstrapButtons.fire({
		                    title: 'Oops',
		                    text: 'Veuillez choisir le formateur de la formation !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'D\'accord'
		                })
			        }
			    } else{
			    	swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Veuillez choisir la catégorie principale !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'D\'accord'
	                })
			    }
        	});



        	var idTrainingCat = $('#idTrainingCat');
        	idTrainingCat.on('change', function(){
        		console.log(idTrainingCat.val())
        	});
	                  
		
	</script>

@endsection