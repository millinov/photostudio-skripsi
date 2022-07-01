<div class="row w-100 py-4 px-3 d-flex flex-column justify-content-center align-items-center">

    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        {{ session('success') }}
    </div>
        
    @endif
    <h5 class="text-center">No studio in here yet.</h5>
    <button type="button" class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#createStudioFormModal">
        Upload your studio
    </button>

    <div class="modal fade" id="createStudioFormModal" name="createStudioFormModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create your studio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="/dashboard/studio" id="createStudioForm">
                    @csrf

                    <div class="modal-body">
                        <div class="col-lg-7">

                            <div class="mb-3">
                                <label for="title" class="form-label">Studio Name</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required>
                                
                                @error('title')
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

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" name="category_id" required>
                                    <option value="" selected>Select Category --</option>
                                    @foreach ($categories as $category)
                                        @if (old('category_id') == $category->id)
                                            <option selected value="{{ $category->id}}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id}}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address') }}" required>
                                
                                @error('address')
                                    <div class="invalid-feedback mb-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="desc" class="form-label">Description</label>
                                    @error('desc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                <input id="desc" type="hidden" name="desc" value="{{ old('desc') }}">
                                <trix-editor input="desc"></trix-editor>
                            </div>

                        </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Studio</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
      
</div>

<script>

    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/checkSlug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug);
    });

    @if($errors->any())
        $(document).ready(function(){
                $("#createStudioFormModal").modal('show');
        });
    @endif

    document.addEventListener('trix-file-accept', function(e) {  
        e.preventDefault();
    });

</script>