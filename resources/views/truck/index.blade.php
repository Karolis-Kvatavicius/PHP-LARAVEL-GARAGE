@include('header_and_footer.header')

@if(session()->has('success'))
   <div class="alert alert-success alert-with-icon">
       @foreach(session()->get('success') as $message)
           <p>{{ $message }}</p>
       @endforeach
   </div>
@endif

<div class="flex">
<h1>Sunkvežimiai</h1>
<a class="new-entry" href="{{route('truck.new')}}">Naujas sunkvežimis</a>
@foreach ($trucks as $truck)
<div class="mechanic">
    <p>Maker: {{$truck->maker}}</p>
    <p>Year:  {{$truck->make_year}}</p>
    <p>Licence plate: {{$truck->plate}}</p>
    <p>Superior: {{$truck->truckMechanic->name}} {{$truck->truckMechanic->surname}}</p>
    <p>Notices: {{$truck->mechanic_notices}}</p>
    <a href="{{route('truck.delete', $truck -> id)}}">Ištrinti</a>
    <a href="{{route('truck.update', $truck -> id)}}">Redaguoti</a>
</div>
<br><br>
@endforeach

<a href="{{route('truck.new')}}">Naujas sunkvežimis</a><br>
<div class="filter">
<a href="{{route('truck.filterAsc')}}">Filtruoti A-Z pagal gamintoja</a>
<a href="{{route('truck.filterDesc')}}">Filtruoti Z-A pagal gamintoja</a>
<a href="{{route('truck.filterAscMech')}}">Filtruoti A-Z pagal mechaniko id</a>
<a href="{{route('truck.filterDescMech')}}">Filtruoti Z-A pagal mechaniko id</a>
</div>
</div>

@include('header_and_footer.footer')