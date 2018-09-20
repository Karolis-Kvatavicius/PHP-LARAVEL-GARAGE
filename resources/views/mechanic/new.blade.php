@include('header_and_footer.header')
@if($errors)
   @if($errors->count() > 0)
       <div class="alert alert-danger alert-with-icon">
           <b>Error!</b>
           @foreach($errors->all() as $message)
               <p>{{ $message }}</p>
           @endforeach
       </div>
   @endif
@endif
<div class="flex">
<form action="{{route('mechanic.save')}}" method="post">
    @csrf
    <h3>Naujas Mechanikas</h3>
    <label for="mechanic_name">Name</label><br>
    <input type="text" name="mechanic_name" value="{{ old('mechanic_name', $mechanic->name) }}"><br><br>
    <label for="mechanic_surname">Surname</label><br>
    <input type="text" name="mechanic_surname" value="{{ old('mechanic_surname', $mechanic->surname) }}"><br><br>
    <input class="add" type="submit" name="submit" value="Pridėti"><br>
</form>
</div>

@include('header_and_footer.footer')