
<section class="top-rated">
  <div class="container">

      <p class="section-subtitle">ISI-Cinema</p>

      <h2 class="h2 section-title">Programme de la Semaine</h2>

      <ul class="filter-list">
          <li>
              <button class="filter-btn" onclick="loadMovies('lundi')">Lundi</button>
          </li>
          <li>
              <button class="filter-btn" onclick="loadMovies('mardi')">Mardi</button>
          </li>
          <li>
              <button class="filter-btn" onclick="loadMovies('mercredi')">Mercredi</button>
          </li>
          <li>
              <button class="filter-btn" onclick="loadMovies('jeudi')">Jeudi</button>
          </li>
          <li>
              <button class="filter-btn" onclick="loadMovies('vendredi')">Vendredi</button>
          </li>
          <li>
              <button class="filter-btn" onclick="loadMovies('samedi')">Samedi</button>
          </li>
          <li>
              <button class="filter-btn" onclick="loadMovies('dimanche')">Dimanche</button>
          </li>
      </ul>

      <ul class="row" id="movies-container"></ul>
      
    
    

  </div>
</section>
<script>
  // Exemple de données de films pour chaque jour de la semaine
  const filmsParJour = {
    lundi: [
        { title: "Sonic the Hedgehog 2", year: 2022, quality: "2K", duration: "122 min", rating: 7.8, image: "movie-1.png" },
        { title: "Morbius", year: 2022, quality: "HD", duration: "104 min", rating: 5.9, image: "movie-2.png" },
        { title: "The Adam Project", year: 2022, quality: "4K", duration: "106 min", rating: 7.0, image: "movie-3.png" },
    ],
    mardi: [
        { title: "Movie 4", year: 2022, quality: "2K", duration: "120 min", rating: 8.0, image: "movie-4.png" },
        { title: "Movie 5", year: 2021, quality: "HD", duration: "95 min", rating: 6.5, image: "movie-5.png" },
        { title: "Movie 6", year: 2022, quality: "4K", duration: "112 min", rating: 7.2, image: "movie-6.png" },
    ],
    mercredi: [
        { title: "Movie 7", year: 2021, quality: "HD", duration: "110 min", rating: 7.9, image: "movie-7.png" },
        { title: "Movie 8", year: 2022, quality: "2K", duration: "118 min", rating: 6.8, image: "movie-8.png" },
        { title: "Movie 9", year: 2022, quality: "4K", duration: "128 min", rating: 8.5, image: "movie-9.png" },
    ],
    jeudi: [
        { title: "Movie 10", year: 2022, quality: "2K", duration: "115 min", rating: 7.0, image: "movie-10.png" },
        { title: "Movie 11", year: 2022, quality: "HD", duration: "103 min", rating: 6.3, image: "movie-11.png" },
        { title: "Movie 12", year: 2021, quality: "4K", duration: "135 min", rating: 8.2, image: "movie-12.png" },
    ],
    vendredi: [
        { title: "Movie 13", year: 2022, quality: "4K", duration: "121 min", rating: 7.6, image: "movie-13.png" },
        { title: "Movie 14", year: 2021, quality: "2K", duration: "112 min", rating: 6.9, image: "movie-14.png" },
        { title: "Movie 15", year: 2022, quality: "HD", duration: "100 min", rating: 7.4, image: "movie-15.png" },
    ],
    samedi: [
        { title: "Movie 16", year: 2022, quality: "HD", duration: "98 min", rating: 6.7, image: "movie-16.png" },
        { title: "Movie 17", year: 2021, quality: "4K", duration: "130 min", rating: 8.3, image: "movie-17.png" },
        { title: "Movie 18", year: 2022, quality: "2K", duration: "107 min", rating: 7.1, image: "movie-18.png" },
    ],
    dimanche: [
        { title: "Movie 19", year: 2021, quality: "HD", duration: "105 min", rating: 6.6, image: "movie-19.png" },
        { title: "Movie 20", year: 2022, quality: "4K", duration: "112 min", rating: 7.8, image: "movie-20.png" },
        { title: "Movie 21", year: 2022, quality: "2K", duration: "114 min", rating: 6.4, image: "movie-21.png" },
    ],
};


  // Fonction pour charger les films en fonction du jour
  function loadMovies(day) {
      // Récupérer le conteneur des films
      var moviesContainer = document.getElementById('movies-container');

      // Récupérer les films pour le jour sélectionné
      var filmsDuJour = filmsParJour[day];

      // Construire le HTML pour les films
      var moviesHTML = '';
      filmsDuJour.forEach(film => {
          moviesHTML += `
              <article class="postcard dark yellow">
        <a class="postcard__img_link" href="#">
            <img class="postcard__img" src="{{asset('assets/images/${film.image}')}}" alt="${film.title} movie poster" />
        </a>
        <div class="postcard__text">
            <h1 class="postcard__title green"><a href="#">${film.title}</a></h1>
            <div class="postcard__subtitle small">
                <time datetime="${film.duration}">
                    <i class="fas fa-calendar-alt mr-2"></i>${film.duration}
                </time>
            </div>
            <div class="postcard__bar"></div>
            <div class="postcard__preview-txt">
                <ul class="postcard__tagbox">
                    <li class="hour__item play yellow"><i class="fas fa-tag mr-2"></i>18:45</li>
                    <li class="hour__item play yellow"><i class="fas fa-clock mr-2"></i>20:15</li>
                    <li class="hour__item play yellow"><i class="fas fa-tag mr-2"></i>22:30</li>
                </ul>
                <div class="postcard__bar"></div>
                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                    optio, eaque rerum! 
                </div>
            </div>
            <ul class="postcard__tagbox">
                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Action, Crime, Fantasy</li>
                <li class="tag__item play yellow"><i class="fas fa-clock mr-2"></i>-12</li>
            </ul>
        </div>
    </article> 
          `;
      });

      // Mettre à jour le contenu de #movies-container sans actualiser la page
      moviesContainer.innerHTML = moviesHTML;
  }
</script>