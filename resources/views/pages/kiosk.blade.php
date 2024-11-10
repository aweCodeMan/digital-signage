@extends('layouts.kiosk')

@section('title')
    {{ $display->name }}
@endsection

@section('content')
    <livewire-kiosk-view :display="$display"></livewire-kiosk-view>
@endsection
