<div>
    <label for="user">User name</label>
    <input type="text" name="name" id="name" value="{{old('name', optional($user ?? null )->name)}}">
</div>
@error('name')
    <div>{{$message}}</div>
@enderror
<div>
    <label for="age">Age</label>
    <input type="number" name="age" id="age" value="{{old('age', optional($user ?? null)->age)}}">
</div>
@error('age')
    <div>{{$message}}</div>
@enderror
<div>
    <label for="has_money">Has money?</label>
    <input type="hidden" name="has_money" value="0">
    <input type="checkbox" name="has_money" id="has_money" value="1" {{$user->has_money || old('has_money') === 1? 'checked': ''}}>
</div>
@error('has_money')
    <div>{{$message}}</div>
@enderror
<div>
    <label for="has_friends">Has friends?</label>
    <input type="hidden" name="has_friends" value="0">
    <input type="checkbox" name="has_friends" id="has_friends" value="1" {{$user->has_friends || old('has_friends') === 1? 'checked': ''}}>
</div>
@error('has_friends')
    <div>{{$message}}</div>
@enderror
<div>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{old('email', optional($user ?? null)->email)}}">
</div>
@error('email')
    <div>{{$message}}</div>
@enderror
<div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="{{old('password', optional($user ?? null)->password)}}">
</div>
@error('password')
    <div>{{$message}}</div>
@enderror