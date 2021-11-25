
document.querySelectorAll(".timeSelection").forEach(item => {

    const urlParams = new URLSearchParams(window.location.search);
    const days = urlParams.get('days');

    if (days && days >= 0) item.value = days;
    else item.value = 5;

    item.addEventListener("change", function () {
        window.location.href = '?days=' + item.value
    });
});