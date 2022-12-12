<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar User</title>
</head>
<body>
    <a href="{{ route('user.list') }}"><button> Kembali </button></a>
    <form method="POST" action="{{ route('user.update', ["id" => $user->id]) }}">
        @method("put")
        @csrf

        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" value={{$user->nama}}><br>
        <label for="password">Password : </label>
        <input type="text" name="password" id="password" value={{$user->email}}><br>
        <label for="Role">Role : </label>
        <input type="text" name="role" id="role" value={{$user->nama}}><br>
        <select name="role" id="role">
            <option value="1" {{$user->role == 1 ? "selected" : ""}}>Admin</option>
            <option value="2" {{$user->role == 2 ? "selected" : ""}}>User</option>
            <option value="3" {{$user->role == 3 ? "selected" : ""}}>Guest</option>
        </select>
        <button type="submit" @class(["btn", "btn-primary"])>Edit</button>
    </form>
</body>
</html>
