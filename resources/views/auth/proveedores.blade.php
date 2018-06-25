@extends('templates.default')

@section('pagecontent')


<section style="background:#efefe9;">
        <div class="container">
            <div class="row">
                <div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>
                     <li class="active">
                     <a href="#profile" data-toggle="tab" title="welcome">
                      <span class="round-tabs one">
                              <i class="glyphicon glyphicon-user"></i>
                      </span> 
                  </a></li>

                  <li><a href="#home" data-toggle="tab" title="home">
                     <span class="round-tabs two">
                         <i class="glyphicon glyphicon-home"></i>
                     </span> 
           </a>
                 </li>
                 <li><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-gift"></i>
                     </span> </a>
                     </li>

                     <li><a href="#settings" data-toggle="tab" title="blah blah">
                         <span class="round-tabs four">
                              <i class="glyphicon glyphicon-comment"></i>
                         </span> 
                     </a></li>

                     <li><a href="#doner" data-toggle="tab" title="completed">
                         <span class="round-tabs five">
                              <i class="glyphicon glyphicon-ok"></i>
                         </span> </a>
                     </li>
                     
                     </ul></div>

                     <div class="tab-content">
                      <div class="tab-pane fade in active" id="profile">
                            <div class="step">
                                <h3 class="head text-center">Información personal</h3>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <!--Body-->
                                <div class="md-form input-field">
                                    <input type="text" name="name" id="nombre" class="form-control" value="" required>
                                    <label for="nombre"><i class="fa fa-user-o grey-text fa-lg"></i> Nombre completo</label>
                                </div>
                                <div class="md-form input-field">
                                    
                                    <input type="email" name="email" id="email" class="form-control" value="" required>
                                    <label for="email"><i class="fa fa-envelope-o grey-text fa-lg"></i> Email</label>
                                </div>
                                <div class="md-form input-field">
                                    <input type="text" name="empresa" id="empresa" class="form-control">
                                    <label for="empresa"><i class="fa fa-building grey-text fa-lg"></i> Empresa</label>
                                </div>
                                <div class="md-form input-field">
                                    <input type="text" name="tel" id="tel" class="form-control" required>
                                    <label for="tel"><i class="fa fa-phone grey-text fa-lg"></i> Teléfono</label>
                                </div>
                                <div class="md-form input-field">  
                                    <input type="password" name="password" id="defaultForm-pass" class="form-control" required>
                                    <label for="defaultForm-pass"><i class="fa fa-lock grey-text fa-lg"></i> Contraseña</label>
                                </div>
                                <div class="md-form input-field">
                                    <input type="password" name="password_confirmation" id="defaultForm-pass-confirm" class="form-control" required>
                                    <label for="defaultForm-pass-confirm"><i class="fa fa-lock grey-text fa-lg"></i> Confirmar contraseña</label>
                                </div>
                                <p>
                                  <input type="checkbox" id="terminosycondiciones" required/>
                                  <label for="terminosycondiciones">Acepto los <a href="#">términos y condiciones</a>.</label>
                                </p>
                            </div>
                        
                      </div>
                      <div class="tab-pane fade" id="home">
                          <div class="step">
                              <div class="row">
                                <div class="col-md-8">
                                    

                                        <h5>Detalles</h5>

                                            <div class="col s12">
                                              <div class="row">
                                                <div class="md-form input-field col-md-6">
                                                  <input id="nombre" name="nombre" type="text" class="validate" value="{{old('nombre')}}" required>
                                                  <label for="nombre">Nombre</label>
                                                </div>
                                                <div class="md-form input-field col-md-6">
                                                  <input id="zona" name="zona" type="text" class="validate" value="{{old('zona')}}" required>
                                                  <label for="zona">Zona</label>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="md-form input-field col-md-6">
                                                  <input id="capacidad" name="capacidad" type="text" class="validate" value="{{old('capacidad')}}" required>
                                                  <label for="capacidad">Capacidad</label>
                                                </div>
                                                <div class="md-form input-field col-md-4">
                                                  <select name="tipo" id="tipo" class="select" required>
                                                    <option value="Terraza">Terraza</option>
                                                  </select>
                                                  <label for="tipo">Tipo</label>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="input-field s12">
                                                    <label for="descripcion">Descripción</label>
                                                    <p>&nbsp;</p><p>&nbsp;</p>
                                                  <textarea id="descripcion" name="descripcion" class="materialize-textarea" required>{{old('descripcion')}}</textarea>
                                                  
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="input-field s12">
                                                    <label for="direccion">Dirección</label>
                                                    <p>&nbsp;</p><p>&nbsp;</p>
                                                  <textarea id="direccion" name="direccion" class="materialize-textarea" required>{{old('direccion')}}</textarea>
                                                  
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="input-field col-md-6">
                                                  <input id="latitud" name="latitud" type="text" class="validate" value="{{old('latitud')}}" required>
                                                  <label for="latitud">Latitud</label>
                                                </div>
                                                <div class="input-field col-md-6">
                                                  <input id="longitud" name="longitud" type="text" class="validate" value="{{old('longitud')}}" required>
                                                  <label for="longitud">Longitud</label>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="input-field col-md-6">
                                                  <input id="precio" name="precio" type="text" class="validate" value="{{old('precio')}}" required>
                                                  <label for="precio">Precio normal</label>
                                                </div>
                                                <!--div class="input-field col col-md-6">
                                                  <input id="precio_especial" namee="precio_especial" type="text" value="{{old('precio_especial')}}" class="validate">
                                                  <label for="precio_especial">Precio rebajado</label>
                                                </div-->
                                              </div>
                                              <div class="row">
                                                <div class="input-field s12">
                                                    <label for="reglamento">Reglamento</label>
                                                    <p>&nbsp;</p><p>&nbsp;</p>
                                                  <textarea id="reglamento" name="reglamento" class="materialize-textarea" required>{{old('reglamento')}}</textarea>
                                                  
                                                </div>
                                              </div>    
                                              <div class="row">
                                                <div class="col s4">
                                                    <div class="switch">
                                                        <label>
                                                          <input type="checkbox" name="habilitado" id="habilitado" checked="checked"/>
                                                          <span class="lever"></span>
                                                          
                                                        </label>
                                                      </div>
                                                  <p>      
                                                      <label for="habilitado">Habilitado</label>
                                                  </p>
                                                </div>
                                                <p>&nbsp;</p>

                                                <div class="col s4">
                                                    <div class="switch">
                                                        <label>
                                                          <input type="checkbox" name="destacado" id="destacado"/>
                                                          <span class="lever"></span>
                                                          
                                                        </label>
                                                      </div>
                                                  <p>      
                                                      <label for="destacado">Destacado</label>
                                                  </p>
                                                </div>




                                              </div>
                                              
                                            </div>


                                    
                                
                                </div>

                                <div class="col-md-4">

                                        <h5>Catálogos</h5>
                                        <div>
                                            @if($servicios)
                                            @foreach($servicios as $servicio)
                                              <div class="row">
                                                <div class="col s6">
                                                  <p>
                                                      <input type="checkbox" name="servicio[]" value="{{$servicio->id}}" id="cat{{$servicio->id}}"/>
                                                      <label for="cat{{$servicio->id}}">{{$servicio->nombre}}</label>
                                                  </p>
                                                </div>
                                              </div>
                                            @endforeach
                                            @endif
                                        </div>

                                      


                                    
                                        <h5>Imágen destacada</h5>
                                        <div>
                                              <div class="file-field input-field">
                                                  <div class="btn">
                                                    <span>Subir</span>
                                                    <input type="file" name="imagen">
                                                  </div>
                                                  <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                  </div>
                                                </div>
                                        </div>

                                      


                                    
                                        <h5 >Galería</h5>
                                        <input name="poplets" type="hidden" class="popletsnum">
                                        <div class="popletsinput">
                                          <div class="file-field input-field poplet1">
                                              <div class="btn">
                                                <span>Subir</span>
                                                <input type="file" name="poplet1">
                                              </div>
                                              <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                              </div>
                                            </div>

                                            <div class="file-field input-field poplet2" style="display: none;">
                                              <div class="btn">
                                                <span>Subir</span>
                                                <input type="file" name="poplet2">
                                              </div>
                                              <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                              </div>
                                            </div>


                                            <div class="file-field input-field poplet3" style="display: none;">
                                              <div class="btn">
                                                <span>Subir</span>
                                                <input type="file" name="poplet3">
                                              </div>
                                              <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                              </div>
                                            </div>

                                            <div class="file-field input-field poplet4" style="display: none;">
                                              <div class="btn">
                                                <span>Subir</span>
                                                <input type="file" name="poplet4">
                                              </div>
                                              <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                              </div>
                                            </div>

                                        </div>
                                        <div class="text-right popletscontrols">
                                            <a class="minus" style="display: none;" onclick="popletremove();"><i class="fa fa-minus fa-2x" aria-hidden="true"></i></a>
                                        <a class="plus" onclick="popletappend();"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
                                        </div>
                                        


                                    <script>
                                        var poplet=1;
                                        function popletappend(){
                                            poplet++;
                                            $( ".poplet"+poplet ).fadeIn();
                                            
                                            $('.minus').fadeIn();
                                            $('.popletsnum').val(poplet);
                                            if(poplet>=4){
                                                $('.plus').fadeOut();
                                            }
                                        }
                                        function popletremove(){
                                            $( ".poplet"+poplet ).fadeOut();
                                            poplet--;
                                            if(poplet<2){
                                                $('.minus').fadeOut();
                                            }
                                            if(poplet<5){
                                                $('.plus').fadeIn();
                                            }
                                            $('.popletsnum').val(poplet);
                                        }
                                    </script>




                                </div>
                            </div>
                          </div>
                          
                      </div>
                      <div class="tab-pane fade" id="messages">
                          <h3 class="head text-center">Bootsnipp goodies</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="settings">
                          <h3 class="head text-center">Drop comments!</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="doner">
  <div class="text-center">
    <i class="img-intro icon-checkmark-circle"></i>
</div>
<h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
<p class="narrow text-center">
  Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
</p>
</div>
<div class="clearfix"></div>
</div>

</div>
</div>
</div>
</section>

@endsection