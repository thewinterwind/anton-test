$(document).ready(function($) {

    $('.js-example-basic-single').select2();
    
    $('.tab_content').hide();
    $('.tab_content:first').show();
    $('.tabs li:first').addClass('active');
    $('.tabs li').click(function(event) {
      $('.tabs li').removeClass('active');
      $(this).addClass('active');
      $('.tab_content').hide();
  
      var selectTab = $(this).find('a').attr("href");
  
      $(selectTab).fadeIn();
    });

    // date picker

    var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

    $('.dtpic input, .dtpic img').datepicker({
      format: "dd/mm/yyyy",
      todayHighlight: true,
      autoclose: true
  });
  $('.dtpic input, .dtpic img').datepicker('setDate', today);
  
  $('.dtpicinput').on('show', function(e){
      console.debug('show', e.date, $(this).data('stickyDate'));
      
      if ( e.date ) {
           $(this).data('stickyDate', e.date); 
      }
      else {
           $(this).data('stickyDate', null);
      }
  });
  
  $('.dtpic input, .dtpic img').on('hide', function(e){
      console.debug('hide', e.date, $(this).data('stickyDate'));
      var stickyDate = $(this).data('stickyDate');
      
      if ( !e.date && stickyDate ) {
          console.debug('restore stickyDate', stickyDate);
          $(this).datepicker('setDate', stickyDate);
          $(this).data('stickyDate', null);
      }
  });


  });


  $(function(){

    var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");
    
      $('a[data-modal-id]').click(function(e) {
        e.preventDefault();
        $("body").append(appendthis);
        $(".modal-overlay").fadeTo(500, 0.7);
        //$(".js-modalbox").fadeIn(500);
        var modalBox = $(this).attr('data-modal-id');
        $('#'+modalBox).fadeIn($(this).data());
      });  
      
      
    $(".js-modal-close, .modal-overlay").click(function() {
      $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
      });
    });
     
    $(window).resize(function() {
      $(".modal-box").css({
        // top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
        top: 3,
        left: ($(window).width() - $(".modal-box").outerWidth()) / 2
      });
    });
     
    $(window).resize();

    $(document).ready(function(){
      $('#morepay').click(function() {
        $("html, body").animate({ scrollTop: $(document).height() }, "slow");
        $('.online-claim').toggle("slide");
      });

      $('#shiv').click(function() {
        $('#popup').css('display','none');
        $('#popup2').css('display','block !important');
      });
  });
     
    });