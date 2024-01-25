@props(['age','image','title','gender','duration'])
<li>
    <div class="movie-card">

      <a href="./movie-details.html">
        <figure class="card-banner">
          <img src="{{asset($image)}}" alt="{{$title}}">
        </figure>
      </a>

      <div class="title-wrapper">
        <a href="./movie-details.html">
          <h3 class="card-title">{{$title}}</h3>
        </a>

        <time>{{$age}}</time>
      </div>

      <div class="card-meta">
        <div class="badge badge-outline">{{$gender}}</div>

        <div class="duration">
          <ion-icon name="time-outline"></ion-icon>

          <time datetime="PT137M">{{$duration}}</time>
        </div>
      </div>

    </div>
  </li>