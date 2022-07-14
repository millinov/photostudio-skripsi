<div class="modal fade" id="editPictureModal" name="editPictureModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Chane Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/change-pic" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-body row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="profile_pic" class="form-label">Studio's image</label>
                            @if (auth()->user()->profile_pic)
                                <input type="hidden" name="oldProfilePicture" value="{{ auth()->user()->profile_pic }}">
                            @endif
                            <input class="form-control  @error('profile_pic') is-invalid @enderror" type="file" id="profile_pic" name="profile_pic" onchange="preview()">

                            @error('profile_pic')
                                <div class="invalid-feedback mb-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div id="images-preview">
                            @if (auth()->user()->profile_pic)
                            <figure>
                                <div class="img-thumbnail rounded-circle my-3 p-0" style="max-width: 200px; max-height: 200px; overflow: hidden;">
                                    <img src="{{ asset('storage/') .'/' . auth()->user()->profile_pic }}" alt="{{ auth()->user()->username }}"style="height: 200px;" class="d-block m-auto">
                                </div>
                            </figure>
                            @endif
                        </div>
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Profile Picture</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    let images = document.getElementById('profile_pic');
    let imageContainer = document.getElementById('images-preview');

    function preview()
    {
        imageContainer.innerHTML = "";

        for(i of images.files)
        {
            let reader = new FileReader();
            let figure = document.createElement("figure");
            figure.setAttribute("style","max-width: 200px; max-height: 200px; overflow: hidden;");
            figure.setAttribute("class","img-thumbnail rounded-circle my-3 p-0");
            reader.onload=()=>{
                let img = document.createElement("img");
                img.setAttribute("src",reader.result);
                img.setAttribute("style","height: 200px;");
                figure.appendChild(img);
            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }
</script>
