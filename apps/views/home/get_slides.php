

    <div id="banner" class="slider-wrapper theme-default">
      <div id="slider" class="nivoSlider">
        <?php 
        //$bannerQ=mysql_query("SELECT * FROM  `home-page-slider`");
        //while($allbanner=mysql_fetch_object($bannerQ))
        foreach ($slides as $k=>$v)
        {
        ?>

            <img src="<?php echo BASE_URL."home_slider_image/".$v->image; ?>" alt="Slot Banners" />

        <?Php
        }
        ?>
      </div>
    </div>