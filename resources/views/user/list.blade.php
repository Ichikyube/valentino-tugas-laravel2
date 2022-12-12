<x-layout>
    @section('title', 'Daftar User')
    <a href="{{ route('user.store') }}"><button> Tambah User </button></a>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aktif</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @switch($user->role)
                        @case(1) Admin @break
                        @case(2) User @break
                        @default Guest
                    @endswitch
                </td>
                <td>{{ $user->aktif ? "ya" : "tidak" }}</td>
                <td>
                    <a href="{{ route('user.detail', ['id' => $user->id])}}">
                    <button>Edit</button></a>
                </td>
                <td>
                    <a href="{{ route('user.destroy', ['id' => $user->id])}}">
                    <button>Hapus</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
