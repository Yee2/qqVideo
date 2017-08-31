@extends('admin.Layout.app')
@section('body')
    <div class="am-g">
        <div class="am-u-md-3 am-u-sm-centered">
            <div class="am-vertical-align" style="height: 640px;">
                <div class="am-vertical-align-middle" style="width:100%;">
                    <form class="am-form">
                        <fieldset class="am-form-set">
                            <input type="text" placeholder="账号">
                            <input type="password" placeholder="密码">
                            {{csrf_field()}}
                        </fieldset>
                        <button type="submit" class="am-btn am-btn-primary am-btn-block">登录</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        $(function(){
            $('form').submit(function(e){
                e.preventDefault()
                $.ajax({
                    url: "{{route('admin.Gust.login')}}",
                    type: "post",
                    data: $(this).serializeArray(),
                    success: function(res){

                    }
                })
            })
        })
    </script>
@endsection
