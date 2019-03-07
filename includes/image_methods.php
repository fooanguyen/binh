<?php
    class Images{

        //private $dir;
        private $image_array;

        public function __construct(){
            //$this->dir = 'slides/';
            $this->image_array = array();
        }

        function get_images_from_folder($dir){
           $image_format = array('jpg','jpeg','png','gif');

            if (file_exists($dir) == false) {
                return array("Directory \'', $dir, '\' not found!");
            } 
            else {
                $dir_contents = scandir($dir);
                foreach ($dir_contents as $file) {
                    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (in_array($file_extension, $image_format) == true) {
                        $this->image_array[] = $file;
                    }
                }
                return $this->image_array;
            }
        }

        //using php 7..set get images from folder as private
        // public function call_private_method($obj, $method, $args) 
        // {
        //     $class = new ReflectionClass(get_class($obj));
        //     $closure = $class->getMethod($method)->getClosure($obj);
        //     return call_user_func_array($closure, $args);
        // }
    
        /*public function call_private_property($obj){
            $class = new ReflectionClass(get_class($obj));
            $var = $class->getProperty('dir');
            $var->setAccessible(true);
            return $var->getValue($obj);
        }*/

        public function carousel_slider($images, $dir){
            if(!empty($images)){
                foreach($images as $key => $image){
                    $imgCloseDiv = " '></div>";

                    if($key == 0){
                        $imgOpenActiveDiv = "<div class='carousel-item active'><img class='d-block w-100' src=' ";
                        echo ($imgOpenActiveDiv . $dir . $image . $imgCloseDiv);
                    }
                    else{
                        $imgOpenDiv = "<div class='carousel-item'><img class='d-block w-100' src=' ";
                        echo ($imgOpenDiv . $dir . $image . $imgCloseDiv);
                    }
                }
            }
        }

        /*public function carousel_indicator($images, $dir){
            if(!empty($images)){
                foreach($images as $key => $image){
                    $indicatorCloseDiv = "' class='img-fluid'></li>";
                    if($key == 0){
                        $indicatorOpenActiveDiv = "<li data-target='#carousel-thumb' data-slide-to='0' class='thumb active'> <img class='d-block w-100' src='";
                        echo ($indicatorOpenActiveDiv . $dir . $image. $indicatorCloseDiv);
                    }
                    else{
                        $indicatorOpenDiv = "<li data-target='#carousel-thumb' data-slide-to='".$key."' class='thumb'> <img class='d-block w-100' src='";
                        echo ($indicatorOpenDiv . $dir . $image. $indicatorCloseDiv);
                    }
                }
            }    
        }*/
        
    }
?>