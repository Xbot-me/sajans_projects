$( document ).ready(function() {

    $(".btnRegister").click(function(e) {
        e.preventDefault();

        var pass = $(".pass").val();
        var pass_con = $(".pas-con").val();

        if(pass == pass_con){

            var values = $('#register').serialize();
       
        $.ajax({
            type:'POST',
            url:  'api/register.php',
            data:values,
            success: function(data) {

                toastr.success(data, 'Success Alert', {timeOut: 5000});
                window.location.href = "index.php";

            }

        });
        }else{
            //alert("Check Password");
            toastr.error("Check Password", 'Success Alert', {timeOut: 5000});
            }
       
        
    });
    $(".btnSubmit").click(function(e) {
        e.preventDefault();
        var values = $('#login').serialize();
        
        $.ajax({
            type:'POST',
            url:  'api/login.php',
            data:values,
            success: function(data) {
                if(data == '"Incorrect email or password"'){
                    toastr.error(data, 'Error Alert', {timeOut: 5000});

                }else{
                  var data = JSON.parse(data);
                    console.log(data);

                toastr.success('Welcome '+ data[0].first_name +' '+ data[0].last_name, 'Success Alert', {timeOut: 5000});
                window.location.href = "index.php";

                }

            }

        });
    });



});