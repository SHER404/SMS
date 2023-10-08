@include('layout.includes.settings')
@include('layout.includes.header')
@if(auth()->user()->hasRole('GateKeeper'))
                           
@else
@include('layout.includes.sidebar')
@endif
@yield('content')
@include('layout.includes.footer')
