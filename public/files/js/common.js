$(document).ready(function() {

    var star = '.star',
    selected = '.selected';

    $(star).on('click', function(){
      $(this).closest('ul').find('.selected').each(function(){
        $(this).removeClass('selected');
      });
      $(this).addClass('selected');
    });

    // search box dropdown
    $('.search-box input[type="text"]').on(" input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".search-result");
        if(inputVal.length >= 2){
            // global search_uri
            $.ajax({
                url: search_uri,
                type: 'POST',
                data: {queries: inputVal},
                // async: false,
            })
            .done(function(data) {
                resultDropdown.html(data.data);
                // Display the returned data in browser
                // if (inputVal.length==2) {
                //     var data = '<p>Res 2</p><p>Res 2</p><p>Res 2</p>';
                // }else{
                //     var data = '<p>Res..</p><p>Res..</p><p>Res..</p>';
                // }
            });

        } else{

            resultDropdown.empty();
        }
    });
      
    // Set search input value on click of search-result item
    $(document).on("click", ".search-result p", function(){

        var search_content = $(this).text();
        var search_tag = $(this).data('tag');
        $(this).parents(".search-box").find('input[type="text"]').val(search_content);
        $(this).parent(".search-result").empty();

        var item_uri = item_info_uri + '/' + search_tag;

        window.location.href = item_uri;
    });
    // search box dropdown

});
