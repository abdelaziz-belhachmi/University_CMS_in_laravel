@extends('user.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('title', ' Formulaire de Demande de Document')
@section('contents')

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-image: url('/images/icon/tasse-cafe-ordinateur-portable-papeterie-bureau-bois-dans-bibliotheque.jpg');
        background-size: 100% 100%;


    }

    .demandeForme {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin-inline: auto;


    }

    .demandeForme textarea {
        width: 100%;


    }

    .demandeForme label {
        display: block;
        margin-bottom: 8px;
    }

    .demandeForme input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;

    }

    .demandeForme select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4c6cb2;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        position: abs;
        right: 0;

    }

    button:hover {
        background-color: #4e64ae;
    }


    .form-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 10px;
    }

    legend {
        background-color: #4e64ae;
        color: #fff;
        padding: 3px 6px;
    }
</style>

    <div>
       
        @if(session('message'))
        <div style="background-color: green; color: white; padding: 10px; text-align: center; border-radius: 5px;">
            {{ session('message') }}
        </div>
    @endif
    
       

        <form class="demandeForme"   style="margin-top:10vh" action="{{route('submit.demande')}}" method="post">
            @csrf
            <legend>Demande de Document Administratif</legend>
            <br>
            <label for="documentType">Type de Document:</label>
            <select id="documentType" name="type"  required>
                <option value="Attestation de réussite">Attestation de réussite</option>
                <option value="Relevé de Notes">Relevé de Notes</option>
                <option value="Convention de Stage">Convention de Stage</option>
                <option value="lettre de recommondation">lettre de recommondation</option>
                <option value="Demande de changement de Filière">Demande de changement de Filière</option>
           </select>


            <!-- Champs supplémentaires pour Relevé -->
            <div id="releveFields" style="display: block">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>

            </div>

    
            <div>
                <label for="professeur">Destinataire de la demande :</label>
            </div>

            <div class="form-group">
                <label for="chefService">Chef de Service</label>
                <input type="radio" id="chefService" name="destinataire" value="4">
            </div>

            <div class="form-group">
                <label for="chefFiliere">Chef de Filière</label>
                <input type="radio" id="chefFiliere" name="destinataire" value="2">
            </div>

            <div class="form-group">
                <label for="moiProfesseur">Professeur</label>
                <input type="radio" id="moiProfesseur" name="destinataire" value="1">
            </div>
            <button type="submit" >Soumettre</button>
        </form>

    </div>

@endsection
