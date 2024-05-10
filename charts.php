<?php 
$chart = new chartdata();

echo "<div class='row'>
        <div class='col-lg-12 shadow'>
            <div class='row d-flex justify-content-center py-3'>
                <div class='col-lg-4 p-3 mx-2'>
                    <h5><b><i class='fa-solid fa-file-import'></i> Number of Transactions Received Today</b></h5>
                    <canvas id='trans_received_type' style='width:100%;  height:150px;'></canvas>
                </div>
                <div class='col-lg-4 p-3 mx-2'>
                    <h5><b><i class='fa-solid fa-print'></i> Transactions Received vs. Done Today</b></h5>
                    <canvas id='trans_received_type2' style='width:100%; height:150px;'></canvas>
                </div>
                <div class='col-lg-3 p-3 mx-2'>
                    <h6><b><i class='fa-solid fa-file'></i> Top 5 Most Requested Documents (All-Time)</b></h6>
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
                    <h5><b><i class='fa-solid fa-check-double'></i> Encoders' Daily Finished Tasks Tally</b></h5>
                    <canvas id='tally' style='width:100%;  height:300px;'></canvas>
                </div>
                <div class='col-lg-7 p-3 mx-2'>
                    <h5><b><i class='fa-solid fa-arrow-trend-up'></i> Application Volume for the Past Week</b></h5>
                    <canvas id='history' style='width:100%;  height:300px;'></canvas>
                </div>
            </div>
        </div>
    </div>";

// echo"
//     <div class='row mt-3'>
//         <div class='col-lg-12 shadow'>
//             <div class='row justify-content-center d-flex py-3'>

//                 <div class='accordion id='accordionExample'>
                
//                     <div class='accordion-item'>

//                         <h2 class='accordion-header' id='headingOne'>
//                             <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='false' aria-controls='collapseOne'>
//                                 Document Breakdown - Regular Transactions
//                             </button>
//                         </h2>

//                         <div id='collapseOne' class='accordion-collapse collapse' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
//                             <div class='accordion-body'>
//                                 <div class='col-lg-12 mt-3'>
//                                     <h3 class='text-center'><b>Document Breakdown - Regular Transactions</b></h3><hr>
//                                 </div>
//                                 <div class='row justify-content-center d-flex py-3'>
//                                     <div class='col-lg-6 p-3 ml-2'>
//                                         <h5 class='text-center pb-2'><b>TODAY</b></h5>
//                                         <canvas id='pie01b' style='width:100%; height:400px;'></canvas>
//                                     </div>
//                                     <div class='col-lg-6 p-3 mr-2'>
//                                         <h5 class='text-center pb-2'><b>THIS WEEK</b></h5>
//                                         <canvas id='pie01a' style='width:100%; height:400px;'></canvas>
//                                     </div>
//                                 </div>
//                                 <div class='row justify-content-center d-flex py-3'>
//                                     <div class='col-lg-12 p-3 ml-2'>
//                                         <h5 class='text-center pb-2'><b>THIS MONTH</b></h5>
//                                         <canvas id='pie01' style='width:100%; height:400px;'></canvas>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>

//                     </div>

//                     <div class='accordion-item'>

//                         <h2 class='accordion-header' id='headingTwo'>
//                             <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
//                                 Document Breakdown - Special Transactions
//                             </button>
//                         </h2>

//                         <div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
//                             <div class='accordion-body'>
//                                 <div class='col-lg-12 mt-3'>
//                                     <h3 class='text-center'><b>Document Breakdown - Special Transactions</b></h3><hr>
//                                 </div>
//                                 <div class='row justify-content-center d-flex py-3'>
//                                     <div class='col-lg-6 p-3 ml-2'>
//                                         <h5 class='text-center pb-2'><b>TODAY</b></h5>
//                                         <canvas id='pie02b' style='width:100%; height:400px;'></canvas>
//                                     </div>
//                                     <div class='col-lg-6 p-3 mr-2'>
//                                         <h5 class='text-center pb-2'><b>THIS WEEK</b></h5>
//                                         <canvas id='pie02a' style='width:100%; height:400px;'></canvas>
//                                     </div>
//                                 </div>
//                                 <div class='row justify-content-center d-flex py-3'>
//                                     <div class='col-lg-12 p-3 ml-2'>
//                                         <h5 class='text-center pb-2'><b>THIS MONTH</b></h5>
//                                         <canvas id='pie02' style='width:100%; height:400px;'></canvas>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>

//                     </div>

//                 </div>

//             </div>
//         </div>
//     </div>
// ";

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
                    <canvas id='pie01b' style='width:100%; height:375px;'></canvas>
                </div>
                <div class='col-lg-6 p-3 mr-2'>
                    <h5 class='text-center pb-2'><b>THIS WEEK</b></h5>
                    <canvas id='pie01a' style='width:100%; height:375px;'></canvas>
                </div>
            </div>
            <div class='row justify-content-center d-flex py-3'>
                <div class='col-lg-12 p-3 ml-2'>
                    <h5 class='text-center pb-2'><b>THIS MONTH</b></h5>
                    <canvas id='pie01' style='width:100%; height:375px;'></canvas>
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
                    <canvas id='pie02b' style='width:100%; height:375px;'></canvas>
                </div>
                <div class='col-lg-6 p-3 mr-2'>
                    <h5 class='text-center pb-2'><b>THIS WEEK</b></h5>
                    <canvas id='pie02a' style='width:100%; height:375px;'></canvas>
                </div>
            </div>
            <div class='row justify-content-center d-flex py-3'>
                <div class='col-lg-12 p-3 ml-2'>
                    <h5 class='text-center pb-2'><b>THIS MONTH</b></h5>
                    <canvas id='pie02' style='width:100%; height:375px;'></canvas>
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

