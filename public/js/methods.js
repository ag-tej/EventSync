// loading svg icon on click
function loading() {
    document.getElementById('button').disabled = true;
    const loading = document.getElementById('loading_icon')
    loading.classList.toggle('hidden')
    loading.classList.toggle('inline')
    document.getElementById('form').submit();
}

// user dropdown toggle
function userDropdown() {
    var dropdown = document.getElementById('user_dropdown');
    const isVisible = dropdown.style.visibility !== 'hidden';
    if (isVisible)
        dropdown.style.visibility = 'hidden';
    else
        dropdown.style.visibility = 'visible';
}
