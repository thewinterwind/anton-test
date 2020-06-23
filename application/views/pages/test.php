<style>
canvas {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
}

</style>
<script src="https://unpkg.com/chart.js@2.8.0/dist/Chart.bundle.js"></script>
  <script src="https://unpkg.com/chartjs-gauge@0.2.0/dist/chartjs-gauge.js"></script>
  <div id="canvas-holder" style="width:100%">
    <canvas id="chart"></canvas>
  </div>
  <!-- <button id="randomizeData">Randomize Data</button> -->

<script>


//you can replace these value depending form users input
var one = 2;
  var two = 4;
  var three = 3;
  var four = 1
  var five = 5;

 if(one <= 1){
    $('#one').removeClass().addClass('red');
 } else if (one <= 3) {
    $('#one').removeClass().addClass('orange');
 } else if (one <= 5) {
    $('#one').removeClass().addClass('green');
 }

 if(two <= 1){
    $('#two').removeClass().addClass('red');
 } else if (two <= 3) {
    $('#two').removeClass().addClass('orange');
 } else if (two <= 5) {
    $('#two').removeClass().addClass('green');
 }

 if(three <= 1){
    $('#three').removeClass().addClass('red');
 } else if (three <= 3) {
    $('#three').removeClass().addClass('orange');
 } else if (three <= 5) {
    $('#three').removeClass().addClass('green');
 }

 if(four <= 1){
    $('#four').removeClass().addClass('red');
 } else if (four <= 3) {
    $('#four').removeClass().addClass('orange');
 } else if (four <= 5) {
    $('#four').removeClass().addClass('green');
 }

 if(five <= 1){
    $('#five').removeClass().addClass('red');
 } else if (five <= 3) {
    $('#five').removeClass().addClass('orange');
 } else if (five <= 5) {
    $('#five').removeClass().addClass('green');
 }

  var gaugeValue = function () {
  return [
    35,
    65,
    100
  ];
};

var data = gaugeValue();
var value = (parseInt(one) + parseInt(two) + parseInt(three) + parseInt(four) + parseInt(five)) * 4;

var config = {
  type: 'gauge',
  data: {
    //labels: ['Success', 'Warning', 'Warning', 'Error'],
    datasets: [{
      data: data,
      value: value,
      backgroundColor: ['red', 'orange', 'green'],
      borderWidth: 2
    }]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: 'Gauge chart'
    },
    layout: {
      padding: {
        bottom: 30
      }
    },
    needle: {
      // Needle circle radius as the percentage of the chart area width
      radiusPercentage: 2,
      // Needle width as the percentage of the chart area width
      widthPercentage: 3.2,
      // Needle length as the percentage of the interval between inner radius (0%) and outer radius (100%) of the arc
      lengthPercentage: 80,
      // The color of the needle
      color: 'rgba(0, 0, 0, 1)'
    },
    valueLabel: {
      formatter: Math.round
    }
  }
};

window.onload = function() {
  var ctx = document.getElementById('chart').getContext('2d');
  window.myGauge = new Chart(ctx, config);
};


</script>