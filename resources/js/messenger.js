/**
 * -------------------------
 * Reusable Functions
 * -------------------------
 */

function imagePreview(input, selector) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            $(selector).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function searchUsers(query) {
    $.ajax({
        method: 'GET',
        url: '/messenger/search',
        data: { query: query },
        success: function (data) {
            $('.user_search_list_result').html(data.records);
        },
        error: function (xhr, status, error) {

        }
    });
}


/**
 * -------------------------
 * On DOM load
 * -------------------------
 */
$(document).ready(function () {
    $('#select_file').change(function () {
        imagePreview(this, '.profile-image-preview');
    });

    $('.user_search').on('keyup', function(){
        let query = $(this).val();
        searchUsers(query);
    })
});
