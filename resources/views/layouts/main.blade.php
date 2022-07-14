<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Photo Studio | {{ $title }}</title>

    <!-- CSS dari Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    {{-- Icon-icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Popperjs -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js"
    crossorigin="anonymous"></script>
    <!-- Tempus Dominus JavaScript -->
    <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@development/dist/js/tempus-dominus.js"
    crossorigin="anonymous"></script>

    <!-- Tempus Dominus Styles -->
    <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@development/dist/css/tempus-dominus.css"
    rel="stylesheet" crossorigin="anonymous">

    <script type="text/javascript" src="/js/date.js"></script>
    <script type="text/javascript" src="/js/date-id-ID.js"></script>

    {{-- Style Sendiri --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/76e4c11185.js" crossorigin="anonymous"></script>

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }

      .images-preview-div img
      {
          padding: 10px;
          max-width: 100%;
      }

      #images-preview
      {
          width: 90%;
          position: relative;
          margin: auto;
          display: flex;
          justify-content: space-evenly;
          gap: 20px;
          flex-wrap: wrap;

      }
      figcaption{
          text-align: center;
          font-size: 12px;
          margin-top: 0.5rem;
      }

      .btn-usual-color
      {
        background-color: #7388E4;
        border: none;
      }
    </style>

  </head>
  <body>
    
    @include('partials.navbar')

    <div class="container mt-4 mb-5">
        @yield('container')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  </body>
</html>