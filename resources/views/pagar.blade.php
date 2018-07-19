@extends('templates.default')


@section('header')

@endsection
@section('pagecontent')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">PAGAR</h1>
     </div>
</section>
<div class="container">
    <div class="row">
            <div class="col-xs-12 col-md-6">
        
        
                    <!-- CREDIT CARD FORM STARTS HERE -->
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table" >
                            <div class="row display-tr" >
                                <h3 class="panel-title display-td" >Detalles de pago</h3>
                                <div class="display-td" >                            
                                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                </div>
                            </div>                    
                        </div>
                        <div class="panel-body">
                                <form action="{{url('pagar')}}" method="POST" id="payment-form">
                                        <input type="hidden" id="token_id" name="token_id" />
                                        <input type="hidden" name="name" value="{{$user->name}}">
                                        <input type="hidden" name="email" value="{{$user->email}}">
                                        <input type="hidden" name="phone" value="{{$user->tel}}">
                                    {!!csrf_field()!!}
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                                <input 
                                                    type="tel"
                                                    class="form-control browser-default"
                                                    placeholder="Número de tarjeta valido"
                                                    autocomplete="off"
                                                    data-openpay-card="card_number"
                                                    required autofocus 
                                                />     
                                        </div>                            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                                <input 
                                                    type="tel"
                                                    class="form-control browser-default"
                                                    placeholder="Nombre del propietario"
                                                    autocomplete="off"
                                                    data-openpay-card="holder_name"
                                                    required autofocus 
                                                />           
                                        </div>                            
                                    </div>
                                 </div>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4">
                                        <div class="form-group">
                                            <input 
                                                type="tel" 
                                                class="form-control browser-default" 
                                                placeholder="MM"
                                                autocomplete="off"
                                                data-openpay-card="expiration_month"
                                                required 
                                            />
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-md-4">
                                        <div class="form-group">
                                            <input 
                                                type="tel" 
                                                class="form-control browser-default" 
                                                placeholder="AA"
                                                autocomplete="off"
                                                data-openpay-card="expiration_year"
                                                required 
                                            />
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                            <input 
                                                type="tel" 
                                                class="form-control browser-default"
                                                placeholder="CVV"
                                                autocomplete="off"
                                                data-openpay-card="cvv2"
                                                required
                                            />
                                            <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="subscribe btn btn-success btn-lg btn-block" type="button">Pagar</button>
                                    </div>
                                </div>
                                <div class="row" style="display:none;">
                                    <div class="col-xs-12">
                                        <p class="payment-errors"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>            
                    <!-- CREDIT CARD FORM ENDS HERE -->
                    
                    
                </div>
    </div>
</div>

@endsection