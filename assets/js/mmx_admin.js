/*global $, jQuery, alert, console, FormData, confirm, wp*/
jQuery(document).ready(function ($) {
  'use strict';
  /*jslint newcap: true */
  
  $('.mmx_prev_img').mouseover(function () {
    var url = $(this).data('previmg'),
      top = $(this).offset().top - 75,
      left = $(this).offset().left - 120;
    $('.mmx_preview_wrapper').show().css({'top': top + 'px', 'left': left + 'px'}).find('img').attr('src', url);
  });
  $('.mmx_prev_img').mouseout(function () {
    $('.mmx_preview_wrapper').hide();
  });
  
  function labelStatus(elem) {
    if (elem.prop('disabled')) {
      elem.prev().addClass('disabled');
    } else {
      elem.prev().removeClass('disabled');
    }
  }
  
  function headerchange() {
    if ($('#mmx_header').is(':checked')) {
      $('#mmx_header_z').attr('disabled', false);
      $('#mmx_hanging').attr('disabled', false);
      $('input[name="hanging_type"]').attr('disabled', false);
      $('#mmx_bunting').attr('disabled', false);
      $('input[name="bunting_type"]').attr('disabled', false);
    } else {
      $('#mmx_header_z').attr('disabled', true);
      $('#mmx_hanging').attr('disabled', true);
      $('input[name="hanging_type"]').attr('disabled', true);
      $('#mmx_bunting').attr('disabled', true);
      $('input[name="bunting_type"]').attr('disabled', true);
    }
    
    if ($('#mmx_hanging').is(':checked')) {
      $('input[name="hanging_type"]').attr('disabled', false);
    } else {
      $('input[name="hanging_type"]').attr('disabled', true);
    }
    
    if ($('#mmx_bunting').is(':checked')) {
      $('input[name="bunting_type"]').attr('disabled', false);
    } else {
      $('input[name="bunting_type"]').attr('disabled', true);
    }
    
    if ($('#mmx_snow').is(':checked')) {
      $('#mmx_snow_z').attr('disabled', false);
      $('input[name="snow_type"]').attr('disabled', false);
    } else {
      $('#mmx_snow_z').attr('disabled', true);
      $('input[name="snow_type"]').attr('disabled', true);
    }
    
    if ($('#mmx_footer').is(':checked')) {
      $('#mmx_footer_z').attr('disabled', false);
      $('#mmx_snowman').attr('disabled', false);
      $('input[name="snowman_type[]"]').attr('disabled', false);
      $('#mmx_tree').attr('disabled', false);
      $('input[name="tree_type[]"]').attr('disabled', false);
      
    } else {
      $('#mmx_footer_z').attr('disabled', true);
      $('#mmx_snowman').attr('disabled', true);
      $('input[name="snowman_type[]"]').attr('disabled', true);
      $('#mmx_tree').attr('disabled', true);
      $('input[name="tree_type[]"]').attr('disabled', true);
    }
    
    if ($('#mmx_snowman').is(':checked')) {
      $('input[name="snowman_type[]').attr('disabled', false);
    } else {
      $('input[name="snowman_type[]').attr('disabled', true);
    }
    
    if ($('#mmx_tree').is(':checked')) {
      $('input[name="tree_type[]').attr('disabled', false);
    } else {
      $('input[name="tree_type[]').attr('disabled', true);
    }

    labelStatus($('#mmx_header_z'));
    labelStatus($('#mmx_hanging'));
    labelStatus($('input[name="hanging_type"]'));
    labelStatus($('#mmx_bunting'));
    labelStatus($('input[name="bunting_type"]'));
    
    labelStatus($('#mmx_footer_z'));
    labelStatus($('#mmx_snowman'));
    labelStatus($('input[name="snowman_type[]"]'));
    labelStatus($('#mmx_tree'));
    labelStatus($('input[name="tree_type[]"]'));
  }
  
  function init() {
    headerchange();
  }
  
  init();
  
  $('input').change(function () {
    headerchange();
  });
  
  
  
});