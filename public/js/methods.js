// live image preview
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var preview = document.getElementById('preview');
        preview.classList.toggle('hidden')
        preview.classList.toggle('block')
        preview.src = reader.result;
        var oldImage = document.getElementById('oldImage');
        if (oldImage) {
            oldImage.className = 'hidden';
        }
    }
    reader.readAsDataURL(event.target.files[0]);
}

// loading svg icon on click
function loading() {
    document.getElementById('button').disabled = true;
    const loading = document.getElementById('loading_icon')
    loading.classList.toggle('hidden')
    loading.classList.toggle('inline')
    document.getElementById('form').submit();
}
