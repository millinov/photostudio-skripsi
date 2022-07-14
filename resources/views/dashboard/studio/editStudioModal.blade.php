<div class="modal fade" id="editStudioFormModal" name="editStudioFormModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit your studio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="/dashboard/studio/{{ $studio->slug }}" id="editStudioForm" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="modal-body row">
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

                    <div class="col-lg-5">
                        <div class="mb-3">
                            <label for="images" class="form-label">Studio's image</label>
                            @if ($studio->images->isNotEmpty())
                                <input type="hidden" name="oldImage[]" value="{{ $studio->images }}">
                            @endif
                            <input class="form-control  @error('images') is-invalid @enderror" type="file" id="images" name="images[]" multiple onchange="preview()">

                            @error('images')
                                <div class="invalid-feedback mb-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div id="images-preview">
                            @if ($studio->images->isNotEmpty())
                                @foreach ($studio->images as $image)
                                    <figure style="width: 45%;"> 
                                        <img src="{{ asset('storage/') .'/' . $image->path }}" alt="" style="width: 100%;">
                                    </figure>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Studio</button>
                </div>
            </form>

        </div>
    </div>
</div>