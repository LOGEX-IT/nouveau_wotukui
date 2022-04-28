@extends('root.template')
@section('title', 'AJOUT SESSION FROMATION | AEC ADMIN')
@section('sectionTitle', 'Ajout de Session Formation')

@section('styleSheets')
	<style type="text/css">
		::placeholder{
			text-transform: uppercase !important;
			font-size: 0.8em;
		}
	</style>
@endsection
@section('sectionDescription')
	Ajouter une nouvelle Session de Formation
@endsection

@section('mainContent')
	<div class="row align-items-center justifiy-content-center">
        <div class="col-md">
            <div class="main-card mb-3 card" style="padding:  0 20px 50px 20px">
                <div class="card-body">
                	<h5 class="card-title">Session formation</h5>
                    <p>Ajouter une nouvelle Session de Formation</p></div>

                    <div class="form-row">
                        <div class="col-md-3">
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

                        <div class="col-md-3">
                            <label for="nextDate" style="text-transform: uppercase; font-size: 0.7em;">
                            	Prochaine Date de la formation
                            </label>
                            <input type="date" class="form-control" name="nextDate" id="nextDate" placeholder="Date prochaine formation" >
                        </div>

	                    <div class="col-md-3">
                            <label for="nextLocation" style="text-transform: uppercase; font-size: 0.7em;">
                            	Prochaine adresse de la formation
                            </label>
                            <input type="text" class="form-control" name="nextLocation" id="nextLocation" placeholder="adresse prochaine formation" >
                        </div>
                        <div class="col-md-2 align-items-center justify-content-center">
                        	
                        	<div style="margin: 30px 0 0 30px; display: inline-block;">
                        		<input type="submit" onclick="storeSessionTraining()" class="btn btn-primary" value="VALIDER">
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

			function storeSessionTraining(){
            	
				var idTraining = $('#idTraining');
				var nextDate = $('#nextDate');
				var nextLocation = $('#nextLocation');
            	var _token = $('input[name="_token"]').val();

	           	if (idTraining.val()!==null && $.isNumeric(idTraining.val())) {
	           		if (nextDate.val().length==10) {
	           			if (nextLocation.val().length>4) {
			                showWaitingMask(true);
			                //AJAX REQUEST
			                $.ajax({
			                    type: 'POST',
			                    url: '{{ route("storeTrainingOnSessionList") }}',
			                    data: { 
			                        idTraining:idTraining.val(),
			                        nextDate:nextDate.val(),
			                        nextLocation:nextLocation.val(),
			                        _token:_token
			                    },

			                    success:function(result) {
			                        showWaitingMask(false);
			                        if(result == '1'){
			                            swalWithBootstrapButtons.fire({
			                                title: 'Good Job',
			                                text: 'Nouvelle session ajoutée avec succès !',
			                                type: 'success',
			                                showConfirmButton: true,
			                                confirmButtonText: 'Super'
			                            })
			                        }
			                        else if (result == '-1') {
			                            swalWithBootstrapButtons.fire({
			                                title: 'Oops',
			                                text: 'Une session plus récente de cette formation existe',
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
			                    text: 'Nouvelle adresse de formation trop courte !',
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    cancelButtonText: 'D\'accord'
			                })
			            }
		            } else{
		            	swalWithBootstrapButtons.fire({
		                    title: 'Oops',
		                    text: 'Prochaine date de formation invalide !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'D\'accord'
		                })
		            }
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
        	}
		
	</script>

@endsection