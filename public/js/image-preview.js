function fileValidation(){
    var fileInput = document.getElementById('gambar');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" width="200"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidationBgImage(){
    var fileInput = document.getElementById('bg_image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('bg_image_preview').innerHTML = '<img src="'+e.target.result+'" width="200"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidationBeranda1(){
    var fileInput = document.getElementById('bg_beranda_1');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('bg_beranda_1_preview').innerHTML = '<img src="'+e.target.result+'" width="200"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidationBeranda2(){
    var fileInput = document.getElementById('bg_beranda_2');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('bg_beranda_2_preview').innerHTML = '<img src="'+e.target.result+'" width="200"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidationBeranda3(){
    var fileInput = document.getElementById('bg_beranda_3');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('bg_beranda_3_preview').innerHTML = '<img src="'+e.target.result+'" width="200"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}