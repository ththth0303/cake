<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body {
            width:100px;
            height:100px;
            background: -webkit-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Chrome 10+, Saf5.1+ */
            background:    -moz-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* FF3.6+ */
            background:     -ms-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* IE10 */
            background:      -o-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Opera 11.10+ */
            background:         linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* W3C */
            font-family: 'Raleway', sans-serif;
        }

        p {
            color:#CCC;
        }

        .spacing {
            padding-top:7px;
            padding-bottom:7px;
        }
        .middlePage {
            width: 680px;
            height: 500px;
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        .logo {
            color:#CCC;
        }
    </style>
</head>
<body>
    <div class="middlePage">
        <div class="page-header">
            <h1 class="logo">Techulus <small>Welcome to our place!</small></h1>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">

                <div class="row">

                    <div class="col-md-5" >
                        <a href="#"><img src="http://techulus.com/buttons/fb.png" /></a><br/>
                        <a href="#"><img src="http://techulus.com/buttons/tw.png" /></a><br/>
                        <a href="#"><img src="http://techulus.com/buttons/gplus.png" /></a>
                    </div>

                    <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
                        <span class="text-danger"><?php echo $message ?></span>
                        <form class="form-horizontal" method="post" action="/cakephp/users/login">
                            <fieldset>
                                <input id="textinput" name="email" type="text" placeholder="Enter User Name" class="form-control input-md">
                                <input id="textinput" name="Password" type="password" placeholder="Enter Password" class="form-control input-md">
                                <div class="spacing"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"><small> Remember me</small></div>
                                <div class="spacing"><a href="#"><small> Forgot Password?</small></a><br/></div>
                                <button id="singlebutton" name="singlebutton" class="btn btn-info btn-sm pull-right">Sign In</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p><a href="https://github.com/arjunkomath">About</a> · Arjun</p>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>