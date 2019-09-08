$(function(){
  $.getJSON("/projects/chart/data", function (result) {

    var labels = [],data=[];
    for (var i = 0; i < result.length; i++) {
        labels.push(result[i].umur);
        data.push(result[i].total);
    }

    var Totalumur = {
      labels : labels,
      datasets : [
        {
          label : "Jumlah Umur",
          fillColor : "rgb(251, 255, 63)",
          backgroundColor : "#f56954",
          borderColor : "#000000",
          pointborderColor: "#000000",
          strokeColor : "#f56954",
          pointColor : "#A62121",
          pointStrokeColor : "#741F1F",
          data : data
        }
      ]
    };
    var ctx = document.getElementById('Mycharts').getContext('2d');
    
    var Mycharts = new Chart(ctx, {
    type: 'line',
    data: Totalumur,
    });
  });

});