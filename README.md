# University_CMS_in_laravel

But : Créer une application Web, sous PHP/MySQL, qui permet aux étudiants et à certains intervenants dans l’action pédagogique de consulter et de mettre à jour des informations liées à la communication, à l’accès à certains services et à la gestion des emplois du temps et des événements importants.  En effet, il s’agit de proposer une analyse et une conception convenables, créer et gérer une base de données puis proposer une interface Web pour se servir des fonctionnalités décrites en bas. 

Chaque département de la FST dispose d’un ensemble de locaux (Salle de cours, Salle TP … ), un local qui n’est attribué à aucun département est attaché  au service pédagogique. Un local dispose d’un planning d’occupation pour chaque semestre. Chaque jour du planning est constitué de 5 créneaux horaires de 1h 45 minutes. A chaque créneau correspond une  activité pédagogique liée à un module (Cours, TD, TP … ). 

Chaque local  contient un ou plusieurs matériaux pédagogiques (Projecteur, ordinateur, point d’accès Wifi … ). Un matériel pédagogique peut être en panne ou opérationnel et peut subir des interventions de réparation.

Le site est consulté par cinq utilisateurs :

# Invité :

- peut consulter uniquement des informations sur les filières et leurs contenus 
- voir les annonces publiques liées aux départements (Soutenances de PFE, Journées portes ouvertes … ). 

# Étudiant:

- peut consulter son emploi du temps .
- peut consulter les annonces postées par les professeurs responsables des modules, le responsable de filière et le chef de département.
- Il peut aussi faire une demande de lettre de recommandation ou d’un rendez-vous avec un professeur, justifier une absence, demander le changement de groupe de TP … .
- Le délégué de classe peut signaler au responsable de filière les pannes matérielles, les incidents du quotidien liés aux objets endommagés (chaise, tableau, Prise internet …).

# Professeur responsable d’un module :

- peut gérer les annonces liées à ses modules (Annulation d’une séance, CC …  ) 
- répondre aux demandes postées par les étudiants. 

# Responsable d’une filière: 

- peut gérer les annonces (arrêt des cours, planning des soutenances … )
- répondre aux demandes postées par les étudiants.

# Chef d’un département : 

peut gérer les emplois  du temps des salles de son département et les annonces ( Rencontres, périodes des soutenances des PFEs… ).  

# Responsable du service pédagogique : 

- Gère les emplois du temps des salles qui ne sont liées à aucun département 
- Affecter une salle à un département
- Modifier le professeur responsable d’un département, d’une filière ou d’un module
- Inscrire une nouvelle classe d’étudiants dans un module
-  Ajouter et modifier le contenu d’une filière … .


Après authentification, chaque utilisateur à accès à un tableau de bord qui contient les fonctionnalités qui lui sont associées. 
