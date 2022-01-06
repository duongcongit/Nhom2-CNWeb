/* Tình trạng:
 ... Tài khoản:
- 0 - đã đăng ký, chưa xác minh email
- 1 - đã xác minh email, hoạt động bình thường
- 2 - tài khoản bị vô hiệu hóa ( bởi admin )
- 4 - chờ duyệt tài khoản (dành cho tài khoản đối tác) */


/* ================================================= Script for Manage-user page =============================================== */

// Function get users data

function showUserData(tableID, page, numRow, sortBy) {
  $.ajax({
    url: "get-users-data.php",
    type: "POST",
    data: {
      tableID: tableID,
      page: page,
      numRow: numRow,
      sortBy: sortBy
    },
    success: function (data) {
      $("#" + tableID).html(data);
      $(".tab-pane").removeClass("show active");
      $("#" + tableID).addClass("show active");
      $(".btn-page").removeClass("show active");
      $("#btn-" + tableID).addClass("active");
    },
  });
};



$(document).ready(function () {
  //var url = window.location.href;
  //alert(url.split("/")[6]);


  var modalDeleteEl  = document.querySelector('#modal-delete-confirm');
  var modalDelete    = bootstrap.Modal.getOrCreateInstance(modalDeleteEl);

  var modalActivateEl  = document.querySelector('#modal-activate-confirm');
  var modalActivate    = bootstrap.Modal.getOrCreateInstance(modalActivateEl);

  var modalDisableEl  = document.querySelector('#modal-disable-confirm');
  var modalDisable    = bootstrap.Modal.getOrCreateInstance(modalDisableEl);

  var modalSuccessEl  = document.querySelector('#modal-success');
  var modalSuccess    = bootstrap.Modal.getOrCreateInstance(modalSuccessEl);

  var modalErrorEl    = document.querySelector('#modal-error');
  var modalError      = bootstrap.Modal.getOrCreateInstance(modalErrorEl);


  //
  $(document).on("click", "#btn-all-user", function(){
    showUserData("all-user", 1, 10, "manguoidung asc");
    var url     = "?table=all-user&page=1&numrow=10&sortby=manguoidung asc";
    history.pushState(null, "", url); 
  });

  //
  $(document).on("click", "#btn-active-user", function(){
    showUserData("active-user", 1, 10, "manguoidung asc");
    var url     = "?table=active-user&page=1&numrow=10&sortby=manguoidung asc";
    history.pushState(null, "", url); 
  });

  //
  $(document).on("click", "#btn-pending-verification-user", function(){
    showUserData("pending-verification-user", 1, 10, "manguoidung asc");
    var url     = "?table=pending-verification-user&page=1&numrow=10&sortby=manguoidung asc";
    history.pushState(null, "", url); 
  });

  //
  $(document).on("click", "#btn-disabled-user", function(){
    showUserData("disabled-user", 1, 10, "manguoidung asc");
    var url     = "?table=disabled-user&page=1&numrow=10&sortby=manguoidung asc";
    history.pushState(null, "", url); 
  });


  // Sort
  $(document).on("change", "#select-sort-by", function(){
    // Get values
    var tableID = $(this).data("table_id");
    var page    = 1; // Set page index = 1
    var numRow  = $(this).data("numrow");
    var sortBy  = "";
    var val  = $(this).val();
    if(val == "0"){sortBy="manguoidung asc"}
    else if(val == "1"){sortBy = "manguoidung desc"}
    else if(val == "2"){sortBy = "hovaten asc"}
    else if(val == "3"){sortBy = "hovaten desc"}
    else if(val == "4"){sortBy = "ngaysinh desc"}
    else if(val == "5"){sortBy = "ngaysinh asc"}
    else if(val == "6"){sortBy = "tinhtrang"}
    // Show data
    showUserData(tableID, page, numRow, sortBy);
    // Set url
    var url     = "?table=" + tableID + "&page=" + page + "&numrow=" + numRow + "&sortby=" + sortBy;
    history.pushState(null, "", url);
  })




  // Event click next page button
  $(document).on("click", ".btnNext", function () {
    // Get values from button
    var tableID = $(this).data("table_id");
    var page    = $(this).data("page") + 1; // Set page index + 1
    var numRow  = $(this).data("numrow");
    var sortBy  = $(this).data("sort_by");
    // Show data for new page
    showUserData(tableID, page, numRow, sortBy);
    // Set url
    var url     = "?table=" + tableID + "&page=" + page + "&numrow=" + numRow + "&sortby=" + sortBy;
    history.pushState(null, "", url);
  });

  
  // Event click next previous button
  $(document).on("click", ".btnPrevious", function () {
    // Get values from button
    var tableID   = $(this).data("table_id");
    var page      = $(this).data("page") - 1; // Set page index - 1
    var numRow    = $(this).data("numrow");
    var sortBy  = $(this).data("sort_by");
    // Show data for new page
    showUserData(tableID, page, numRow, sortBy);
    // Set url
    var url     = "?table=" + tableID + "&page=" + page + "&numrow=" + numRow + "&sortby=" + sortBy;
    history.pushState(null, "", url);
  });


  // Event change page
  $(document).on("change", "#currentPage", function () {
    // Get values from input
    var val         = $(this).val();
    var numPage     = $(this).data("numpage");
    var tableID     = $(this).data("table_id");
    var numRow      = $(this).data("numrow");
    var sortBy      = $(this).data("sort_by");
    // Check value
    if (val > 0 && val <= numPage && val != "" && $.isNumeric(val)) {
      // Show data for new page
      showUserData(tableID, val, numRow, sortBy);
      // Set url
      var url     = "?table=" + tableID + "&page=" + page + "&numrow=" + numRow + "&sortby=" + sortBy;
      history.pushState(null, "", url);
    } else {
      // If input wrong
      $(this).css("border", "solid red").css("border-radius", "3px");
    }
  });


  // Activate user
  $(document).on("click", ".btn-activate-user", function () {
    // Get values from button
    var userID    = $(this).data("user_id");
    var status    = $(this).data("status");
    var tableID   = $(this).data("table_id");
    var page      = $(this).data("page");
    var numRow    = $(this).data("numrow");
    var sortBy    = $(this).data("sort_by");
    // Show box confirm
    $(".user-id-confirm").html(userID);
    modalActivate.show();
    $("#confirm-activate").on("click", function(){
      // Ajax
      $.ajax({
        url: "activate-user.php",
        type: "POST",
        data: {
          userID: userID,
          status: status
        },
        success: function(data) {
          if(data == "verified true"){ // If success
          $("#verify-email-info").css("display", "none");
          modalSuccess.show();
          showUserData(tableID, page, numRow, sortBy); // Refesh data
          }
          else if(data == "not verified true"){ // If fail
            $("#verify-email-info").css("display", "flex");
            modalSuccess.show();
            showUserData(tableID, page, numRow, sortBy); // Refesh data
            alert("Chưa xác minh email");
          }
          else if(data == "false" || data == "verified false" || data == "not verified false"){ // If fail
            modalError.show();
          }
          
        },
        error: function(jqXHR, exception){ // Exception
          modalError.show();
        },
      });
      modalActivate.hide(); 
      });

  });


  // Disable user
  $(document).on("click", ".btn-disable-user", function () {
    // Get values from button
    var userID    = $(this).data("user_id");
    var tableID   = $(this).data("table_id");
    var page      = $(this).data("page");
    var numRow    = $(this).data("numrow");
    var sortBy    = $(this).data("sort_by");
    // Show box confirm
    $(".user-id-confirm").html(userID);
    modalDisable.show();
    $("#confirm-disable").on("click", function(){
      // Ajax
      $.ajax({
        url: "disable-user.php",
        type: "POST",
        data: {
          userID: userID
        },
        success: function(data) {
          if(data == "true"){ // If success
            $("#verify-email-info").css("display", "none");
            modalSuccess.show();
            showUserData(tableID, page, numRow, sortBy); // Refesh data
          }
          else if(data == "false"){ // If fail
            modalError.show();
          }
        },
        error: function(jqXHR, exception){ // Exception
          modalError.show();
        }
      });
      modalDisable.hide(); 
      });

  });


  // Delete user
  $(document).on("click", ".btn-delete-user", function () {
    // Get values from button
    var userID    = $(this).data("user_id");
    var tableID   = $(this).data("table_id");
    var page      = $(this).data("page");
    var numRow    = $(this).data("numrow");
    var sortBy    = $(this).data("sort_by");
    // Show box confirm
    $(".user-id-confirm").html(userID);
    modalDelete.show();
    $("#confirm-delete").on("click", function(){
      // Ajax
      $.ajax({
        url: "delete-user.php",
        type: "POST",
        data: {
          userID: userID
        },
        success: function(data) {
          if(data == "true"){ // If success
          $("#verify-email-info").css("display", "none");
          modalSuccess.show();
          showUserData(tableID, page, numRow, sortBy); // Refesh data
          }
          else if(data == "false"){ // If fail
            modalError.show();
          }
        },
        error: function(jqXHR, exception){ // Exception
          modalError.show();
        }
      });
      modalDelete.hide(); 
      });
  });


  //
});



/* ================================================= Script for Manage-tour page =============================================== */

// Function get Tours data
function showTourData(tableID, page, numRow, sortBy) {
  $.ajax({
    url: "get-tours-data.php",
    type: "POST",
    data: {
      tableID: tableID,
      page: page,
      numRow: numRow,
      sortBy: sortBy
    },
    success: function (data) {
      $("#" + tableID).html(data);
      $(".tab-pane").removeClass("show active");
      $("#" + tableID).addClass("show active");
      $(".btn-page").removeClass("show active");
      $("#btn-" + tableID).addClass("active");
    },
  });
};

/* ================================================= Script for Manage-partner page =============================================== */

// Function get Partners data
function showPartnerData(tableID, page, numRow, sortBy) {
  $.ajax({
    url: "get-partners-data.php",
    type: "POST",
    data: {
      tableID: tableID,
      page: page,
      numRow: numRow,
      sortBy: sortBy
    },
    success: function (data) {
      $("#" + tableID).html(data);
      $(".tab-pane").removeClass("show active");
      $("#" + tableID).addClass("show active");
      $(".btn-page").removeClass("show active");
      $("#btn-" + tableID).addClass("active");
    },
  });
};
/* ================================================= Script for Manage-admin page =============================================== */

// Function get Admins data
function showAdminsData(tableID, page, numRow, sortBy) {
  $.ajax({
    url: "get-admins-data.php",
    type: "POST",
    data: {
      tableID: tableID,
      page: page,
      numRow: numRow,
      sortBy: sortBy
    },
    success: function (data) {
      $("#" + tableID).html(data);
      $(".tab-pane").removeClass("show active");
      $("#" + tableID).addClass("show active");
      $(".btn-page").removeClass("show active");
      $("#btn-" + tableID).addClass("active");
    },
  });
};



// =============================================================

// function setCookiesCurentPage(tableID, currentPage, numPerPage) {
//   var cookiesTableID = "tableID=" + tableID;
//   var cookiesCurentPage = "currentPage=" + currentPage;
//   var cookiesNumPerPage = "numPerPage=" + numPerPage;
//   document.cookie = cookiesTableID;
//   document.cookie = cookiesCurentPage;
//   document.cookie = cookiesNumPerPage;
// }

//

// function getCookiesCurentPage(name) {
//   var allcookies = document.cookie;
//   cookieArray = allcookies.split(";");
//   var value = "";
//   for (var i = 0; i < cookieArray.length; i++) {
//     if (cookieArray[i].split("=")[0] == name) {
//       value = cookieArray[i].split("=")[1];
//     }
//   }
//   return value;
// };
