$("#sctype").change(
    function() {
        var theusertype=$("#sctype").val();
        $("#"+theusertype).show().siblings().hide();
        $("#"+theusertype).find("input").removeAttr("disabled");
        $("#"+theusertype).siblings().find("input").attr("disabled",true)
    }
);

function setCookieforlogin(cname,cvalue,exdays,path)
{
  var d = new Date();
  d.setTime(d.getTime()+(exdays*24*60*60*1000));
  var expires = "expires="+d.toGMTString();
  document.cookie = cname + "=" + cvalue + "; " + path + "; "+ expires;;
}

function loginsubmit(){
    $.ajax({
        type: "POST",
        url: "login.php",
        data: $('#loginform').serialize(),
        success: function(data){
            alert(JSON.stringify(data));
            if(data[data.length-1]=="1"){
                var theusername=$("#namerec").val();
                alert(theusername);
                var thepassword=$("#passrec").val();
                alert(thepassword);
                // document.cookie=theusername;
                // header("location:index.php"); 
                setCookieforlogin("welcome!", theusername, 30, "path=/");
                window.location.href = "../cust/cust-home.html";
            } else if(data[data.length-1]=="0"){
                $showsomething = "account doesn't exit or password mismatch!";
                alert($showsomething);
            } else {
                var theusername=$("#namerec").val();
                alert(theusername);
                var thepassword=$("#passrec").val();
                alert(thepassword);
                alert("Both Fields are required");
                alert(JSON.stringify(data));
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

