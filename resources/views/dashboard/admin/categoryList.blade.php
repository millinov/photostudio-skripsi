@extends('dashboard.layouts.main')

@section('main')

<div class="pt-3 pb-3">
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection