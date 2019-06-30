

// Validation Script
function msg(msg,pro,colour) {
    document.getElementById(pro).innerHTML=msg;
    document.getElementById(pro).style.color=colour;
}

var r1=/^E\d{3}$/;
var r2=/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
var r3=/^[1-9]\d*$/;
// var r4=/^\d{3}-\d{7$/;
// var r5=/^[1-9]\d*$/;

var cid=$("#inputCID");
var inpname=$("#inputName");
var salary=$("#inputsalary");
var add=$("#inputAddress");
var myform=$("#myForm");

cid.on('keyup',function (e) {
    var txt=cid.val();
    var l=txt.length;
    var res=r1.test(txt);
    if (l<5) {
        if (l == 4) {
            if (res) {
                if (e.which == 13)
                    inpname.focus();
                msg("(ok)", "cidv", "green");

            }else {
                msg("Invalid Employee ID format ex: E-001 (required)", "cidv", "red");
                cid.val("");
            }
        }
    }else {
        alert("only 4 chars allowed");
        cid.val("");
    }
});

inpname.on('keypress',function (e) {
    var txt=inpname.val();
    var res=r2.test(txt);
    if (e.keyCode == 13 && txt!=null) {
        if (res) {
            add.focus();
            msg("(ok)", "cnamev", "green");

        }else {
            msg("Invalid Employee Name format ex: only a-z max15", "cnamev", "red");
            inpname.val("");
        }
    }
});

add.on('keypress',function (e) {
    var txt=inpname.val();
    var res=r2.test(txt);
    if (e.keyCode == 13 && txt!=null) {
        if (res) {
            salary.focus();
            msg("(ok)", "add", "green");

        }else {
            msg("Invalid Employee Address format", "cnamev", "red");
            add.val("");
        }
    }
});
salary.on('keypress',function (e) {
    var txt=salary.val();
    var res=r3.test(txt);
    if (e.keyCode == 13 && txt!=null) {
        if (res) {
            msg("(ok)", "salaryv", "green");
        }else {
            msg("Invalid Employee Salary format", "salaryv", "red");
            salary.val("");
        }
    }
});


$(myform).keypress(function (e) {
    if (e.which == 13)
        return false;
});


function Validation() {
    var rslt1=r1.test(cid.val()),
        rslt2=r2.test(inpname.val()),
        rslt3=r3.test(salary.val()),
        rslt4=r2.test(add.val())
    var xArray=[
        cid.val(),
        inpname.val(),
        salary.val(),
        add.val()
    ];
    var bool=true;
    for (var i = 0; i < xArray.length; i++) {
        if (xArray[i] == "") {
            bool = false;
            alert("all feilds are required");
            return false;
        }
    }
    if (rslt1 && rslt2 && rslt3 && rslt4 && rslt5 && bool){
        return true;
    }else {
        alert("invalid Inputs");
        cid.val("");
        inpname.val("");
        salary.val("");
      add.val("");
        return false;
    }
}

// validation Script End


// Add Button
$('#btnadd').click(function () {
    var customerformdata=$('#myForm').serialize();
    $.ajax({
        url:"save_customer.php",
        method:"POST",
        async:true,
        data: customerformdata
    }).done(function (res) {
        alert(res);
    });

});