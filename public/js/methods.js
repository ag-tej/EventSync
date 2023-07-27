// loading svg icon on click
function loading() {
    document.getElementById('button').disabled = true;
    const loading = document.getElementById('loading_icon')
    loading.classList.toggle('hidden')
    loading.classList.toggle('inline')
    document.getElementById('form').submit();
}
