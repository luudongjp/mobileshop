<div id="home">
    <div class="banner">
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < sizeof($banners); $i++) : ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo (($i == 0) ? 'active' : ''); ?>"></li>
                    <?php endfor; ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php for ($j = 0; $j < sizeof($banners); $j++) : ?>
                        <div class="item <?php echo (($j == 0) ? 'active' : ''); ?>">
                            <img src="<?php echo BASE_URL . $banners[$j]['url']; ?>" alt="<?php echo $banners[$j]['name']; ?>" >
                        </div>
                    <?php endfor; ?>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>