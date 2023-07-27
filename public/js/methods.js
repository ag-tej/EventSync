// loading svg icon on click
function loading() {
    document.getElementById('button').disabled = true;
    const loading = document.getElementById('loading_icon')
    loading.classList.toggle('hidden')
    loading.classList.toggle('inline')
    document.getElementById('form').submit();
}

// user dropdown toggle
function userDropdown(elementId1, elementId2) {
    var dropdown1 = document.getElementById(elementId1);
    const isVisible1 = dropdown1.style.visibility !== 'hidden';
    if (isVisible1)
        dropdown1.style.visibility = 'hidden';
    else
        dropdown1.style.visibility = 'visible';
    var dropdown2 = document.getElementById(elementId2);
    const isVisible2 = dropdown2.style.visibility !== 'hidden';
    if (isVisible2)
        dropdown2.style.visibility = 'hidden';
    else
        dropdown2.style.visibility = 'visible';
}
