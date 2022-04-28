@extends('root.template')
@section('title', 'DASHBOARD | Agbana ADMIN')
@section('sectionTitle', 'Tableau de bord')

@section('sectionDescription')
	
@endsection
 
@section('mainContent')
            <div class="">
                <div class="card-header">Liste des commandes</div>
                <div class="table-responsive">
                     <table id='tableau' class='table'> 
                        <thead> 
                            <tr>
                                <th>Date</th>
                                <th>Client</th>
                                 <th>Telephone</th>
                                <th>Adresse</th>
                                 <th>Prix Total</th>
                                <th>Etat</th>
                                <th>Montant Payé</th> 
                                <th>Détail Commande</th>
                                <th>Paiements</th>
                            </tr> 
                        </thead>
                        <tbody> 
                            @foreach($commande3 as $commande1) 
                            <tr>
                                {{-- <td>{{$i}}</td> --}}
                                <td>{{$commande1->dateCreation}}</td>
                                <td>{{$commande1->Nom}} {{$commande1->Prenom}} </td>
                                <td>{{$commande1->Telephone}}</td>
                                <td>{{$commande1->Adresse}}</td>
                                <td>{{$commande1->PrixTotal}}</td>
                                @if (($commande1->EtatCommande) == "Validée" )
                                    <td><span style="font-family: Verdana, 'Times New Roman', Times, serif; font-size: 12px; text-align: center;" class="badge badge-pill badge-success">{{$commande1->EtatCommande}}</span></td>
                                    <td>{{$commande1->PrixTotal}} FCFA</td>
                                @else
                                @if (($commande1->EtatCommande) == "En attente de validation" )
                                <td><span style="font-family: Verdana, 'Times New Roman', Times, serif; font-size: 12px; text-align: center;" class="badge badge-pill badge-danger">{{$commande1->EtatCommande}}</span></td>

                                <td>0 FCFA</td>
                                @endif
                                @if (($commande1->EtatCommande) == "Paiement en cours" )
                                    <td><span style="font-family: Verdana, 'Times New Roman', Times, serif; font-size: 12px; text-align: center;" class="badge badge-pill badge-warning">{{$commande1->EtatCommande}}</span></td>

                                <td>
                                    <?php
                                        $paiement = DB::table('paiement')
                                        ->where('paiement.IdCommande','=', $commande1->IdCommande)
                                        ->get();
                                        $s=0;
                                     ?>
                                     @foreach($paiement as $somme)
                                     <?php 
                                     $s=$s+$somme->MontantPaiement; 
                                      ?>
                                     
                                     @endforeach


                                     {{$s}} FCFA
                                </td>
                                @endif
                                @endif
                                
                                <td onclick="window.location.href = '{{ url('/detailC/'.($commande1->IdCommande))}}' "><button class="btn btn-info btn-sm" title="details" ><i class="fa fa-fw fa-eye"></i></button></td>
                                <td onclick="window.location.href = '{{ url('/paiementC/'.($commande1->IdCommande))}}' "><button class="btn btn-info btn-sm" title="details" >Paiements</button></td>
                            
                            </tr>
                            @endforeach                         
                        </tbody> 
                    </table>
                </div>
            </div> 
    
@endsection