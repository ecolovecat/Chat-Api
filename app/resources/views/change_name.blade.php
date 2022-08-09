<form method="post" action="{{route("change_conversation_name"), $gid}}">
    @csrf
    <label for="fname">Tên muốn đổi</label><br>
    <input type="text" name="new_name"><br>
    <input type="hidden"  name="gid" value="{{$gid}}"><br>
    <input type="submit" value="Submit">
</form>
