<?php
    if(isset($_COOKIE['login']) || isset($_COOKIE['remember']))
    {

    }
    else
    {
        header ('location: login.php');
    }
    if(isset($_POST['cook']))
    {
        setcookie('login');
        setcookie('remember');
        setcookie('userID');
        setcookie('userRole');
    }
?>
<!-- <script>
    if(localStorage.getItem('remember')=='true')
    {
        
    }
    else
    {
        header ('location: login.php');
    }
</script> -->