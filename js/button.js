document.addEventListener('DOMContentLoaded', function() {
    var count = 0;
    var button = document.getElementById("toggle-button");
    var container = document.getElementById("image-container");
    
    button.onclick = function() {
        count++;
        
        if (count % 2 == 0) {
            // Четное нажатие - скрываем изображение
            container.innerHTML = "";
            button.textContent = "Показать фото";
        } else {
            // Нечетное нажатие - показываем изображение
            var img = document.createElement("img");
            img.src = "images/img3.png";
            img.alt = "Фото Галимова А.Д.";
            container.appendChild(img);
            button.textContent = "Скрыть фото";
        }
    };
});