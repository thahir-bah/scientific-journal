@extends('master')
@section('content')
    @php
        if (!empty($_GET['user_id']) && !empty($_GET['email_type'])) {
            $user_id = $_GET['user_id'];
            $email_type = $_GET['email_type'];
            if (!empty($_GET['status']) && !empty($_GET['id'])) {
                $action = route('login',['user_id='.$user_id,'email_type='.$email_type,'status='.$_GET['status'],'id='.$_GET['id']]);
            } elseif (!empty($_GET['status'])) {
                $action = route('login',['user_id='.$user_id,'email_type='.$email_type,'status='.$_GET['status']]);
            } elseif (!empty($_GET['invoice_id'])) {
                $action = route('login',['user_id='.$user_id,'email_type='.$email_type,'invoice_id='.$_GET['invoice_id']]);
            } else {
                $action = route('login',['user_id='.$user_id,'email_type='.$email_type]);
            }
        }else{
            $action = route('login');
        }
        $reg_data = App\SiteManagement::getMetaValue('reg_data');
        $login_focus = '';
        $register_focus = '';
        if (!empty($_GET['type'])) {
            if ($_GET['type'] == 'login') {
                $login_focus = 'autofocus';
            } elseif ($_GET['type'] == 'register') {
                $register_focus = 'autofocus';
            }
        }
    @endphp
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 float-left mt-0 pt-0">
    <div id="sj-twocolumns" class="sj-twocolumns">
        <div class="container">
            <div class="row" id="user_register">
                @if (Session::has('message'))
                    <div class="toast-holder">
                        <flash_messages :message="'{{{ Session::get('message') }}}'" :message_class="'success'" v-cloak></flash_messages>
                    </div>
                @elseif (Session::has('error'))
                    <div class="toast-holder">
                        <flash_messages :message="'{{{ Session::get('error') }}}'" :message_class="'danger'" v-cloak></flash_messages>
                    </div>
                @endif
                <div class="provider-site-wrap" v-show="loading" v-cloak><div class="provider-loader"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                    <aside id="sj-sidebarvtwo" class="sj-sidebar">
                        <div class="sj-widget sj-widgetlogin">
                            <div class="sj-widgetheading">
                                <h3>Connexion</h3>
                            </div>
                            <div class="sj-widgetcontent">
                                <form method="POST" action="{{$action}}" class="sj-formtheme sj-formlogin">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{$errors->has('email') ? old('email') : ''}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            placeholder="{{trans('prs.ph_email')}}" {{$login_focus}}>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('email')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{trans('prs.ph_pass')}}">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('password')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group sj-forgotpass">
                                            <div class="sj-checkbox">
                                                <input type="checkbox" id="remember" name="remember">
                                                <label for="remember">{{trans('prs.keep_logged_in')}}</label>
                                            </div>
                                            <a class="sj-forgorpass" href="{{ route('password.request') }}">{{trans('prs.forgot_pass')}}</a>
                                        </div>
                                        <div class="sj-btnarea">
                                            <button type="submit" class="sj-btn sj-btnactive">{{trans('prs.btn_login')}}</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Schema::hasTable('users'))
                @include('includes.rightside-menu') 
@endif
@endsection
