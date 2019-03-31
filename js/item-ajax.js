$( document ).ready(function() {

    getPageData();

    function getPageData() {

        $.ajax({
            
            dataType: 'json',
            url: 'api/getData.php',
           
    
        }).done(function(data){
             window.chart_data = data.data;
             //console.log(window.chart_data);
            manageRow(data.data);
            var ctx = $('#myChart');
            var chart_ass = window.chart_data;
    
            var wtf2=[],wtf3=[];
            for(let i = 0;i< chart_ass.length;i++){

                wtf2[i] = chart_ass[i].total_depts;
                wtf3[i] = chart_ass[i].university;

             }
             chart(ctx,wtf2,wt3);
             
            //return window.chart_data;

    
        });
    
    }


    function manageRow(data) {

        var	rows = '';
            $.each( data, function( key, value ) {

              rows = rows + '<tr>';
    
              rows = rows + '<td>'+value.university+'</td>';
    
              rows = rows + '<td>'+value.year+'</td>';
              rows = rows + '<td>'+value.owned_land+'</td>';
              rows = rows + '<td>'+value.total_faculties+'</td>';
              rows = rows + '<td>'+value.total_depts+'</td>';
              rows = rows + '<td>'+value.admited_students+'</td>';
              rows = rows + '<td>'+value.total_students+'</td>';
              rows = rows + '<td>'+value.graduated_students+'</td>';
              rows = rows + '<td>'+value.total_teachers+'</td>';
              rows = rows + '<td>'+value.total_professors+'</td>';
              rows = rows + '<td>'+value.total_earns+'</td>';
              rows = rows + '<td>'+value.total_expens+'</td>';
    
              rows = rows + '<td data-id="'+value.uni_id+'">';
    
            rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-pencil"></i></button> ';
    
            rows = rows + '<button class="btn btn-danger btn-circle remove-item"><i class="glyphicon glyphicon-remove"></i></button>';
    
            rows = rows + '</td>';
    
              rows = rows + '</tr>';
    
        });
        $("tbody").html(rows);
    
    }
    
    //Chart
function chart(ctx,wtf2,wtf3){

    
    
     
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: wtf3,
            datasets: [{
                label: 'Total Depertments',
                data: wtf2,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}
    

    //University Data Create

    $(".crud-submit").click(function(e) {
    
        e.preventDefault();

        var values = $('#wtf').serialize();
    
        $.ajax({
                type:'POST',
                url:  'api/create.php',
                data:values
    
            }).done(function(data){
    
                $("input[type=number]").val('');
                $("input[type=text]").val('');
                getPageData();
                $(".modal").modal('hide');

                toastr.success(data, 'Success Alert', {timeOut: 5000});
                toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
            });
         });

    
    
    /* Remove Item */
    
    $("body").on("click",".remove-item",function(){
    
        var id = $(this).parent("td").data('id');
       
        var c_obj = $(this).parents("tr");
    
    
        $.ajax({
    
            type:'POST',
    
            url: 'api/delete.php',
    
            data:{uni_id:id}
    
        }).done(function(data){
    
            c_obj.remove();
    
            toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
    
            getPageData();
    
        }); 
    
    
    });
    
    
    /* Edit Item */
    
    $("body").on("click",".edit-item",function(){
    
    
        var id = $(this).parent("td").data('id');
    
        var title = $(this).parent("td").prev("td").prev("td").text();
    
        var description = $(this).parent("td").prev("td").text();
    
    
        $("#edit-item").find("input[name='title']").val(title);
    
        $("#edit-item").find("textarea[name='description']").val(description);
    
        $("#edit-item").find(".edit-id").val(id);
    
    
    });
    
    
    /* Updated new Item */
    
    $(".crud-submit-edit").click(function(e){
    
    
        e.preventDefault();
    
        var form_action = $("#edit-item").find("form").attr("action");
    
        var title = $("#edit-item").find("input[name='title']").val();
    
    
        var description = $("#edit-item").find("textarea[name='description']").val();
    
        var id = $("#edit-item").find(".edit-id").val();
    
    
        if(title != '' && description != ''){
    
            $.ajax({
    
                dataType: 'json',
    
                type:'POST',
    
                url: form_action,
    
                data:{title:title, description:description,id:id}
    
            }).done(function(data){
    
                getPageData();
    
                $(".modal").modal('hide');
    
                toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
    
            });
    
        }else{
    
            alert('You are missing title or description.')
    
        }
    
    
    });
    
    });