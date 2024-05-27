<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Strona Główna</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
            href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
            rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
            href="https://fonts.googleapis.com/css2?family=Lato&display=swap"
            rel="stylesheet"
    />
    <title>Strona Główna</title>

    <style>
        
        a {
            text-decoration: none;
            color: #007bff; 
            font-weight: bold; 
            transition: color 0.3s ease; 
        }

       
        a:hover {
            color: #ff0000; 
        }
    </style>

</head>
<body>
<script>
    window.onload = function () {
        var slides = document.querySelector(".slider-items").children;
        var nextSlide = document.querySelector(".right-slide");
        var prevSlide = document.querySelector(".left-slide");
        var totalSlides = slides.length;
        var index = 0;

        nextSlide.onclick = function () {
            next("next");
        };
        prevSlide.onclick = function () {
            next("prev");
        };

        function next(direction) {
            if (direction == "next") {
                index++;
                if (index == totalSlides) {
                    index = 0;
                }
            } else {
                if (index == 0) {
                    index = totalSlides - 1;
                } else {
                    index--;
                }
            }

            for (i = 0; i < slides.length; i++) {
                slides[i].classList.remove("active");
            }

            slides[index].classList.add("active");
        }
    };
</script>

<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name"><a href="gra.php">Moje Konto</a></div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="index1.php" class="nav__link" data-link>
                <i class="bx bx-home"></i>
                <span class="links_name">Strona główna</span>
            </a>
            <span class="tooltip">Strona główna</span>
        </li>
        <li>
            <a href="Articles.php" class="nav__link" data-link>
                <i class="bx bx-code-block"></i>
                <span class="links_name">Artykuły</span>
            </a>
            <span class="tooltip">Artykuły</span>
        </li>
        <li>
            <a href="Gallery.php" class="nav__link" data-link>
                <i class="bx bx-image"></i>
                <span class="links_name">Zdjęcia mistrzów świata</span>
            </a>
            <span class="tooltip">Zdjęcia mistrzów świata</span>
        </li>
        <li>
            <a href="RobertJamesFischer.php" class="nav__link" data-link>
                <i class="bx bx-user-pin"></i>
                <span class="links_name">Robert James Fischer</span>
            </a>
            <span class="tooltip">Robert James Fischer</span>
        </li>
        <li>
            <a href="AboutAutor.php" class="nav__link" data-link>
                <i class="bx bx-user"></i>
                <span class="links_name">O autorze</span>
            </a>
            <span class="tooltip">O autorze</span>
        </li>
        <li>
            <a href="Contact.php" class="nav__link" data-link>
                <i class="bx bx-mail-send"></i>
                <span class="links_name">Kontakt</span>
            </a>
            <span class="tooltip">Kontakt</span>
        </li>
        <li>
            <a href="szachyJS.php" class="nav__link" data-link>
                <i class="bx bx-game"></i>
                <span class="links_name">Szachy-Zagraj</span>
            </a>
            <span class="tooltip">Szachy-Zagraj</span>
        </li>
    </ul>
</div>

<section class="home-section2"> <div class="clock" id="clock"></div>
   
    <div class="mid-div">Witaj na mojej stronie poświęconej fascynującej grze - szachom! Zanurz się w świecie strategii, intelektualnej rywalizacji i pasji, której nie znajdziesz nigdzie indziej. Nasza platforma jest idealnym miejscem zarówno dla początkujących, którzy dopiero rozpoczynają swoją przygodę ze szachami, jak i dla doświadczonych graczy, którzy poszukują wyzwań i doskonalenia swoich umiejętności.</div>


       
</section>

<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    searchBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    }
</script>
<script>
    function updateDigitalClock() {
      const now = new Date();
      const hours = now.getHours();
      const minutes = now.getMinutes();
      const seconds = now.getSeconds();

      const clockElement = document.getElementById('clock');
      clockElement.textContent = `${formatTime(hours)}:${formatTime(minutes)}:${formatTime(seconds)}`;
    }

    function formatTime(time) {
      return time < 10 ? `0${time}` : time;
    }

    setInterval(updateDigitalClock, 1000);
    updateDigitalClock(); 
</script>
</body>
</html>
</title>
</head>
<body>
</body>
</html>
