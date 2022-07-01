<div class="row w-100 py-4 px-3 d-flex justify-content-center">

    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
        
    @endif

    <div class="col-lg-12 px-3 d-flex flex-column justify-content-center">
        
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide w-100 d-flex flex-column justify-content-center align-items-stretch bg-dark border" data-bs-ride="false" style="min-height: 500px">
                <div class="carousel-indicators">
    
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @for ($i = 1; $i <=2; $i++ )
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button>
                    @endfor
    
                </div>
                <div class="carousel-inner d-flex align-items-center h-100">
    
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1200/700?random=0" class="d-block w-100" alt="...">
                    </div>
                    @for ($i = 1; $i <=2; $i++ )
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1200/700?random={{ $i }}" class="d-block w-100" alt="...">
                        </div>
                    @endfor
    
                </div>
    
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
    
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
    
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-8 mt-3">
                {!! $studio->desc !!}
            </div>

            <div class="col-lg-4">
        
                <div class="mt-3">
                    <label for="title">Studio Name:</label>
                    {{-- <input type="text" readonly class="form-control" id="title" name="title" placeholder="Title" value="{{ $studio->title }}"> --}}
                    <p>{{ $studio->title }}</p>
                </div>
        
                <div class="mt-3">
                    <label for="title">Owner's Phone Number:</label>
                    {{-- <input type="text" readonly class="form-control-plaintext" id="title" name="title" placeholder="Title" value="{{ auth()->user()->phone_number }}"> --}}
                    <p>{{ auth()->user()->phone_number }}</p>
                </div>
        
                <div class="mt-3">
                    <label for="title">Studio's Address:</label>
                    {{-- <input type="text" readonly class="form-control" id="title" name="title" placeholder="Title" value="{{ $studio->address }}"> --}}
                    <p>{{ $studio->address }}</p>
                </div>
        
                <div class="mt-3">
                    <label for="title">Price Range:</label>
                    {{-- <input type="text" readonly class="form-control" id="title" name="title" placeholder="Title" value="--"> --}}
                    <p>--</p>
                </div>
    
                <div class="mt-3">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#editStudioFormModal" class="btn text-white border-0 my-3" style="background-color: #7388E4">Edit Studio</button>
                    
                    <form action="/dashboard/studio/{{ $studio->slug }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete your studio?')">Delete Studio</button>
                    </form>

                </div>
    
                <a href="/katalog/{{ $studio->slug }}" class="text-decoration-none">Look at Studio Page</a>
            </div>
        </div>

        <div class="modal fade" id="editStudioFormModal" name="editStudioFormModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit your studio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
    
                    <form method="post" action="/dashboard/studio/{{ $studio->slug }}" id="editStudioForm">
                        @method('put')
                        @csrf
    
                        <div class="modal-body">
                            <div class="col-lg-7">
    
                                <div class="mb-3">
                                    <label for="title" class="form-label">Studio Name</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title',$studio->title) }}" required>
                                    
                                    @error('title')
                                        <div class="invalid-feedback mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug',$studio->slug) }}" required>
    
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
                                            @if (old('category_id',$studio->category_id) == $category->id)
                                                <option selected value="{{ $category->id}}">{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id}}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address',$studio->address) }}" required>
                                   
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
                                    <input id="desc" type="hidden" name="desc" value="{{ old('desc',$studio->desc) }}">
                                    <trix-editor input="desc"></trix-editor>
                                </div>
    
                            </div>
    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Edit Studio</button>
                        </div>
                    </form>
    
                </div>
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