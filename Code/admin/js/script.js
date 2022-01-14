$(document).ready(function(){

    // For click menu button, show/hide sidebar
    $('#btn-menu').click(function(){
        $('.sidebar').toggleClass("sidebar-show");
        $('.main-right').toggleClass("show");
        $('#btn-menu').toggleClass("hide");
    })

    // Expand subpage in sidebar menu
    $('.user-btn').click(function(){
        $('.sidebar-menu ul .user-show').toggleClass("show");
        $('.sidebar-menu ul .user-caret').toggleClass("rotate");
    })
    $('.partner-btn').click(function(){
        $('.sidebar-menu ul .partner-show').toggleClass("show");
        $('.sidebar-menu ul .partner-caret').toggleClass("rotate");
    })
    $('.admin-btn').click(function(){
        $('.sidebar-menu ul .admin-show').toggleClass("show");
        $('.sidebar-menu ul .admin-caret').toggleClass("rotate");
    })


})
