


let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("slide");

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";
}

function changeSlide(n) {
    slideIndex += n;
    showSlides();
}

// Run the slideshow automatically every 5 seconds
setInterval(showSlides, 5000);

// Run the slideshow when the page loads
showSlides();

document.addEventListener("DOMContentLoaded", function() {
    const announcementList = document.getElementById("announcement-list");
    const detailsContent = document.getElementById("details-content");
    const detailsHeading = document.getElementById("details-heading");

    announcementList.addEventListener("click", function(event) {
        if (event.target.tagName === "LI") {
            const announcementId = event.target.getAttribute("data-id");
            showDetails(announcementId);
        }
    });

    function showDetails(announcementId) {
        // Update this switch statement with details for each announcement
        let title, content;
        switch (announcementId) {
            case "1":
                title = "CALENDRIER ET LISTES DES EXAMENS";
                content = ` 
                <p> Le Doyen de la Faculté des Sciences et Techniques de Tanger porte à la connaissance des étudiants du cycle licence que les examens de la session de rattrapage du semestre d’automne 2023-2024 débuteront le Lundi 15 Janvier 2024 selon le calendrier ci-dessous.  </p>
                <br> Listes des examens 
                <a href="https://drive.google.com/drive/folders/1iDlOdVT6tQGPZY639xixbcobI8PAgou1" target="_blank" style="color: blue;" onclick="this.style.color='green'">: Cliquez-ici.</a>`;

                break;
            case "2":
                title = "10ÈME ÉDITION DU CONCOURS FRANCOPHONE INTERNATIONAL";
                content = `<p> L’Université Abdelmalek Essaaâdi informe ses doctorants de toutes les disciplines que le Centre National pour la Recherche Scientifique et Technique (CNRST) et l’Université Mohammed V de Rabat (UM5-R) ont ouvert les inscriptions pour le Concours Francophone International « Ma Thèse en 180 secondes » (MT180) – Édition 2024. Les candidatures seront acceptées jusqu’au 29 janvier 2024.  </p> 
                <br> 
                <p> Les objectifs de l’organisation de ce concours au Maroc sont: la mise en valeur de la relève scientifique marocaine, la formation des jeunes chercheurs à la communication et à la médiation des sciences, la facilitation de leur insertion professionnelle et le développement de leurs échanges avec des chercheurs relevant d’autres disciplines et d’autres pays.</p>
                 <br>
                 <p> Ce concours permet à chaque candidat de présenter son travail de thèse en 3 minutes devant un auditoire de non spécialistes. Il offre ainsi la possibilité aux participants de parfaire leurs aptitudes et compétences en communication scientifique en exigeant d’eux de s’exprimer en termes simples, à travers un exposé clair, concis et convaincant de leurs travaux de recherche.</p>
                 <br> `;
                break;
            case "3":
                title = "COMPÉTITION « HULT PRIZE »";
                content = ` 
                            <p>Joignez-vous à nous pour la Cérémonie d’Ouverture du Hult Prize à la FSTT, une matinée captivante dédiée à l’inspiration, à l’innovation et à la création d’un impact positif.<br>
                            Date : samedi 3 février 2024 <br>
                            Heure : 10 h
                            <br>
                            Lieu : Faculté des Sciences et Techniques de Tanger <br>
                            Pourquoi participer ? <br>
                            </p>
                            <p></p>
                            <p></p>
                            <a href="https://www.google.com" target="_blank" style="color: blue;" onclick="this.style.color='green'">Link to Hult Prize</a>`;

                break;
            case "4":
                title = "5ÈME CONCLAVE DE SÉCURITÉ AU MAROC";
                content = ` <p>Le 5ème Conclave de Sécurité au Maroc est créé pour échanger des connaissances sur les stratégies de cybersécurité avec plus de 300 responsables gouvernementaux, RSSI et professionnels de la sécurité. Un programme de conférence solide avec les idées de leaders d'opinion est en cours de création pour accroître les connaissances sur les cyberstratégies solides. Le dernier délai d'inscription le 24 janvier 2024.</p>`;
                break;
            default:
                title = "Details of Actualités";
                content = "Default details for Actualités...";
                break;
        }

        // Replace the content with actual details including images or links for download
        detailsHeading.innerHTML = title;
        detailsContent.innerHTML = content;
    }
});


