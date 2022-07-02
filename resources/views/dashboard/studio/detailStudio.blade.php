<div class="row w-100 py-4 px-3 d-flex justify-content-center">

    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
        
    @endif

    <div class="col-lg-12 px-3 d-flex flex-column justify-content-center">
        
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide w-100 d-flex flex-column justify-content-center align-items-stretch bg-dark border" data-bs-ride="false" style="min-height: 500px; max-height: 500px">
                <div class="carousel-indicators">
                    
                    @if ($studio->images)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        @for ($i = 1; $i < $studio->images->count(); $i++)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button> 
                        @endfor
                    @else
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        @for ($i = 1; $i <=2; $i++ )
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button>
                        @endfor
                        
                    @endif
    
                </div>
                <div class="carousel-inner d-flex align-items-center h-100">

                    @if ($studio->images)

                        <div class="carousel-item active">
                            <img src="{{ asset('storage/') .'/' . $studio->images[0]->path }}" class="d-block w-100" alt="...">
                        </div>
                        @foreach ($studio->images->skip(1) as $image)
                            <div class="carousel-item">
                                <img src="{{ asset('storage/') .'/' . $image->path }}" class="img-responsived-block w-100" alt="...">
                            </div>
                        @endforeach
                        
                    @else

                        <div class="carousel-item active">
                            <img src="https://picsum.photos/1200/700?random=0" class="d-block w-100" alt="...">
                        </div>
                        @for ($i = 1; $i <=2; $i++ )
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1200/700?random={{ $i }}" class="d-block w-100" alt="...">
                            </div>
                        @endfor
                        
                    @endif
    
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

        @include('dashboard.studio.editStudioModal')

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