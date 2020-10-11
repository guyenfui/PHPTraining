<html>
<head>
    <title>Laravel Form Validation From Scratch</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style type="text/css">
    body{
        background-color: #25274d;
    }
    .contact{
        padding: 4%;
        height: 400px;
    }
    .col-md-3{
        background: #ff9b00;
        padding: 4%;
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }
    .contact-info{
        margin-top:10%;
    }
    .contact-info img{
        margin-bottom: 15%;
    }
    .contact-info h2{
        margin-bottom: 10%;
    }
    .col-md-9{
        background: #fff;
        padding: 3%;
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }
    .contact-form label{
        font-weight:600;
    }
    .contact-form button{
        background: #25274d;
        color: #fff;
        font-weight: 600;
        width: 25%;
    }
    .contact-form button:focus{
        box-shadow:none;
    }
</style>
<body>
<div class="container contact">
    <br><br><br>
    <div class="row">
        <div class="col-md-3">
            <div class="contact-info">
                <h2>お問い合わせ</h2>
            </div>
        </div>
        <div class="col-md-9">
            <p>Hi, This is {{ $data['name'] }}</p>
            <p>I have some query like {{ $data['message'] }}.</p>
            <p>It would be appriciative, if you gone through this feedback.</p>
        </div>
    </div>
    <br><br><br><br>
</div>
</body>
</html>