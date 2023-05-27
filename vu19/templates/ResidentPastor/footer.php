    

    
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>

    <!-- <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/data-table.js"></script> 
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/vendor/select2/js/select2.min.js"></script>
  



    <!-- <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
  
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
  
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
  
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script> -->
    <!-- <script src="assets/libs/js/dashboard-ecommerce.js"></script> -->
   
   
 

    <script type="text/javascript">
            $(document).ready(function() {
              
                var options = {
                    chart: {
                        renderTo: 'payments_received'
//                        options3d: {
//                            enabled: true,
//                            alpha: 45,
//                            beta: 0
//                        }

                    },
                     credits: {
              enabled: false
               },
               xAxis: {
                        type: 'category',
                        allowDecimals: false,
                        title: {
                            text: ""
                        }
                    },

 
                    series: []
                };

                $.getJSON("pages/Charts/paymentChart.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>  


<script type="text/javascript">
            $(document).ready(function() {
              
                var options = {
                    chart: {
                        renderTo: 'members_population'
//                        options3d: {
//                            enabled: true,
//                            alpha: 45,
//                            beta: 0
//                        }

                    },
                     credits: {
              enabled: false
               },
               xAxis: {
                        type: 'category',
                        allowDecimals: false,
                        title: {
                            text: ""
                        }
                    },

 
                    series: []
                };

                $.getJSON("pages/Charts/membersChart.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>  




<script type="text/javascript">
            $(document).ready(function() {
              
                var options = {
                    chart: {
                        renderTo: 'visitors_chart'
//                        options3d: {
//                            enabled: true,
//                            alpha: 45,
//                            beta: 0
//                        }

                    },
                     credits: {
              enabled: false
               },
               xAxis: {
                        type: 'category',
                        allowDecimals: false,
                        title: {
                            text: ""
                        }
                    },

 
                    series: []
                };

                $.getJSON("pages/Charts/visitorsChart.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>  


<script type="text/javascript">
            $(document).ready(function() {
              
                var options = {
                    chart: {
                        renderTo: 'attendance_chart'
//                        options3d: {
//                            enabled: true,
//                            alpha: 45,
//                            beta: 0
//                        }

                    },
                     credits: {
              enabled: false
               },
               xAxis: {
                        type: 'category',
                        allowDecimals: false,
                        title: {
                            text: ""
                        }
                    },

 
                    series: []
                };

                $.getJSON("pages/Charts/attendanceChart.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>  


 

    <script src="./assets/highcharts/highcharts.js"></script>
  <script src="./assets/highcharts/highcharts-3d.js" ></script>
  <script src="./assets/highcharts/exporting.js"></script>     

  
  
<script type="text/javascript">

$(document).ready(function() {
$('#view_users').DataTable(

    {
        "order": [[ 1, "asc" ]]
    }
);
} );

$(document).ready(function() {
$('#view_members').DataTable(

    {
        "order": [[ 0, "asc" ]]
    }
);
} );

$(document).ready(function() {
$('#todays_birthday').DataTable(

    {
        "order": [[ 0, "asc" ]]
    }
);
} );

$(document).ready(function() {
$('#all_payments_today').DataTable(

    {
        "order": [[ 0, "asc" ]]
    }
);
} );

$(document).ready(function() {
$('#all_payments_weekly,#all_payments_monthly,#all_payments_yearly').DataTable(

    {
        "order": [[ 0, "desc" ]]
    }
);
} );


$(document).ready(function() {
$('#AllMembersRecords,#FemalesRecord,#MaleSRecords').DataTable(

    {
        "order": [[ 0, "asc" ]]
    }
);
} );


$(document).ready(function() {
$('#BirthdayTodayRecords,#BirthdayThisMonthRecord').DataTable(

    {
        "order": [[ 0, "asc" ]]
    }
);
} );

$(document).ready(function() {
$('#VisitorsTodayRecords,#VisitorsThisMonthRecord,#VisitorsThisYearRecord').DataTable(

    {
        "order": [[ 0, "asc" ]]
    }
);
} );

 

</script>




<script type="text/javascript">

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

$(document).ready(function() {
$('#memberlistdataTables').DataTable();
} );


</script>


<script type="text/javascript">

 $(function() {
  $('#is_member_on_welfare').change(function(){
    var e = document.getElementById("is_member_on_welfare"); 
    if(e.value == "YES"){
         
        $('.WELFARE_ID').show();
    }else if(e.value == "NO"){
        
        $('.WELFARE_ID').hide(); 
    }else if(e.value == ""){
        $('.WELFARE_ID').hide(); 
    }
    
  
   // $('#' + $(this).val()).show();
  });
});





$(function() {
  $('#isfatheralive').change(function(){
    var e = document.getElementById("isfatheralive"); 
    if(e.value == "YES"){
        $('.rowtypeoffathersname').show();
        $('.rowtypeoffathersaddress').show();
        $('.rowtypeoffatherscontact').show();
    }else if(e.value == "NO"){
        $('.rowtypeoffathersname').hide();
        $('.rowtypeoffathersaddress').hide();
        $('.rowtypeoffatherscontact').hide();
    }else if(e.value == ""){
        $('.rowtypeoffathersname').hide();
        $('.rowtypeoffathersaddress').hide();
        $('.rowtypeoffatherscontact').hide();
    }
    
  });
});



$(function() {
  $('#typebooking').change(function(){
    var e = document.getElementById("typebooking"); 
    if(e.value == "SHORT"){
        $('.noofhours').show(); 
        $('.noofnights').hide();
        $('.noofhoursmoneycash').show();
        //noofhoursmoneycash
    }else if(e.value == "LONG"){
        $('.noofnights').show();
        $('.noofhours').hide();  
        $('.noofhoursmoneycash').hide();
    }else if(e.value == ""){
        $('.noofhours').hide(); 
        $('.noofnights').hide();
        $('.noofhoursmoneycash').hide();
    }
    
  });
});
            </script>
</body>
 
</html>