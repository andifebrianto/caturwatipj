<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <img src="" alt="" class="img-preview img-fluid">
            <label for="formFile" class="form-label">masukkan gambar</label>
            <input class="form-control" type="file" id="cover" name="cover" onchange="previewImage()">
        </div>
    </form>

    <script>

        // preview gambar
        function previewImage(){
              const cover = document.querySelector('#cover');
              const imgPreview = document.querySelector('.img-preview');
        
              imgPreview.style.display = 'block';
        
              const oFReader = new FileReader();
              oFReader.readAsDataURL(cover.files[0]);
        
              oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
              }
        
                // const blob = URL.createObjectURL(image.files[0]);
                // imgPreview.src = blob;
        }
        
        </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>