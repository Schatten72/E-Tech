function changeView() {

    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var f = new FormData();
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                fname.value = "";
                lname.value = "";
                email.value = "";
                password.value = "";
                mobile.value = "";
                document.getElementById("msg").value = "";

                alert("Registration Successful");
                changeView();


            } else {
                document.getElementById("msg").innerHTML = text;

            }
        }

    };
    r.open("POST", "signUpProcess.php", true);
    r.send(f);
}


function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var remember = document.getElementById("remember");


    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = (r.responseText);
            if (t == "success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }

        }
    };


    r.open("POST", "signInProcess.php", true);
    r.send(formData);

}

var bm;

function forgotPassword() {
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {

                alert("Verification email sent.Please check your inbox");
                var m = document.getElementById("forgetPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                alert(text);
            }
        }
    };
    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function showPassword1() {
    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide";

    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }
}

function showPassword2() {
    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnpb.innerHTML == "Show") {
        rnp.type = "text";
        rnpb.innerHTML = "Hide";

    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }
}

/////////////////////////////////////////////////////////////////////////////////password reset

function resetPassword() {

    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");



    var formData = new FormData();
    formData.append("e", e.value);
    formData.append("np", np.value);
    formData.append("rnp", rnp.value);
    formData.append("vc", vc.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                alert("Password Reset Successful");

                bm.hide();

            } else {
                alert(text);
            }
        }

    };
    r.open("POST", "resetPassword.php", true);
    r.send(formData);
}

function goToAddProduct() {
    window.location = "addproduct.php";
}


function changeImg() {
    var image = document.getElementById("imguploader");
    var view = document.getElementById("prev");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }
}

function changeImg1() {
    var image = document.getElementById("imgUploader1");
    var view = document.getElementById("prev1");
    image.onchange = function() {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        //alert(url);
        view.src = url;
    }


}


function changeImg2() {
    var image = document.getElementById("imgUploader2");
    var view = document.getElementById("prev2");
    image.onchange = function() {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        //alert(url);
        view.src = url;
    }


}

function changeImg3() {
    var image = document.getElementById("imgUploader3");
    var view = document.getElementById("prev3");
    image.onchange = function() {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        //alert(url);
        view.src = url;
    }


}



////////////////////////////////////////////////////////////////////Add Product

function addProduct() {
    var category = document.getElementById("ca");
    var brand = document.getElementById("br");
    var model = document.getElementById("mo");
    var title = document.getElementById("ti");
    var condition;

    if (document.getElementById("bn").checked) {
        condition = "1";
    } else if (document.getElementById("us").checked) {
        condition = "2";
    }

    // var colour;

    // if (document.getElementById("clr1").checked) {
    //     colour = "1";
    // } else if (document.getElementById("clr2").checked) {
    //     colour = "2";
    // } else if (document.getElementById("clr3").checked) {
    //     colour = "3";
    // } else if (document.getElementById("clr4").checked) {
    //     colour = "4";
    // } else if (document.getElementById("clr5").checked) {
    //     colour = "5";
    // } else if (document.getElementById("clr6").checked) {
    //     colour = "6";
    // }


    var qty = document.getElementById("qty");
    var price = document.getElementById("cost");
    var delivery_within_colombo = document.getElementById("dwc");
    var delivery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("desc");
    // var image = document.getElementById("imguploader");
    var image = document.getElementById("imgUploader1");
    //alert(imgUploader.value);

    var image2 = document.getElementById("imgUploader2");

    var image3 = document.getElementById("imgUploader3");

    var form = new FormData();
    form.append("c", category.value);
    form.append("b", brand.value);
    form.append("m", model.value);
    form.append("t", title.value);
    form.append("co", condition);
    // form.append("col", colour);
    form.append("qty", qty.value);
    form.append("p", price.value);
    form.append("dwc", delivery_within_colombo.value);
    form.append("doc", delivery_outof_colombo.value);
    form.append("desc", description.value);
    // form.append("img", image.files[0]);


    form.append("img", image.files[0]);
    form.append("img2", image2.files[0]);
    form.append("img3", image3.files[0]);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text);
        }
    }


    r.open("POST", "addProductProcess.php", true);
    r.send(form);



}

///////////////////////////////////////////////////////////////////user signout

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {

                window.location = "home.php";

            }

        }
    };

    r.open("GET", "signout.php", true);
    r.send();
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////

function changeProductView() {
    window.location = "addproduct.php";

}

function gotoUpdate() {
    window.location = "sellerproductview.php";

}

////////////////////////////////////////////////////////////////////update user profile

function updateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var img = document.getElementById("profileimg");


    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("a1", line1.value);
    f.append("a2", line2.value);
    f.append("c", city.value);
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    };


    r.open("POST", "UpdateProfileProcess.php", true);
    r.send(f);

}


////////////////////////////////////////////////////////////////////////////user profile image
function changeProfileImg() {
    var image = document.getElementById("profileimg");
    var view = document.getElementById("prev");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }
}



///// /////////////////////////////////////////////////////////////////////chagestate button

function changeStatus(id) {

    var productid = id;
    var statuscheck = document.getElementById("check");

    var statuslabel = document.getElementById("checklabel" + productid);

    //   if (statuscheck.checked) {
    //       status = 1;
    //   } else {
    //       status = 0;
    //   }

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "deactive") {
                statuslabel.innerHTML = "Make Your Product Active";
            } else if (t == "active") {
                statuslabel.innerHTML = "Make Your Product Deactive";
            }
        }
    };

    r.open("GET", "statusChangeProcess.php?p=" + productid, true);
    r.send();

}


///////////////////////////////////////////////////////////////////////////////////delete model////////////


function deleteModel(id) {

    var dm = document.getElementById("deleteModal" + id);
    k = new bootstrap.Modal(dm);
    k.show();

}

///////////////////////////////////////////////////////////////////////////delete product///////////////////

function deleteproduct(id) {


    var productid = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;

            if (t == "success") {
                k.hide();
                window.location = "adminproductview.php";
            }
        }
    };

    request.open("GET", "deleteproductprocess.php?id=" + productid, true);
    request.send();
}

////////////////////////////////////////////////////////////////////////////////////addfilters/////////////////////////////////



function addFilters() {

    var search = document.getElementById("s");

    var age;
    if (document.getElementById("n").checked) {
        age = 1;

    } else if (document.getElementById("o").checked) {
        age = 2;

    } else {
        age = 0;
    }

    var qty;
    if (document.getElementById("l").checked) {
        qty = 1;

    } else if (document.getElementById("h").checked) {
        qty = 2;

    } else {
        qty = 0;
    }

    var condition;
    if (document.getElementById("b").checked) {
        condition = 1;

    } else if (document.getElementById("u").checked) {
        condition = 2;

    } else {
        condition = 0;
    }

    var f = new FormData();
    f.append("s", search.value);
    f.append("a", age);
    f.append("q", qty);
    f.append("c", condition);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            var arr = JSON.parse(t);
            for (var i = 0; i < arr.length; i++) {
                var row = arr[i];
                alert(row["title"]);
                alert(row["img"]);
            }


        }

    };

    r.open("POST", "filterProcess.php", true);
    r.send(f);

}

///////////////////////////////////////////////////////////////////////////////search to Update ///////////////

function searchtoupdate() {
    var id = document.getElementById("searchToUpdate").value;
    var title = document.getElementById("ti");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {

            var text = request.responseText;
            var object = JSON.parse(text);
            // alert(object["title"]);
            alert(text);

            // title.value = object["title"];
        }
    };

    request.open("GET", "searchToUpdateProcess.php?id=" + id, true);
    request.send();
}

/////////////////////////////////////////////////////////////////////send ID to Update///in // sellerproductview.php//


function sendid(id) {

    var id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "updateProduct.php";
            }
        }
    };

    r.open("GET", "sendProductProcess.php?id=" + id, true);
    r.send();

}

// updateProduct

function updateProduct(id) {

    var pid = id;
    // alert(pid);

    var title = document.getElementById("ti");
    var price = document.getElementById("cost");
    var qty = document.getElementById("qty");
    var dwc = document.getElementById("dwc");
    var doc = document.getElementById("doc");
    var description = document.getElementById("desc");
    // var image = document.getElementById("imguploader1").value;

    // var image2 = document.getElementById("imgUploader2");

    // var image3 = document.getElementById("imgUploader3");


    var form = new FormData();
    form.append("id", pid);
    form.append("p", price.value);
    form.append("ti", title.value);
    form.append("qty", qty.value);
    form.append("dwc", dwc.value);
    form.append("doc", doc.value);
    form.append("desc", description.value);


    // form.append("img", image.files[0]);
    // form.append("img2", image2.files[0]);
    // form.append("img3", image3.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // if (text == "success") {
            //     alert("Product Updated Successfully");
            // } else {
            alert(text);

            window.location = "adminproductview.php";
            // }
        }
    };

    r.open("POST", "updateProductProcess.php", true);
    r.send(form);

}


////////////////////////////////////////////////////////////////////////////////////////load main image /////


function loadmainimg(id) {

    var pid = id;

    var img = document.getElementById("pimg" + pid).src;

    var mainimg = document.getElementById("mainimg");

    mainimg.style.backgroundImage = "url(" + img + ")";

    // alert(img);

}

/////qty update///

function qty_inc(qty) {

    var pqty = qty;

    var input = document.getElementById("qtyinput");

    if (input.value < pqty) {

        var newvalue = parseInt(input.value) + 1;

        input.value = newvalue.toString();
    } else {
        alert("Maximum quantity count has been acheived");
    }





}

function qty_dec() {

    var input = document.getElementById("qtyinput");

    if (input.value > 1) {
        var newvalue = parseInt(input.value) - 1;

        input.value = newvalue.toString();
    } else {
        alert("Minimum quantity count has been acheived");
    }




}


/////////////////////////////////////////////////////////////////////   basic search   ///////////////


function basicSearch(x) {
    var page = x;
    var searchText = document.getElementById("basic_search_text").value;
    var searchSelect = document.getElementById("basic_search_category").value;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "empty") {
                window.location = "home.php";

            } else {
                document.getElementById("product_view_div").innerHTML = t;

            }
        }
    };

    r.open("GET", "basicSearchProccess.php?t=" + searchText + "&s=" + searchSelect + "&p=" + page, true);
    r.send();
}




////////////////


function addToWatchlist(id) {

    var pid = id;

    // alert(id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            //alert(t);
            if (t == "success") {
                window.location = "watchlist.php";
            } else {
                alert(t);
            }
        }
    };
    r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
    r.send();

}

////////////delete from watchlist////////////////////


function deletefromwatchlist(id) {

    var wid = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            //alert(text);
            if (text = "success") {
                window.location = "watchlist.php";
            }
        }
    };

    request.open("GET", "removeWatchlistItemProcess.php?id=" + wid, true);
    request.send();
}






////////////go to cart///////////

function gotocart() {
    window.location = "cart.php";
}
////////////go to home///////////

function gotohome() {
    window.location = "home.php";
}
////////////////////////////////////////////////////////////////////////////////////////// Add To Cart/////////////////////////////////////////

function addToCart(id) {
    var qtytxt = document.getElementById("qtytxt" + id).value;
    var pid = id;

    // alert(qtytxt);
    // alert(pid);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "cart.php";
            } else {
                alert(t);
            }
        }
    };
    r.open("GET", "addToCartProcess.php?id=" + pid + "&qty=" + qtytxt, true);
    r.send();

}


/////////////////////////////////////////////////////////////////////            /Delete From Cart      //////////////////////////////////////////////////////////////


function deletefromCart(id) {

    var cid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {
                window.location = "cart.php";
            }
        }
    };
    r.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
    r.send();
}



///////////////////////////////////////////////////////////////P/////////////         Pay Now      //////////////////////////////////////////////////////////////////////


function paynow(id) {

    var qty = document.getElementById("qtyinput").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var obj = JSON.parse(t);

            var mail = obj["email"];
            var amount = obj["amount"];
            var qty = obj["qty"];


            if (t == "1") {

                alert("Please SignIn First");
                window.location = "index.php";

            } else if (t == "2") {
                alert("Please Update Your Profile First");
                window.location = "userprofile.php";

            } else {

                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, id, mail, amount, qty);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");

                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1218039", // Replace your Merchant ID
                    "return_url": "https://localhost/eshop/singleProductview.php?id=" + id, // Important
                    "cancel_url": "https://localhost/eshop/singleProductview.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount + ".00",
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked

                payhere.startPayment(payment);
            }
        }
    };
    r.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
    r.send();

}


///////////////////////////////////////////////////////////////////      /Save invoice      ////////////////////////////////////////////////////////////


function saveInvoice(orderId, id, mail, amount, qty) {

    var orderid = orderId;
    var pid = id;
    var email = mail;
    var total = amount;
    var pqty = qty;

    var f = new FormData();
    f.append("oid", orderid);
    f.append("pid", pid);
    f.append("email", email);
    f.append("total", total);
    f.append("pqty", pqty);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "1") {
                window.location = "invoice.php?id=" + orderId;
            }
        }
    };
    r.open("POST", "saveinvoice.php", true);
    r.send(f);
}



////////////////////detailsmodel//////////////


// function detailsmodel(id) {
//     alert(id);
// }

/////////////////////////////////////////////////              ptint             ///////////////////////////// //////////////

function printpr(id) {
    pid = id;
    var restorepage = document.body.innerHTML;
    var page = document.getElementById("singleproduct" + id).innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;
    window.location = "adminmanageProd.php";

}



//////////////////////////////////////////////////      feedback     /////////////////////////////////////

function addFeedback(id) {


    var feedmodel = document.getElementById("feedbackModal" + id);
    k = new bootstrap.Modal(feedmodel);
    k.show();

}

///////save feed///////////////////////

function saveFeedback(id) {

    var pid = id;

    var feedtext = document.getElementById("feedtxt" + id).value;

    var f = new FormData();
    f.append("i", pid);
    f.append("ft", feedtext);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                k.hide();
            }
        }
    };
    r.open("POST", "saveFeedbackProcess.php", true);
    r.send(f);
}










/////////////////////////////////////////////////  ADMIN Verification ///////////////////////////


function adminverfication() {

    var e = document.getElementById("e").value;

    var r = new XMLHttpRequest();


    var f = new FormData();
    f.append("e", e);

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                alert("Verification Code Sent. Check Your Inbox");

                var verificationmodal = document.getElementById("verificationmodal");
                k = new bootstrap.Modal(verificationmodal);
                k.show();

            } else {
                alert(t);
            }

        }

    };

    r.open("POST", "adminVerificationProcess.php", true);
    r.
    send(f);
}


////////////// Admin verify//////////

function verify() {

    var verificationcode = document.getElementById("v").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                k.hide();
                window.location = "adminp.php";

            } else {
                alert(t);
            }
        }
    };
    r.open("GET", "adminVerifyProcess.php?v=" + verificationcode, true);
    r.send();
}

/////////////////////////gotoadminpanel////////////


function gotoadminpanel() {
    window.location = "adminpanel.php";
}










///////////////////////mangage users / block user ///////////////////////

function blockuser(email) {

    // alert(email);

    var mail = email;

    var blockbtn = document.getElementById("blockbtn" + mail);

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "000") {
                alert("USER BLOKED");
                window.location = "adminmanageUsers.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"

            } else if (t == "001") {
                alert("USER UNBLOKED");
                window.location = "adminmanageUsers.php";
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"

            } else {
                alert(t);
            }

        }


    }
    r.open("POST", "adminuserBlockProcess.php", true);
    r.send(f);

}

/////////////////////// BLock Product//////////////////


function blockproduct(id) {

    // alert(email);

    var id = id;

    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("e", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {

                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
                window.location = "adminmanageProd.php#";

            } else {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
                window.location = "adminmanageProd.php#";
            }

        }


    }
    r.open("POST", "productBlockProcess.php", true);
    r.send(f);

}


/////////////////////////// Search User////////


function searchUser() {

    var text = document.getElementById("searchtxt").value;

    // alert(text);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;


            if (t == "success") {

                window.location = "manageusers.php";

            } else {
                all();
                alert(t);

            }

        }


    }
    r.open("GET", "searchUser.php?s=" + text, true);
    r.send();

}

///////////// all users........

function all() {



    var text = document.getElementById("searchtxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;


            if (t == "SS") {

                window.location = "manageusers.php";

            }

        }


    }
    r.open("GET", "searchallUser.php?s=" + text, true);
    r.send();
}


//////////////////////////////////////// Advanced Search///////////////////////////////////////////////////////////

function advanceSearch(txt, ss, pn) {

    // alert("ok")

    var s;
    var c;
    var b;
    var m;
    var con;
    var col;
    var pfrom;
    var pto;
    var sort;
    var pn;

    if (txt == undefined && ss == undefined && pn == undefined) {
        s = document.getElementById("s").value;
        c = document.getElementById("c").value;
        b = document.getElementById("b").value;
        m = document.getElementById("m").value;
        con = document.getElementById("con").value;
        col = document.getElementById("col").value;
        pfrom = document.getElementById("pfrom").value;
        pto = document.getElementById("pto").value;
        sort = document.getElementById("sort").value;
        pn = 1;
    } else {
        document.getElementById("s").value = txt;
        pn = pn;

        s = txt;
        c = "0";
        b = "0";
        m = "0";
        con = "0";
        col = "0";
        pfrom = "";
        pto = "";
        sort = "1";

        // alert(s + "\n" + c + "\n" + b + "\n" + m + "\n" + con + "\n" + col + "\n" + pfrom + "\n" + pto + "\n" + pn);

        sel = ss.split("-");

        if (sel[0] == 0) {
            //Do nothing
        } else if (sel[0] == 1) {
            document.getElementById("c").value = sel[2];
            c = sel[2];
        } else if (sel[0] == 2) {
            document.getElementById("b").value = sel[2];
            b = sel[2];
        } else if (sel[0] == 3) {
            document.getElementById("m").value = sel[2];
            m = sel[2];
        } else if (sel[0] == 4) {
            document.getElementById("con").value = sel[2];
            con = sel[2];
        } else if (sel[0] == 5) {
            document.getElementById("col").value = sel[2];
            col = sel[2];
        } else if (sel[0] == 6) {
            document.getElementById("pfrom").value = sel[2];
            pfrom = sel[2];
        } else if (sel[0] == 7) {
            document.getElementById("pto").value = sel[2];
            pto = sel[2];
        } else if (sel[0] == 8) {
            document.getElementById("pfrom").value = sel[2];
            document.getElementById("pto").value = sel[3];
            pfrom = sel[2];
            pto = sel[3];
        }

        if (sel[1] == 1) {
            document.getElementById("sort").value = sel[1];
            sort = sel[1];
        } else if (sel[1] == 2) {
            document.getElementById("sort").value = sel[1];
            sort = sel[1];
        } else if (sel[1] == 3) {
            document.getElementById("sort").value = sel[1];
            sort = sel[1];
        } else if (sel[1] == 4) {
            document.getElementById("sort").value = sel[1];
            sort = sel[1];
        }
    }

    var f = new FormData();
    f.append("s", s);
    f.append("c", c);
    f.append("b", b);
    f.append("m", m);
    f.append("con", con);
    f.append("col", col);
    f.append("pf", pfrom);
    f.append("pt", pto);
    f.append("st", sort);
    f.append("pn", pn);

    var a = new XMLHttpRequest();

    a.onreadystatechange = function() {
        if (a.readyState == 4) {
            var text = a.responseText;
            // alert(text);

            // document.getElementById("resultbox").innerHTML = text;

            if (text == "no") {
                document.getElementById("resultbox").innerHTML = "<h2 class='text-secondary fw-bold text-center'>No Products Found</h2>";
            } else if (text == "empty") {
                document.getElementById("resultbox").innerHTML = "<h2 class='text-secondary fw-bold text-center'>You must enter a keyword to search</h2>";
            } else {
                var cont = text.split("<hr/><hr/><hr/><hr/><hr/>");
                // alert(cont[0]);
                document.getElementById("resultbox").innerHTML = cont[0];
                document.getElementById("pagbox").innerHTML = cont[1];
                // alert(cont[1]);
            }

        }
    }

    a.open("POST", "advancedSearchProcess.php", true);
    a.send(f);

}

// Advance Search

// function advancedSearch(x) {
//     // alert(x);
//     // var x = 1;
//     var s = document.getElementById("s1").value;
//     var ca = document.getElementById("ca1").value;
//     var br = document.getElementById("br1").value;
//     var mo = document.getElementById("mo1").value;
//     var co = document.getElementById("co1").value;
//     var col = document.getElementById("col1").value;
//     var prif = document.getElementById("prif1").value;
//     var prit = document.getElementById("prit2").value;
//     var sort = document.getElementById("sort").value;

//     // alert(s);
//     // alert(ca);
//     // alert(br);
//     // alert(mo);
//     // alert(co);
//     // alert(col);
//     // alert(prif);
//     // alert(prit);

//     var form = new FormData();
//     form.append("page", x);
//     form.append("s", s);
//     form.append("c", ca);
//     form.append("b", br);
//     form.append("m", mo);
//     form.append("co", co);
//     form.append("col", col);
//     form.append("prif", prif);
//     form.append("prit", prit);
//     form.append("sort", sort);


//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;
//             // 
//             document.getElementById("filter").innerHTML = text;
//         }
//     };
//     r.open("POST", "advancedSearchpro.php", true);
//     r.send(form);

// }

// function advancedSearch() {

//     var viewresults = document.getElementById("viewResults");


//     var keyword = document.getElementById("k").value;
//     var category = document.getElementById("c").value;
//     var brand = document.getElementById("b").value;
//     var model = document.getElementById("m").value;
//     var condition = document.getElementById("con").value;
//     var color = document.getElementById("clr").value;
//     var pricefrom = document.getElementById("pf").value;
//     var priceto = document.getElementById("pt").value;


//     // alert(keyword);
//     // alert(category);
//     // alert(brand);
//     // alert(model);
//     // alert(condition);
//     // alert(color);
//     // alert(pricefrom);
//     // alert(priceto);

//     var f = new FormData();
//     f.append("k", keyword);
//     f.append("c", category);
//     f.append("b", brand);
//     f.append("m", model);
//     f.append("con", condition);
//     f.append("clr", color);
//     f.append("pf", pricefrom);
//     f.append("pt", priceto);


//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;


//             viewresults.innerHTML = t;


//         }


//     }
//     r.open("POST", "advancedSearchProcess.php", true);
//     r.send(f);




// }


//////////////////////////// dailyselling/////////////////////


function dailysellings() {

    var from = document.getElementById("fromdate").value;
    var to = document.getElementById("todate").value;
    var link = document.getElementById("historylink");

    link.href = "productsellinghistory.php?f=" + from + "&t=" + to;


}



// sendmessage

// function sendmessage(m) {

//     var email = m;
//     var msgtxt = document.getElementById("msgtxt").value;

//     // alert(email);
//     // alert(msgtxt);

//     var f = new FormData();
//     f.append("e", email);
//     f.append("t", msgtxt);

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;

//             if (t == "success") {

//                 alert("Message Sent Successfully");

//             } else {
//                 alert(t);
//             }
//         }
//     }

//     r.open("POST", "sendmessageprocess.php", true);
//     r.send(f);

// }

// // refresher
// var mail;

// function refresher(email) {
//     mail = email;
//     setInterval(refreshmsgare, 500);
//     setInterval(refreshrecentarea, 500);

// }

// // refres msg view area

// function refreshmsgare() {

//     // alert(mail);
//     var chatrow = document.getElementById("chatrow");

//     var f = new FormData();
//     f.append("e", mail);

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;

//             chatrow.innerHTML = t;

//         }
//     }

//     r.open("POST", "refreshmsgareaprocess.php", true);
//     r.send(f);

// }

// // refreshrecentarea

// function refreshrecentarea() {

//     var rcv = document.getElementById("rcv");

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             rcv.innerHTML = t;
//         }
//     }

//     r.open("POST", "refreshrecentareaprocess.php", true);
//     r.send();

// }

function viewmsgmodal(x) {
    //alert(x);
    var pop = document.getElementById("msgModal");


    k = new bootstrap.Modal(pop);
    document.getElementById("modalName").innerHTML = x;
    k.show();
}


function sendmessage(mail, ad) {
    //alert(ad);
    var email = mail;
    var msgtxt = document.getElementById("msgtxt").value;
    document.getElementById("msgtxt").value = "";



    var f = new FormData();
    f.append("e", email);
    f.append("t", msgtxt);
    var ad = ad;
    if (ad != null) {
        f.append("ad", ad);
        //alert(ad);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alert("Message Sent Successfully");

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);

}


// refresher

function refresher(email, ad) {



    setInterval(function() {
        refreshmsgare(email, ad);
        refreshrecentarea();
        // var elem = document.getElementById('chatrow');
        // elem.scrollTop = elem.scrollHeight;
    }, 500);

}



// refres msg view area

function refreshmsgare(mail, ad) {
    //alert();
    var chatrow = document.getElementById("chatrow");

    var f = new FormData();
    f.append("e", mail);
    if (ad != null) {
        f.append("ad", ad);
        //alert(ad);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            //alert(t);
            chatrow.innerHTML = t;
        }
    }

    r.open("POST", "refreshmsgareaprocess.php", true);
    r.send(f);

}

// refreshrecentarea

function refreshrecentarea() {

    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
            //alert(t);
        }
    }

    r.open("POST", "refreshrecentareaprocess.php", true);
    r.send();

}



///////////////////viewmsgmodal/////////////////////


function viewmsgmodal() {



    var msgmodel = document.getElementById("msgmodal");

    k = new bootstrap.Modal(msgmodel);
    k.show();

}

///////////////////////////////////////////       addnewmodal            ////////////

function addnewmodal() {
    var po = document.getElementById("addnewmodal");
    k = new bootstrap.Modal(po);
    k.show();
}


///////////////////////////savecategory////////////////

function savecategory() {
    var txt = document.getElementById("categorytxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                alert("Category Added Successfull");
                window.location = "manageproducts.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addNewCategoryProcess.php?t=" + txt, true);
    r.send();
}



//////////////singleview Modal///////


function singleviewmodal(id) {
    var pop = document.getElementById("singleproductview" + id);

    k = new bootstrap.Modal(pop);

    // k.appendTo('body')
    k.show()
}

///////////////////////

function gotoprofile() {
    window.location = "userprofile.php";
}








///////////////////add new brand///

function addnewmodalb() {
    var po = document.getElementById("addnewmodalb");
    k = new bootstrap.Modal(po);
    k.show();
}


function savebrand() {
    var txt = document.getElementById("brandtxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                alert("Brand Added Successfull");
                window.location = "manageproducts.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addNewbrandProcess.php?t=" + txt, true);
    r.send();
}

///////////////////add new model///

function addnewmodalm() {
    var po = document.getElementById("addnewmodalm");
    k = new bootstrap.Modal(po);
    k.show();
}


function savemodel() {
    var txt = document.getElementById("modeltxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                alert("New Model Added");
                window.location = "manageproducts.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addNewmodelProcess.php?t=" + txt, true);
    r.send();
}

////////////////////DELETE category

function deletec(id) {
    var pop = document.getElementById("deletecat" + id);
    k = new bootstrap.Modal(pop);
    k.show();
}


function deletecategory(id) {

    // alert(id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                alert("Category Deleted");
                window.location = "manageproducts.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteCategoryProcess.php?id=" + id, true);
    r.send();

}


////////////////////DELETE mode

function deletem(id) {
    var pop = document.getElementById("deletemodel" + id);
    k = new bootstrap.Modal(pop);
    k.show();
}


function deletemodel(id) {

    // alert(id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                alert("Model Deleted");
                window.location = "manageproducts.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deletemodelProcess.php?id=" + id, true);
    r.send();

}

////////////////////DELETE brand

function deleteb(id) {
    var pop = document.getElementById("deletebrand" + id);
    k = new bootstrap.Modal(pop);
    k.show();
}


function deletebrand(id) {

    // alert(id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                alert("Brand Deleted");
                window.location = "manageproducts.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deletebrandProcess.php?id=" + id, true);
    r.send();

}

function deleteproducthistory(id) {
    var productid = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var t = request.responseText;

            if (t == "success") {
                k.hide();
                window.location = "purchasehistory.php";
            }
        }
    };

    request.open("GET", "deleteproducthistoryprocess.php?id=" + productid, true);
    request.send();
}



///////////////////////////////////////////////////////////////P/////////////         checkout     //////////////////////////////////////////////////////////////////////


function checkOut() {

    var check = document.getElementById("checkBtn");
    // alert(check.value);

    const ids1 = [];
    const qty1 = [];

    for (let index = 0; index < check.value; index++) {
        // alert(document.getElementById("btn" + index).value);

        ids1[index] = document.getElementById("btn" + index).value;
    }

    for (let index = 0; index < check.value; index++) {

        qty1[index] = document.getElementById("qtyInput" + ids1[index]).value;
    }

    // alert(ids1);
    // alert(qty1);

    var f = new FormData();
    f.append("idx", ids1);
    f.append("qtyx", qty1);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            // /alert(t);

            if (t == "0X0") {
                alert("Please SignIn First");
                window.location = "index.php";
            } else if (t == "001") {
                window.location = "userProfile.php";
            } else {
                //alert();
                var obj = JSON.parse(t);

                var orderId = obj["id"];
                var userEmail = obj["email"];
                var amount = obj["amount"];
                var prod = obj["prods"];
                var prodQty = obj["prodQty"]



                //alert(amount);               
                //alert(userEmail);
                //alert(prod);
                //alert(prodQty);


                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);
                    saveBill(orderId, userEmail, amount, prod, prodQty);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                    alert("Payment Dissmissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1218039", // Replace your Merchant ID
                    "return_url": "http://localhost/eshop/cart.php", // Important
                    "cancel_url": "http://localhost/eshop/cart.php", // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": obj["amount"],
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": obj["email"],
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["districtName"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["districtName"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                //document.getElementById('payhere-payment').onclick = function(e) {
                payhere.startPayment(payment);
                //};
            }

        }
    }
    r.open("POST", "checkOut.php", true);
    r.send(f);

}

function saveBill(order_id, mail, amount, prod, prodQty) {

    var order_id = order_id;
    var email = mail;
    var total = amount;
    var prod = prod;
    var prodQty = prodQty;


    //alert(order_id);
    //alert(email);
    //alert(total);

    var f = new FormData();
    f.append("order_id", order_id);
    f.append("email", email);
    f.append("total", total);
    f.append("prod", prod);
    f.append("prodQty", prodQty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text);
            if (text == "000") {
                window.location = "invoice.php?id=" + order_id;
            }


        }

    }
    r.open("POST", "saveBill.php", true);
    r.send(f);

}


function removefromhistory(id) {

    var wid = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            //alert(text);
            if (text = "success") {
                window.location = "purchasehistory.php";
            }
        }
    };

    request.open("GET", "removefromHistoryProcess.php?id=" + wid, true);
    request.send();
}