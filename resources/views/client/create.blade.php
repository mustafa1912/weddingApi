@extends('layouts.master')
@section('css')
@endsection
@section('title')
    client

@endsection
@section('page-header')
<livewire:client.client xmlns:livewire="http://www.w3.org/1999/html"/>

<livewire:scripts/>
<script>
    window.addEventListener('close-modal', event => {

        $('#clientModal').modal('hide');
        $('#update').modal('hide');

    })
</script>
@endsection
