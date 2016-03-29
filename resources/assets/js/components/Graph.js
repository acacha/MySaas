import Chart from 'chart.js';
export default {
    template: '<canvas style="height: 226px; width: 494px;" width="617" height="282"></canvas>',

    props: {
        labels: {},
        values: {},
        color: {
            default: 'rgba(120,220,220,0.5)'
        }
    },

    ready() {
        //alert("Hola soc Graph!");
        var ctx = this.$el.getContext("2d");
        var data = {
            labels: this.labels,
            datasets: [ {
                data: this.values ,
                label: "Daily Sales",
                fillColor: this.color,
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)"
            }
            ]
        }
        var myBarChart = new Chart(ctx).Bar(data);
    }
}

