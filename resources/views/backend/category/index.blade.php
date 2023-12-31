@extends('backend.dashboard.layouts.master')
@section('title','Category Settings')
@section('content')

<hr>
<a href='' class='btn btn-primary' >Create</a>
<hr>
<table class='table'>
<tr>
  <th> S.N </th>
  <th> Name </th>
  <th> Type </th>
  <th> Status </th>
</tr>

<tr>
@forelse($categories as $cat)
  <td>{{ $loop->iteration}}</td>
  <td> {{ $cat->category_name}}</td>
  <td> {{ $cat->type}}</td>
  <td> {{ $cat->status}}</td>
@empty
<tr><td>
  NO Records!!
</td></tr>
@endforelse  
 

</tr>

</table>


@endsection