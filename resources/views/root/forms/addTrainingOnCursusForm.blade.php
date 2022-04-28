@extends('root.template')
@section('title', 'AJOUT FORMATION CURSUS | AEC ADMIN')
@section('sectionTitle', 'Ajout de Formation Cursus')
@section('sectionDescription')
	Ajouter un nouvelle Formation de cursus
@endsection

@section('mainContent')
	<div class="row align-items-center justifiy-content-center">
        <div class="col-md">
            <div class="main-card mb-3 card" style="padding:  0 20px 50px 20px">
                <div class="card-body">
                	<h5 class="card-title">Migration formation vers cursus</h5>
                    <p>Ajouter un nouvelle Formation de cursus</p></div>

                    <div class="form-row">
                        <div class="col-md-5">
                            <label for="idCursusCat" style="text-transform: uppercase; font-size: 0.7em;">Veuillez choisir le cursus</label>

                            <select name="idCursusCat" class="form-control" id="idCursusCat">
                            	<option selected="" disabled="">Choisissez le cursus</option>
                            	@foreach($cursusCats as $cursusCat)
                            		<option value="{{  $cursusCat->idCursusCat }}">
                            			{{ $cursusCat->cursusCatName }}
                            		</option>
                            	@endforeach
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label for="idTraining" style="text-transform: uppercase; font-size: 0.7em;">Veuillez choisir la formation</label>

                            <select name="idTraining" class="form-control" id="idTraining">
                            	<option selected="" disabled="">Choisissez la formation</option>
                            	@foreach($trainings as $training)
                            		<option value="{{  $training->idTraining }}">
                            			{{ $training->trainingName }}
                            		</option>
                            	@endforeach
                            </select>
                        </div>
                        <div class="col-md-2 align-items-center justify-content-center">
                        	
                        	<div style="margin: 30px 0 0 30px; display: inline-block;">
                        		<input type="submit" onclick="storeCursusTraining()" class="btn btn-primary" value="VALIDER">
                        	</div>
                        </div>
                        {{ csrf_field() }}
                    </div>
            </div>

        </div>
    </div>
@endsection


@section('jsSheets')

	<script type="text/javascript">

			function storeCursusTraining(){
            	var idCursusCat = $('#idCursusCat');
				var idTraining = $('#idTraining');
            	var _token = $('input[name="_token"]').val();

	           	if (idCursusCat.val()!==null && $.isNumeric(idCursusCat.val())) {
	           		if (idTraining.val()!==null && $.isNumeric(idTraining.val())) {
		                showWaitingMask(true);
		                //AJAX REQUEST
		                $.ajax({
		                    type: 'POST',
		                    url: '{{ route("storeTrainingOnCurusList") }}',
		                    data: { 
		                        idCursusCat:idCursusCat.val(),
		                        idTraining:idTraining.val(),
		                        _token:_token
		                    },

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
		                        }
		                        else if (result == '-1') {
		                            swalWithBootstrapButtons.fire({
		                                title: 'Oops',
		                                text: 'Cette formation existe déjà dans ce cursus',
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
		            } else{
		            	swalWithBootstrapButtons.fire({
		                    title: 'Oops',
		                    text: 'Veuillez choisir une formation !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'D\'accord'
		                })
		            }
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Veuillez choisir un cursus !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'D\'accord'
	                })
	            }
        	}
		
	</script>

@endsection