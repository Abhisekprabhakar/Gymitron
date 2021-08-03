$(document).ready(function(){
  $.ajax({
    url:"http://localhost/chart/ap.php",
    method:"GET",
    success: function(data){  console.log(data);
          var weight=[];
          var date=[];
          for(var i in data){
            weight.push(data[i].weight);
            date.push(data[i].date);
          }
          var chardata ={
            labels: date,
            datasets:[
              {
                label:'weight',
                backgroundColor: 'rgba(200,200,200,0.75)',
                borderColor: 'rgba(200,200,200,0.75)',
                hoverBackgroundColor: 'rgba(200,200,200,1)',
                hoverBackgroundColor: 'rgba(200,200,200,1)',
                data: weight
              }   
            ]
          };
          var ctx =$("#mycanvas");
          var barGraph = new Chart(ctx,{
            type: 'line',
            data: chardata
          })
    },
    error: function(data){
    console.log("naaaaa");
    }
  });





});