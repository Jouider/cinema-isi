<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
</head>
<body>
    <nav>
        <h1>Dashboard</h1>
        <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Help</a></li>
        </ul>
    </nav>
    <div id="sideb" class="sidebar">
        <h2><i class="fas fa-video"></i>Filmlane</h2>
        <ul>
            <li><a href="{{route('dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="{{route('movies.index')}}"><i class="fas fa-film"></i> Movies</a></li>
            <li><a href="showTimes.php"><i class="far fa-clock"></i> Showtimes</a></li>
            <!--<li><a href="#"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Customers</a></li>
            <li><a href="#"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>-->
            <li><a href="rooms.php"><i class="fas fa-door-open"></i> Rooms</a></li>
        </ul>
    </div>
</body>
</html>