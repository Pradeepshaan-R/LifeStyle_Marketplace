// Form Validation
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

//View User Modal
$(document).ready(function () {
    $('.viewbtn').on('click', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#v_user_id').val(data[1]);
        $('#v_fname').val(data[2]);
        $('#v_lname').val(data[3]);
        $('#v_uemail').val(data[4]);
        $('#v_urole').val(data[5]);
    });
});
//Update User Modal
$(document).ready(function () {
    $('.editbtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#user_id').val(data[1]);
        $('#fname').val(data[2]);
        $('#lname').val(data[3]);
        $('#uemail').val(data[4]);
        $('#urole').val(data[5]);
    });
});

//Delete User Modal
$(document).ready(function () {
    $('.deletebtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#delete_id').val(data[1]);
    });
});

//Update Customer Modal
$(document).ready(function () {
    $('.editbtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#customer_id').val(data[1]);
        $('#cfname').val(data[2]);
        $('#clname').val(data[3]);
        $('#cemail').val(data[4]);
        $('#cage').val(data[5]);
        $('#cno1').val(data[6]);
        $('#cno2').val(data[7]);
        $('#cadd').val(data[8]);
    });
});

//Delete Customer Modal
$(document).ready(function () {
    $('.deletebtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#c_delete_id').val(data[1]);
    });
});
//Update Supplier Modal
$(document).ready(function () {
    $('.editbtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#supplier_id').val(data[1]);
        $('#sfname').val(data[2]);
        $('#slname').val(data[3]);
        $('#semail').val(data[4]);
        $('#sno1').val(data[5]);
        $('#sno2').val(data[6]);
        $('#sadd').val(data[7]);
    });
});

//Delete Supplier Modal
$(document).ready(function () {
    $('.deletebtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#s_delete_id').val(data[1]);
    });
});

//Update Stock Modal
$(document).ready(function () {
    $('.editbtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#u_stockid').val(data[1]);
        $('#u_stockname').val(data[2]);
        $('#u_suppliername').val(data[3]);
        $('#stock_qty').val(data[4]);
        $('#u_regdate').val(data[5]);
        $('#u_expdate').val(data[6]);
    });
});

//Delete Stock Modal
$(document).ready(function () {
    $('.deletebtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#st_deleteid').val(data[1]);
    });
});

//Update Category Modal
$(document).ready(function () {
    $('.editbtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#category_id').val(data[1]);
        $('#cat_name').val(data[2]);
        $('#cat_img').val(data[3]);
    });
});

//Delete Category Modal
$(document).ready(function () {
    $('.deletebtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#category_delete_id').val(data[1]);
    });
});

//Update Product Modal
$(document).ready(function () {
    $('.product_editbtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#upro_id').val(data[1]);
        $('#upro_name').val(data[2]);
        $('#uproduct_cat_name').val(data[3]);
        $('#upro_loc').val(data[4]);
        $('#upro_price').val(data[5]);
        $('#upro_img').val(data[6]);
    });
});

//Delete Product Modal
$(document).ready(function () {
    $('.deletebtn').on('click', function () {
//       $('#userUpdateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#pro_delete_id').val(data[1]);
    });
});

//View Advertistement Modal
$(document).ready(function () {
    $('.ad-viewbtn').on('click', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#adv_id').val(data[0]);
        $('#adv_name').val(data[1]);
        $('#adv_email').val(data[2]);
        $('#adv_startdate').val(data[3]);
        $('#adv_enddate').val(data[4]);
        $('#adv_img').val(data[5]);
    });
});

//Update Advertisement Modal
$(document).ready(function () {
    $('.ad-editbtn').on('click', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#ad_uid').val(data[0]);
        $('#uad_name').val(data[1]);
        $('#uad_email').val(data[2]);
        $('#uad_regdate').val(data[3]);
        $('#uad_expdate').val(data[4]);
        $('#uad_img').val(data[5]);
    });
});

//Delete Advertisement Modal
$(document).ready(function () {
    $('.ad-deletebtn').on('click', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#ad_delete_id').val(data[0]);
    });
});

//View Seller Modal
$(document).ready(function () {
    $('.seller-viewbtn').on('click', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#seller_id').val(data[0]);
        $('#seller_name').val(data[1]);
        $('#seller_product').val(data[2]);
        $('#seller_qty').val(data[3]);
        $('#seller_des').val(data[4]);
    });
});

//Update Seller Modal
$(document).ready(function () {
    $('.ad-editbtn').on('click', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#ad_uid').val(data[0]);
        $('#uad_name').val(data[1]);
        $('#uad_email').val(data[2]);
        $('#uad_regdate').val(data[3]);
        $('#uad_expdate').val(data[4]);
        $('#uad_img').val(data[5]);
    });
});

//Delete Seller Modal
$(document).ready(function () {
    $('.ad-deletebtn').on('click', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("th").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#ad_delete_id').val(data[0]);
    });
});

////View User in Modal
//$(document).ready(function () {
//    $('.viewbtn').on('click', function () {
////       $('#userUpdateModal').modal('show');
//        $tr = $(this).closest('tr');
//        var data = $tr.children("th").map(function () {
//            return $(this).text();
//        }).get();
//        console.log(data);
//        var url = "_add-user.php?status='ViewUserModal'";
//
//        $.ajax({
//            method: "POST",
//            data: {userId: $('#user_id').val(data[0])},
//            url: url,
//            datatype: "json",
//            success: function (result) {
//                $('#user_id').val(data[0]);
//                $('#fname').val(data[1]);
//                $('#lname').val(data[2]);
//                $('#uemail').val(data[3]);
//                $('#urole').val(data[4]);
//            },
//            error: function (result) {
//                console.log(result);
//            }
//        });
//
//    });
//});

$(document).ready(function () {
    $("#st_cat").on('change', function () {
        var catid = $("#st_cat").val();
        $.ajax({
            url: 'stock-management.php',
            method: 'POST',
            data: 'catid=' + catid
        }).done(function (stock_name) {
            console.log(stock_name);
        })
    })
})