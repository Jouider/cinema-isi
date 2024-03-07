<section class="upcoming">
    <div class="container">

      <div class="flex-wrapper">

        <div class="title-wrapper">
          <p class="section-subtitle">ISI-Cinema</p>

          <h2 class="h2 section-title">Actuellement au cinéma</h2>
        </div>

        <ul class="filter-list">
          <li>
            <button class="filter-btn">Voir tous les films</button>
          </li>
        </ul>

      </div>

      <ul class="movies-list  has-scrollbar">
        @foreach ($movies as $movie)
        <x-film-card 
        image="{{asset('img/'.$movie->image)}}"
        title="{{$movie->titre}}"
        age="+{{$movie->min_age}}"
        gender="TEST"
        duration="{{$movie->duree}}"
        />

        @endforeach
        
      </ul>

    </div>
  </section>