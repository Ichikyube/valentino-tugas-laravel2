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
    <form method="POST" action="{{ route('user.create')}}">
        @csrf
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama"><br>

        <label for="email">Email :</label>
        <input type="text" name="email" id="email"><br>

        <label for="password">Password : </label>
        <input type="text" name="password" id="password"><br>
        <label for="Role">Role : </label>
        <input type="text" name="role" id="role"><br>
        <select name="role" id="role">
            <option value="1">Admin</option>
            <option value="2">User</option>
            <option value="3">Guest</option>
        </select>
        <button type="submit" @class(["btn", "btn-primary"])>Tambah Data</button>
    </form>
</body>
</html>
