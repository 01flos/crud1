$(document).ready(function(){

    TableNotes = $("#tableNotes").DataTable({

        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<a href='#modal1' data-target='modal1' class='btnEdit modal-tigger "+
                                " btn deep-purple darken-1 waves-effect waves-light' type='submit' "+
                                " name='action'>Update</a>"+
                                " <button class='btnDelete red darken-1 btn waves-effect waves-light'"+
                                " type='submit' name='action'>Delete</button>"
        }]

    }); 

    var rowtablenote;

    $(document).on("click","#new",function(){
        id="";
        name="";
        description="";
        $("#noteName").val(name);
        $('#noteDescription').val(description);
        option=1;
    });

    $(document).on("click",".btnEdit",function(){
        rowtablenote = $(this).closest("tr");
        id = parseInt(rowtablenote.find('td:eq(0)').text());
        name = rowtablenote.find('td:eq(1)').text();
        description = rowtablenote.find('td:eq(2)').text();
        $("#noteName").val(name);
        $("#noteDescription").val(description);
        option=2;
    });

    $(document).on("click",".btnDelete",function(){
        rowtablenote = $(this);
        id = parseInt(rowtablenote.find('td:eq(0)').text());
        option=3;
        $.ajax({
            url:"./crud.php",
            type: "POST",
            datatype: "json",
            data: {option:option, id:id},
            success: function(data){
                console.log(data);
                TableNotes.row(rowtablenote.parents('tr')).remove().draw();
            }, error(x,y,z){
                console.log(x);
                console.log(y);
                console.log(z);
            }
        });
    });

    $("#form")

});