window.addEventListener('DOMContentLoaded', function() {
    var flashSuccess = document.getElementById('flash-success');
    var flashError = document.getElementById('flash-error');

    // hide the flashSuccess div after 2 seconds
    if (flashSuccess !== null) {
        setTimeout(function() {
            flashSuccess.style.display = 'none';
        }, 4000);
    }

    // hide the flashError div after 2 seconds
    if (flashError !== null) {
        setTimeout(function() {
            flashError.style.display = 'none';
        }, 4000);
    }
});
