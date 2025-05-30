<?php
    require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Women's Section</title>
    <link rel="stylesheet" href="index3.css">
    <script src="index.js"></script>
</head>
<body>
   <nav>
        <a class="logo" href="index.php">Adidas</a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index2.php">Men</a></li>
            <li><a href="index3.php">Women</a></li>
            <li><a href="index4.php">Kids</a></li>
            <li>
                <a href="cart.php" class="cartlink">
                Card
                </a>
            </li>
        </ul>
    </nav>
    <h1><span style="color: white;">Women's Section</span></h1>
    <div class="shoescontainer">
           <?php
            $sql = "SELECT * FROM women";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                $count = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    $count++;
        ?>
        <div class="card">
            <img src="<?php echo $row["image"] ?>" alt="">
            <h1><?php echo $row["title"] ?></h1>
            <p class="price">$<?php echo $row["price"] ?></p>
            <button onclick="purchaseItem('women-shoe<?php echo $count; ?>', '', <?php echo $row['price']; ?>, '<?php echo $row['image']; ?>')">Purchase</button>
        </div>
        <?php
                }
            } 
        ?> 
    </div>
        <div class="carousel">
            <div class="carouselin">
                <div class="carouselitem active">
                    <img src="womens shoes 2.png" alt="">
                    <div class="carouselcaption">
                        <h3>New Summer Collection</h3>
                        <p>Discover our latest designs</p>
                    </div>
                </div>
                <div class="carouselitem">
                    <img src="womens shoes 3.png" alt="">
                    <div class="carousel-caption">
                        <h3>Limited Edition</h3>
                        <p>Exclusive styles available now</p>
                    </div>
                </div>
                <div class="carouselitem">
                    <img src="womens shoes 4.png" alt="">
                    <div class="carousel-caption">
                        <h3>Running Shoes</h3>
                        <p>Performance meets style</p>
                    </div>
                </div>
            </div>
            <button class="carouselcontrol prev" onclick="moveSlide(-1)">❮</button>
            <button class="carouselcontrol next" onclick="moveSlide(1)">❯</button>
            <div class="carouselindicators">
                <span class="indicator active" onclick="goToSlide(0)"></span>
                <span class="indicator" onclick="goToSlide(1)"></span>
                <span class="indicator" onclick="goToSlide(2)"></span>
            </div>
        </div>
          <script>
        let slideIndex = 0;
        let slideInterval;

        function showSlides() {
            const slides = document.querySelectorAll('.carouselitem');
            const indicators = document.querySelectorAll('.indicator');
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(ind => ind.classList.remove('active'));

            if (slideIndex >= slides.length) slideIndex = 0;
            if (slideIndex < 0) slideIndex = slides.length - 1;


            slides[slideIndex].classList.add('active');
            indicators[slideIndex].classList.add('active');
        }

        function moveSlide(n) {
            slideIndex += n;
            showSlides();
            resetInterval();
        }

        function goToSlide(n) {
            slideIndex = n;
            showSlides();
            resetInterval();
        }

        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(() => {
                slideIndex++;
                showSlides();
            }, 1000);
        }

        document.addEventListener('DOMContentLoaded', () => {
            showSlides();
            slideInterval = setInterval(() => {
                slideIndex++;
                showSlides();
            }, 1000);
        });
        </script>
</body>
</html>