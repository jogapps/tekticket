@extends('backend.auth.layout.default')

@section('title','TekTicket Administrator')

@section('body')
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @include('backend.includes.alert')
                <form action="{{ route('backend.login') }}" method="post">
                    @csrf
                    <h1>Administrator? Login</h1>
                    <div>
                        <input type="email" class="form-control" placeholder="Email Address" name="email" required/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required/>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success submit">Log in</button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div>
                            <h1><i class="fa fa-paw"></i>TekTicket!</h1>
                            <p>©{{ now()->format('Y') }} All Rights Reserved. TekTicket. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
