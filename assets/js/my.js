$(document).ready(function(){
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var sessionUrl = baseUrl.concat("/views/shared/setsession.php");
    //alert(sessionUrl);
    
/* --------------- Show image --------------- */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#edit_age").change(function(){
        readURL(this);
    });

/* --------------- Show upload button --------------- */
    if (document.getElementById("select_file")) {
        document.getElementById('select_file').onclick = function () {
            $('#edit_age').show();
            $('#edit_age').change(function () {
                var filename = $('#edit_age')[0].files[0]
                $('#group_img').html(filename);
                $("#group_img").val(filename.name);
            });
        };
    };

/* --------------- Set Session for link --------------- */
    $(".link").click(function (e) {
        var edId = $(this).data('no');
        if($(this).data('id') !== undefined) {
            var liId = $(this).data('id');
        } else {
            var liId = '';
        }

        // On the click - post the update via ajax and update your interface
        var href = $(this).attr('href');
        e.preventDefault()
        if (liId == '') {
            //$.post("http://localhost/shareboard/views/shared/setsession.php", { link_id : edId }, function () {
            $.post(sessionUrl, { link_id : edId }, function () {
                window.location = href;
            });
        } else {
            //$.post("http://localhost/shareboard/views/shared/setsession.php", { link_id : edId, gr_id : liId }, function () {
            $.post(sessionUrl, { link_id : edId, gr_id : liId }, function () {
                window.location = href;
            });
        }
    });

/* --------------- Set Session for edit --------------- */
        // Listen for the click event
        $(".edit").click(function (e) {
            var edId = $(this).data('no');
            // On the click - post the update via ajax and update your interface
            var href = $(this).attr('href');
            e.preventDefault()
            try {
                //$.post("http://localhost/shareboard/views/shared/setsession.php", { gr_id : edId }, function () {
                $.post(sessionUrl, { gr_id : edId }, function () {
                    window.location = href;
                });
            }
            catch(err) {
                console.log(err.message) ;
            }
        });

/* --------------- Set session for delete --------------- */
    $(document).on('click', '#delete_product', function(e){
        var productId = $(this).data('id');
        var linkId = $(this).data('no');

        switch(linkId) {
            case 'g':
                //var curr='http://localhost/shareboard/groups/delete';
                //var backLink ='http://localhost/shareboard/groups';
                var curr = baseUrl.concat('/groups/delete');
                var backLink = baseUrl.concat('/groups');
                break;
            case 'p':
                //var curr='http://localhost/shareboard/products/delete';
                //var backLink ='http://localhost/shareboard/products';
                var curr = baseUrl.concat('/products/delete');
                var backLink = baseUrl.concat('/products');
                break;
            case 'm':
                //var curr='http://localhost/shareboard/manufacturers/delete';
                //var backLink ='http://localhost/shareboard/manufacturers';
                var curr = baseUrl.concat('/manufacturers/delete');
                var backLink = baseUrl.concat('/manufacturers');
                break;
            case 'n':
                //var curr='http://localhost/shareboard/news/delete';
                //var backLink ='http://localhost/shareboard/news';
                var curr = baseUrl.concat('/news/delete');
                var backLink = baseUrl.concat('/news');
                break;
            case 'u':
                //var curr='http://localhost/shareboard/users/delete';
                //var backLink ='http://localhost/shareboard/users';
                var curr = baseUrl.concat('/users/delete');
                var backLink = baseUrl.concat('/users');
                break;
            case 's':
                //var curr='http://localhost/shareboard/services/delete';
                //var backLink ='http://localhost/shareboard/services';
                var curr = baseUrl.concat('/services/delete');
                var backLink = baseUrl.concat('/services');
                break;
            default:
            // code block
        }
        SwalDelete(productId, curr, backLink);
        e.preventDefault();
    });

    function SwalDelete(productId, curr, backLink){

        swal.fire({
            title: 'Sigurno?',
            text: "Obrisaće ga trajno!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Da, obriši!',
            cancelButtonText: "Odustani",
            showLoaderOnConfirm: true,

            preConfirm: function() {
                return new Promise(function(resolve) {
                    //var curr='http://localhost/shareboard/groups/delete';
                    $.ajax({
                        url: curr,
                        type: 'POST',
                        data: {delete: productId},
                        dataType: 'json'
                    })
                        .done(function(response){
                            //swal('Deleted!', response.message, response.status);
                            //readProducts();
                            //document.location.href = '<?php echo ROOT_PATH; ?>groups/delete';
                            swal.close()
                        })
                        .fail(function(){
                            swal.close()
                            //document.location.href = 'http://localhost/shareboard/groups';
                            document.location.href = backLink;
                            //swal('Oops...', 'Something went wrong with ajax !', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });
    }
    function readProducts(){
        //$('#load-products').load('read.php');
    }
});