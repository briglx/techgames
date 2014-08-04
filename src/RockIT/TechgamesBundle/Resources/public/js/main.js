$(function() {
  

    $('.gm').popover({

        placement:'auto right', 
        trigger:'hover', 
        delay:{ show: 1000, hide: 100 }, 
        html: true,
        title: function(e){
            return $('.title', this).text();
        },
        content: function(e){

            // Populate popup with data from data-content element
            // var desc = $('.desc', this).text();
            // var tbl = $('table', this).clone().wrap('<div></div>').parent().html();

            var html = $('.data-content', this).html();

            if(html){
                return html;
            }
            else
            {
                return $('.gm-popup').html();
            }
           
        }
    });
    //adding fromt side valadtion to the game edit page ////////

    $('#submitGameEdit').on('click', function() {
        var errorMessageR = function(el, inputType, err) {
            var error = $('.error', $(el).parent()[0]);
            error.append('<span class=""> ' +' </span> '+ inputType + ' is ' + err + '.' + '<p>');
            console.log(inputType + ' is ' + err + '.');
        }

        var isValid = true; 

        // Clears the error div
        $('.error').text('');

        
        var title = $("#gameTitle").val();
        if (title == '') {
            errorMessageR(this, "title", 'required');
            isValid = false;
        }

        var description = $("#gameDescription").val();
        if (description == '') {
            errorMessageR(this, "Description", 'required');
            isValid = false;
            //return isValid;
       
        }   
        return isValid;
    });


});