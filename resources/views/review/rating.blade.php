@extends('layouts.main')

<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }
    div.stars {
        display: inline-block;
    }

    input.star { display: none; }

    label.star {
        float: right;
        padding: 10px;
        font-size: 20px;
        color: 
        #444;
        transition: all .2s;
    }

    input.star:checked ~ label.star:before {
        content: '\f005';
        color: 
        #ffc115;
        transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
        color: 
        #ffc115;
    }

    input.star-1:checked ~ label.star:before { 
        color: 
        #ffc115; 
    }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }
</style>

@section('container')
    <div class="col-6 mx-auto">
        <section class="mb-5 p-4 card " style="background-color: #B7F9F5; ">
            <div class="row d-flex justify-content-center">
                <div id="{{ $order->studio->slug . '-carousel' }}" class="carousel slide bg-dark border mx-3 d-flex justify-content-center align-items-center" data-bs-ride="false" style="min-height: 300px; max-height: 400px; max-width: 500px;">
            
                    <div class="carousel-inner d-flex align-items-center ">
        
                        @if ($order->studio->images->isNotEmpty())
        
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/') .'/' . $order->studio->images[0]->path }}" class="d-block w-100" alt="{{ $order->studio->category->name }}">
                            </div>
                            @foreach ($order->studio->images->skip(1) as $image)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/') .'/' . $image->path }}" class="img-responsived-block w-100" alt="{{ $order->studio->category->name }}">
                                </div>
                            @endforeach
                            
                        @else
        
                            <div class="carousel-item active ">
                                <img src="https://picsum.photos/1200/700?random={{ $order->studio->id }}" class="d-block w-100" alt="{{ $order->studio->category->name }}">
                            </div>
                            @for ($i = 1+$order->studio->id; $i <=2+$order->studio->id; $i++ )
                                <div class="carousel-item ">
                                    <img src="https://picsum.photos/1200/700?random={{ $i+$order->studio->id }}" class="d-block w-100" alt="{{ $order->studio->category->name }}">
                                </div>
                            @endfor
                            
                        @endif
        
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="{{'#' . $order->studio->slug . '-carousel' }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="{{'#' . $order->studio->slug . '-carousel' }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
        
                </div>   

                <h6 class="card-subtitle my-2 text-muted text-center"><a href="/katalog/{{ $order->studio->slug }}" class="text-decoration-none">{{ $order->studio->title }}</a></h6>
            </div>

            <div class="text-center">
                <h5 class="font-weight-bold">Rating</h5>
                <form method="post" action="/review/create/{{ $order->id }}">
                    @csrf
                    <div class="rating"> 
                        <input class="star star-5" value="5" id="star-5" type="radio" name="rating"/>
                        <label class="star star-5 fs-3" for="star-5"></label>
                        <input class="star star-4" value="4" id="star-4" type="radio" name="rating"/>
                        <label class="star star-4 fs-3" for="star-4"></label>
                        <input class="star star-3" value="3" id="star-3" type="radio" name="rating"/>
                        <label class="star star-3 fs-3" for="star-3"></label>
                        <input class="star star-2" value="2" id="star-2" type="radio" name="rating"/>
                        <label class="star star-2 fs-3" for="star-2"></label>
                        <input class="star star-1" value="1" id="star-1" type="radio" name="rating"/>
                        <label class="star star-1 fs-3" for="star-1"></label>
                        @error('rating')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <textarea class="form-control" name="review_text" id="review_text" cols="100" rows="5" placeholder="Input Review" style="resize: none;"></textarea>
                        @error('review_text')
                            <div class="invalid-feedback mb-2" style="display: block!important;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection