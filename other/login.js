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
        success: function(data){
            if(data[data.length-1]=="1"){
                // $showsomething = "success~";
                // alert($showsomething);
                window.location.href = '../cust/cust-home.html';
            } else {
                $showsomething = "account doesn't exit or password mismatch!";
                alert($showsomething);
            }
        },
        error: function(data){
            var result=document.getElementById("needtoshowresult");
            result.innerHTML="failed";
            $showsomething = "failed...";
            alert($showsomething);
        }
    });
}

