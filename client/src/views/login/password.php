<div id="forgot-password" class="container-fluild">
    <div class="container login-form-box">
        <h3 class="title text-center mb-5">Quên mật khẩu</h3>
        <form method="post" action="index.php?controller=password&action=password_action" class="login-form">
            <input type="text" placeholder="Mã số sinh viên" name="txtusername" class="">

            <input type="text" placeholder="Email sinh viên" name="txtemail" class="">

            <div class="forgot-pass">
                <a href="index.php?controller=login">Trở lại trang Đăng nhập</a>
            </div>

            <button class="button" name="login" type="submit">Lấy lại mật khẩu</button>
        </form>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600;700;800&display=swap');

* {
    font-family: 'JetBrains Mono', monospace;
    font-size: 62.5%;
}

#forgot-password {
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 999;
    background-color: #f0f2f5;
}

#forgot-password .login-form-box {
    width: 400px;
    margin: 0 auto;
    position: relative;
    height: auto;
    top: 50%;
    transform: translate(0, -50%);
    border-radius: 10px;
    padding: 30px;
    background-color: #fff;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

#forgot-password .login-form {
    width: 100%;
    text-align: center;
}

#forgot-password .login-form input,
#forgot-password .login-form button {
    font-size: 1.3rem;
    border-radius: 5px;
    padding: 10px;

    width: 80%;
}

#forgot-password .login-form input {
    color: #333;
    outline: none;
    border: 1px solid #dddfe2;

    margin-bottom: 15px;
}

#forgot-password .login-form button {
    color: #fff;
    border: none;
    background-color: #1877f2;
}

#forgot-password .login-form button:hover {
    background-color: #166fe5;
}

#forgot-password .login-form input:focus {
    border-color: #1b74e4;
}

#forgot-password ::placeholder {
    color: #90949c;
}

#forgot-password :-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: #90949c;
}

#forgot-password ::-ms-input-placeholder {
    /* Microsoft Edge */
    color: #90949c;
}

#forgot-password .forgot-pass a {
    font-size: 10px;
    margin-bottom: 15px;
    display: block;

    color: #1877f2;
}
</style>