<div class="row w-100 py-4 px-3 d-flex flex-column justify-content-center align-items-center">

    <h5 class="text-center">No studio in here yet.</h5>
    <button type="button" class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#createStudioFormModal">
        Upload your studio
    </button>

    <div class="modal fade" id="createStudioFormModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create your studio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="/dashboard/studio">
                    @csrf

                    <div class="modal-body">
                        <div class="col-lg-7">

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="desc" class="form-label">Description</label>
                                <input id="desc" type="hidden" name="desc">
                                <trix-editor input="desc"></trix-editor>
                            </div>

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

</script>