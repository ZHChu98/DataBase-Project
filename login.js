$("#sctype").change(
    function() {
        var theusertype=$("#sctype").val();
        $("#"+theusertype).show().siblings().hide();
        $("#"+theusertype).find("input").removeAttr("disabled");
        $("#"+theusertype).siblings().find("input").attr("disabled",true)
    }
);

function loginsubmit(){
    $.ajax({
        type: "POST",
        url: "login.php",
        data: $('#loginform').serialize(),
        success: function(){
            var result=document.getElementById("success");
            result.innerHTML="success!";
        },
        error: function(){
            var result=document.getElementById("success");
            result.innerHTML="failed!";
        }
    });
}

