<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die</title>
    <link rel="icon" href="<?= base_url('img/icon-b4die.ico')?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <script src="<?= base_url('js/js.js')?>"></script>
</head>
<body>
    <nav>
        <div class="nav-top">
            <div>
                <span>hola</span>
            </div>
            <div>
                <img src="<?= base_url('img/icon-search.svg')?>">
                <img src="<?= base_url('img/icon-user.svg')?>">
            </div>
        </div>
        <div class="nav-bottom">
            <a href=""><img src="<?= base_url('img/logo.png')?>"></a>
            <ul>
                <li><a href="#">Experiencias</a></li>
                <li><a href="#">Ranking</a></li>
                <li><a href="#">Mapa</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
    </nav>

    <div class="slideshow-container">

        <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="<?= base_url('img/caida-libre.jpg')?>" class="img-slider">
        <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="<?= base_url('img/kart.jpg')?>" class="img-slider">
        <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="<?= base_url('img/slider-surf.jpg')?>" class="img-slider">
        <div class="text">Caption Three</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
    </div>

    
    <!-- Animación Sliders -->
    <script>
        let slideIndex = 1;
        setInterval(function() {
            showSlides(slideIndex);
            slideIndex++;
            if (slideIndex > 3) {
                slideIndex = 1;
            }
        }, 10000);
        

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        }
    </script>
</body>
</html>