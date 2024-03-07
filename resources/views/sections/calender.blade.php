
<section class="top-rated">
  <div class="container">

      <p class="section-subtitle">ISI-Cinema</p>

      <h2 class="h2 section-title">Programme de la Semaine</h2>

      <ul class="filter-list">
    @php
        $today = now()->toDateString();
    @endphp
    @for ($i = 0; $i < 7; $i++)
        @php
            $date = now()->addDays($i)->toDateString();
            $day = ucfirst(now()->addDays($i)->format('l'));
        @endphp
        <li>
            <button class="filter-btn" onclick="loadMovies('{{ $date }}')">{{ $day }}</button>
        </li>
    @endfor
</ul>

      <ul class="row" id="movies-container"></ul>
      
    
    

  </div>
</section>
@php
    use App\Models\ShowTime;
@endphp

<script>
    // Initialiser un objet pour stocker les films par jour
    const filmsParJour = {};

    // Récupérer les données de films pour chaque jour de la semaine
    @for ($i = 0; $i < 7; $i++)
        @php
            $date = now()->addDays($i)->toDateString();
            $showtimes = ShowTime::with('film')->whereDate('date_seance', $date)->get();
            $filmsDuJour = [];
            foreach ($showtimes as $showtime) {
                $filmIndex = array_search($showtime->film->titre, array_column($filmsDuJour, 'title'));
                if ($filmIndex !== false) {
                    $filmsDuJour[$filmIndex]['heure_seance'][] = $showtime->horaire;
                } else {
                    $filmsDuJour[] = [
                        'title' => $showtime->film->titre,
                        'year' => $showtime->film->annee,
                        'quality' => $showtime->film->qualite,
                        'duration' => $showtime->film->duree,
                        'rating' => $showtime->film->note,
                        'image' => $showtime->film->image,
                        'heure_seance' => [$showtime->horaire],
                    ];
                }
            }
        @endphp
        filmsParJour['{{ $date }}'] = {!! json_encode($filmsDuJour) !!};
    @endfor

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
                <img class="postcard__img" src="{{ asset('img') }}/${film.image}" alt="${film.title} movie poster" />
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
                        ${film.heure_seance.map(heure => `<li class="hour__item play yellow"><i class="fas fa-clock mr-2"></i>${heure}</li>`).join('')}
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


