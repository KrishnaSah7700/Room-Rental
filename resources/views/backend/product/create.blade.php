@extends('backend.dashboard.layouts.master')
@section('title','Category Settings')
@section('content')


<form>
<select name='category_id'>
    @forelse( $categories as $category)
        <option value='{{ $category->id }}'>{{ $category->category_name }} </option>
    @empty
    <option value=''>NO category </option>
    @endforelse
</form>


@endsection