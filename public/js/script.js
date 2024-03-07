// Script.js

// Function to open the add movie form modal
function openAddForm() {
    document.getElementById("addModal").style.display = "block";
}

// Function to close the add movie form modal
function closeAddForm() {
    document.getElementById("addModal").style.display = "none";
}

// Function to open the edit form modal
function openEditForm() {
    document.getElementById("editModal").style.display = "block";
}

// Function to close the edit form modal
function closeEditForm() {
    document.getElementById("editModal").style.display = "none";
}

// Function to open the delete form modal
function openDeleteForm() {
    document.getElementById("deleteModal").style.display = "block";
}

// Function to close the delete form modal
function closeDeleteForm() {
    document.getElementById("deleteModal").style.display = "none";
}

// Function to search movies
function searchMovies() {
    var input, filter, movieList, movieItems, title, i;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    movieList = document.getElementById('movieList');
    movieItems = movieList.getElementsByClassName('movie-item');
    for (i = 0; i < movieItems.length; i++) {
        title = movieItems[i].getElementsByTagName("h3")[0];
        if (title.innerHTML.toUpperCase().indexOf(filter) > -1) {
            movieItems[i].style.display = "";
        } else {
            movieItems[i].style.display = "none";
        }
    }
}

// Function to save added movie
function saveAdd() {
    // Code to save the added movie goes here
    if (document.getElementById("genre").value == "") {
        alert("selectionez au moin un genre");
    } else {
        alert("c'est bon");
    }
}

// Function to save edited movie
function saveEdit() {
    // Code to save the edited movie goes here
    closeEditForm();
}

// Function to delete movie
function deleteMovie() {
    // Code to delete the movie goes here
    closeDeleteForm();
}

// Function to open the showTimes
function openShowTimes(id_salle) {
    document.getElementById(id_salle).style.display = "block";
}

// Function to close the showTimes
function closeShowTimes(id_salle) {
    document.getElementById(id_salle).style.display = "none";
}

function setjour() {
    jour = document.getElementsByClassName("jour");
    for (let i = 0; i < jour.length; i++) {
        let dateAujourd_huit = new Date();
        let aujourd_huit = dateAujourd_huit.getDay();
        let nouveau_jour = (aujourd_huit + i) % 7;
        let semaine = ['Dimenche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        jour[i].innerHTML = semaine[nouveau_jour];
    }
}
setjour();

// Function to open the add planing form modal
function openAddPlan(dateP,heureP,salleP) {
    document.getElementById("addPlan").style.display = "block";
    let dateP2=dateP.toString();
    document.getElementById("dateP").value=dateP2.substr(0,4)+"-"+dateP2.substr(4,2)+"-"+dateP2.substr(6,2);
    document.getElementById("heureP").value=heureP+":00:00";
    document.getElementById("salleP").value=salleP;
}

// Function to close the add planing form modal
function closeAddPlan() {
    document.getElementById("addPlan").style.display = "none";
}