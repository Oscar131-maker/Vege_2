jQuery(document).ready(function($) {
        
            
        if ($('ul.product-categories').length > 0) {
            
            // Set variables
            // pC = Parent Category 
            // fpC = First Parent Category
            // cC = Current Category
            // cCp = Currents Category's Parent
    
            var 
            pC = $('.product-categories li.cat-parent'),
            fpC = $('.product-categories li.cat-parent:first-child'), // Start this one open
            cC = $('.product-categories li.current-cat'),
            cCp = $('.product-categories li.current-cat-parent');
    
            pC.prepend('<span class="toggle"><i class="fas fa-angle-down fa-angle-right"></i></span>');
            pC.parent('ul').addClass('has-toggle'); pC.children('ul').hide(); 
    
            if (pC.hasClass("current-cat-parent")) {
                cCp.addClass('open'); cCp.children('ul').show(); cCp.children().children('i.fas').removeClass('fa-angle-right');
            } 
            else if (pC.hasClass("current-cat")) {
                cC.addClass('open'); cC.children('ul').show(); cC.children().children('i.fas').removeClass('fa-angle-right');
            } 
            else {
                fpC.addClass('open'); fpC.children('ul').show(); fpC.children().children('i.fas').removeClass('fa-angle-right');
            }
    
            $('.has-toggle span.toggle').on('click', function() {
                $t = $(this);
                if ($t.parent().hasClass("open")){
                    $t.parent().removeClass('open'); $t.parent().children('ul').slideUp(); $t.children('i.fas').addClass('fa-angle-right');
                } 
                else {
                    $t.parent().parent().find('ul.children').slideUp();
                    $t.parent().parent().find('li.cat-parent').removeClass('open');
                    $t.parent().parent().find('li.cat-parent').children().children('i.fas').addClass('fa-angle-right');
                    
                    $t.parent().addClass('open');
                    $t.parent().children('ul').slideDown();
                    $t.children('i.fas').removeClass('fa-angle-right');
                } 
                
            });
    
    
            // Link the count number
            $('.count').css('cursor', 'pointer');
            $('.count').on('click', function(event) {
                $(this).prev('a')[0].click();
            });
    
        }

        // Tooltips
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          })

          $('.list-container').stackMenu();
          $('.stack-menu__link--back').html("Volver");
    
        
    });