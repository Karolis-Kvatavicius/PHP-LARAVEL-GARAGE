@include('header_and_footer.header')
<a href="{{route('mechanic.index')}}">Grįžti</a>
<h1>{{$mechanic[0]->name}} {{$mechanic[0]->surname}}</h1>
<ul>
    {{-- {{ dd($trucks) }} --}}
   @empty($trucks[0])
        <li>Mechanikas neturi darbo</li>
   @endempty
    @foreach ($trucks as $key => $truck)
       <li>{{$key+1}}. {{$truck->maker}} {{$truck->make_year}} {{$truck->plate}}</li> 
    @endforeach
</ul>
@include('header_and_footer.footer')