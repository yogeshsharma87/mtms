<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="/css/custom.css">
<script type="text/javascript" src="/vendor/components/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        <title>
            Login Page
        </title>
    </head>
    <body>
        <div class="panel panel-default login-box">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Enter Password
                </h3>
            </div>
            <div class="panel-body">
                <form action="/index/loginpost" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Username
                        </label>
                        <input name="username" type="text" class="form-control" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">
                            Password
                        </label>
                        <input name="password" type="password" class="form-control"  autocomplete="off"/>
                    </div>
                    <button type="submit" class="btn btn-default">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
