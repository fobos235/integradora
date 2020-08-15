@if(Auth::guest())
<?php
header('location:'.route('login'));
exit;
?>
@endif
@extends('layouts.principal')
@section('contenido')
    

    