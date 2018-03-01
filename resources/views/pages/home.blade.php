@extends('layouts.app')
@section('title')
<title>{{ $data['title'] }}</title>
@stop 
@section('leftContent')
<div class="col-md-4">
    <h1>Matcha en podd med din resa</h1> <p>
        Fyll i din resa så hittar vi förslag på poddar som matchar tiden och är klara lagom till att du är framme. Trevlig resa!</p>
    <form>
        <div class="form-group">
            <label>From</label>
            <input type="text" class="form-control searchbox" id="from" name="from" placeholder="Enter Location">
            <input type="hidden" class="form-control" id="fromLat" name="fromLat" placeholder="Enter Location">
            <input type="hidden" class="form-control" id="fromLng" name="fromLng" placeholder="Enter Location">
        </div>
        <div class="form-group">
            <label>To</label>
            <input type="text" class="form-control searchbox" id="to" name="to" placeholder="Enter Location">
            <input type="hidden" class="form-control" id="toLat" name="toLat" placeholder="Enter Location">
            <input type="hidden" class="form-control" id="toLng" name="toLng" placeholder="Enter Location">
        </div>
        <button type="submit" id="search" class="btn btn-default btn-block">Search</button>
    </form>

    <div class="col-md-10 col-md-offset-1 margin-top-10">
        <div class="text-center" id="icon">
            <div class="col-md-3 text-center"><div class="row"><button type="button" id="walk" class="btn-block travel-mode btn btn-default btn-md btn-circle"><i class="fa fa-male fa-lg" aria-hidden="true"></i></button><span class="pull-left"></span></div></div>
            <div class="col-md-3 text-center"><div class="row"><button type="button" id="bus" class="btn-block  active travel-mode btn btn-default btn-md btn-circle"><i class="fa fa-bus fa-lg" aria-hidden="true"></i></button><span class="pull-left"></span></div></div>
            <div class="col-md-3 text-center"><div class="row"><button type="button" id="transit" class=" btn-block travel-mode btn btn-default btn-md btn-circle"><i class="fa fa-subway fa-lg" aria-hidden="true"></i></button><span class="pull-left"></span></div></div>
            <div class="col-md-3 text-center"><div class="row"><button type="button" id="bicycle" class=" btn-block travel-mode btn btn-default btn-md btn-circle"><i class="fa fa-bicycle fa-lg" aria-hidden="true"></i></button><span class="pull-left"></span></div></div>
        </div>




    </div>

</div>

@stop
@section('rightContent')
<div class="col-md-8">
    <table class="table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Namn</th>
                <th>TID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2 SVE</td>
                <td>HEY! Vi har en podcast!

                    Filip Winther, Jacob Andersson & Linda Lagerström</td>
                <td>3:33:00</td>
            </tr>

        </tbody>
    </table>
</div>
@stop
