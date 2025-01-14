@extends('layouts.admin')

@section('content')
    <section class="flex flex-col gap-4">
        <p class="bg-primary-500 rounded-lg p-2 w-fit">User</p>

        <table class="">
            <thead class="text-left">
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No Telp</th>
                <th>Alamat</th>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->nama_lengkap }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
