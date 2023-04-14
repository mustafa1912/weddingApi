@extends('layouts.master')
@section('css')
@endsection
@section('title')
    client

@endsection
@section('page-header')
<livewire:team.team-component xmlns:livewire="http://www.w3.org/1999/html"/>
<livewire:scripts/>
<script>
    window.addEventListener('close-modal', event => {

        $('#teamModal').modal('hide');
        $('#update').modal('hide');
        $('#deleteteam').modal('hide');

    })
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
