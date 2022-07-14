@extends('dashboard.layouts.main')

@section('main')

<div class="pt-3 pb-3 w-100">
    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        {{ session('success') }}
    </div>
        
    @endif

    <h3>Studio Owner Application</h3>
    <hr>
    
    <table class="table fs-8" style="border-color: black">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Allowed to be Studio Owner?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @php
                    $iteration = 0;
                @endphp
                @if ($user->is_seller == 2)
                    @php
                        $iteration = $iteration+1;
                    @endphp
                    <tr>
                        <td>{{ $iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="/become-a-seller/{{ $user->username }}" method="post">
                                @csrf 
                                <input type="hidden" value="1" name="is_seller" id="is_seller">
                                <button type="submit" class="btn btn-success"><i class="bi bi-check"></i></button>
                            </form>
                            <form action="/become-a-seller/{{ $user->username }}" method="post">
                                @csrf 
                                <input type="hidden" value="0" name="is_seller" id="is_seller">
                                <button type="submit" class="btn btn-danger"><i class="bi bi-x-square"></i></button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection