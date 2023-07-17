@extends('errors::minimal')

@section('title', __('Hata'))
@section('code', '405')
@section('message', $exception->getMessage() ?: "Hata")
