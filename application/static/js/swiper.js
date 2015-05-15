$(function(){
	var simpleSwiper = new Swiper ('#simple .swiper-container');

    var responsiveSwiper = new Swiper('#responsive .swiper-container', {
        pagination: '#responsive .swiper-pagination',
        paginationClickable: true
    });	

    var verticalSwiper = new Swiper('#vertical .swiper-container', {
        pagination: '#vertical .swiper-pagination',
        paginationClickable: true,
        direction: 'vertical'
    });    

    var spacebetweenSwiper = new Swiper('#spacebetween .swiper-container', {
        pagination: '#spacebetween .swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30
    });    

    var slidesperviewSwiper = new Swiper('#slidesperview .swiper-container', {
        pagination: '#slidesperview .swiper-pagination',
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 30
    });    

    var slidesperviewautoSwiper = new Swiper('#slidesperviewauto .swiper-container', {
        pagination: '#slidesperviewauto .swiper-pagination',
        slidesPerView: 'auto',
        paginationClickable: true,
        spaceBetween: 30
    });    

    var centeredSwiper = new Swiper('#centered .swiper-container', {
        pagination: '#centered .swiper-pagination',
        slidesPerView: 4,
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 30
    });    

    var centeredautoSwiper = new Swiper('#centeredauto .swiper-container', {
        pagination: '#centeredauto .swiper-pagination',
        slidesPerView: 'auto',
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 30
    });    

    var freemodeSwiper = new Swiper('#freemode .swiper-container', {
        pagination: '#freemode .swiper-pagination',
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 30,
        freeMode: true
    });    

    var slidespercolumn = new Swiper('#slidespercolumn .swiper-container', {
        pagination: '#slidespercolumn .swiper-pagination',
        slidesPerView: 3,
        slidesPerColumn: 2,
        paginationClickable: true,
        spaceBetween: 30
    });    

    var swiperH = new Swiper('#nested .swiper-container-h', {
        pagination: '#nested .swiper-pagination-h',
        paginationClickable: true,
        spaceBetween: 50
    });

    var swiperV = new Swiper('#nested .swiper-container-v', {
        pagination: '#nested .swiper-pagination-v',
        paginationClickable: true,
        direction: 'vertical',
        spaceBetween: 50,
        freeMode: true
    });    

    var grapcursorSwiper = new Swiper('#grapcursor .swiper-container', {
        pagination: '#grapcursor .swiper-pagination',
        slidesPerView: 4,
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 30,
        grabCursor: true
    });    

    var scrollbarSwiper = new Swiper('#scrollbar .swiper-container', {
        scrollbar: '#scrollbar .swiper-scrollbar',
        scrollbarHide: true,
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 30,
        grabCursor: true
    });    

    var navarrowsSwiper = new Swiper('#navarrows .swiper-container', {
        pagination: '#navarrows .swiper-pagination',
        paginationClickable: '#navarrows .swiper-pagination',
        nextButton: '#navarrows .swiper-button-next',
        prevButton: '#navarrows .swiper-button-prev',
        spaceBetween: 30
    });

    var infiniteloopSwiper = new Swiper('#infiniteloop .swiper-container', {
        pagination: '#infiniteloop .swiper-pagination',
        paginationClickable: '#infiniteloop .swiper-pagination',
        nextButton: '#infiniteloop .swiper-button-next',
        prevButton: '#infiniteloop .swiper-button-prev',
        spaceBetween: 30
    });    

    var effectfadeSwiper = new Swiper('#effectfade .swiper-container', {
        pagination: '#effectfade .swiper-pagination',
        paginationClickable: '#effectfade .swiper-pagination',
        nextButton: '#effectfade .swiper-button-next',
        prevButton: '#effectfade .swiper-button-prev',
        spaceBetween: 30,
        effect: 'fade'
    });

    var effectcudeSwiper = new Swiper('#effectcube .swiper-container', {
        pagination: '#effectcude .swiper-pagination',
        effect: 'cube',
        grabCursor: true,
        cube: {
            shadow: true,
            slideShadows: true,
            shadowOffset: 20,
            shadowScale: 0.94
        }
    });

    var effectcoverflowSwiper = new Swiper('#effectcoverflow .swiper-container', {
        pagination: '#effectcoverflow .swiper-pagination',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflow: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true
        }
    });     

    var keyboardcontrolSwiper = new Swiper('#keyboardcontrol .swiper-container', {
        pagination: '#keyboardcontrol .swiper-pagination',
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 30,
        keyboardControl: true,
        nextButton: '#keyboardcontrol .swiper-button-next',
        prevButton: '#keyboardcontrol .swiper-button-prev',
    });

    var mousewheelcontrolSwiper = new Swiper('#mousewheelcontrol .swiper-container', {
        pagination: '#mousewheelcontrol .swiper-pagination',
        direction: 'vertical',
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 30,
        mousewheelControl: true
    });    

    var autoplaySwiper = new Swiper('#autoplay .swiper-container', {
        pagination: '#autoplay .swiper-pagination',
        nextButton: '#autoplay .swiper-button-next',
        prevButton: '#autoplay .swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    });

    var appendNumber = 4;
    var prependNumber = 1;
    var dynamicslidesSwiper = new Swiper('#dynamicslides .swiper-container', {
        pagination: '#dynamicslides .swiper-pagination',
        nextButton: '#dynamicslides .swiper-button-next',
        prevButton: '#dynamicslides .swiper-button-prev',
        slidesPerView: 3,
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 30,
    });
    document.querySelector('.prepend-2-slides').addEventListener('click', function (e) {
        e.preventDefault();
        dynamicslidesSwiper.prependSlide([
            '<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>',
            '<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>'
        ]);
    });
    document.querySelector('.prepend-slide').addEventListener('click', function (e) {
        e.preventDefault();
        dynamicslidesSwiper.prependSlide('<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>');
    });
    document.querySelector('.append-slide').addEventListener('click', function (e) {
        e.preventDefault();
        dynamicslidesSwiper.appendSlide('<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>');
    });
    document.querySelector('.append-2-slides').addEventListener('click', function (e) {
        e.preventDefault();
        dynamicslidesSwiper.appendSlide([
            '<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>',
            '<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>'
        ]);
    });                       

    var galleryTop = new Swiper('#thumbsgallery .gallery-top', {
        nextButton: '#thumbsgallery .swiper-button-next',
        prevButton: '#thumbsgallery .swiper-button-prev',
        spaceBetween: 10,
    });
    var galleryThumbs = new Swiper('#thumbsgallery .gallery-thumbs', {
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;    

    var swiper1 = new Swiper('.swiper1', {
        pagination: '.swiper-pagination1',
        paginationClickable: true,
        spaceBetween: 30,
    });
    var swiper2 = new Swiper('.swiper2', {
        pagination: '.swiper-pagination2',
        paginationClickable: true,
        spaceBetween: 30,
    });
    var swiper3 = new Swiper('.swiper3', {
        pagination: '.swiper-pagination3',
        paginationClickable: true,
        spaceBetween: 30,
    });    

    var hashnavigationSwiper = new Swiper('#hashnavigation .swiper-container', {
        pagination: '#hashnavigation .swiper-pagination',
        paginationClickable: '#hashnavigation .swiper-pagination',
        nextButton: '#hashnavigation .swiper-button-next',
        prevButton: '#hashnavigation .swiper-button-prev',
        spaceBetween: 30,
        hashnav: true
    });    

    var rtlSwiper = new Swiper('#rtl .swiper-container', {
        pagination: '#rtl .swiper-pagination',
        paginationClickable: true,
        nextButton: '#rtl .swiper-button-next',
        prevButton: '#rtl .swiper-button-prev'
    });

    var jqhansSwiper = new Swiper('#jqhans .swiper-container', {
        pagination: '#jqhans .swiper-pagination',
        paginationClickable: true,
        nextButton: '#jqhans .swiper-button-next',
        prevButton: '#jqhans .swiper-button-prev'
    });    

    var parallexSwiper = new Swiper('#parallax .swiper-container', {
        pagination: '#parallax .swiper-pagination',
        paginationClickable: true,
        nextButton: '#parallax .swiper-button-next',
        prevButton: '#parallax .swiper-button-prev',
        parallax: true,
        speed: 600
    });    

    var custompaginationSwiper = new Swiper('#custompagination .swiper-container', {
        pagination: '#custompagination .swiper-pagination',
        paginationClickable: true,
        paginationBulletRender: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        }
    });    

    var lazyloadimagesSwiper = new Swiper('#lazyloadimages .swiper-container', {
        nextButton: '#lazyloadimages .swiper-button-next',
        prevButton: '#lazyloadimages .swiper-button-prev',
        pagination: '#lazyloadimages .swiper-pagination',
        paginationClickable: true,
        // Disable preloading of all images
        preloadImages: false,
        // Enable lazy loading
        lazyLoading: true
    });    

    Swiper.prototype.plugins.debugger = function (swiper, params) {
        if (!params) return;
        // Need to return object with properties that names are the same as callbacks
        return {
            onInit: function (swiper){
                console.log('onInit');
            },
            onClick: function (swiper, e) {
                console.log('onClick');
            },
            onTap: function (swiper, e) {
                console.log('onTap');
            },
            onDoubleTap: function (swiper, e) {
                console.log('onDoubleTap');
            },
            onSliderMove: function (swiper, e) {
                console.log('onSliderMove');
            },
            onSlideChangeStart: function (swiper) {
                console.log('onSlideChangeStart');
            },
            onSlideChangeEnd: function (swiper) {
                console.log('onSlideChangeEnd');
            },
            onTransitionStart: function (swiper) {
                console.log('onTransitionStart');
            },
            onTransitionEnd: function (swiper) {
                console.log('onTransitionEnd');
            },
            onReachBeginning: function (swiper) {
                console.log('onReachBeginning');
            },
            onReachEnd: function (swiper) {
                console.log('onReachEnd');
            }
        };
    };    

    var custompluginSwiper = new Swiper('#customplugin .swiper-container', {
        pagination: '#customplugin .swiper-pagination',
        paginationClickable: true,
        nextButton: '#customplugin .swiper-button-next',
        prevButton: '#customplugin .swiper-button-prev',
        // Enable debugger
        debugger: true
    });    

    var scrollcontainerSwiper = new Swiper('#scrollcontainer .swiper-container', {
        scrollbar: '#scrollcontainer .swiper-scrollbar',
        direction: 'vertical',
        slidesPerView: 'auto',
        mousewheelControl: true,
        freeMode: true
    });    
});