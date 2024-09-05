function change_product_color_image(img, color) {
    jQuery("#color_id").val(color);
    jQuery(".simpleLens-big-image-container").html(
        '<a data-lens-image="' +
            img +
            '" class="simpleLens-lens-image"><img src="' +
            img +
            '" class="simpleLens-big-image"></a>'
    );
}
function showColor(size) {
    jQuery("#size_id").val(size);
    jQuery(".product_color").hide();
    jQuery(".size_" + size).show();
    jQuery(".size_link").css("border", "1px solid #ddd");
    jQuery("#size_" + size).css("border", "1px solid black");
}

function home_add_to_cart(id, size_str_id, color_str_id) {
    jQuery("#color_id").val(color_str_id);
    jQuery("#size_id").val(size_str_id);
    add_to_cart(id, size_str_id, color_str_id);
}

function add_to_cart(id, size_str_id, color_str_id) {
    jQuery("#add_to_cart_msg").html("");
    var color_id = jQuery("#color_id").val();
    var size_id = jQuery("#size_id").val();

    if (size_str_id == 0) {
        size_id = "no";
    }
    if (color_str_id == 0) {
        color_id = "no";
    }
    if (size_id == "" && size_id != "no") {
        jQuery("#add_to_cart_msg").html(
            '<div class="alert alert-danger fade in alert-dismissible mt10"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select size</div>'
        );
    } else if (color_id == "" && color_id != "no") {
        jQuery("#add_to_cart_msg").html(
            '<div class="alert alert-danger fade in alert-dismissible mt10"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select color</div>'
        );
    } else {
        jQuery("#product_id").val(id);
        jQuery("#pqty").val(jQuery("#qty").val());
        jQuery.ajax({
            url: "/add_to_cart",
            data: jQuery("#frmAddToCart").serialize(),
            type: "post",
            success: function (result) {
                var totalPrice = 0;

                if (result.msg == "not_avaliable") {
                    alert(result.data);
                } else {
                    //alert("Product " + result.msg);
                    toastr.success("Product " + result.msg);
                    if (result.totalItem == 0) {
                        jQuery(".aa-cart-notify").html("0");
                        jQuery(".aa-cartbox-summary").remove();
                    } else {
                        jQuery(".aa-cart-notify").html(result.totalItem);
                        var html = "<ul>";
                        jQuery.each(result.data, function (arrKey, arrVal) {
                            totalPrice =
                                parseInt(totalPrice) +
                                parseInt(arrVal.qty) * parseInt(arrVal.price);
                            html +=
                                '<li><a class="aa-cartbox-img" href="#"><img src="' +
                                PRODUCT_IMAGE +
                                "/" +
                                arrVal.featured +
                                '" alt="img"></a><div class="aa-cartbox-info"><h4><a href="#">' +
                                arrVal.name +
                                "</a></h4><p> " +
                                arrVal.qty +
                                " * Rs  " +
                                arrVal.price +
                                "</p></div></li>";
                        });
                    }
                    html +=
                        '<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">Rs ' +
                        totalPrice +
                        "</span></li>";
                    html +=
                        '</ul><a class="aa-cartbox-checkout aa-primary-btn" href="/cart">Cart</a>';
                    console.log(html);
                    jQuery(".aa-cartbox-summary").html(html);
                }
            },
        });
    }
}

function deleteCartProduct(pid, size, color, attr_id) {
    jQuery("#color_id").val(color);
    jQuery("#size_id").val(size);
    jQuery("#qty").val(0);
    add_to_cart(pid, size, color);
    jQuery("#cart_box" + attr_id).hide();
}

function updateQty(pid, size, color, attr_id, price) {
    jQuery("#color_id").val(color);
    jQuery("#size_id").val(size);
    var qty = jQuery("#qty" + attr_id).val();
    jQuery("#qty").val(qty);
    add_to_cart(pid, size, color);
    jQuery("#total_price_" + attr_id).html("$" + qty * price);
}

function sort_by() {
    var sort_by_value = jQuery("#sort_by_value").val();
    jQuery("#sort").val(sort_by_value);
    jQuery("#categoryFilter").submit();
}

function sort_price_filter() {
    jQuery("#filter_price_start").val(jQuery("#skip-value-lower").html());
    jQuery("#filter_price_end").val(jQuery("#skip-value-upper").html());
    jQuery("#categoryFilter").submit();
}

function setColor(color, type) {
    var color_str = jQuery("#color_filter").val();
    if (type == 1) {
        var new_color_str = color_str.replace(color + ":", "");
        jQuery("#color_filter").val(new_color_str);
    } else {
        jQuery("#color_filter").val(color + ":" + color_str);
        jQuery("#categoryFilter").submit();
    }

    jQuery("#categoryFilter").submit();
}

function funSearch() {
    var search_str = jQuery("#search_str").val();
    if (search_str != "" && search_str.length > 3) {
        window.location.href = "/search/" + search_str;
    }
}

jQuery("#frmRegistration").submit(function (e) {
    e.preventDefault();
    $(".loader-div").show();
    jQuery(".field_error").html("");
    jQuery.ajax({
        url: "/registration_process",
        data: jQuery("#frmRegistration").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "error") {
                jQuery.each(result.error, function (key, val) {
                    $(".loader-div").hide(); // hide loader
                    jQuery("#" + key + "_error").html(val[0]);
                });
            }

            if (result.status == "success") {
                $(".loader-div").hide(); // hide loader
                jQuery("#frmRegistration")[0].reset();
                jQuery("#thank_you_msg").html(result.msg);
            }
        },
    });
});

jQuery("#frmLogin").submit(function (e) {
    jQuery("#login_msg").html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/login_process",
        data: jQuery("#frmLogin").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "error") {
                jQuery("#login_msg").html(result.msg);
            }

            if (result.status == "success") {
                //window.location.href = window.location.href;
                window.location.href = "/dashboard";
                //alert('success');
                //jQuery('#frmLogin')[0].reset();
                //jQuery('#thank_you_msg').html(result.msg);
            }
        },
    });
});

jQuery("#frmLogin1").submit(function (e) {
    $(".loader-div").show();
    jQuery("#login_msg").html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/login_process",
        data: jQuery("#frmLogin1").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "error") {
                $(".loader-div").hide(); // hide loader
                jQuery("#login_msg").html(result.msg);
            }

            if (result.status == "success") {
                // window.location.href = window.location.href;
                window.location.href = "/dashboard";
                //alert('success');
                //jQuery('#frmLogin')[0].reset();
                //jQuery('#thank_you_msg').html(result.msg);
            }
        },
    });
});

function forgot_password() {
    jQuery("#popup_forgot").show();
    jQuery("#popup_login").hide();
}

function show_login_popup() {
    jQuery("#popup_forgot").hide();
    jQuery("#popup_login").show();
}

jQuery("#frmForgot").submit(function (e) {
    jQuery("#forgot_msg").html("Please wait...");

    e.preventDefault();
    jQuery.ajax({
        url: "/forgot_password",
        data: jQuery("#frmForgot").serialize(),
        type: "post",
        success: function (result) {
            console.log(result);
            jQuery("#forgot_msg").html(result.msg);
        },
    });
});

jQuery("#frmUpdatePassword").submit(function (e) {
    jQuery("#thank_you_msg").html("Please wait...");
    jQuery("#thank_you_msg").html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/forgot_password_change_process",
        data: jQuery("#frmUpdatePassword").serialize(),
        type: "post",
        success: function (result) {
            console.log(result);
            jQuery("#frmUpdatePassword")[0].reset();
            jQuery("#thank_you_msg").html(result.msg);
        },
    });
});

function applyCouponCode() {
    jQuery("#coupon_code_msg").html("");
    jQuery("#order_place_msg").html("");
    var coupon_code = jQuery("#coupon_code").val();
    if (coupon_code != "") {
        jQuery.ajax({
            type: "post",
            url: "/apply_coupon_code",
            data:
                "coupon_code=" +
                coupon_code +
                "&_token=" +
                jQuery("[name='_token']").val(),
            success: function (result) {
                console.log(result.status);
                if (result.status == "success") {
                    jQuery(".show_coupon_box").removeClass("visually-hidden");
                    jQuery("#coupon_code_str").html(coupon_code);
                    jQuery("#total_price").html("$" + result.totalPrice);
                    jQuery(".apply_coupon_code_box").hide();
                } else {
                }
                jQuery("#coupon_code_msg").html(result.msg);
            },
        });
    } else {
        jQuery("#coupon_code_msg").html("Please enter coupon code");
    }
}

function remove_coupon_code() {
    jQuery("#coupon_code_msg").html("");
    var coupon_code = jQuery("#coupon_code").val();
    jQuery("#coupon_code").val("");
    if (coupon_code != "") {
        jQuery.ajax({
            type: "post",
            url: "/remove_coupon_code",
            data:
                "coupon_code=" +
                coupon_code +
                "&_token=" +
                jQuery("[name='_token']").val(),
            success: function (result) {
                if (result.status == "success") {
                    jQuery(".show_coupon_box").addClass("visually-hidden");
                    jQuery("#coupon_code_str").html("");
                    jQuery("#total_price").html("$" + result.totalPrice);
                    jQuery(".apply_coupon_code_box").show();
                } else {
                }
                jQuery("#coupon_code_msg").html(result.msg);
            },
        });
    }
}

jQuery("#frmPlaceOrder").submit(function (e) {
    //jQuery("#order_place_msg").html("Please wait...");
    $(".loader-div").show();
    e.preventDefault();
    jQuery.ajax({
        url: "/place_order",
        data: jQuery("#frmPlaceOrder").serialize(),
        type: "post",
        success: function (result) {
            console.log(result);
            if (result.status == "Gateway") {
                window.location.href = "/payment";
            }

            if (result.status == "Square") {
                window.location.href = "/php_checkout/checkout.php";
            }
            if (result.status == "success") {
                if (result.payment_url != "") {
                    window.location.href = result.payment_url;
                } else {
                    window.location.href = "/order_placed";
                }
            }
            // $(".loader-div").hide(); // hide loader
            jQuery("#order_place_msg").html(result.msg);
        },
    });
});

jQuery("#frmProductReview").submit(function (e) {
    //jQuery('#thank_you_msg').html("Please wait...");
    //jQuery('#thank_you_msg').html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/product_review_process",
        data: jQuery("#frmProductReview").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "success") {
                jQuery(".review_msg").html(result.msg);
                jQuery("#frmProductReview")[0].reset();
                setInterval(function () {
                    window.location.href = window.location.href;
                }, 3000);
            }
            if (result.status == "error") {
                jQuery(".review_msg").html(result.msg);
            }
            //jQuery('#frmUpdatePassword')[0].reset();
            //jQuery('#thank_you_msg').html(result.msg);
        },
    });
});
