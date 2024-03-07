<?php
include_once("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
        <title>Movie CRUD - Admin Dashboard</title>
    </head>
    <body>
        <div class="content">
            <header>
                <h2>Movie Management</h2>
            </header>
            <main>
                <div class="search-container">
                    <input type="text" id="searchInput" onkeyup="searchMovies()" placeholder="Rechercher des films...">
                </div>
                <input type="button" onclick="openAddForm()" value="Ajouter un film">

                <div id="addModal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeAddForm()">&times;</span>
                        <h3>Ajouter un film</h3>
                        <form id="addMovieForm" action="ajouterFilm.php" method="post">
                            <label for="titre">Titre:</label>
                            <input type="text" id="titre" name="titre" required>
                            <label for="duree">Durée:</label>
                            <input type="text" id="duree" name="duree">
                            <label for="dateSortie">Date de sortie:</label>
                            <input type="date" id="dateSortie" name="dateSortie">
                            <label for="genre">Genre:</label>
                            <select name="genre[]" id="genre" multiple required>
                            <?php
                                include("connexion.php");
                                $result = $connexion -> query("SELECT libelle FROM `genre`");
                                for($i=0;$i<$result->num_rows;$i++){
                                    $row = $result->fetch_assoc();
                                    echo "<option value='".$row['libelle']."'>".$row['libelle']."</option>";
                                } 
                            ?>
                            </select><br>
                            <label id="marTop" for="description">Description:</label>
                            <textarea id="description" name="description"></textarea>
                            <label for="ageRestriction">Restriction d'âge:</label>
                            <input type="number" id="ageRestriction" name="ageRestriction" value="12" min="12" max="18">
                            <label for="image">Image:</label>
                            <input type="file" id="image" name="image">
                            <input type="submit" onclick="saveAdd()" value="Sauvegarder">
                            <input type="reset" class="redbutton" onclick="closeAddForm()" value="Annuler">
                        </form>
                    </div>
                </div>
                <!-- Edit Movie Modal -->
                <div id="editModal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeEditForm()">&times;</span>
                        <h3>Modifier un film</h3>
                        <form id="editMovieForm">
                            <label for="editTitle">Title:</label>
                            <input type="text" id="editTitle" name="editTitle">
                            <label for="editDuration">Duration:</label>
                            <input type="text" id="editDuration" name="editDuration">
                            <label for="editReleaseDate">Release Date:</label>
                            <input type="date" id="editReleaseDate" name="editReleaseDate">
                            <label for="editGenre">Genre:</label>
                            <input type="text" id="editGenre" name="editGenre">
                            <label for="editSummary">Summary:</label>
                            <textarea id="editSummary" name="editSummary" rows="3"></textarea>
                            <label for="editAgeRestriction">Age Restriction:</label>
                            <input type="text" id="editAgeRestriction" name="editAgeRestriction">
                            <label for="editImage">Image:</label>
                            <input type="file" id="editImage" name="editImage">
                            <input type="submit" onclick="saveEdit()" value="Sauvegarder">
                            <input type="reset" class="redbutton" onclick="closeEditForm()" value="Annuler">
                        </form>
                    </div>
                </div>

                <div id="movieList">
                    <?php
                        include("connexion.php");
                        $result = $connexion -> query("SELECT id_film,titre,image,duree,date_sortie,description,min_age FROM film");
                        for($i=0;$i<$result->num_rows;$i++){
                            $row = $result->fetch_assoc();
                            $result2 = $connexion -> query("SELECT libelle FROM film INNER JOIN genre_film on film.id_film=genre_film.id_film INNER join genre on genre_film.id_genre=genre.id_genre where film.id_film=".$row['id_film']."");
                            echo "<div class='movie-item'>
                            <h3>Titre: ".$row['titre']."</h3>
                            <img src='img/".$row['image']."' alt='Movie Title'><p>Genre: ";
                            for($j=0;$j<$result2->num_rows;$j++){
                                $row2 = $result2->fetch_assoc();
                                echo $row2['libelle']." ";
                            }
                            echo "</p><p>Durée: ".$row['duree']."</p>
                            <p>Date de sortie: ".$row['date_sortie']."</p>
                            <p>Description: ".$row['description']."</p>
                            <p>+".$row['min_age']."</p>
                            <div class='movie-actions'>
                                <input type='button' onclick='openEditForm()' value='Modifier'>
                                <input type='button' class='redbutton' onclick='openDeleteForm()' value='Supprimer'>
                            </div>
                            </div>";
                            } 
                    ?>
                    <div class="movie-item">
                        <h3>Titre: Avengers</h3>
                        <img src="img/6-0.jpg" alt="Movie Title">
                        <p>Genre: Action</p>
                        <p>Durée: 1:45:14</p>
                        <p>Date de sortie: 2022-01-01</p>
                        <p>Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eveniet minima incidunt, esse neque earum cum nemo, qui dolorem id repellendus ut eum odio ad. Assumenda error quisquam sapiente quibusdam.</p>
                        <p>+18</p>
                        <div class="movie-actions">
                            <input type='button' onclick='openEditForm()' value='Modifier'>
                            <input type='button' class='redbutton' onclick='openDeleteForm()' value='Supprimer'>
                        </div>
                    </div>
                    <div class="movie-item">
                        <h3>Titre: Avengers</h3>
                        <img src="img/6-0.jpg" alt="Movie Title">
                        <p>Genre: Action</p>
                        <p>Durée: 1:45:14</p>
                        <p>Date de sortie: 2022-01-01</p>
                        <p>Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eveniet minima incidunt, esse neque earum cum nemo, qui dolorem id repellendus ut eum odio ad. Assumenda error quisquam sapiente quibusdam.</p>
                        <p>+18</p>
                        <div class="movie-actions">
                            <input type='button' onclick='openEditForm()' value='Modifier'>
                            <input type='button' class='redbutton' onclick='openDeleteForm()' value='Supprimer'>
                        </div>
                    </div>
                    <div class="movie-item">
                        <h3>Titre: Avengers</h3>
                        <img src="img/6-0.jpg" alt="Movie Title">
                        <p>Genre: Action</p>
                        <p>Durée: 1:45:14</p>
                        <p>Date de sortie: 2022-01-01</p>
                        <p>Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eveniet minima incidunt, esse neque earum cum nemo, qui dolorem id repellendus ut eum odio ad. Assumenda error quisquam sapiente quibusdam.</p>
                        <p>+18</p>
                        <div class="movie-actions">
                            <input type='button' onclick='openEditForm()' value='Modifier'>
                            <input type='button' class='redbutton' onclick='openDeleteForm()' value='Supprimer'>
                        </div>
                    </div>
                    <div class="movie-item">
                        <h3>Titre: Avengers</h3>
                        <img src="img/6-0.jpg" alt="Movie Title">
                        <p>Genre: Action</p>
                        <p>Durée: 1:45:14</p>
                        <p>Date de sortie: 2022-01-01</p>
                        <p>Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eveniet minima incidunt, esse neque earum cum nemo, qui dolorem id repellendus ut eum odio ad. Assumenda error quisquam sapiente quibusdam.</p>
                        <p>+18</p>
                        <div class="movie-actions">
                            <input type='button' onclick='openEditForm()' value='Modifier'>
                            <input type='button' class='redbutton' onclick='openDeleteForm()' value='Supprimer'>
                        </div>
                    </div>
                    <div class="movie-item">
                        <h3>Titre: Avengers</h3>
                        <img src="img/6-0.jpg" alt="Movie Title">
                        <p>Genre: Action</p>
                        <p>Durée: 1:45:14</p>
                        <p>Date de sortie: 2022-01-01</p>
                        <p>Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eveniet minima incidunt, esse neque earum cum nemo, qui dolorem id repellendus ut eum odio ad. Assumenda error quisquam sapiente quibusdam.</p>
                        <p>+18</p>
                        <p></p>
                        <div class="movie-actions">
                            <input type='button' onclick='openEditForm()' value='Modifier'>
                            <input type='button' class='redbutton' onclick='openDeleteForm()' value='Supprimer'>
                        </div>
                    </div>
                </div>
            </main>
        </div>


        <!-- Delete Movie Confirmation Modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeDeleteForm()">&times;</span>
                <h3>Confirmation de la suppression</h3>
                <p>Êtes-vous sûr de vouloir supprimer ce film ?</p>
                <input type='button' onclick='closeDeleteForm()' value='Annuler'>
                <input type='submit' class='redbutton' onclick='deleteMovie()' value='Supprimer'>
            </div>
        </div>

        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
        <script>
            new MultiSelectTag('genre', {
                rounded: true,    // default true
                placeholder: 'Search',  // default Search...
                tagColor: {
                    textColor: '#327b2c',
                    borderColor: '#92e681',
                    bgColor: '#eaffe6',
                },
                onChange: function(values) {
                    console.log(values)
                }
            })
        </script>
    </body>
</html>