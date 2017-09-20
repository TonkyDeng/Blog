<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/5
 * Time: 1:54
 */
?>
<link href="../css/login.css" type="text/css" rel="stylesheet"/>
<body>
    <span id="win">
        <h2>Login My Blog</h2>
        <form action="safe.php">
            <label class="label" for="in_user">Name:</label>
            <input class="in" id="in_user" name="user" type="text" />
            <label class="label" style="top: 145px;" for="in_password">Password:</label>
            <input class="in" id="in_password" style="top: 130px;" name="password" type="password"/>
            <input id="sub" type="submit" value="login"/>
        </form>
        <footer style="position: absolute;bottom: 10px;right: 10px;">@code by vee</footer>
    </span>
</body>

