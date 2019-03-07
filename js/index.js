$(document).ready(function() {
  /*main nav */
  $("#home").addClass("active");
  $("#services").removeClass("active");
  $("#contactus").removeClass("active");
  $("#contactus").removeClass("active");
  $("#novalash").removeClass("active");

  /*
  pagination
  */

  //let items = $(".gallery div");
  let perPage = 4;
  let showFrom = 0;
  let showTo = 0;

  //only 1 page
  if (images.length <= perPage) {
    perPage = images.length;
    showFrom = 0;
    showTo = perPage;
    addThumbnail(showFrom, showTo, perPage);
  }
  //more than 1 page
  else {
    //load the first page because it does not involve clicking
    $(document).ready(function() {
      showTo = showFrom + perPage;
      addThumbnail(showFrom, showTo, perPage);
    });

    $(".gallery-pagination").pagination({
      items: images.length,
      itemsOnPage: perPage,
      cssStyle: "light-theme",

      onPageClick: function(pageNumber) {
        // We need to show and hide `div`s appropriately.
        showFrom = perPage * (pageNumber - 1);
        if (images.length - showFrom < 4) {
          perPage = images.length - showFrom;
        } else {
          perPage = 4;
        }
        showTo = showFrom + perPage;

        //console.log("len: " + images.length);
        //console.log("perPage: " + perPage);
        //console.log("pagenumber: " + pageNumber);
        //console.log("from: " + showFrom);
        //console.log("To: " + showTo);
        addThumbnail(showFrom, showTo, perPage);
      }
    });
  }

  //modal
  $(document).on("click", ".img-thumbnail", function(e) {
    let getImg = $(this).attr("src");
    //console.log(getImg);
    //console.log(getImg.split("gallery/")[1]);
    //console.log($.inArray(getImg.split("gallery/")[1], images));
    //console.log(images);

    let index = $.inArray(getImg.split("gallery/")[1], images);
    let src = getImg.split("gallery/")[1];
    loadGallery(index, src);
  });

  //This function disables buttons when needed
  function disableButtons(currentIndex) {
    $("#show-previous-image, #show-next-image").show();
    if (currentIndex === images.length - 1) {
      $("#show-next-image").hide();
    } else if (currentIndex === 0) {
      $("#show-previous-image").hide();
    }
  }

  function loadGallery(index, imageName) {
    updateGallery(index, imageName);

    $("#show-next-image, #show-previous-image").click(function() {
      if ($(this).attr("id") === "show-previous-image") {
        index--;
      } else {
        index++;
      }

      updateGallery(index, images[index]);
    });

    function updateGallery(index, src) {
      $("#image-gallery-image").attr("src", "gallery/" + src);
      disableButtons(index);
    }
  }

  // build key actions
  $(document).keydown(function(e) {
    let modalId = $("#image-gallery");
    switch (e.which) {
      case 37: // left
        if (
          (modalId.data("bs.modal") || {})._isShown &&
          $("#show-previous-image").is(":visible")
        ) {
          $("#show-previous-image").click();
        }
        break;

      case 39: // right
        if (
          (modalId.data("bs.modal") || {})._isShown &&
          $("#show-next-image").is(":visible")
        ) {
          $("#show-next-image").click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });
});

//console.log(image_len);
//console.log(gallery_dir);
//console.log(images[0]);

//add thumbnail to gallery
function addThumbnail(showFrom, showTo, perPage) {
  //clear previous images first
  $(".gallery").empty();
  appendDiv(perPage);
  appendHref();
  appendImg();
  addImgProperties(showFrom, showTo, perPage);
}

//append gallery>div
function appendDiv(perPage) {
  for (let i = 0; i < perPage; i++) {
    $("#gallery").append("<div></div>");
  }
}

//append gallery>div>a
function appendHref() {
  $("#gallery")
    .children("div")
    .append("<a></a>");
}

//append gallery>div>a>img
function appendImg() {
  $("#gallery")
    .children("div")
    .children("a")
    .append("<img>");
}

//add properties to div a img
function addImgProperties(showFrom, showTo, perPage) {
  let jpgsrc = "gallery/";
  for (let i = 0; i < perPage; i++) {
    let jpgimg = new Image();
    jpgimg.src = jpgsrc + images[showFrom + i];

    $("#gallery>div").addClass("col-lg-3 col-md-6 col-xs-6 thumb");
    //.attr("style", "display: none;");
    $("#gallery>div>a")
      .eq(i)
      .addClass("thumbnail")
      .attr("data-toggle", "modal")
      .attr("data-image", jpgimg.src)
      .attr("data-image-id", "")
      .attr("data-title", "")
      .attr("data-target", "#image-gallery");

    $("#gallery>div>a>img")
      .eq(i)
      .addClass("img-thumbnail")
      .attr("src", jpgimg.src);
  }
}
