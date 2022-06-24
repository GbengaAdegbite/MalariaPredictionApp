// JavaScript Document
$(document).ready(function(){
	$.ajax({
		url:"http://localhost/MBMPSys_Web/followersdata.php" type:"POST",
                                     success:function(data){
                                     console.log(data);
                                       
                                      var T = [] ;
                                      var S = [] ;
                                      var E = [] ;
                                      var I = [] ;
                                      var R = [] ;
                                      var D = [] ;
                                      var V = [] ;
                               
                                     for(var j in data){
                                       T.push("T " + data[j] . T);
                                       S.push("S" + data[j] . S);
                                       E.push("E " + data[j] . E);
                                       I.push("I " + data[j] . I);
                                       R.push("R " + data[j] . R);
                                       D.push("D " + data[j] . D);
                                       V.push("V " + data[j] . V);

                       }
              
                    var chartdata ={
                          labels:T,
                          lineTension:0.1,
                          background-color:"rgba(59,89,152,0.75)",
                          borderColor:"rgba(59,89,152,1)",
                          pointHoverBackgroundColor:"rgba(59,89,152,1)",
                          pointHoverBorderColor:"rgba(59,89,152,1)",
                          data:T
                       },
                      {
                          labels: "S",
                          fill:false;
                          lineTension:0.1,
                          background-color:"rgba(29,202,255,0.75)",
                          borderColor:"rgba(29,202,255,1)",
                          pointHoverBackgroundColor:"rgba(29,202,255,1)",
                          pointHoverBorderColor:"rgba(29,202,255,1)",
                          data:S
                       },
                      {
                          labels: "E",
                          fill:false;
                          lineTension:0.1,
                          background-color:"rgba(49,1942,255,0.75)",
                          borderColor:"rgba(49,201,255,1)",
                          pointHoverBackgroundColor:"rgba(29,201,255,1)",
                          pointHoverBorderColor:"rgba(29,201,255,1)",
                          data:E
                       },
                      {
                          labels: "I",
                          fill:false;
                          lineTension:0.1,
                          background-color:"rgba(40,202,188,0.75)",
                          borderColor:"rgba(40,202,188,1)",
                          pointHoverBackgroundColor:"rgba(40,202,188,1)",
                          pointHoverBorderColor:"rgba(40,202,188,1)",
                          data:I
                       },
                       {
                          labels: "R",
                          fill:false;
                          lineTension:0.1,
                          background-color:"rgba(69,192,255,0.75)",
                          borderColor:"rgba(29,192,255,1)",
                          pointHoverBackgroundColor:"rgba(49,192,255,1)",
                          pointHoverBorderColor:"rgba(59,192,255,1)",
                          data:R
                       },
                       {
                          labels: "D",
                          fill:false;
                          lineTension:0.1,
                          background-color:"rgba(79,202,252,0.75)",
                          borderColor:"rgba(79,202,252,1)",
                          pointHoverBackgroundColor:"rgba(79,202,252,1)",
                          pointHoverBorderColor:"rgba(79,202,252,1)",
                          data:D
                       },
                      {
                          labels: "V",
                          fill:false;
                          lineTension:0.1,
                          background-color:"rgba(19,202,182,0.75)",
                          borderColor:"rgba(19,202,182,1)",
                          pointHoverBackgroundColor:"rgba(19,202,182,1)",
                          pointHoverBorderColor:"rgba(19,202,182,1)",
                          data:V
                       }
	]
};
var ctx = $("#mycanvas");
var linegraph = new Chart(ctx,{
          type: 'line',
          data: chartdata
});
},

error:function(data){
}
});
});