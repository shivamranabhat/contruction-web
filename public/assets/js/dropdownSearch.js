$(document).ready(function () {
    $("#page_search").on("keyup", function () {
        var searchText = $(this).val().toLowerCase();
        $("#page_id option").each(function () {
            var pageName = $(this).text().toLowerCase();
            var option = $(this);

            if (pageName.includes(searchText)) {
                // Select the matching option
                option.prop('selected', true);
                return false; // Exit the loop
            }
        });
    });
   
   
});
