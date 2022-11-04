<span>
        So this template is loaded from a server, woohoo!
</span>

<div class="w-full mt-32"></div>

@auth
User is logged in!
@foreach($permissions as $permission)
    <div class="text-blue-500 cursor-pointer" @click="hello('{{ $permission }}')"> {{ $permission }} </div>
@endforeach

@else
    <div class="text-xl"> User is NOT logged in..</div>
@endauth

<div class="w-full mt-32"></div>

    <select>
        @foreach($cities as $city)
        <option value="{{ $city['city'] }}"> {{ $city['city'] }} - {{ $city['country'] }} </option>
        @endforeach
    </select>

<div class="w-full mt-32"></div>

<div> A custom Vue Component </div>
<MyCustomComponent />



