<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div style=" margin-top: 2%;">

        <div class="container">

            <div class="container-fluid">
                <div class="card-header">
                    <h1>Object Listing</h1> <br>
                    <a href="{{ route('obj.create') }}" class="btn btn-success">Add + </a>
                </div>
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                <div class="alert alert-success" id="successMsg">{{ session('success') }}</div>
                @endif
                @foreach ($object as $item)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body mt-3">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="" style="margin: 15px;">
                                                @php
                                                    $color = isset($item->data->color) ? $item->data->color : null;
                                                    $capacity = isset($item->data->capacity)
                                                        ? $item->data->capacity
                                                        : null;
                                                @endphp
                                                <p>id: {{ $item->id }}</p>
                                                <p>Name: {{ $item->name }}</p>
                                                <p>Color: {{ $color ?? 'N/A' }} </p>
                                                <p>Capacity: {{ $capacity ?? 'N/A' }} </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <button class="btn btn-primary btn-sm" type="button"><i
                                                    class="fas fa-edit"></i></button> <br>
                                            <button class="btn btn-danger btn-sm" style="margin-top: 15px;"
                                                class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-delete-{{$item->id}}"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modal-delete-{{$item->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="modal-deleteLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-deleteLabel">Delete Object</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to delete this object?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{ route('obj.delete', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
      $(document).ready(function() {
        var successMsg = $('#successMsg');

        setTimeout(() => {
            successMsg.fadeOut('slow');
        }, 5000);
      })
</script>
</html>
