@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<style>
  #ul{
    width: auto !important;
    text-align: center;
display: block;
justify-content: center;
  }
  #ul>li{
    margin:0px !important; 
    padding: 10px !important;
    height: auto !important;
    display: flex;  
    justify-content: space-evenly;
  }
  #rtr{
    background-color: red;
    color: white;
    padding: 6px;
    border-radius: 20px;
    opacity: 0.7;
  }
  #rtr:hover{
    opacity: 1;
  }

  /**/

  @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

* {
	box-sizing: border-box;
}

body {
	background-color: #F8F9FD;
	font-family: 'Muli', sans-serif;
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
	margin: 0;
}

#srchbardiv{
  
}

.container {
	border-radius: 5px;
	box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
	overflow: hidden;
	width: 100%;
}
 
.title {
	margin: 0;
}

.subtitle {
	display: inline-block;
	margin: 5px 0 20px;
	opacity: 0.8;
}

.header {
	/* background-color: #3E57DB; */
	color: #000000;
	padding: 30px 20px;
}

.header input {
	background-color: rgba(0, 0, 0, 0.3);
	border: 0;
	border-radius: 50px;
	color: #fff;
	font-family: 'Muli', sans-serif;
	font-size: 14px;
	padding: 10px 15px;
	width: 100%;
}

.users-list {
	background-color: #fff;
	list-style-type: none;
	margin: 0;
	max-height: 400px;
	overflow-y: auto;
	padding: 0;
}

.users-list li {
	display: flex;
	padding: 20px;
}

.users-list li:not(:last-of-type) {
	border-bottom: 1px solid #eee;
}

.users-list li.hide {
	display: none;
}

.users-list li img {
	border-radius: 50%;
	object-fit: cover;
	height: 50px;
	width: 50px;	
}

.user-info {
	margin-left: 10px;
}

.user-info h4 {
	margin: 0 0 10px;
}

.user-info p {
	font-size: 12px;
}




 
</style>
<div>
  
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/Classes/nouveau" id="contactForm" method="post">
              @csrf
             
              <span>Nom Classe</span>
              <input type="text" name="nom" class="nom" placeholder="Entrer le nom du Classe" required />
              
              <label>Student List</label>
              <ul id="ul" style="list-style-type:none;">
                

               </ul> 

              

              <input type="submit" name="submit" value="Enregister" class="submit" >
      
            </form>
          </div>

      </section>

      {{--  --}}
      <hr>
      {{--  --}}
      <div id="srchbardiv" style="width: 80% ; justify-content:center;display:flex">

      <div class="container">
        <div class="header">
          <h4 class="title">Live User Filter</h4>
          <small class="subtitle">Search by name and/or code etudiant</small>
          <input type="text" id="filter" placeholder="Search"/>
        </div>
        <ul id="result" class="users-list">
          @foreach($etudiants as $etudiant)
          <li onclick="addme('{{$etudiant->user->id}}', '{{$etudiant->user->name}}', '{{$etudiant->user->prenom}}', '{{$etudiant->code_apogee}}')" data-user-id="{{$etudiant->user->id}}" style="display: none">
            <img src="/images/imagesdep/person.png" >
              <div class="user-info">
                <h4>{{$etudiant->user->name}} {{$etudiant->user->prenom}}</h4>
                <p>{{$etudiant->code_apogee}}</p>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
      
      

      <script>

function addme(userId, userName, userPrenom, codeApogee) {
    // Create a new li element
    const newLi = document.createElement('li');
    newLi.className = 'UID';
    newLi.id = userId;

    // Create and append the content
    newLi.innerHTML = `
        <input type="hidden" name="student_ids[]" value="${userId}">
            <h5>${userName} ${userPrenom}</h5>
            <p>${codeApogee}</p>        
    `;

    // Add the new li to the new list
    const ulNewList = document.getElementById('ul');
    ulNewList.appendChild(newLi);

    // Remove the li from the original list
    const liToRemove = document.querySelector(`.users-list li[data-user-id="${userId}"]`);
    liToRemove.remove();
}


  function removeListItem(link) {
        var listItem = link.parentNode;

        var ulElement = listItem.parentNode;

        ulElement.removeChild(listItem);
    }

/**/

const result = document.getElementById('result');
const filter = document.getElementById('filter');

const listItems = document.querySelectorAll('.users-list li');

// getData();

filter.addEventListener('input', (e) => {
	filterData(e.target.value);
});


function filterData(searchTerm) {
    listItems.forEach(item => {
        const studentInfo = item.querySelector('.user-info');
        const studentName = studentInfo.querySelector('h4').innerText.toLowerCase();
        const apogee = studentInfo.querySelector('p').innerText.toLowerCase();

        if (studentName.includes(searchTerm.toLowerCase()) || apogee.includes(searchTerm.toLowerCase())) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
}




      </script>

</div>
    
  @endsection