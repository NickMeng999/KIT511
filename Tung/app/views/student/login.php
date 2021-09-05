<?php
include "./app/views/header.php";
?>

<?php
if (!isset($_SESSION["username"])) {
?>
<div class="loginBox">
        <div class="loginHead">
            <img src="./app/assets/img/logo.png" alt="" title=""/>
        </div>

        <form style="max-width: 284px;
    margin: 0 auto;">
            <h3 style="font-weight: bold">Student Login</h3>
            <span id="login_err" style="color: red"></span>
            <div class="form-group">
                <label for="inputUsername">Username</label>                
                <input type="text" class="form-control" id="txtUsername" name="txtUsername" />
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>                
                <input type="password" class="form-control" id="txtPassword" name="txtPassword" />
            </div>
            <div class="form-actions">
                <a href="javascript:void(0)" class="btn-login btn btn-block">Sign in</a>
            </div>
        </form>                
    </div>
    <?php } ?>
</div>
<script>
    $(document).ready(function(){
        $(".btn-login").click(function(){
            $.ajax({
                url: "?ctr=Student&action=login",
                type: "post",
                data: {
                    'user_name' : $('input[name=txtUsername]').val(),
                    'password' : $('input[name=txtPassword]').val(),
                } ,
                dataType : 'json',
                success: function (data) {
                    if (data.status) {
                        window.location.href = "?ctr=Student&action=profile";
                    } else {
                        $('#login_err').empty();
                        $('#login_err').append(data.err);
                    }
                },error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
</script>
</body>
</html>