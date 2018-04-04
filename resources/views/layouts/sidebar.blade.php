<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Menú principal</li>
                <li>
                    <a href="{{ URL::route('principal') }}" class="waves-effect">
                        <i class="zmdi zmdi-home"></i><span> Inicio </span>
                    </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect @if(Route::getCurrentRoute()->getName() == 'trabajadores.index' or 
                                Route::getCurrentRoute()->getName() == 'trabajadores.show' or 
                                Route::getCurrentRoute()->getName() == 'trabajadores.edit' or 
                                Route::getCurrentRoute()->getName() == 'trabajadores.new')) active @endif ">
                        <i class="zmdi zmdi-male-female"></i> 
                        <span> Trabajadores </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li @if(Route::getCurrentRoute()->getName() == 'trabajadores.index' or 
                                Route::getCurrentRoute()->getName() == 'trabajadores.show' or 
                                Route::getCurrentRoute()->getName() == 'trabajadores.edit')) class="active" @endif>
                            <a href="{{ URL::route('trabajadores.index') }}">Listado</a>
                        </li>
                        <li @if(Route::getCurrentRoute()->getName() == 'trabajadores.create')) class="active" @endif>
                            <a href="{{ URL::route('trabajadores.create') }}">Agregar</a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect @if(Route::getCurrentRoute()->getName() == 'cursos.index' or 
                    Route::getCurrentRoute()->getName() == 'cursos.show' or 
                    Route::getCurrentRoute()->getName() == 'cursos.edit' or 
                    Route::getCurrentRoute()->getName() == 'cursos.new')) active @endif ">
                        <i class="zmdi zmdi-book"></i> 
                        <span> Cursos </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li @if(Route::getCurrentRoute()->getName() == 'cursos.index' or 
                            Route::getCurrentRoute()->getName() == 'cursos.show' or 
                            Route::getCurrentRoute()->getName() == 'cursos.edit')) class="active" @endif>
                            <a href="{{ URL::route('cursos.index') }}">Listado</a>
                        </li>
                        <li @if(Route::getCurrentRoute()->getName() == 'cursos.create')) class="active" @endif>
                            <a href="{{ URL::route('cursos.create') }}">Agregar</a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect @if(Route::getCurrentRoute()->getName() == 'delegados.index' or 
                    Route::getCurrentRoute()->getName() == 'delegados.show' or 
                    Route::getCurrentRoute()->getName() == 'delegados.edit' or 
                    Route::getCurrentRoute()->getName() == 'delegados.new')) active @endif ">
                        <i class="zmdi zmdi-assignment-account"></i> 
                        <span> Delegados </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li @if(Route::getCurrentRoute()->getName() == 'delegados.index' or 
                            Route::getCurrentRoute()->getName() == 'delegados.show' or 
                            Route::getCurrentRoute()->getName() == 'delegados.edit')) class="active" @endif>
                            <a href="{{ URL::route('delegados.index') }}">Listado</a>
                        </li>
                        <li @if(Route::getCurrentRoute()->getName() == 'delegados.create')) class="active" @endif>
                            <a href="{{ URL::route('delegados.create') }}">Agregar</a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect @if(Route::getCurrentRoute()->getName() == 'inspecciones.index' or 
                    Route::getCurrentRoute()->getName() == 'inspecciones.show' or 
                    Route::getCurrentRoute()->getName() == 'inspecciones.edit' or 
                    Route::getCurrentRoute()->getName() == 'inspecciones.new')) active @endif ">
                        <i class="zmdi zmdi-assignment-check"></i> 
                        <span> Inspecciones </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li @if(Route::getCurrentRoute()->getName() == 'inspecciones.index' or 
                            Route::getCurrentRoute()->getName() == 'inspecciones.show' or 
                            Route::getCurrentRoute()->getName() == 'inspecciones.edit')) class="active" @endif>
                            <a href="{{ URL::route('inspecciones.index') }}">Listado</a>
                        </li>
                        <li @if(Route::getCurrentRoute()->getName() == 'inspecciones.create')) class="active" @endif>
                            <a href="{{ URL::route('inspecciones.create') }}">Agregar</a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect @if(Route::getCurrentRoute()->getName() == 'notificaciones.index' or 
                    Route::getCurrentRoute()->getName() == 'notificaciones.show' or 
                    Route::getCurrentRoute()->getName() == 'notificaciones.edit' or 
                    Route::getCurrentRoute()->getName() == 'notificaciones.new')) active @endif ">
                        <i class="zmdi zmdi-tag"></i> 
                        <span> Inducciones </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li @if(Route::getCurrentRoute()->getName() == 'notificaciones.index' or 
                            Route::getCurrentRoute()->getName() == 'notificaciones.show' or 
                            Route::getCurrentRoute()->getName() == 'notificaciones.edit')) class="active" @endif>
                            <a href="{{ URL::route('notificaciones.index') }}">Listado</a>
                        </li>
                        <li @if(Route::getCurrentRoute()->getName() == 'notificaciones.create')) class="active" @endif>
                            <a href="{{ URL::route('notificaciones.create') }}">Agregar</a>
                        </li>
                    </ul>
                </li>
                {{--
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect @if(Route::getCurrentRoute()->getName() == 'politicas.index' or 
                    Route::getCurrentRoute()->getName() == 'politicas.show' or 
                    Route::getCurrentRoute()->getName() == 'politicas.edit' or 
                    Route::getCurrentRoute()->getName() == 'politicas.new')) active @endif ">
                        <i class="zmdi zmdi-library"></i> 
                        <span> Políticas </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li @if(Route::getCurrentRoute()->getName() == 'politicas.index' or 
                            Route::getCurrentRoute()->getName() == 'politicas.show' or 
                            Route::getCurrentRoute()->getName() == 'politicas.edit')) class="active" @endif>
                            <a href="{{ URL::route('politicas.index') }}">Listado</a>
                        </li>
                        <li @if(Route::getCurrentRoute()->getName() == 'politicas.create')) class="active" @endif>
                            <a href="{{ URL::route('politicas.create') }}">Agregar</a>
                        </li>
                    </ul>
                </li>
                --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect @if(Route::getCurrentRoute()->getName() == 'formaciones.index' or 
                    Route::getCurrentRoute()->getName() == 'formaciones.show' or 
                    Route::getCurrentRoute()->getName() == 'formaciones.edit' or 
                    Route::getCurrentRoute()->getName() == 'formaciones.new')) active @endif ">
                        <i class="zmdi zmdi-balance"></i> 
                        <span> Formación CSSL </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li @if(Route::getCurrentRoute()->getName() == 'formaciones.index' or 
                            Route::getCurrentRoute()->getName() == 'formaciones.show' or 
                            Route::getCurrentRoute()->getName() == 'formaciones.edit')) class="active" @endif>
                            <a href="{{ URL::route('formaciones.index') }}">Listado</a>
                        </li>
                        <li @if(Route::getCurrentRoute()->getName() == 'formaciones.create')) class="active" @endif>
                            <a href="{{ URL::route('formaciones.create') }}">Agregar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ URL::route('gestionSiaho') }}" class="waves-effect" @if(Route::getCurrentRoute()->getName() == 'gestionSiaho') active @endif ">
                        <i class="zmdi zmdi-collection-pdf"></i><span> Gestión HSI </span>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->