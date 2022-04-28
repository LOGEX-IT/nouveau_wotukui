@extends('root.template')
@section('title', 'AJOUT CATEGORIE CURSUS | AEC ADMIN')
@section('styleSheets')
	<style type="text/css">
		::placeholder{
			text-transform: uppercase !important;
			font-size: 0.8em;
		}
	</style>
@endsection
@section('sectionTitle', 'Ajout de Catégorie Cursus')
@section('sectionDescription')
	Ajouter une nouvelle categorie de Cursus
@endsection

@section('mainContent')

	<div class="row align-items-center justifiy-content-center">
        <div class="col-md">
            <div class="main-card mb-3 card" style="padding:  0 20px 50px 20px">
                <div class="card-body">
                	<h5 class="card-title">Cursus categorie</h5>
                    <p>Ajouter une nouvelle sous-categorie de Cursus</p></div>
                    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="cursusCatForm">
	                    <div class="form-row">
	                        <div class="col-md-4">
	                            <label for="cursusCatName" style="text-transform: uppercase; font-size: 0.7em;">
	                            	nom cursus formation
	                            </label>
	                            <input type="text" class="form-control" name="cursusCatName" id="cursusCatName" placeholder="Nom Cursus" >
	                        </div>
	                        <div class="col-md-4">
	                            <label for="cursusCatPrice" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Prix cursus formation
	                            </label>
	                            <input type="number" class="form-control" name="cursusCatPrice" id="cursusCatPrice" placeholder="Prix Cursus" >
	                        </div>

	                        <div class="col-md-4">
	                            <label for="cursusCatEconomy" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Pourcentage d'économie
	                            </label>
	                            <input type="number" class="form-control" name="cursusCatEconomy" id="cursusCatEconomy" placeholder="Pourcentage économie" >
	                        </div>
	                    </div>

	                    <br>

	                    <div class="form-row">

	                        <div class="col-md-8 align-items-center justify-content-center">
	                        	<label style="text-transform: uppercase; font-size: 0.7em; margin-top: 10px" for="cursusCatDescription">Description de ce cursus de formation</label>
	                        	<textarea class="form-control" name="cursusCatDescription" id="cursusCatDescription" placeholder="Description Cursus"></textarea>
	                        </div>
	                        <div class="col-md-2">
	                        	 <label for="cursusCatCover" style="cursor: pointer; margin-left: 20px">
			            			<img class="img-fluid animated infinite pulse" src="{{ URL::to('/storage/defaultCovers/default_1.jpg') }}" id="coverPreview" style="display: block; width: 200px; height: auto;border-radius: 5px;">
		              				<p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 20px">couverture principale</p>
			            		</label>

		            			<input type="file" accept="image/*" name="cursusCatCover" id="cursusCatCover" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">
	                        </div>
	                        <div class="col-md-2">
	                        	<div style="margin: 30px 0 0 35px; display: inline-block;">
		                        	<input type="checkbox" name="cursusCatStatus" id="cursusCatStatus">
		                        	<label for="cursusCatStatus" style="text-transform: uppercase; font-size: 0.8em;">activer</label>
		                        </div>
	                    
	                        	<div style="margin: 0px 0 0 30px; display: inline-block;">
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

			$("#cursusCatCover").on('change', function(){
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

            $('#cursusCatForm').on('submit', function(e){
            	e.preventDefault();
            })

			$('#submitForm').on('click', function(){
				
            	var cursusCatName = $('#cursusCatName');
            	var cursusCatPrice = $('#cursusCatPrice');
            	var cursusCatEconomy = $('#cursusCatEconomy');
            	var cursusCatDescription = $('#cursusCatDescription');
				var cursusCatStatus = $('#cursusCatStatus');
				var cursusCatCover = $("#cursusCatCover").get(0).files;
            	var _token = $('input[name="_token"]').val();

	            if(cursusCatName.val().length >3){
	            	if ($.isNumeric(cursusCatPrice.val())) {
	            		if ($.isNumeric(cursusCatEconomy.val()) && parseInt(cursusCatEconomy.val()) <100 ) {
	            			if (cursusCatDescription.val().length>4) {
	            				if (cursusCatCover.length == 0) {

					                swalWithBootstrapButtons.fire({
					                    title: 'Oops',
					                    text: "Veuillez choisir la couverture du cursus !",
					                    type: 'error',
					                    showCancelButton: true,
					                    showConfirmButton: false,
					                    cancelButtonText: 'D\'accord'
					                })

								} else{
					                showWaitingMask(true);

					                var form = $('#cursusCatForm')[0];
									var data = new FormData(form);
					                //AJAX REQUEST
					                $.ajax({
					                    type: 'POST',
										enctype: 'multipart/form-data',
										url: '{{ route("storeCursusCategorie") }}',
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
					                                text: 'Cursus ajouté avec succès !',
					                                type: 'success',
					                                showConfirmButton: true,
					                                confirmButtonText: 'Super'
					                            })
					                
					                            cursusCatName.val('');
								            	cursusCatPrice.val('');
								            	cursusCatEconomy.val('');
								            	cursusCatDescription.val('');
					                            readPictureURL($('#cursusCatCover'));
					                        }
					                        else if (result == '-1') {
					                            swalWithBootstrapButtons.fire({
					                                title: 'Oops',
					                                text: 'Cursus existant',
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
				                    text: 'Description Cursus invalide !',
				                    type: 'error',
				                    showCancelButton: true,
				                    showConfirmButton: false,
				                    cancelButtonText: 'Réessayez'
				                })
						    }
						} else{
							swalWithBootstrapButtons.fire({
			                    title: 'Oops',
			                    text: 'Pourcentage Economie invalide !',
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    cancelButtonText: 'Réessayez'
			                })
						}
		            } else{
		            	swalWithBootstrapButtons.fire({
		                    title: 'Oops',
		                    text: 'Prix Cursus invalide !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'Réessayez'
		                })
		            } 
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Nom Cursus trop court !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'Réessayez'
	                })
	            }
        	});
		
	</script>

@endsection