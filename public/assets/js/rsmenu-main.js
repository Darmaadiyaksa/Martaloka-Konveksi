$(document).ready(function () {
	// Strict Mode
	"use strict";

	//Defines variables	
	var arrow_up = '<i class="fa fa-angle-up rs-menu-parent-i" aria-hidden="true"></i>';
	var arrow_down = '<i class="fa fa-angle-down rs-menu-parent-i" aria-hidden="true"></i>';
	var arrow_span = '<span class="rs-menu-parent">' + arrow_down + '</span>';
	var close_button = '<div class="sub-menu-close"><i class="fa fa-times" aria-hidden="true"></i>Close</div>';
	
	//Insert all arrow down span element
	$('.nav-menu .rs-mega-menu').append(arrow_span);
	$('.nav-menu > .menu-item-has-children').append(arrow_span);
	$('.nav-menu > .menu-item-has-children .sub-menu > .menu-item-has-children').append(arrow_span);
	
	//Insert all close button element
	$('.nav-menu .menu-item-has-children .sub-menu').append(close_button);
	$('.nav-menu .rs-mega-menu .mega-menu').append(close_button);

	/*-----------------------------------------------------------------------------------*/
	/*	OPEN SUB MENU FUNCTION
	/*-----------------------------------------------------------------------------------*/
	$('span.rs-menu-parent').on('click', function(e){
		e.preventDefault();
		
		var t = $(this);
		var menu = t.siblings('ul');	
		var parent = t.parent('li');
		var siblings = parent.siblings('li');
		var arrow_target = 'span.rs-menu-parent';
		var tinggi = 0;
		$('.sub-menu li').each(function() {tinggi += $(this).height()});
		var menu_height = tinggi + 10;
		
		if (menu.hasClass('sub-menu')) { 
			var menu = t.siblings('ul.sub-menu'); 
		} else if(menu.hasClass('mega-menu')) {
			var menu = t.siblings('ul.mega-menu');
		}
		
		if (menu.hasClass('visible')) {
			console.log('parent-tutup');
			setTimeout(function() { 
				// menu.removeClass('visible'); 
				menu.removeClass('visible');
				menu.animate({height:0},{queue:false, duration:100});
			}, 10);	
			t.html(arrow_down);		
		} else {
			setTimeout(function() { 
				// menu.addClass('visible'); 
				menu.addClass('visible');
				menu.animate({height:menu_height},{queue:false, duration:100});
			}, 10);
			t.html(arrow_up);
		}
			
		/*-------------------------------------*/
		/*	CLOSE MENUS
		/*-------------------------------------*/
			
		//Close sub menus
		parent.find('ul.visible').removeClass('visible');	
		
		//Close sub menus parents
		parent.siblings('li').children('ul').removeClass('visible');	
		
		//Close sub menus child parents 
		siblings.find('ul.visible').removeClass('visible');	
		
		/*-------------------------------------*/
		/*	INSERT ARROW DOWN
		/*-------------------------------------*/	
		
		//Insert arrow down in sub menus
		parent.children('ul').find(arrow_target).html(arrow_down);
		
		//Insert arrow down in sub menus parents
		siblings.children(arrow_target).html(arrow_down);
		
		//Insert arrow down in sub menus child parents 
		siblings.find(arrow_target).html(arrow_down);
	}); 
	
	/*-----------------------------------------------------------------------------------*/
	/*	CLOSE BUTTON
	/*-----------------------------------------------------------------------------------*/ 
	$('ul.nav-menu div.sub-menu-close').on('click', function(e){
	   e.preventDefault();
		  
	   var a = $(this).parent('ul');      
	   a.removeClass('visible');
	   a.siblings('span.rs-menu-parent').html(arrow_down);
	}); 
	
	/*-----------------------------------------------------------------------------------*/
	/*	EFFECTS ON MENU TOGGLE
	/*-----------------------------------------------------------------------------------*/ 
	$(document).on('click', function (e) {
		if ($('.rs-menu-toggle').hasClass('rs-menu-toggle-open') && $(e.target).closest('.rs-menu').length === 0 && $(e.target).closest('.rs-menu-toggle').length === 0 && $(e.target).closest('.rs-menu-parent-i').length === 0) {
			$('.rs-menu-toggle').removeClass('rs-menu-toggle-open').addClass('rs-menu-toggle-close');
			$('.rs-menu').animate({height:'0px'},{queue:false, duration:300}).addClass('rs-menu-close');
		}
	});
	
	$('a.rs-menu-toggle').on('click', function(e){
		e.preventDefault();	
		var menu_height = $('.rs-menu ul').height();
		if ($(this).hasClass('rs-menu-toggle-open')) {		
			$(this).removeClass('rs-menu-toggle-open').addClass('rs-menu-toggle-close');
			$('.rs-menu').animate({height:'0px'},{queue:false, duration:300}).addClass('rs-menu-close');	
		} else {			
			$(this).removeClass('rs-menu-toggle-close').addClass('rs-menu-toggle-open');
			$('.rs-menu').animate({height:menu_height},{queue:false, duration:300}).removeClass('rs-menu-close');
		}
	});	
	
	/*-----------------------------------------------------------------------------------*/
	/*	CLOSE MENUS ON RESIZE
	/*-----------------------------------------------------------------------------------*/ 
	var window_width = 0;
	 
	$('.sub-menu').css('height', 0);
	$(window).on('load', function () {	
		window_width = $(window).width();
		// $('.rs-menu').addClass( "rs-menu-close" );
	});
	
	$(window).resize( function(){    
		if(window_width !== $(window).width()){		
			$('.visible').removeClass('visible');	
			$('.rs-menu-toggle').removeClass('rs-menu-toggle-open').addClass( "rs-menu-toggle-close" );	
			$('.rs-menu').css( "height", "0" ).addClass( "rs-menu-close" );		
		
			$('span.rs-menu-parent').html( arrow_down );		
			window_width = $(window).width();	
		}
	});	
	
});