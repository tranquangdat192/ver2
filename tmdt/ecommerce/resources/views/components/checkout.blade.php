@extends('templates.page')
@section('content')
    <div id="checkout" class="information">
        <div class="container">
            <div class="breadcrumb">
                Home / Desktop / Checkout Information
            </div>
            @if($cart['count'] == 0)
                <div class="col-md-9">
                    No product in your cart
                </div>
            @else
                <div class="col-md-9">
                    <div class="title">
                        Checkout Information
                    </div>
                    <hr class="left">
                    @if(!Auth::check())
                        <div class="step" id="info">
                            <div class="description">
                                <span>STEP 1 :</span>
                                <span>Check Out Information</span>
                            </div>
                            <div class="detail active">
                                <div class="col-md-6 content">
                                    <div class="row">
                                        <div class="name">
                                            NEW CUSTOMER
                                        </div>
                                        <div>
                                            Checkout Option
                                        </div>
                                        <div>
                                            <input name="account" type="radio" value="register" checked> REGISTER ACCOUNT
                                        </div>
                                        <div>
                                            <input name="account" type="radio" value="guest"> GUEST ACCOUNT
                                        </div>
                                        <div class="account">
                                            <div class="form-group">
                                                <label for="fullname" class="col-sm-5 col-form-label">Name<span class="red">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control-plaintext" id="fullname" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group">
                                                <label for="emailRegister" class="col-sm-5 col-form-label">Email Address<span class="red">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="email" class="form-control-plaintext" id="emailRegister" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group password">
                                                <label for="passwordRegister" class="col-sm-5 col-form-label">Password<span class="red">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control-plaintext" id="passwordRegister" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group comfirm">
                                                <label for="confirm" class="col-sm-5 col-form-label">Confirm Password<span class="red">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control-plaintext" id="confirm" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="button text-center continueStep">
                                            <div class="background-button">
                                                <span>CONTINUE</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-1 content">
                                    <div class="name">
                                        RETURNING CUSTOMER
                                    </div>
                                    <p>
                                        I’m a retuning customer
                                    </p>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email<span class="red">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control-plaintext" id="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 col-form-label">Password<span
                                                    class="red">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control-plaintext" id="password">
                                        </div>
                                    </div>
                                    <p>
                                        Forgot your password ?
                                    </p>
                                    <div class="button button-style text-center loginButton">
                                        <div class="background-button">
                                            <span>Log in</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    @endif
                    <div class="step" id="billing">
                        <div class="description">
                            <span>STEP @if(Auth::check())1 @else 2 @endif:</span>
                            <span>Billing Information</span>
                        </div>
                        <div class="detail @if(Auth::check())active @endif">
                            <div class="form-group">
                                <label for="telephone" class="col-sm-5 col-form-label">Telephone Number<span class="red">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control-plaintext" id="telephone" autocomplete="off">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label for="address" class="col-sm-5 col-form-label">Address<span class="red">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control-plaintext" id="address" autocomplete="off">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="button text-center continueStep">
                                <div class="background-button">
                                    <span>CONTINUE</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="step" id="delivery">
                        <div class="description">
                            <span>STEP @if(Auth::check())2 @else 3 @endif:</span>
                            <span>Delivery Information</span>
                        </div>
                        <div class="detail">
                            <div class="form-group">
                                <h1>Free ship</h1>
                            </div>
                            <div class="button text-center continueStep">
                                <div class="background-button">
                                    <span>CONTINUE</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="step" id="paymentMethod">
                        <div class="description">
                            <span>STEP @if(Auth::check())3 @else 4 @endif :</span>
                            <span>Payment Methods</span>
                        </div>
                        <div class="detail">
                            <div class="form-group">
                                <h1>Spot cash</h1>
                            </div>
                            <div class="button text-center continueStep">
                                <div class="background-button">
                                    <span>CONTINUE</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="step" id="confirmOder">
                        <div class="description">
                            <span>STEP @if(Auth::check())4 @else 5 @endif :</span>
                            <span>Confirm Order</span>
                        </div>
                        <div class="detail">
                            <div class="button text-center continueStep" style="margin-top: 10px">
                                <div class="background-button">
                                    <span>Payment</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-3">
                @include('templates.sidebar')
            </div>
        </div>
    </div>
@endsection