<?php
    require_once(realpath(dirname(__FILE__)) . "/image_methods.php");

    $slide_dir = 'slides/';
    $obj = new Images();

    //$images = $obj->call_private_method($obj,"get_images_from_folder", $args = array($dir = $slide_dir));
    $images = $obj->get_images_from_folder($slide_dir);
   // print_r($images);

    //$dir = $obj->call_private_property($obj);
    //echo $dir;
    shuffle($images);
?>
<!--Carousel Wrapper-->
<div id="myCarousel" class="carousel slide">
    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <?php
                //$obj->carousel_slider($images, $dir);
                $obj->carousel_slider($images, $slide_dir);
            ?>
        </div>
        <!--/.Slides-->

        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->

        <!--Indicators-->
        <ol class="carousel-indicators list-inline"> 
            <?php
                //$obj->carousel_indicator($images, $dir);
            ?>
        </ol>
         <!--/.Indicators-->

    </div>
</div>
<!--/.Carousel Wrapper-->                





