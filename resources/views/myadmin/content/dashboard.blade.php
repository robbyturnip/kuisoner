@extends('myadmin.index')

@section('content')

<div id="row" style="top:30px !important;; height:100% !important; width:100% !important; position: relative !important;"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart(){
  var data = "";
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      type: "post",
      url: "/api/home",
      dataType: "json",
      async: false,
      success: function(respons){
        data = respons;
      },
      error:function(error){
        console.log(error);
      }
  });
  var jumlah_fasilitas = data.length;
  console.log(jumlah_fasilitas);
  for(i=0;i<jumlah_fasilitas;i++){
    var fasilitas = data[i]['fasilitas'];
    fasilitas = fasilitas.replace(" ", "_")
    $('#row').append('<div id="'+fasilitas+'" style="height:auto !important; width:auto; display:inline-block; position: relative;"><h1 style="margin:10px">'+fasilitas+'<\h1></div>');
    var list_penunjang = data[i]['list_penunjang'];
    var jumlah_penunjang = list_penunjang.length;
    for(x=0;x<jumlah_penunjang;x++){
      var penunjang = list_penunjang[x]['title'];
      $('#'+fasilitas).append('<div class="col-md-4 col-sm-4" id="chart_div_'+fasilitas+'_'+penunjang+'_'+x+'"></div>'); 
      var title = list_penunjang[x]['title'];
      var data_penunjang = list_penunjang[x]
      var datas = new google.visualization.DataTable(data_penunjang);
      var chart = new google.visualization.PieChart(document.getElementById('chart_div_'+fasilitas+'_'+penunjang+'_'+x));
      chart.draw(datas, {width: 350, height: 350, title:title});
    }
  }
}
   


</script>
@endsection