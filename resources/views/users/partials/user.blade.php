@if ($loop->even)
<div style="background: rgb(199, 198, 198)">
    <a href="{{route('users.userDetail', ['id'=>$key])}}">
        {{$key}}. {{$user['name']}}
    </a>
</div>
@else
<div>
    <a href="{{route('users.userDetail', ['id'=>$key])}}">
        {{$key}}. {{$user['name']}}
    </a>
</div>  
@endif

