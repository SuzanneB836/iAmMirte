function zoom(clickedDiv) {
    var divs = document.querySelectorAll('.producten div');

    divs.forEach(function(div) {
        div.classList.remove('zoomed');
    });

    clickedDiv.classList.add('zoomed');

    var otherDiv = clickedDiv === divs[0] ? divs[1] : divs[0];
    otherDiv.classList.add('hidden');
}