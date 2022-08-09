<form method="post" action="{{route("remove-list"), $gid}}">
    @csrf
    <label for="fname">ID user cần xóa, ngăn cách bởi dấu phẩy</label><br>
    <input type="text" id="fname" name="list_id"><br>
    <input type="hidden"  name="gid" value="{{$gid}}"><br>
    <input type="submit" value="Submit">
</form>
