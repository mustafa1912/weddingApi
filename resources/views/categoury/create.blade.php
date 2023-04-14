@extends('layouts.master')
@section('css')
@endsection
@section('title')
    client

@endsection
@section('page-header')
<livewire:categoury.categoury xmlns:livewire="http://www.w3.org/1999/html"/>

<livewire:scripts/>
<script>
    window.addEventListener('close-modal', event => {

        $('#categouryModal').modal('hide');
        $('#update').modal('hide');
        $('#deleteModal').modal('hide');

    })
</script>
@endsection
