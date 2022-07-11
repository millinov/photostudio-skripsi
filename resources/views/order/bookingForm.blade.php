<div class="modal fade" id="createOrderFormModal" name="createOrderFormModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Create Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="" id="createOrderForm" enctype="multipart/form-data">
                @csrf

                <div class="modal-body row">
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
                                <option value=""></option>
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

                    <div class="col-lg-5">
                        <div class="mb-3">
                            <label for="images" class="form-label">Studio's image</label>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Studio</button>
                </div>


            </form>

        </div>
    </div>
</div>