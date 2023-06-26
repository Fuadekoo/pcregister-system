@include('sweetalert::alert')

<form action="{{ route('pcregisters.searchUser') }}" method="post">
    @csrf
    <input type="text" name="user_id" placeholder="Search...">

    
    <button type="submit">Search</button>
</form>
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

