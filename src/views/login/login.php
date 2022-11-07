<div id="login-admin" class="container-fluild">
    <div class="container login-form-box">
        <h3 class="title text-center mb-5">Đăng nhập ADMIN</h3>
        <form method="post" action="index.php?controller=login&action=login_action" class="login-form">
            <input type="text" placeholder="Tên đăng nhập" name="txtusername" class="">

            <input type="password" placeholder="Mật khẩu" name="txtpassword" class="">

            <button class="button" name="login" type="submit">Đăng nhập</button>
        </form>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600;700;800&display=swap');

* {
    font-family: 'JetBrains Mono', monospace;
    font-size: 62.5%;
}

#login-admin {
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

#login-admin .login-form-box {
    width: 400px;
    margin: 0 auto;
    position: relative;
    top: 50%;
    transform: translate(0, -50%);
    border-radius: 10px;
    padding: 30px;
    background-color: #fff;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

#login-admin .login-form {
    width: 100%;
    text-align: center;
}

#login-admin .login-form input,
#login-admin .login-form button {
    font-size: 1.3rem;
    border-radius: 5px;
    padding: 10px;

    width: 80%;
}

#login-admin .login-form input {
    color: #333;
    outline: none;
    border: 1px solid #dddfe2;

    margin-bottom: 15px;
}

#login-admin .login-form button {
    color: #fff;
    border: none;
    background-color: #1877f2;
}

#login-admin .login-form button:hover {
    background-color: #166fe5;
}

#login-admin .login-form input:focus {
    border-color: #1b74e4;
}

#login-admin ::placeholder {
    color: #90949c;
}

#login-admin :-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: #90949c;
}

#login-admin ::-ms-input-placeholder {
    /* Microsoft Edge */
    color: #90949c;
}
</style>