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

        <form style="max-width: 330px;
    margin: 0 auto;">
            <h3 style="font-weight: bold">Login</h3>
            <span id="login_err" style="color: red"></span>
            <div class="form-group">
                <label for="inputUsername">Username</label>                
                <input type="text" class="form-control" id="txtUsername" name="txtUsername" />
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>                
                <input type="password" class="form-control" id="txtPassword" name="txtPassword" />
            </div>
            <div class="form-group">
                <label><input type="radio" name="job" value="1" checked> Student</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="radio" name="job" value="2" > Staff</label>
            </div>
            <div class="form-actions">
                <a href="javascript:void(0)" class="btn-login btn btn-primary">Sign in</a>
            </div>
        </form>                
    </div>
    <?php } ?>
</div>

<script>
    $(document).ready(function(){
        $(".btn-login").click(function(){
            var job = $('input[name="job"]:checked').val();
            var url = "?ctr=Student&action=login";
            var urlProfile = "?ctr=Student&action=profile";

            if (job == 2) {
                url = "?ctr=Staff&action=login";
                urlProfile = "?ctr=Staff&action=profile";
            }

            $.ajax({
                url: url,
                type: "post",
                data: {
                    'user_name' : $('input[name=txtUsername]').val(),
                    'password' : $('input[name=txtPassword]').val(),
                } ,
                dataType : 'json',
                success: function (data) {
                    if (data.status) {
                        window.location.href = urlProfile;
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
<style>
    .wrapper {
        background-color: #ebecf1;
    }
    .loginBox form{
        background-color: #ffffff;
        box-shadow: 0 1px 15px 1px rgb(39 39 39 / 10%);
        padding-left: 15px;
        padding-right: 15px;
    }
</style>
</body>
</html>