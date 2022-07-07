@extends('dashboard.layouts.main')

@section('main')

<div class="pt-3 pb-3">
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Seller</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->is_seller)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        @if ($user->is_admin)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection