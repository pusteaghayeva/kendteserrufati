
@extends('layouts.frontend')
@section('title', 'Hesabat')
@section('content')
  <div class="report container">
  
    <table class="table table-striped coll-table">
        <tbody>
        @if(!empty($report[0]))
            @foreach($report as $report_item)
            <tr class="coll-row">
                <th scope="row " style="background-color: #fff;">
                    <a href="{{route('frontend.single_report', ['report'=>$report_item->id])}}" class="row-link">{{$report_item->title}}</a></th>
                <td>{{ explode(' ', $report_item->created_at)[0] }}</td>
            </tr>            
            @endforeach
        @endif


        </tbody>
    </table>

</div>

@endsection