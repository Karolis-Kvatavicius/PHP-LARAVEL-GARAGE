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
<form action="{{isset($truck) ? route('truck.edit', $truck -> id) : route('truck.save')}}" method="post">
    @csrf
    <h3>{{isset($truck) ? 'Redaguoti sunkvežimį valstybiniu nr: '.$truck->plate : 'Naujas Sunkvežimis'}}</h3>
    <div class="flex2">
    <div class="field">
        {{-- prideti funkcija old() --}}
    <label for="truck_maker">Maker</label><br>
    <input type="text" name="truck_maker" value="{{isset($truck) ? $truck->maker : old('truck_maker')}}"><br><br>
    </div>
    <div class="field">
    <label for="truck_plate">Licence plate</label><br>
    <input type="text" name="truck_plate" value="{{isset($truck) ? $truck->plate : old('truck_plate')}}"><br><br>
    </div>
    <div class="field">
    <label for="truck_make_year">Make year</label><br>
    <input type="text" name="truck_make_year" value="{{isset($truck) ? $truck->make_year : old('truck_make_year')}}"><br><br>
    </div>
    <div class="field">
    <label for="mechanic">Mechanic</label><br>
    <select name="mechanic" value="">
        @foreach ($mechanics as $key => $value)
    <option @if (isset($truck) && $key == $truck->mechanic_id) selected="selected" @endif value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
    </div>
    </div>
    <br><br>
    <label for="truck_mech_notices">Mechanic notices</label><br>
    <textarea name="truck_mech_notices" id="" cols="150" rows="20">{{isset($truck) ? $truck->mechanic_notices : old('truck_mech_notices')}}</textarea><br><br>
    <input class="add" type="submit" name="submit" value="{{isset($truck) ? 'Redaguoti' : 'Pridėti'}}"><br>
</form>
</div>

@include('header_and_footer.footer')