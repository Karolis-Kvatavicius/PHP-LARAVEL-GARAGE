<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <title>Trucks and Mechanics</title>
</head>
<body>
 <header>
     <nav>
         <ul>
             <li>
             <a href="{{route('mechanic.index')}}">Mechanikai</a>
             </li>
             <li>
                <a href="{{route('truck.index')}}">Sunkvežimiai</a>
            </li>
            <li>
            <a href="{{route('logout')}}">Logout</a>
            </li>
         </ul>
     </nav>
 </header>
 <main>