/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.            
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        }

    };

}();


$(".dropdown dt a").on('click', function () {
    $(".dropdown dd ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function () {
    $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
     return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function (e) {
    var $clicked = $(e.target);
    if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});


$('.multiSelect input[type="checkbox"]').on('click', function () {
  
    var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
        title = $(this).attr("data-title").split(':').pop() + ",";
      if ($(this).is(':checked')) {
        var html = '<span title="' + title + '">' + title + '</span>';
        $('.multiSel').append(html);
        $(".hida").hide();
    } 
    else {
        $('span[title="' + title + '"]').remove();
        var ret = $(".hida");
        $('.dropdown dt a').append(ret);
        var i = 0;
        $(".multiSelect input[type=checkbox]").each(function(idx, elem) {
        	if($(this).is(':checked')){
        		i++;
        	}
        });
        if(i == 0)$('.hida').show();
    }
});

/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();