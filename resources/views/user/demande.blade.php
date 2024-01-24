@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title', ' Demande')
@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire de Demande de Document</title>
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
            }

            button:hover {
                background-color: #4e64ae;
            }


            .form-group {
                display: grid;
                grid-template-columns: max-content auto;
                align-items: center;
                gap: 10px;
            }

            legend {
                background-color: #4e64ae;
                color: #fff;
                padding: 3px 6px;
            }
        </style>
    </head>

    <body>
       
        @if(session('message'))
        <div style="background-color: green; color: white; padding: 10px; text-align: center; border-radius: 5px;">
            {{ session('message') }}
        </div>
    @endif
    
       

        <form class="demandeForme"  action="{{route('submit.demande')}}" method="post">
            @csrf
            <span>Object</span>
            <legend>Demande de Document Administratif</legend>
            <br>
            <label for="documentType">Type de Document:</label>
            <select id="documentType" name="type" onchange="showAdditionalFields()" required>
                <option value="attestation">Attestation de réussite</option>
                <option value="releve">Relevé de Notes</option>
                <option value="stage">Convention de Stage</option>
                <option value="recom">lettre de recommondation</option>
                <option value="filiere">Demande de changement de Filiere</option>

                


            </select>


            <!-- Champs supplémentaires pour Relevé -->
            <div id="releveFields" style="display: block">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>

                <label for="semestre">Semestre:</label>
                <input type="text" id="semestre" name="semestre">
            </div>


            <!-- Champs supplémentaires pour Attestation -->
            <div id="attestationFields" style="display: block">
                <label for="filiere">Filière:</label>
                <input type="text" id="filiere" name="filiere">

                <label for="anneeUniversitaire">Année Universitaire:</label>
                <input type="text" id="anneeUniversitaire" name="anneeUniversitaire">
            </div>

            <!-- Champs supplémentaires pour Convention de Stage -->
            <div id="stageFields" style="display: none">
                <label for="dureeStage">Durée de Stage (en mois):</label>
                <input type="number" id="dureeStage" name="dureeStage">

                <label for="nomEntreprise">Nom de l'Entreprise:</label>
                <input type="text" id="nomEntreprise" name="nomEntreprise">
            </div>

            <div>
                <label for="professeur">Destinataire de la demande :</label>
            </div>

            <div class="form-group">
                <label for="chefService">Chef de Service</label>
                <input type="checkbox" id="chefService" name="recipient" value="chefService">
            </div>

            <div class="form-group">
                <label for="chefFiliere">Chef de Filière</label>
                <input type="checkbox" id="chefFiliere" name="recipient" value="chefFiliere">
            </div>

            <div class="form-group">
                <label for="moiProfesseur">Professeur</label>
                <input type="checkbox" id="moiProfesseur" name="recipient" value="moiProfesseur">
            </div>
            <button type="submit" >Soumettre</button>
        </form>

        <script>
            function showAdditionalFields() {
                var documentType = document.getElementById('documentType').value;
                var attestationFields = document.getElementById('attestationFields');
                var stageFields = document.getElementById('stageFields');

                if (documentType === 'attestation') {
                    attestationFields.style.display = 'block';
                    stageFields.style.display = 'none';

                    // Afficher le champ pour l'année universitaire
                    document.getElementById('anneeUniversitaire').parentNode.style.display = 'block';
                } else if (documentType === 'stage') {
                    stageFields.style.display = 'block';
                    releveFields.style.display = 'none';
                    attestationFields.style.display = 'block';



                    // Masquer le champ pour l'année universitaire
                    document.getElementById('anneeUniversitaire').parentNode.style.display = 'none';
                } else {
                    attestationFields.style.display = 'none';
                    stageFields.style.display = 'none';
                    releveFields.style.display = 'block';


                    // Masquer le champ pour l'année universitaire
                    document.getElementById('anneeUniversitaire').parentNode.style.display = 'none';
                }
            }
        </script>
    </body>

    </html>
@endsection
