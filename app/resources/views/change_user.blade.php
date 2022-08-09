<form method="post" action="{{route('change-user-name')}}">
    @csrf
    <label for="fname">Tên muốn đổi</label><br>
    <input type="text" name="new_name"><br>
    <input type="submit" value="Submit">
</form>
