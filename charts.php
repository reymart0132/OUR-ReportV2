<?php 
$chart = new chartdata();

echo "<div class='row'>
        <div class='col-lg-12 shadow'>
            <div class='row d-flex justify-content-center py-3'>
                <div class='col-lg-4 p-3 mx-2'>
                    <h5><b>Number of Transactions Received Today</b></h5>
                    <canvas id='trans_received_type' style='width:100%;  height:150px;'></canvas>
                </div>
                <div class='col-lg-4 p-3 mx-2'>
                    <h5><b>Transactions Received vs. Done Today</b></h5>
                    <canvas id='trans_received_type2' style='width:100%; height:150px;'></canvas>
                </div>
                <div class='col-lg-3 p-3 mx-2'>
                    <h6><b>Top 5 Most Requested Documents</b></h6>
                    <ol>
                        "; $chart->mostReqDocName();
                    echo "</ol>
                </div>
            </div>
        </div>
    </div>";

echo "<div class='row mt-3'>
        <div class='col-lg-12 shadow'>
            <div class='row d-flex justify-content-center py-3'>
                <div class='col-lg-4 p-3 mx-2'>
                    <h5><b>Encoders' Daily Finished Tasks Tally</b></h5>
                    <canvas id='tally' style='width:100%;  height:300px;'></canvas>
                </div>
                <div class='col-lg-7 p-3 mx-2'>
                    <h5><b>Application Volume for the Past 7 Working Days</b></h5>
                    <canvas id='history' style='width:100%;  height:300px;'></canvas>
                </div>
            </div>
        </div>
    </div>";

echo "<div class='row mt-3'>
        <div class='col-lg-12 shadow'>
            <div class='row justify-content-center d-flex pt-3'>
                <div class='col-lg-12 mt-3'>
                    <h3 class='text-center'><b>Document Breakdown - Regular Transactions</b></h3><hr>
                </div>
            </div>
            <div class='row justify-content-center d-flex py-3'>
                <div class='col-lg-6 p-3 ml-2'>
                    <h5 class='text-center pb-2'><b>TODAY</b></h5>
                    <canvas id='pie01b' style='width:100%; height:400px;'></canvas>
                </div>
                <div class='col-lg-6 p-3 mr-2'>
                    <h5 class='text-center pb-2'><b>THIS WEEK</b></h5>
                    <canvas id='pie01a' style='width:100%; height:400px;'></canvas>
                </div>
            </div>
            <div class='row justify-content-center d-flex py-3'>
                <div class='col-lg-12 p-3 ml-2'>
                    <h5 class='text-center pb-2'><b>THIS MONTH</b></h5>
                    <canvas id='pie01' style='width:100%; height:400px;'></canvas>
                </div>
            </div>
        </div>
    </div>";

echo "<div class='row mt-3'>
        <div class='col-lg-12 shadow'>
            <div class='row justify-content-center d-flex pt-3'>
                <div class='col-lg-12 mt-3'>
                    <h3 class='text-center'><b>Document Breakdown - Special Transactions</b></h3><hr>
                </div>
            </div>
            <div class='row justify-content-center d-flex py-3'>
                <div class='col-lg-6 p-3 ml-2'>
                    <h5 class='text-center pb-2'><b>TODAY</b></h5>
                    <canvas id='pie02b' style='width:100%; height:400px;'></canvas>
                </div>
                <div class='col-lg-6 p-3 mr-2'>
                    <h5 class='text-center pb-2'><b>THIS WEEK</b></h5>
                    <canvas id='pie02a' style='width:100%; height:400px;'></canvas>
                </div>
            </div>
            <div class='row justify-content-center d-flex py-3'>
                <div class='col-lg-12 p-3 ml-2'>
                    <h5 class='text-center pb-2'><b>THIS MONTH</b></h5>
                    <canvas id='pie02' style='width:100%; height:400px;'></canvas>
                </div>
            </div>
        </div>
    </div>";

// echo "<div class='row mt-3 justify-content-center d-flex'>
//         <div class='col-lg-6 p-3 mx-2 shadow'>
//             <h5><b>Document Breakdown - Special Transactions</b></h5>
//             <canvas id='pie02' style='width:100%; height:350px;'></canvas>
//         </div>
//         <div class='col-lg-5 p-3 mx-2 shadow'>
//             <h5><b>Side Chart</b></h5>
//             <canvas id='pie02a' style='width:100%; height:350px;'></canvas>
//         </div>
//     </div>";
?>

