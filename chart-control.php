<script>
    const trans_received_type = document.getElementById('trans_received_type');
    new Chart(trans_received_type, {
    type: 'horizontalBar',
    data: {
        labels: ["Regular Transactions", "Special Transactions"],
        datasets: [{
        maxBarThickness: 30,
        data: [<?php echo $chart->transReceivedREG().', '.$chart->transReceivedSP(); ?> ],
        backgroundColor: [
            'rgba(41, 41, 110, 0.6)',
            'rgba(245, 40, 145, 0.6)',
        ],
        borderColor: [
            'rgba(41, 41, 110, 1)', 
            'rgba(245, 40, 145, 1)',
        ],
        borderWidth:0.75,
        }]
    },
    options: {
        legend: {
            display: false
        },

        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });
    </script>

<script>
    const schoolbar = document.getElementById('trans_received_type2');
    new Chart(schoolbar, {
    type: 'horizontalBar',
    data: {
        labels: ["Transactions Received", "Transactions Done"],
        datasets: [{
        maxBarThickness: 30,
        data: [<?php echo $chart->transReceivedTotal().', '.$chart->transDoneTotal(); ?> ],
        backgroundColor: [
            'rgba(247, 0, 0, 0.6)',
            'rgba(0, 163, 10, 0.6)'
        ],
        borderColor: [
            'rgba(247, 0, 0, 0.6)',
            'rgba(0, 163, 10, 0.6)'
        ],
        borderWidth:0.75,
        }]
    },
    options: {
        legend: {
            display: false
        },

        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });
    </script>


<script>
    const tally = document.getElementById('tally');
    new Chart(tally, {
    type: 'horizontalBar',
    data: {
        labels: <?php echo '
                     [" '.implode(' ", " ',$chart->encoderNamesREG()).' ",
                      " '.implode(' ", " ',$chart->encoderNamesSP()).' "] ' ?>,
        datasets: [{
        //maxBarThickness: 40,
        label: 'Number of Completed Requests Done',
        data: <?php echo '
                    [" '.implode(' ", " ',$chart->countDailyTaskDoneREG()).' ",
                     " '.implode(' ", " ',$chart->countDailyTaskDoneSP()).' "] ' ?>,
        backgroundColor: [
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)',
            'rgba(41, 41, 110, 0.6)'
        ],
        borderColor: [
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)',
            'rgba(41, 41, 110, 1)'
        ],
        borderWidth:0.75,
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });
</script>

<script>
    const history = document.getElementById('history');
    new Chart(history, {
    type: 'line',
    data: {
        labels: <?php echo '
                     [" '.implode(' ", " ',$chart->getLastSevenDays()).' ",
                      " '.date("Y-m-d").' "] ' ?>,
        datasets: [
            {
                label: 'Regular Transactions',
                data: <?php echo '
                    [" '.implode(' ", " ',$chart->getCountAppSevenDaysREG()).' ",
                     " '.$chart->getCountAppTodayREG().' "] ' ?>,
                backgroundColor: 'rgba(0, 0, 0, 0.0)',
                borderColor: 'rgba(41, 41, 110, 1)',
                borderWidth:1.25,
            },
            {
                label: 'Special Transactions',
                data: <?php echo '
                    [" '.implode(' ", " ',$chart->getCountAppSevenDaysSP()).' ",
                     " '.$chart->getCountAppTodaySP().' "] ' ?>,
                backgroundColor: 'rgba(0, 0, 0, 0.0)',
                borderColor: 'rgba(245, 40, 145, 1)',
                borderWidth:1.25,
            }
        ]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });
</script>

<script>
    const pie01 = document.getElementById('pie01');
    new Chart(pie01, {
    type: 'doughnut',
    data: {
        labels: <?php echo '[" '.implode(' ", " ',$chart->pg_mtReqDocNameREG()).' "] ' ?>,
        datasets: [{
        data: <?php echo '[" '.implode(' ", " ',$chart->pg_mtReqDocCountREG()).' "] ' ?>,
        backgroundColor: [
            'rgba(255,151,239, 0.7)',
            'rgba(255,217,0, 0.7)',
            'rgba(114,0,255, 0.7)',
            'rgba(255,0,0, 0.7)',
            'rgba(0,50,165, 0.7)',
            'rgba(0,255,60, 0.7)',
            'rgba(0,126,255, 0.7)',
            'rgba(255,191,99, 0.7)',
            'rgba(172,54,54, 0.7)',
            'rgba(15,125,0, 0.7)',
            'rgba(255,132,0, 0.7)',
            'rgba(57, 170, 201, 0.7)',
            'rgba(232, 12, 162, 0.7)',
            'rgba(15, 192, 131, 0.7)',
            'rgba(163, 72, 130, 0.7)',
            'rgba(210, 193, 253, 0.7)',
            'rgba(114, 116, 138, 0.7)',
            'rgba(167, 23, 213, 0.7)',
            'rgba(64, 76, 146, 0.7)',
            'rgba(16, 188, 163, 0.7)',
            'rgba(162, 237, 245, 0.7),'
        ],
        borderColor: [
            'rgba(255,151,239, 1)',
            'rgba(255,217,0, 1)',
            'rgba(114,0,255, 1)',
            'rgba(255,0,0, 1)',
            'rgba(0,50,165, 1)',
            'rgba(0,255,60, 1)',
            'rgba(0,126,255, 1)',
            'rgba(255,191,99, 1)',
            'rgba(172,54,54, 1)',
            'rgba(15,125,0, 1)',
            'rgba(255,132,0, 1)',
            'rgba(57, 170, 201, 1)',
            'rgba(232, 12, 162, 1)',
            'rgba(15, 192, 131, 1)',
            'rgba(163, 72, 130, 1)',
            'rgba(210, 193, 253, 1)',
            'rgba(114, 116, 138, 1)',
            'rgba(167, 23, 213, 1)',
            'rgba(64, 76, 146, 1)',
            'rgba(16, 188, 163, 1)',
            'rgba(162, 237, 245, 1),'
        ],
        borderWidth:0.5,
        }]
    },
    options: {
        legend: {
            position: 'bottom',
                        // align: 'start',
        },
    }
    });
</script>

<script>
    const pie02 = document.getElementById('pie02');
    new Chart(pie02, {
    type: 'doughnut',
    data: {
        labels: <?php echo '[" '.implode(' ", " ',$chart->pg_mtReqDocNameSP()).' "] ' ?>,
        datasets: [{
        data: <?php echo '[" '.implode(' ", " ',$chart->pg_mtReqDocCountSP()).' "] ' ?>,
        backgroundColor: [
            'rgba(255,151,239, 0.7)',
            'rgba(255,217,0, 0.7)',
            'rgba(114,0,255, 0.7)',
            'rgba(255,0,0, 0.7)',
            'rgba(0,50,165, 0.7)',
            'rgba(0,255,60, 0.7)',
            'rgba(0,126,255, 0.7)',
            'rgba(255,191,99, 0.7)',
            'rgba(172,54,54, 0.7)',
            'rgba(15,125,0, 0.7)',
            'rgba(255,132,0, 0.7)',
            'rgba(57, 170, 201, 0.7)',
            'rgba(232, 12, 162, 0.7)',
            'rgba(15, 192, 131, 0.7)',
            'rgba(163, 72, 130, 0.7)',
            'rgba(210, 193, 253, 0.7)',
            'rgba(114, 116, 138, 0.7)',
            'rgba(167, 23, 213, 0.7)',
            'rgba(64, 76, 146, 0.7)',
            'rgba(16, 188, 163, 0.7)',
            'rgba(162, 237, 245, 0.7),'
        ],
        borderColor: [
            'rgba(255,151,239, 1)',
            'rgba(255,217,0, 1)',
            'rgba(114,0,255, 1)',
            'rgba(255,0,0, 1)',
            'rgba(0,50,165, 1)',
            'rgba(0,255,60, 1)',
            'rgba(0,126,255, 1)',
            'rgba(255,191,99, 1)',
            'rgba(172,54,54, 1)',
            'rgba(15,125,0, 1)',
            'rgba(255,132,0, 1)',
            'rgba(57, 170, 201, 1)',
            'rgba(232, 12, 162, 1)',
            'rgba(15, 192, 131, 1)',
            'rgba(163, 72, 130, 1)',
            'rgba(210, 193, 253, 1)',
            'rgba(114, 116, 138, 1)',
            'rgba(167, 23, 213, 1)',
            'rgba(64, 76, 146, 1)',
            'rgba(16, 188, 163, 1)',
            'rgba(162, 237, 245, 1),'
        ],
        borderWidth:0.5,
        }]
    },
    options: {
        legend: {
            position: 'bottom'
        },
    }
    });
</script>
    
<script>
    const pie01a = document.getElementById('pie01a');
    new Chart(pie01a, {
    type: 'doughnut',
    data: {
        labels: <?php echo '[" '.implode(' ", " ',$chart->pg_wkmrdocNameREG()).' "] ' ?>,
        datasets: [{
        data: <?php echo '[" '.implode(' ", " ',$chart->pg_wkmrDocCountREG()).' "] ' ?>,
        backgroundColor: [
            'rgba(255,151,239, 0.7)',
            'rgba(255,217,0, 0.7)',
            'rgba(114,0,255, 0.7)',
            'rgba(255,0,0, 0.7)',
            'rgba(0,50,165, 0.7)',
            'rgba(0,255,60, 0.7)',
            'rgba(0,126,255, 0.7)',
            'rgba(255,191,99, 0.7)',
            'rgba(172,54,54, 0.7)',
            'rgba(15,125,0, 0.7)',
            'rgba(255,132,0, 0.7)',
            'rgba(57, 170, 201, 0.7)',
            'rgba(232, 12, 162, 0.7)',
            'rgba(15, 192, 131, 0.7)',
            'rgba(163, 72, 130, 0.7)',
            'rgba(210, 193, 253, 0.7)',
            'rgba(114, 116, 138, 0.7)',
            'rgba(167, 23, 213, 0.7)',
            'rgba(64, 76, 146, 0.7)',
            'rgba(16, 188, 163, 0.7)',
            'rgba(162, 237, 245, 0.7),'
        ],
        borderColor: [
            'rgba(255,151,239, 1)',
            'rgba(255,217,0, 1)',
            'rgba(114,0,255, 1)',
            'rgba(255,0,0, 1)',
            'rgba(0,50,165, 1)',
            'rgba(0,255,60, 1)',
            'rgba(0,126,255, 1)',
            'rgba(255,191,99, 1)',
            'rgba(172,54,54, 1)',
            'rgba(15,125,0, 1)',
            'rgba(255,132,0, 1)',
            'rgba(57, 170, 201, 1)',
            'rgba(232, 12, 162, 1)',
            'rgba(15, 192, 131, 1)',
            'rgba(163, 72, 130, 1)',
            'rgba(210, 193, 253, 1)',
            'rgba(114, 116, 138, 1)',
            'rgba(167, 23, 213, 1)',
            'rgba(64, 76, 146, 1)',
            'rgba(16, 188, 163, 1)',
            'rgba(162, 237, 245, 1),'
        ],
        borderWidth:0.5,
        }]
    },
    options: {
        legend: {
            position: 'bottom'
        },
    }
    });
</script>

<script>
    const pie01b = document.getElementById('pie01b');
    new Chart(pie01b, {
    type: 'doughnut',
    data: {
        labels: <?php echo '[" '.implode(' ", " ',$chart->pg_tdReqDocNameREG()).' "] ' ?>,
        datasets: [{
        data: <?php echo '[" '.implode(' ", " ',$chart->pg_tdReqDocCountREG()).' "] ' ?>,
        backgroundColor: [
            'rgba(255,151,239, 0.7)',
            'rgba(255,217,0, 0.7)',
            'rgba(114,0,255, 0.7)',
            'rgba(255,0,0, 0.7)',
            'rgba(0,50,165, 0.7)',
            'rgba(0,255,60, 0.7)',
            'rgba(0,126,255, 0.7)',
            'rgba(255,191,99, 0.7)',
            'rgba(172,54,54, 0.7)',
            'rgba(15,125,0, 0.7)',
            'rgba(255,132,0, 0.7)',
            'rgba(57, 170, 201, 0.7)',
            'rgba(232, 12, 162, 0.7)',
            'rgba(15, 192, 131, 0.7)',
            'rgba(163, 72, 130, 0.7)',
            'rgba(210, 193, 253, 0.7)',
            'rgba(114, 116, 138, 0.7)',
            'rgba(167, 23, 213, 0.7)',
            'rgba(64, 76, 146, 0.7)',
            'rgba(16, 188, 163, 0.7)',
            'rgba(162, 237, 245, 0.7),'
        ],
        borderColor: [
            'rgba(255,151,239, 1)',
            'rgba(255,217,0, 1)',
            'rgba(114,0,255, 1)',
            'rgba(255,0,0, 1)',
            'rgba(0,50,165, 1)',
            'rgba(0,255,60, 1)',
            'rgba(0,126,255, 1)',
            'rgba(255,191,99, 1)',
            'rgba(172,54,54, 1)',
            'rgba(15,125,0, 1)',
            'rgba(255,132,0, 1)',
            'rgba(57, 170, 201, 1)',
            'rgba(232, 12, 162, 1)',
            'rgba(15, 192, 131, 1)',
            'rgba(163, 72, 130, 1)',
            'rgba(210, 193, 253, 1)',
            'rgba(114, 116, 138, 1)',
            'rgba(167, 23, 213, 1)',
            'rgba(64, 76, 146, 1)',
            'rgba(16, 188, 163, 1)',
            'rgba(162, 237, 245, 1),'
        ],
        borderWidth:0.5,
        }]
    },
    options: {
        legend: {
            position: 'bottom'
        },
    }
    });
</script>

<script>
    const pie02a = document.getElementById('pie02a');
    new Chart(pie02a, {
    type: 'doughnut',
    data: {
        labels: <?php echo '[" '.implode(' ", " ',$chart->pg_wkmrdocNameSP()).' "] ' ?>,
        datasets: [{
        data: <?php echo '[" '.implode(' ", " ',$chart->pg_wkmrDocCountSP()).' "] ' ?>,
        backgroundColor: [
            'rgba(255,151,239, 0.7)',
            'rgba(255,217,0, 0.7)',
            'rgba(114,0,255, 0.7)',
            'rgba(255,0,0, 0.7)',
            'rgba(0,50,165, 0.7)',
            'rgba(0,255,60, 0.7)',
            'rgba(0,126,255, 0.7)',
            'rgba(255,191,99, 0.7)',
            'rgba(172,54,54, 0.7)',
            'rgba(15,125,0, 0.7)',
            'rgba(255,132,0, 0.7)',
            'rgba(57, 170, 201, 0.7)',
            'rgba(232, 12, 162, 0.7)',
            'rgba(15, 192, 131, 0.7)',
            'rgba(163, 72, 130, 0.7)',
            'rgba(210, 193, 253, 0.7)',
            'rgba(114, 116, 138, 0.7)',
            'rgba(167, 23, 213, 0.7)',
            'rgba(64, 76, 146, 0.7)',
            'rgba(16, 188, 163, 0.7)',
            'rgba(162, 237, 245, 0.7),'
        ],
        borderColor: [
            'rgba(255,151,239, 1)',
            'rgba(255,217,0, 1)',
            'rgba(114,0,255, 1)',
            'rgba(255,0,0, 1)',
            'rgba(0,50,165, 1)',
            'rgba(0,255,60, 1)',
            'rgba(0,126,255, 1)',
            'rgba(255,191,99, 1)',
            'rgba(172,54,54, 1)',
            'rgba(15,125,0, 1)',
            'rgba(255,132,0, 1)',
            'rgba(57, 170, 201, 1)',
            'rgba(232, 12, 162, 1)',
            'rgba(15, 192, 131, 1)',
            'rgba(163, 72, 130, 1)',
            'rgba(210, 193, 253, 1)',
            'rgba(114, 116, 138, 1)',
            'rgba(167, 23, 213, 1)',
            'rgba(64, 76, 146, 1)',
            'rgba(16, 188, 163, 1)',
            'rgba(162, 237, 245, 1),'
        ],
        borderWidth:0.5,
        }]
    },
    options: {
        legend: {
            position: 'bottom'
        },
    }
    });
</script>

<script>
    const pie02b = document.getElementById('pie02b');
    new Chart(pie02b, {
    type: 'doughnut',
    data: {
        labels: <?php echo '[" '.implode(' ", " ',$chart->pg_tdReqDocNameSP()).' "] ' ?>,
        datasets: [{
        data: <?php echo '[" '.implode(' ", " ',$chart->pg_tdReqDocCountSP()).' "] ' ?>,
        backgroundColor: [
            'rgba(255,151,239, 0.7)',
            'rgba(255,217,0, 0.7)',
            'rgba(114,0,255, 0.7)',
            'rgba(255,0,0, 0.7)',
            'rgba(0,50,165, 0.7)',
            'rgba(0,255,60, 0.7)',
            'rgba(0,126,255, 0.7)',
            'rgba(255,191,99, 0.7)',
            'rgba(172,54,54, 0.7)',
            'rgba(15,125,0, 0.7)',
            'rgba(255,132,0, 0.7)',
            'rgba(57, 170, 201, 0.7)',
            'rgba(232, 12, 162, 0.7)',
            'rgba(15, 192, 131, 0.7)',
            'rgba(163, 72, 130, 0.7)',
            'rgba(210, 193, 253, 0.7)',
            'rgba(114, 116, 138, 0.7)',
            'rgba(167, 23, 213, 0.7)',
            'rgba(64, 76, 146, 0.7)',
            'rgba(16, 188, 163, 0.7)',
            'rgba(162, 237, 245, 0.7),'
        ],
        borderColor: [
            'rgba(255,151,239, 1)',
            'rgba(255,217,0, 1)',
            'rgba(114,0,255, 1)',
            'rgba(255,0,0, 1)',
            'rgba(0,50,165, 1)',
            'rgba(0,255,60, 1)',
            'rgba(0,126,255, 1)',
            'rgba(255,191,99, 1)',
            'rgba(172,54,54, 1)',
            'rgba(15,125,0, 1)',
            'rgba(255,132,0, 1)',
            'rgba(57, 170, 201, 1)',
            'rgba(232, 12, 162, 1)',
            'rgba(15, 192, 131, 1)',
            'rgba(163, 72, 130, 1)',
            'rgba(210, 193, 253, 1)',
            'rgba(114, 116, 138, 1)',
            'rgba(167, 23, 213, 1)',
            'rgba(64, 76, 146, 1)',
            'rgba(16, 188, 163, 1)',
            'rgba(162, 237, 245, 1),'
        ],
        borderWidth:0.5,
        }]
    },
    options: {
        legend: {
            position: 'bottom',
            // align: 'start',
        },
    }
    });
</script>


<!-- <script>
    const pie02a = document.getElementById('pie02a');
    new Chart(pie02a, {
    type: 'doughnut',
    data: {
        labels: <?php //echo '[" '.implode(' ", " ',$chart->pg_wkmrdocNameSP()).' "] ' ?>,
        datasets: [{
        label: 'Number of Completed Requests Done',
        data: <?php //echo '[" '.implode(' ", " ',$chart->pg_wkmrDocCountSP()).' "] ' ?>,
        backgroundColor: [
            'rgb(255,217,0)', // sam
            'rgb(114,0,255)',  // dentistry
            'rgb(255,0,0)',   // elams
            'rgb(0,50,165)',  //gradsch
            'rgb(255,151,239)', // medicine
            'rgb(0,255,60)',  // medtech
            'rgb(0,126,255)',  // NHM
            'rgb(255,191,99)', // nursing
            'rgb(172,54,54)', // opto
            'rgb(15,125,0)',  // pharmacy
            'rgb(255,132,0)', // scitech
        ],
        // borderColor: [
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)',
        //     'rgba(41, 41, 110, 1)'
        // ],
        // borderWidth:0.75,
        }]
    },
    options: {
        legend: {
            position: 'right'
        },
    //     scales: {
    //         xAxes: [{
    //             ticks: {
    //                 beginAtZero: true
    //             }
    //         }]
    //     }
    }
    });
</script> -->
    
    <!-- <script>
    const schoolbar = document.getElementById('chart_schools');
    new Chart(schoolbar, {
    type: 'horizontalBar',
    data: {
        labels: <?php //echo'["' . implode('", "', $viewchart->viewTransferredSchoolNames()) . '"]' ?>,
        datasets: [{
        //maxBarThickness: 40,
        label: 'Number of Students Transferred to Other Universities',
        data: <?php //echo '[' . implode(', ', $viewchart->viewTransferredSchoolTotal()) . ']' ?>,
        backgroundColor: [
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)',
            'rgb(41, 41, 110)'
        ],
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });
    </script> -->