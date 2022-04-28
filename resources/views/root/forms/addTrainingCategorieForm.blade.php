@extends('root.template')
@section('title', 'AJOUT CATEGORIE FORMATION | AEC ADMIN')
@section('sectionTitle', 'Ajout de Catégorie Formation')
@section('sectionDescription')
	Ajouter une nouvelle categorie de formation
@endsection

@section('mainContent')
	<div class="row align-items-center justifiy-content-center">
        <div class="col-md">
            <div class="main-card mb-3 card" style="padding:  0 20px 50px 20px">
                <div class="card-body">
                	<h5 class="card-title">Nom de la categorie</h5>
                    <p>Ajouter une nouvelle categorie de formation</p></div>

                    <div class="form-row">
                        <div class="col-md-8">
                            <label for="trainingCatName" style="text-transform: uppercase; font-size: 0.7em;">Veuillez renseigner le nom de la catégorie</label>
                            <input type="text" class="form-control" id="trainingCatName" placeholder="Nom" required>
                        </div>
                        <div class="col-md-4 align-items-center justify-content-center">
                        	<div style="margin: 35px 0 0 20px; display: inline-block;">
	                        	<input type="checkbox" id="trainingCatStatus">
	                        	<label for="trainingCatStatus" style="text-transform: uppercase; font-size: 0.8em;">activer</label>
	                        </div>
                    
                        	<div style="margin: 25px 0 0 30px; display: inline-block;">
                        		<input type="submit" onclick="submitTrainingCatName()" class="btn btn-primary" value="VALIDER">
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

			function submitTrainingCatName(){
            	var trainingCatName = $('#trainingCatName');
				var trainingCatStatus = $('#trainingCatStatus');
            	var _token = $('input[name="_token"]').val();

	            if(trainingCatName.val().length >3){
	                showWaitingMask(true);
	                //AJAX REQUEST
	                $.ajax({
	                    type: 'POST',
	                    url: '{{ route("storeTrainingCategorie") }}',
	                    data: { 
	                        trainingCatName:trainingCatName.val(),
	                        trainingCatStatus:trainingCatStatus.prop("checked")?1:0,
	                        _token:_token
	                    },

	                    success:function(result) {
	                        showWaitingMask(false);
	                        if(result == '1'){
	                            swalWithBootstrapButtons.fire({
	                                title: 'Good Job',
	                                text: 'Catégorie ajoutée avec succès !',
	                                type: 'success',
	                                showConfirmButton: true,
	                                confirmButtonText: 'Super'
	                            })
	                
	                            trainingCatName.val('');
	                        }
	                        else if (result == '-1') {
	                            swalWithBootstrapButtons.fire({
	                                title: 'Oops',
	                                text: 'Catégorie est déjà existante',
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
	                    text: 'Le nom de la catégorie est trop court !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'Réessayez'
	                })
	            }
        	}
		
	</script>

@endsection