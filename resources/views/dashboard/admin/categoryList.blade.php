@extends('dashboard.layouts.main')

@section('main')

<div class="pt-3 pb-3 w-100 m-auto">
    <button type="button" class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#createCategoryFormModal">
        Create new category
    </button>

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

    <div class="modal fade" id="createCategoryFormModal" name="createCategoryFormModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" >Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="/dashboard/categories" id="createCategoryForm" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body row">
                        <div class="col-lg-7">

                            <div class="mb-3">
                                <label for="name" class="form-label">Cartegory Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
                                
                                @error('name')
                                    <div class="invalid-feedback mb-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }}" required>

                                @error('slug')
                                    <div class="invalid-feedback mb-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/dashboard/categories/checkSlug?name=' + name.value).then(response => response.json()).then(data => slug.value = data.slug);
    });

    @if($errors->any())
        $(document).ready(function(){
                $("#createCategoryFormModal").modal('show');
        });
    @endif
    
</script>
    
@endsection