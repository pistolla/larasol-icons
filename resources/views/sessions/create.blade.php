<x-layout bodyClass="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column login-bg  blank-page blank-page">
    <div class="row">
        <div class="col s12">
            <div class="container"><div id="login-page" class="row">
                <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                    <form role="form" method="POST" action="{{ route('login') }}" class="login-form">
                        <div class="row">
                            <div class="input-field col s12">
                                <h5 class="ml-4">Sign in</h5>
                            </div>
                        </div>
                        @csrf
                        @if (Session::has('status'))
                        <div class="alert alert-success alert-dismissible text-white" role="alert">
                            <span class="text-sm">{{ Session::get('status') }}</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10"
                                data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input id="email" type="email" class="form-control" name="email" value="{{ 'admin@material.com' }}">
                                <label for="email" class="center-align">Email</label>
                            </div>
                            @error('email')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock_outline</i>
                                <input id="password" type="password" name="password" value='{{ 'secret'}}'>
                                <label for="password">Password</label>
                            </div>
                            @error('password')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 ml-2 mt-1">
                                <p>
                                <label>
                                    <input type="checkbox" />
                                    <span>Remember Me</span>
                                </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s12">
                            <button role="button" type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                        </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small"><a href="{{ route('register') }}">Register Now!</a></p>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <p class="margin right-align medium-small"><a href="{{ route('verify') }}">Forgot password ?</a></p>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>    
</x-layout>
