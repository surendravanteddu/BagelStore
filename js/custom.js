function setlocalstorage() {
    localStorage.setItem("no", 0);
    localStorage.setItem("total", 0);
    localStorage.setItem("cartdata", "");
}

function cartdata() {
    $("#cart").html("cart (items " + localStorage.getItem("no") + ", total $" + localStorage.getItem("total") + ")");
}

function addtocart(item_id, item_cost, imagename) {
    var i = parseInt(localStorage.getItem("no"));
    var j = parseInt(localStorage.getItem("total"));
    var data = localStorage.getItem("cartdata");
    if (data == "") {
        localStorage.setItem("cartdata", item_id + ":" + item_cost + ":" + imagename);
    } else {
        data += "_" + item_id + ":" + item_cost + ":" + imagename;
        localStorage.setItem("cartdata", data);
    }
    localStorage.setItem("no", i + 1);
    localStorage.setItem("total", j + parseInt(item_cost));
    $("#cart").html("cart (items " + localStorage.getItem("no") + ", total $" + localStorage.getItem("total") + ")");
}

function logout() {
    //alert("logging out");
    localStorage.clear();
}

function cartdata1() {
    cartdata();
    getcart();
}
function getcart() {
    var data = localStorage.getItem("cartdata");
    var content = "<p align='center' style= 'margin:200px'class='alert alert-info'>Cart is empty</p>";
    if (data != "") {
        content = "<div style='margin-left:250px;'><table>";
        var res = data.split("_");
        for (var i = 0; i < res.length; i++) {
            if (i % 3 == 0) {
                content += "<tr>";
            }
            var item = res[i].split(":");
            content += "<td><img src='../images/" + item[2] + ".jpg' style='width : 250px;height:300px;'/></br><p style='margin-left:60px;'><b>Price : $" + item[1] + "</b></p></br><button type=\"button\" style='margin-left:60px;' class=\"btn btn-secondary\" onclick='removefromcart(" + item[0] + ")'>Remove from Cart</button></td>";
            if (i % 3 == 2) {
                content += "</tr>";
            }
        }
        content += "</table>";
        content += "<div style='margin-top: 50px;margin-right: 250px;'><p class='alert alert-warning' align='center'><b>Total items " + localStorage.getItem("no") + " </b></p></br><p class='alert alert-warning' align='center'><b>Total Cost $" + localStorage.getItem("total") + "</b> </p></br>";
        content += "<button  style='margin-left:200px;margin-bottom:40px;' type=\"button\" style='margin-left:60px;' class=\"btn btn-primary col-sm-6\" onclick='checkout()'>Check Out</button></div></div>";
    }
    $("#cartbody").html(content);
}
function removefromcart(id) {
    var data = localStorage.getItem("cartdata");
    var items = parseInt(localStorage.getItem("no"));
    var total = parseInt(localStorage.getItem("total"));
    var x;
    var res = data.split("_");
    for (var i = 0; i < res.length; i++) {
        var item = res[i].split(":");
        if (id == item[0]) {
            x = i;
            items--;
            total = total - parseInt(item[1]);
            localStorage.setItem("no", items);
            localStorage.setItem("total", total);
            cartdata();
            break;
        }
    }

    //  alert(x);
    data = "";
    for (var i = 0; i < res.length; i++) {
        if (i != x) {
            if (data == "") {
                data += res[i];
            } else {
                data += "_" + res[i];
            }
        }
    }
    // alert(data);
    localStorage.setItem("cartdata", data);
    window.location.href = "cart.php";
}

function checkout() {
    window.open("checkout.php");

}

function loadcheckout() {
    $("#details").html("<div style='margin-top: 50px;margin-right: 250px;'><p class='alert alert-warning' align='center'><b>Total items " + localStorage.getItem("no") + " </b></p></br><p class='alert alert-warning' align='center'><b>Total Cost $" + localStorage.getItem("total") + "</b> </p></br>");
}

function placeorder(uname) {
    $.get("access.php", {
        request: "placeorder",
        uname: uname,
        order: localStorage.getItem("cartdata"),
        total: localStorage.getItem("total"),
        address: $("#address").val(),
        city: $("#city").val(),
        state: $("#state").val(),
        zipcode: $("#zipcode").val()
    }, function (data) {
        if (data == "success") {
            localStorage.setItem("no", 0);
            localStorage.setItem("total", 0);
            localStorage.setItem("cartdata", "");
            
            $("#checkoutbody").html("<p class='alert alert-success' align='center' style='margin: 250px;'> Order Placed Successfully</p>");
            
//            $("#cardnumber").val("");
//            $("#cvv").val("");
//            $("#month").val("");
//            $("#year").val("");
//            $("#address").val("");
//            $("#city").val("");
//            $("#state").val("");
//            $("#zipcode").val("");

        }


    });
}

function deliver(oid){
   $.get("access.php",{request : "deliver",oid : parseInt(oid)},function(data){
       if(data == 'success'){
           alert("Order Delivered");
            window.location.href = "admin_menu.php";
       }
   });
}
