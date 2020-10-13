<!DOCTYPE html>
<html>
<head>
    <title>How Send an Email in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
        .has-error
        {
            border-color:#cc0000;
            background-color:#ffff99;
        }
    </style>
</head>
<body>
<br />
<br />
<br />
<div class="container box">
    <h3 align="center">How Send an Email in Laravel</h3><br />
{{--    @if (count($errors) > 0)--}}
{{--        <div class="alert alert-danger">--}}
{{--            <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="alert alert-success alert-block">--}}
{{--            <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </div>--}}
{{--    @endif--}}

    <form method="post" action="/postMail">
        {{ csrf_field() }}


{{--        <div class="form-group">--}}
{{--            <label>Enter Your Email</label>--}}
{{--            <input type="text" name="email" class="form-control" value="" />--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label>Enter Your Name</label>--}}
{{--            <input type="text" name="subject" class="form-control" value="" />--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label>Enter Your Message</label>--}}
{{--            <textarea name="message" class="form-control"></textarea>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <input type="submit" name="send" class="btn btn-info" value="send message" />--}}
{{--        </div>--}}

        <div class="contact-form">
            <h3 align="center"> in Laravel</h3><br />
            <div class="form-group">
                <label class="control-label col-sm-2" for="fname">名前(必須)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="名前（ふりがな）" name="name">
{{--                    <span class="text-danger">{{ $errors->first('name') }}</span>--}}
                </div>
            </div>
            <div class="form-group" >

                <label class="control-label col-sm-4" for="email">メールアドレス(必須)</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="メールアドレス" name="email">
{{--                    <span class="text-danger">{{ $errors->first('email') }}</span>--}}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="phone">電話番号(必須)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" placeholder="電話番号（ハイフンなし）" name="phone">
{{--                    <span class="text-danger">{{ $errors->first('phone') }}</span>--}}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="address">住所</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" placeholder="住所" name="subject">
{{--                    <span class="text-danger">{{ $errors->first('address') }}</span>--}}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="type">連絡方法(必須)</label>
                <div class="col-sm-6">
                    <div class="checkbox" style="display: inline-block;"><label style="font-size: smaller"><input id="tel" type="checkbox" name="type" value="電話番号">電話番号</label></div>
                    <div class="checkbox" style="display: inline-block; float: right"><label style="font-size: smaller"><input id="mail" type="checkbox" name="type" value="メールアドレス">メールアドレス</label></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">性別(必須)</label>
                <div class="col-sm-5">
                    <input type="radio" name="gender" value="男" checked>男
                    <input type="radio" name="gender" value="女">女
                    {{--                            <div class="radio" style="display: inline-block;"><label style="font-size: smaller"><input id="male" type="radio" checked>男</label></div>--}}
                    {{--                           <div class="radio" style="display: inline-block; float: right"><label style="font-size: smaller"><input id="female" type="radio">女</label></div>--}}
{{--                    <span class="text-danger">{{ $errors->first('gender') }}</span>--}}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="message">内容(必須)</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" name="message" id="message"></textarea>
{{--                    <span class="text-danger">{{ $errors->first('message') }}</span>--}}
                </div>
            </div>
{{--            <div class="form-group">--}}
{{--                <div class="col-sm-offset-2 col-sm-10">--}}
{{--                    <button type="submit"name="send" class="btn btn-default">送信</button>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="form-group">--}}
            <input type="submit" name="send" class="btn btn-info" value="send message" />
        </div>
        </div>
    </form>
</div>
</body>
</html>