
{{-- //Padaryt nuoroda kur rodytu mech priskirtas furas --}}
@include('header_and_footer.header')

@if(session()->has('success'))
   <div class="alert alert-success alert-with-icon">
       @foreach(session()->get('success') as $message)
           <p>{{ $message }}</p>
       @endforeach
   </div>
@endif
@if(session()->has('uzimtas'))
   <div class="alert alert-success alert-with-icon">
       @foreach(session()->get('uzimtas') as $message)
           <p>{{ $message }}</p>
       @endforeach
   </div>
@endif
<div class="flex">
<h1>Mechanikai</h1>
<a class="new-entry" href="{{route('mechanic.new')}}">Naujas Mechanikas</a>
@foreach ($mechanics as $mech)

<div class="mechanic">
    <p>ID: {{$mech->id}}</p>
    <p>Name: {{$mech->name}}</p>
    <p>Surname: {{$mech->surname}}</p>
    <a href="{{route('mechanic.delete', $mech -> id)}}">Ištrinti</a>
</div>
<br><br>
@endforeach

<a href="{{route('mechanic.new')}}">Naujas Mechanikas</a>
<div class="filter">
    <a href="{{route('mechanic.filterAsc')}}">Filtruoti A-Z pagal id</a>
    <a href="{{route('mechanic.filterDesc')}}">Filtruoti Z-A pagal id</a>
</div>
</div>

@include('header_and_footer.footer')