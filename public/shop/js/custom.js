$(document).ready(function(){
    $('.tab-lft-list .nav-link').click(function(){  
      $(".tabs-bottom-content").removeClass('active-content');
      $(".tabs-bottom-content[data-tab='"+$(this).attr('id')+"']").addClass("active-content");
    });
});