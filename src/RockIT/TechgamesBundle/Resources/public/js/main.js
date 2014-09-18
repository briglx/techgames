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

        var isValid = true; 

        // Clears the error div
        $('.error').text('');

        // Home fields
        if(!validateField("title", "words", true)){
            isValid = false;
        }
        if(!validateField("shortTitle", "words", true)){
            isValid = false;
        }
        if(!validateField("description", "anything", true)){
            isValid = false;
        }

        // Registration fields
        if(!validateField("location", "words", false)){
            isValid = false;
        }
        if(!validateField("capacity", "number", false)){
            isValid = false;
        }
        if(!validateField("teamSize", "anything", false)){
            isValid = false;
        }


        return isValid;
    });



    $('form.register button').on('click', function() {

        var isValid = true;

        return isValid;

    });


    function errorMessageR(el, inputType, err) {

        var error = $('.errorMsg .error');
        error.append('<li><span class="glyphicon glyphicon-exclamation-sign"></span> Please enter a valid ' + inputType + '.<span></span></li>');

    }

    function validateField(fieldName, pattern, required){
        var isValid = true;

        var reg = new RegExp("^$");

        if (pattern == "words"){
            reg = new RegExp("^[A-Za-z]+[A-Za-z \\s]*$");
        } else if (pattern == "number"){
            reg = new RegExp("^[-]?[0-9,]+$");
        }  else if(pattern == "anything") {
            reg = new RegExp("^[\\d\\D]{1,}$");
        }


        var fieldValue = $("#" + fieldName).val();
        if(required){
            if(!fieldValue && !reg.test(fieldValue)){
                errorMessageR(this, fieldName);

                $("#" + fieldName).parents(".form-group").addClass("has-error");
                isValid = false;
            }
            else{
                $("#" + fieldName).parents(".form-group").removeClass("has-error") ;
            }
        }
        else
        {
            if(fieldValue && !reg.test(fieldValue)){
                errorMessageR(this, fieldName);

                $("#" + fieldName).parents(".form-group").addClass("has-error");
                isValid = false;
            }
            else{
                $("#" + fieldName).parents(".form-group").removeClass("has-error") ;
            }
        }


        return isValid;
    }


});