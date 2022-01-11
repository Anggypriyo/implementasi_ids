@extends('layout.main_layout')

@section('page_tittle','SSE')

@section('tittle','SSE')

@section('content')
<div class="card">
<div id="result"></div>
</div>
@endsection

@section('custom_js')
<script>
if(typeof(EventSource) !== "undefined") {
  var source = new EventSource("sse/datasse");
  source.onmessage = function(event) {
    document.getElementById("result").innerHTML += event.data + "<br>";
  };
} else {
  document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>

@endsection