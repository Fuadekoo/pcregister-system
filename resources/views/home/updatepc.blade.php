<h1>update pc register</h1>
@include('sweetalert::alert')
<form method="POST" action="/edit" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$pcregister['id']}}">
    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" id="user_id" value="{{$pcregister['user_id']}}">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="{{ $pcregister->username }}">
    <label for="description">Description:</label>
    <textarea name="description" id="description" value="{{ $pcregister->description }}"></textarea>
    <label for="pc_name">PC Name:</label>
    <input type="text" name="pc_name" id="pc_name" value="{{$pcregister['pc_name']}}">
    <label for="serial_number">Serial Number:</label>
    <input type="text" name="serial_number" id="serial_number" value="{{$pcregister['serial_number']}}">
    <label for="photo">Photo:</label>
    <input type="file" name="photo" id="photo" value="{{$pcregister['photo']}}">
    <button type="submit">update</button>
</form>
