(function ($) {
  "use strict";
  /*jslint plusplus: true */
  /*jslint browser: true*/
  /*jslint newcap: true */
  /*global $, jQuery, alert, console, snwman, tree, glob*/
  /*jslint evil: true */
  $.fn.MMX = function (options) {
    var defaults = {
      header: false,
      headerZ: false,
      bunting: false,
      buntingName: '',
      footer: false,
      footerZ: false,
      anim: false,
      snowman: false,
      snwmanHeight: 75,
      snwmanNum: [],
      tree: false,
      treeHeight: 150,
      treeNum: [],
      snow: true,
	  snowZ: false,
      snowtype: '',
      santa: false
    },
      settings = $.extend(defaults, options),
      $body = $(this),
      $mmx_footer_wrapper, $mmx_header_wrapper,
      i,
      width = $('body').width(),
      count = Math.round(width / 200),
      hangingNum;
    
    function randomInteger(min, max) {
      var rand = min + Math.random() * (max - min);
      rand = Math.round(rand);
      return rand;
    }

    function init() {
      if (settings.anim) {
        $body.addClass('mmx_anim');
      }
      if (settings.header) {
        $body.append('<div class="mmx_header_wrapper"></div>');
        $mmx_header_wrapper = $('.mmx_header_wrapper');
        if (settings.headerZ) {
          $mmx_header_wrapper.css('z-index', 100000);
        } else {
          $mmx_header_wrapper.css('z-index', 0);
        }
        if (settings.bunting) {
          $mmx_header_wrapper.append('<div class="mmx_' + settings.buntingName + '"></div>');
        }
      }
      if (settings.snow) {
        $body.append('<section id="snow" class="' + settings.snowtype + '"></section>');
      }
	  if (settings.snowZ) {
		$('#snow').css('z-index', 9999999999);
	  } else {
		$('#snow').css('z-index', 0);
	  }
      if (settings.footer) {
        $body.append('<div class="mmx_footer_wrapper"></div>');
        $mmx_footer_wrapper = $('.mmx_footer_wrapper');
		if (settings.footerZ) {
		  $mmx_footer_wrapper.css('z-index', 100000);
		} else {
		  $mmx_footer_wrapper.css('z-index', 0);
		}
        $mmx_footer_wrapper.append('<div class="mmx_footer_bg"></div><div class="mmx_footer_fg"></div>');
        if (settings.snowman) {
          for (i = 0; i <= count; i++) {
            $mmx_footer_wrapper.append('<div class="mmx_snwman"></div>');
          }
          $('.mmx_snwman').each(function (index) {
            var offsetX = (200 * index) - randomInteger(0, 100);
            $(this).css({'left': offsetX + 'px', 'width': settings.snwmanHeight + 'px', 'height': settings.snwmanHeight + 'px'})
			if(settings.snwmanNum.length === 1) {
			  $(this).append(snwman[settings.snwmanNum[0]]);
			} else {
				$(this).append(snwman[settings.snwmanNum[randomInteger(0, settings.snwmanNum.length-1)]]);
			}
		 });
        }
        if (settings.tree) {
          for (i = 0; i <= count * 2; i++) {
            $mmx_footer_wrapper.append('<div class="mmx_tree"></div>');
          }
          $('.mmx_tree').each(function (index) {
            var offsetX = (100 * index) - randomInteger(0, 100);
            $(this).css({'left':  offsetX + 'px', 'width': settings.treeHeight + 'px', 'height': settings.treeHeight + 'px', '-webkit-animation-delay': 100 * index + 'ms', '-o-animation-delay': 100 * index + 'ms', 'animation-delay': 100 * index + 'ms'});
			if(settings.treeNum.length === 1) {
			  $(this).append(tree[settings.treeNum[0]]);
			} else {
			  $(this).append(tree[settings.treeNum[randomInteger(0, settings.treeNum.length-1)]]);
			}
		  });
        }
        if (settings.santa) {
          $mmx_footer_wrapper.append('<div class="mmx_santa"></div>');
        }
      }
      
    }
    init();
  };
}(jQuery));