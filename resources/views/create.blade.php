<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Object</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div style="margin-top: 2%;">
        <div class="container">
            <div class="container-fluid">
                <div class="card-header">
                    <h1>Create Object</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('obj.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control" id="year" name="data[year]" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="data[price]" required>
                        </div>

                        <div class="mb-3">
                            <label for="cpu_model" class="form-label">CPU Model</label>
                            <input type="text" class="form-control" id="cpu_model" name="data[CPU model]" required>
                        </div>

                        <div class="mb-3">
                            <label for="hard_disk_size" class="form-label">Hard Disk Size</label>
                            <input type="text" class="form-control" id="hard_disk_size" name="data[Hard disk size]" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
