<div>
{{--    @include('admin.layouts.alerts.success')--}}
{{--    @include('admin.layouts.alerts.errors')--}}
    <form  wire:submit.prevent="login()">
        @csrf
        <div class="inputBx">
            <input type="text" wire:model="email" >
            <span>Login</span>
         @error('email')<span class="alert alert-danger">{{$message}}</span>@enderror
        </div>
        <div class="inputBx password">
            <input id="password-input" type="password" wire:model="password" name="password" required="required">
            <span>Password</span>
            <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
            @error('password')<span class="alert alert-danger">{{$message}}</span>@enderror
        </div>
        <label class="remember"><input type="checkbox">
            Remember</label>
        <div class="inputBx">
            <button type="submit" value="Log in" class="btn btn-primary">Log in</button>
        </div>

        <div class="fb-like" data-href="https://henkleez.com/en" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
    </form>
</div>
