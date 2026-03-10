<!DOCTYPE html>
<html>
<head>
    <title>Upload Video</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4>Upload Video</h4>
        </div>

        <div class="card-body">

            <form action="{{URL::to('admin/video/store') }}" 
                  method="POST" 
                  enctype="multipart/form-data">

                @csrf

                <!-- Video Title -->
                <div class="mb-3">
                    <label class="form-label">Video Title</label>
                    <input type="text" 
                           name="title" 
                           class="form-control"
                           placeholder="Enter Video Title"
                           required>
                </div>

                <!-- Video File -->
                <div class="mb-3">
                    <label class="form-label">Upload Video</label>
                    <input type="file" 
                           name="video"
                           class="form-control"
                           accept="video/*"
                           required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="3"
                              placeholder="Video Description"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary">
                    Upload Video
                </button>

            </form>

        </div>
    </div>
</div>

</body>
</html>