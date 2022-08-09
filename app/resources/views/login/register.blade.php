
@extends('login.layouts.header')

<div class="container">
    <form action="/api/auth/register/store" method="post">
        @csrf <!-- {{ csrf_field() }} -->

        <div class="form-outline mb-4">
            <input type="text" name="name" class="form-control"/>
            <label class="form-label">Enter Name</label>
        </div>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control" />
            <label class="form-label">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" name="password" class="form-control" />
            <label class="form-label" >Password</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" name="re-password" class="form-control" />
            <label class="form-label" >Retype Password</label>
        </div>


        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


    </form>
</div>
@extends('login.layouts.footer')
