    

    
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
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
   
   
 

    <script type="text/javascript">
            $(document).ready(function() {
              
                var options = {
                    chart: {
                        renderTo: 'members_grahph_populationchart'
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

                $.getJSON("pages/members_grahph_populationchart.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>  


<script type="text/javascript">
            $(document).ready(function() {
              
                var options = {
                    chart: {
                        renderTo: 'expense_chart'
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

                $.getJSON("pages/expense_chart.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>  


<script type="text/javascript">
            $(document).ready(function() {
              
                var options = {
                    chart: {
                        renderTo: 'income_added'
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

                $.getJSON("pages/income_added.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>  

    <script src="./assets/highcharts.js"></script>
  <script src="./assets/highcharts-3d.js" ></script>
  <script src="./assets/exporting.js"></script>     

  
  
<script type="text/javascript">

$(document).ready(function() {
$('#view_members').DataTable(

    {
        "order": [[ 0, "asc" ]]
    }
);
} );

$(document).ready(function() {
$('#memberslistphoto').DataTable();
} );

//memberslistphoto

$(document).ready(function() {
$('#addhousesDataTables').DataTable();
} );

$(document).ready(function() {
$('#usersactivityfinancials').DataTable();
} );

$(document).ready(function() {
$('#memberpaymentslist').DataTable();
} );
//addbillprepartion
$(document).ready(function() {
$('#addbilltoledger').DataTable();
} );

$(document).ready(function() {
$('#addbillprepartion').DataTable();
} );

$(document).ready(function() {
$('#addbillitems').DataTable(

    {
        "order": [[ 2, "desc" ]]
    }
);
} );

//acounts

$(document).ready(function() {
$('#addaccinexp').DataTable();
} );

$(document).ready(function() {
$('#addamitiexp').DataTable();
} );

$(document).ready(function() {
$('#allincomeonly').DataTable();
} );

$(document).ready(function() {
$('#allexpenseonly').DataTable();
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
  $('#TypeOfService').change(function(){
    var e = document.getElementById("TypeOfService"); 
    if(e.value == "OTHER"){
        $('.NAMEOFPROGRAM').show();
        $('.SLOGAN').show();
       
    }else if(e.value == "---SELECT---"){
        
        $('.NAMEOFPROGRAM').hide();
        $('.SLOGAN').hide();
    }else if(e.value == ""){
        $('.NAMEOFPROGRAM').hide();
        $('.SLOGAN').hide();
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