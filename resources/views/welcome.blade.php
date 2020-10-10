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
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                <br>
            @endif
            <form action="{{ url('welcome') }}" method="post" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="contact-form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fname">名前</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="名前（ふりがな）" name="name">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">メールアドレス</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="メールアドレス" name="email">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="phone">電話番号</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="phone" placeholder="電話番号（ハイフンなし）" name="phone">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="address">住所</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" placeholder="住所" name="address">
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="type">連絡方法</label>
                        <div class="col-sm-6">
                            <div class="checkbox" style="display: inline-block;"><label style="font-size: smaller"><input id="tel" type="checkbox">電話番号</label></div>
                            <div class="checkbox" style="display: inline-block; float: right"><label style="font-size: smaller"><input id="mail" type="checkbox">メールアドレス</label></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gender">性別</label>
                        <div class="col-sm-5">
                            <div class="radio" style="display: inline-block;"><label style="font-size: smaller"><input id="male" type="radio" checked>男</label></div>
                            <div class="radio" style="display: inline-block; float: right"><label style="font-size: smaller"><input id="female" type="radio">女</label></div>
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="content">内容</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="content" id="content"></textarea>
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">送信</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br><br><br>
</div>
</body>
</html>