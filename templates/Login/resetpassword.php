 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php
        echo $this->Html->css('/js/layui/css/layui.css', ['block'=> true]);
        echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));
    ?>
<style>
    * {
        font-family: 'Playfair Display', serif;
        letter-spacing: .1rem;
    }
    a {
        text-decoration: none;
    }
    a:hover {
        text-decoration: none;
        cursor: pointer;
    }
    .content {
        margin: 10px auto;
        padding: 10px;
        width: 30%;
        display: grid;
        border-radius: 6px;
        border: 1px solid #cccccc;
        background-color: #f5f8fa;
    }
    .form-label {
        margin-bottom: 1rem;
    }
</style>
<div class="content">
        <div class="form-label">
            <h2>New password:</h2>
            <input type="password" name="password" id="password" placeholder="Enter your new password" class="form-control mb-2" maxlength="40" required>
        </div>
        <div class="form-label">
            <h2>Re-enter password: </h2>
            <input type="password" name="rpassword" id="rpassword" placeholder="Enter your password again" class="form-control mb-2" maxlength="40"
                   required>
        </div>
        <input type="hidden" id="code" value="<?= $code ?>">
        <button class="btn btn-success" id="login_submit">Reset</button>
</div>
<?php
    echo $this->Html->script('/js/layui/layui.js', ['block'=> true]);
?>
<script>
    layui.use(['layer', 'jquery'], function(){
        var layer = layui.layer,
        $ = layui.jquery;

        $("#login_submit").on("click", function() {
            var password = $("#password").val();
            var rpassword = $("#rpassword").val();
            var code = $("#code").val();
            if (password == "") {
                layer.tips("Please enter your password", "#password", {
                    tipsMore: true
                });
                return;
            }
            if (rpassword == "") {
                layer.tips("Please enter your password again", "#rpassword", {
                    tipsMore: true
                });
                return;
            }
            var csrfToken = $('meta[name="csrfToken"]').attr('content');
            $.ajax({
                url: "<?=$this->Url->build('/login/resetpassword', []);?>",
                type: 'post',
                dataType: 'json',
                data: {"password": password, "rpassword": rpassword, "code": code},
                headers:{'X-CSRF-Token': csrfToken},
                success: function(res) {
                    if (res.code == 0) {
                        layer.msg("reset success", {
                            icon: 1,
                            time: 2000
                        }, function() {
                            location.href = "<?=$this->Url->build('/login', []);?>"
                        });
                    } else {
                        layer.msg(res.msg, {
                            icon: 2,
                            time: 2000
                        });
                    }
                }
            });
        });
    });
</script>
