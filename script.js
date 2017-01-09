path = 'http://bondar.hol.es/blog1/index.php';
$(document).ready(function () {



    $('body').on("click", ".order-username", function () {
        var sort = $(this).attr('data-sort');
        $(".order-email").attr('data-sort', 'none');
        $(".order-time-add").attr('data-sort', 'none');        
        location.href = path+"?order_username=" + getSort(sort)
    });
    $('body').on("click", ".order-email", function () {
        var sort = $(this).attr('data-sort');
        $(".order-name").attr('data-sort', 'none');
        $(".order-time-add").attr('data-sort', 'none');
        location.href = path+"?order_email=" + getSort(sort)
    });
    $('body').on("click", ".order-time-add", function () {
        var sort = $(this).attr('data-sort');
        $(".order-email").attr('data-sort', 'none');
        $(".order-name").attr('data-sort', 'none');
        location.href = path+"?order_time_add=" + getSort(sort)
    });


});


function getSort(sort) {
    if (sort == 'desc') {
        return 'asc';
    } else {
        return 'desc'
    }
}