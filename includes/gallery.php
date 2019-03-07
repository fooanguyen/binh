<?php
    require_once(realpath(dirname(__FILE__)) . "/image_methods.php");

   $gallery_dir = 'gallery/';
   $obj = new Images();

   //$images = $obj->call_private_method($obj,"get_images_from_folder", $args = array($dir = $gallery_dir));
   $images = $obj->get_images_from_folder($gallery_dir);
   //print_r($images);

   shuffle($images);
   shuffle($images);
   shuffle($images);
   shuffle($images);
   shuffle($images);
   
   $image_len = count($images);
?>
<script>
    
    //var image_len = <?php echo  $image_len; ?>;
    var gallery_dir = "<?php echo  $gallery_dir; ?>";
    <?php echo "var images = ".json_encode($images)?>;
    
</script>

<div class="myGallery bg-dark"></div>
<div class="gallery-begin"></div>
<div  class="col">
    <div class="row gallery" id="gallery">
        <!--javascript to add thumbnails -->
    </div>    
        
    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12 mx-auto d-block" src="">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>

                </div>
            </div>
    </div>
    <?php 
        require_once(realpath(dirname(__FILE__)) . "/pagination.php");
    ?>
</div>

<div class="gallery-end"></div>
