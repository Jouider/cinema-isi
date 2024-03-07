<section class="upcoming">
    <div class="container">

      <div class="flex-wrapper">

        <div class="title-wrapper">
          <p class="section-subtitle">ISI-Cinema</p>

          <h2 class="h2 section-title">Prochainement</h2>
        </div>
      </div>

      <ul class="movies-list  has-scrollbar">
        @foreach ($movies as $movie)
        @if ($movie->date_sortie > now())
            <x-film-card 
                image="{{ asset('img/'.$movie->image) }}"
                title="{{ $movie->titre }}"
                age="+{{ $movie->min_age }}"
                gender="TEST"
                duration="{{ $movie->duree }}"
            />
        @endif
      @endforeach
    
      </ul>

    </div>
  </section>