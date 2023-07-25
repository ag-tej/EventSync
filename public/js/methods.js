// loading svg icon on click
function loading() {
    document.getElementById('create').disabled = true;
    const loading = document.getElementById('loading_icon')
    loading.classList.toggle('hidden')
    loading.classList.toggle('inline')
    document.getElementById('submitForm').submit();
}
