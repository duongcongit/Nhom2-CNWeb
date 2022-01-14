// Script for Manage tour page
function showToursData(){
  var tableID = "table-tour";
  var page = 2;
  var numRow = 5;
  var sortBy = "id desc";
  $.ajax({
    url: "get-tours-data.php",
    type: "POST",
    data: {
      tableID: tableID,
      page: page,
      numRow: numRow,
      sortBy: sortBy,
    },
    success: function(data){
      $("#table-tour").html(data);
    },
  });
};

// Activate tour
$(document).on("click", ".activateTour", function () {
  var tourID = $(this).data("tour_id");
  $.ajax({
    url: "activate-tour.php",
    type: "POST",
    data: {tourID: tourID},
    success: function(data){
      var result = $.trim(data);
      if(result == "success"){
        showToursData();
      }
      else{
        alert("Lỗi");
      }
    },
    error: function(jqXHR, exception){
      alert("Lỗi");
    }
  })
})

// Disable tour
$(document).on("click", ".disableTour", function () {
  var tourID = $(this).data("tour_id");
  $.ajax({
    url: "disable-tour.php",
    type: "POST",
    data: {tourID: tourID},
    success: function(data){
      var result = $.trim(data);
      if(result == "success"){
        showToursData();
      }
      else{
        alert("Lỗi");
      }
    },
    error: function(jqXHR, exception){
      alert("Lỗi");
    }
  })
})

// Delete tour
$(document).on("click", ".deleteTour", function () {
  var tourID = $(this).data("tour_id");
  $.ajax({
    url: "delete-tour.php",
    type: "POST",
    data: {tourID: tourID},
    success: function(data){
      var result = $.trim(data);
      alert(data);
      if(strpos(result ,"false") != false){
        alert("Đã xảy ra lỗi");
      }
      else{
        showToursData();
      }
    },
    error: function(jqXHR, exception){
      alert("Lỗi");
    }
  })
})




$(document).ready(function () {
  // For click menu button, show/hide sidebar
  $("#btn-menu").click(function () {
    $(".sidebar").toggleClass("sidebar-show");
    $(".main-right").toggleClass("show");
  });

  // Expand subpage in sidebar menu
  $(".tour-btn").click(function () {
    $(".sidebar-menu ul .tour-show").toggleClass("show");
    $(".sidebar-menu ul .tour-caret").toggleClass("rotate");
  });

  // ====== Script for add tour page

  // Check tour info before insert
  $("#btn-add-tour").on("click", function () {
    // Check tour title
    if ($("#addTourTitle").val() == "") {
      $("#addTourTitle").css("border", "solid 2px red");
      window.scrollTo(0, 0);
      event.preventDefault();
    } else {
      $("#addTourTitle").css("border", "");
    }
    // Check tour type
    if ($("#addTourType").val() == "") {
      $("#addTourType").css("border", "solid 2px red");
      window.scrollTo(0, 0);
      event.preventDefault();
    } else {
      $("#addTourType").css("border", "");
    }
    // Check ...
    if ($("#addTourtourPlaceDeparture").val() == "") {
      $("#addTourtourPlaceDeparture").css("border", "solid 2px red");
      window.scrollTo(0, 0);
      event.preventDefault();
    } else {
      $("#addTourtourPlaceDeparture").css("border", "");
    }
    //
    if ($("#addTourtourPlaceDestination").val() == "") {
      $("#addTourtourPlaceDestination").css("border", "solid 2px red");
      window.scrollTo(0, 0);
      event.preventDefault();
    } else {
      $("#addTourtourPlaceDestination").css("border", "");
    }
    // Check date
    var tourDepartureDay = new Date($("#addTourDepartureDay").val());
    var tourEndDate = new Date($("#addTourEndDate").val());
    if (tourEndDate < tourDepartureDay) {
      $("#addTourEndDate").css("border", "solid 2px red");
      $("#tourEndDateHelp").text(
        "Ngày kết thúc không thể nhỏ hơn ngày khởi hành"
      );
      $("#tourEndDateHelp").css("color", "red");
      event.preventDefault();
    } else {
      $("#tourEndDateHelp").text("");
      $("#addTourEndDate").css("border", "");
    }
    //
    // Check price
    let pricePattern = /^[0-9]+$/;
    // For adult price
    var adultPrice = $("#tourAdultPrice").val();
    if (pricePattern.test(adultPrice) == false || adultPrice == "") {
      $("#tourAdultPrice").css("border", "solid 2px red");
      event.preventDefault();
    } else {
      $("#tourAdultPrice").css("border", "");
    }
    // For children price
    var childrenPrice = $("#tourChildrenPrice").val();
    if (
      (pricePattern.test(childrenPrice) == false || childrenPrice == "") &&
      !$("#tourChildrenPrice").is(":disabled")
    ) {
      $("#tourChildrenPrice").css("border", "solid 2px red");
      event.preventDefault();
    } else {
      $("#tourChildrenPrice").css("border", "");
    }
    // For older price
    var olderPrice = $("#tourOlderPrice").val();
    if (
      (pricePattern.test(olderPrice) == false || olderPrice == "") &&
      !$("#tourOlderPrice").is(":disabled")
    ) {
      $("#tourOlderPrice").css("border", "solid 2px red");
      event.preventDefault();
    } else {
      $("#tourOlderPrice").css("border", "");
    }
  });

  // Proccess when check checkbox price
  $("#cbPriceChildren").change(function () {
    if (this.checked) {
      $("#tourChildrenPrice").prop("disabled", false);
    }
    if (!this.checked) {
      $("#tourChildrenPrice").prop("disabled", true);
    }
  });
  //
  $("#cbPriceOlder").change(function () {
    if (this.checked) {
      $("#tourOlderPrice").prop("disabled", false);
    }
    if (!this.checked) {
      $("#tourOlderPrice").prop("disabled", true);
    }
  });

  // Check tour id
  $("#addTourID").on("change", function () {
    var tourID = $(this).val();
    if (tourID != "") {
      $.ajax({
        url: "check-tour-info.php",
        type: "POST",
        data: { tourID: tourID },
        success: function (data) {
          var result = $.trim(data);
          if (result == tourID) {
            $("#tourIdHelp").text("Mã tour đã tồn tại");
            $("#tourIdHelp").css("color", "red");
          } else {
            $("#tourIdHelp").text("");
          }
        },
        error: function (jqXHR, exception) {
          alert("Lỗi");
        },
      });
    } else {
      $("#tourIdHelp").text("");
    }
  });

  //

  

  //
});
