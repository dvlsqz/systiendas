@extends('master')
@section('title', 'Carrito de Compras')

@section('content')
<div class="cart mtop32">
    <div class="container">        
        @if(count(collect($items)) == "0")
            <div class="no_items shadow">
                <div class="inside">
                    <p><img src="{{ url('/static/imagenes/empty-cart.png') }}"></p>
                    <p><strong>Hola {{ Auth::user()->name }}</strong>, aun no tienes nada en tu carrito de compras, anímate a agregar uno de nuestros increibles productos</p>
                    <p><a href="{{ url('/store') }}">Ir a la tienda</a></p>
                </div>
            </div>
        @else
            <div class="items mtop32">                
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel">
                            <div class="header">
                                <h2 class="title"><i class="fas fa-shopping-cart"></i> Carrito de Compras </h2>
                            </div>
                            <div class="inside">
                                <table class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td width="80"></td>
                                            <td><strong>PRODUCTO</strong></td>
                                            <td width="160"><strong>CANTIDAD</strong></td>
                                            <td width="124"><strong>SUBTOTAL</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        <tr>
                                            <td>
                                                <a href="{{ url('/cart/item/'.$item->id.'/delete') }}" class="btn-delete"> <i class="far fa-trash-alt"></i> </a>
                                            </td>
                                            <td>
                                                <img src="{{ url('/uploads/'.$item->getProduct->file_path.'/t_'.$item->getProduct->image) }}" class="img-fluid rounded">
                                            </td>
                                            <td>
                                                <a href="{{ url('/product/'.$item->getProduct->id.'/t_'.$item->getProduct->slug) }}">
                                                    {{ $item->label_item }}
                                                    
                                                    <div class="price_discount">
                                                        Precio: 

                                                        @if($item->discount_status == "1")
                                                            <span class="price_initial">{{ config('cms.currency').number_format($item->price_initial, 2, '.', ',' ) }} </span> /
                                                        @endif

                                                        <span class="price_discount_unit">
                                                            {{ config('cms.currency').number_format($item->price_unit , 2, '.', ',' ) }} 

                                                            @if($item->discount_status == "1")
                                                                ({{ $item->discount}}% de descuento)
                                                            @endif 

                                                        </span>
                                                    </div>
                                                    
                                                </a>
                                            </td>
                                            <td>
                                                <div class="form_quantity">
                                                    {!! Form::open(['url' => '/cart/item/'.$item->id.'/update' ]) !!}
                                                    {!! Form::number('quantity', $item->quantity, ['min' => '1', 'class' => 'form-control'] ) !!} 
                                                    <button type="submit"> <i class="far fa-save"></i> </button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                            <td><strong>{{ config('cms.currency').' '.number_format($item->total, 2, '.', ',' ) }}</strong></td>
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="3"></td>
                                            <td><strong>Subtotal: </strong></td>
                                            <td><strong>{{ config('cms.currency').number_format($order->getSubtotal() , 2, '.', ',' ) }}</strong> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td><strong>Envió: </strong></td>
                                            <td><strong>{{ config('cms.currency').number_format($shipping , 2, '.', ',' ) }}</strong> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td><strong>Total a pagar: </strong></td>
                                            <td><strong>{{ config('cms.currency').number_format($order->total , 2, '.', ',' ) }}</strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-3">
                        {!! Form::open(['url' => '/cart']) !!}
                        <div class="panel">
                            <div class="header">
                                <h2 class="title"><i class="fas fa-map-marker"></i> Dirección de envió </h2>
                            </div>
                            <div class="inside">
                                @if(!is_null(Auth::user()->getAddressDefault()))
                                    <p style="margin_bottom: 2px"><strong> Departamento: </strong> {{ Auth::user()->getAddressDefault->getState->name }} </p>
                                    <p><strong> Municipio: </strong> {{ Auth::user()->getAddressDefault->getCity->name }} </p>
                                    <p> 
                                        <strong> Dirección: </strong>
                                        {{ kvfj(Auth::user()->getAddressDefault->addr_info, 'add1') }} 
                                        zona {{ kvfj(Auth::user()->getAddressDefault->addr_info, 'add2') }}
                                        {{ kvfj(Auth::user()->getAddressDefault->addr_info, 'add3') }}
                                    </p>
                                    <p> 
                                        <strong> Referencia: </strong>
                                        {{ kvfj(Auth::user()->getAddressDefault->addr_info, 'add4') }}
                                    </p>                                
                                    <a href=" {{ url('/account/address') }}" class="btn btn-dark mtop16"> Cambiar Dirección de Envió</a>
                                @else
                                    <p>Su usuario no tienen direcciones de envió registradas</p>
                                    <a href=" {{ url('/account/address') }}" class="btn btn-dark mtop16"> Agregar Dirección de Envió</a>
                                @endif
                            </div>
                        </div>

                        <div class="panel mtop16">
                            <div class="header">
                                <h2 class="title"><i class="fas fa-envelope-open"></i> Más opciones </h2>
                            </div>
                            <div class="inside">
                                <label for="order_msg">Enviar comentario:</label>
                                {!! Form::textarea('order_msg', null, ['class' => 'form-control', 'rows' => 3]) !!}
                            </div>
                        </div>
                        
                        @if(!is_null(Auth::user()->getAddressDefault()))
                            <div class="panel mtop16">
                                <div class="inside">
                                    {!! Form::submit('Completar Orden', ['class' => 'btn btn-success w-100']) !!}
                                </div>
                            </div>
                        @endif
                        {!! Form::close() !!}
                    </div>
                    
                </div>
            </div>
        @endif        
    </div>
</div>
@stop