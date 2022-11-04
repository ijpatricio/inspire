<span>
        I am loaded from a server, woohoo
</span>

@auth

User is logged in!

@foreach($permissions as $permission)
    <div class="text-blue-500 cursor-pointer" @click="hello('{{ $permission }}')"> {{ $permission }} </div>
@endforeach

@elseauth

User logged out!!

@endauth

<div class="w-full mt-32"></div>

<div> A custom Vue Component </div>
<MyCustomComponent />



