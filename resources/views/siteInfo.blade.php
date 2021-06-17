@extends('layouts.app')

@section('content')
        <div class="py-16 grid grid-flow-row grid-cols-2 grid-rows-10 gap-4 items-center sm:mx-16 sm:bg-green-800" id="interventionInfo">
            <div class="underline text-right">Intervention apartenant au chantier :</div>
            <div>
                <ul>
                    <li>Nom : {{ $intervention->site->name }}</li>
                    <li>N° Commande : {{ $intervention->site->orderNumber }}</li>
                    <li>N° CPD :</li>
                </ul>
            </div>

            <div class="underline text-right">Créateur : </div>
            <div>{{ $intervention->owner->firstname }} {{ $intervention->owner->lastname }} ({{ $intervention->owner->email }})</div>


            <div class="underline text-right">Type de l'intervention : </div>
            <div>{{ $intervention->type->name }}</div>

            <div class="underline text-right">Date de l'intervention : </div>
            <div>{{ $intervention->datetimeOfIntervention }})</div>

            <div class="underline text-right">Appartient au groupe d'intervention :</div>
            <div>
                @if ($intervention->interventionsGroup == null)
                    Pas de groupe d'intervention
                @else
                    <a href="#" class="hover:underline text-right">{{ $intervention->interventionsGroup->name }} (Voir plus) </a>
                @endif
            </div>

            <div class="underline text-right">Ouvrier qui ont travaillé sur l'intervention : </div>
            <div>{{ $intervention->teamMembers }}</div>

            <div class="underline text-right">Quantité : </div>
            <div>{{ $intervention->quantity }} {{ $intervention->unit }}</div>

            <div class="underline text-right">Temps passé : </div>
            <div>{{ $intervention->timeSpent }} {{ $intervention->unitOfTime->name }}</div>

            <div class="underline text-right">Temps passé : </div>
            <div>{{ $intervention->timeSpent }} {{ $intervention->unitOfTime->name }}</div>
        </div>

        <div class="px-16 flex justify-end space-x-1">
            <div class="underline text-right">Créé le : </div>
            <div>{{ $intervention->created_at->format('d-m-Y') }}</div>
        </div>
        
        <div class="px-16 flex justify-end space-x-1">
            <div class="underline text-right">Dernière fois mis à jour le : </div>
            <div>{{ $intervention->updated_at->format('d-m-Y')}}</div>
        </div>
@endsection