<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Gallery</title>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    
<h2 class="text-center">Gallery</h2>
<form class="form-inline">
  <a class="btn btn-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <a class="btn btn-success" href="{{ route('feeds.create') }}">Upload</a>
        
  </form>
</nav>
    <div class="container text-center">
        @foreach ($images as $image)
        <div class="position-relative d-inline-block">
            @if (Str::endsWith($image->image, ['.png', '.jpg', '.jpeg', '.gif']))
                <img src="{{ asset('/image/'.$image->image) }}" width="640" height="360" class="card-img-top" alt="Image">
            @elseif (Str::endsWith($image->image, ['.mp4', '.avi', '.mov', '.wmv']))
                <video width="640" height="360" controls class="card-img-top">
                    <source src="{{ asset('/storage/'.$image->image) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                Unsupported file format.
            @endif
        </div>
        <form action="{{ route('feeds.destroy',$image->id) }}" method="POST">
            @csrf
            @method('DELETE')

                 <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                    <i class="bi bi-trash-fill"></i>
                 </button>
        </form>
        
                <div>{{ $image->caption }}</div>
                <div>{{ $image->created_at->format('d F Y') }}</div>
            <br>
        @endforeach
        
       
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
       
            </td>
        </tr>
        {{ $images->links() }}
    </div>
</body>
</html>
