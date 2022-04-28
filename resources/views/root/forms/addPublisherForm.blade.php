@extends('root.template')
@section('title', 'AJOUT PUBLICITE | AEC ADMIN')
@section('sectionTitle', 'Ajout d\'une publicité')
@section('sectionDescription')
	Ajouter un nouvelle publicité défilante
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
                	<h5 class="card-title">Publicité défilante</h5>
                    <p>Ajouter un nouvelle publicité défilante</p></div>

                    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="publicityForm">
	                    <div class="form-row">
	                        <div class="col-md-4">
	                            <label for="publisherName" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Nom de la publicité
	                            </label>
	                            <input type="text" class="form-control" name="publisherName" id="publisherName" placeholder="Nom publicité" >
	                        </div>
	                        <div class="col-md-4">
	                            <label for="publisherLink" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Lien vers la Publicité
	                            </label>
	                            <input type="url" class="form-control" name="publisherLink" id="publisherLink" placeholder="Lien publicité" >
	                        </div>


	                        <div class="col-md-2 align-items-center text-center">
	                        	<label for="publisherCover" style="cursor: pointer; margin-top: -10px; margin-left: 20px; display: inline-block;">
			            			<img class="img-fluid animated infinite pulse" src="{{ URL::to('/storage/defaultCovers/default_1.jpg') }}" id="coverPreview" style="display: block; width: 150px; height: auto; border-radius: 6px;">
		              				<p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 15px">Couverture de la Publicité</p>
			            		</label>

		            			<input type="file" accept="image/*" name="publisherCover" id="publisherCover" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">
		            		</div>
                        	<div class="col-md-2" style="margin-top: ; ">
	                        	<div style="margin: 25px 0 0 35px;">
		                        	<input type="checkbox" name="publisherStatus" id="publisherStatus">
		                        	<label for="publisherStatus" style="text-transform: uppercase; font-size: 0.8em;">Activer</label>
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

			$("#publisherCover").on('change', function(){
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

            $('#publicityForm').on('submit', function(e){
            	e.preventDefault();
            })

			$('#submitForm').on('click', function(){
				
            	var publisherName = $('#publisherName');
            	var publisherLink = $('#publisherLink');
				var publisherStatus = $('#publisherStatus');
				var publisherCover = $("#publisherCover").get(0).files;
            	var _token = $('input[name="_token"]').val();

            	var urlRegex = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/;

	            if(publisherName.val().length >3){
	            	if(urlRegex.test(publisherLink.val())){
        				if (publisherCover.length == 0) {
			                swalWithBootstrapButtons.fire({
			                    title: 'Oops',
			                    text: "Sélectionner une couverture pour la publicité !",
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    confirmButtonText: 'D\'accord'
			                })

						} else{
			                showWaitingMask(true);

			                var form = $('#publicityForm')[0];
							var data = new FormData(form);
			                //AJAX REQUEST
			                $.ajax({
			                    type: 'POST',
								enctype: 'multipart/form-data',
								url: '{{ route("storePublicity") }}',
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
			                                text: 'Publicité ajoutée avec succès !',
			                                type: 'success',
			                                showConfirmButton: true,
			                                confirmButtonText: 'Super'
			                            })
			                
			                            publisherName.val('');
						            	publisherLink.val('');
			                            readPictureURL($('#publisherCover'));
			                        }
			                        else if (result == '-1') {
			                            swalWithBootstrapButtons.fire({
			                                title: 'Oops',
			                                text: 'Publicité existante',
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
		                    text: 'Lien publicité invalide !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'Réessayez'
		                }).then((result)=>{
		                	swalWithBootstrapButtons.fire({
			                    title: 'Un instant',
			                    text: 'La synthaxe du lien doit ressembler à cet exemple | http://www.exemple.com',
			                    type: 'info',
			                    showCancelButton: false,
			                    showConfirmButton: true,
			                    cancelButtonText: 'D\'accord'
			                })
		                })
		            } 
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Nom publicité trop court !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'Réessayez'
	                })
	            }
        	});
		
	</script>

@endsection