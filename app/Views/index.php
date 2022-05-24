<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die</title>
    <link rel="icon" href="<?= base_url('img/icon-b4die.ico')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/index.css')?>">
</head>
<body>
    <nav>
        <div class="nav-top">
            <div>
                <i class='bx bx-search-alt-2'></i>
                <i class='bx bxs-user-circle'></i>
            </div>
        </div>
        <div class="nav-bottom">
            <a href="<?= base_url()?>"><img src="<?= base_url('img/logo.png')?>"></a>
            <ul>
                <li><a href="#">Experiencias</a></li>
                <li><a href="<?=base_url().'/ranking'?>">Ranking</a></li>
                <li><a href="#">Mapa</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
    </nav>

    <div class="slideshow-container">

        <div class="mySlides fade" id="slide-1">
        <div class="numbertext">1 / 3</div>
        <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade" id="slide-2">
        <div class="numbertext">2 / 3</div>
        <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade" id="slide-3">
        <div class="numbertext">3 / 3</div>
        <div class="text">Caption Three</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>

    <div class="container">
        <h2>Experiencias más visitadas</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deleniti facere ut officia ea hic porro adipisci, nemo in vitae provident corrupti minima perferendis! Quia praesentium ab voluptatibus eveniet nam, repudiandae sint quaerat pariatur ducimus tempora dolorem ipsa doloremque neque animi illum, voluptatum possimus iure dolores! Vitae totam voluptas aliquam.</p>
        <div>
            <div class="card">
                <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
            </div>

            <div class="card">
                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
            </div>

            <div class="card">
                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
            </div>

            <div class="card">
                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
            </div>
        </div>
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
        showSlides(1);
    </script>
</body>
</html>