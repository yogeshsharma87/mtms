$(function() {
    $('.edit-inspection').on('click', function(event) {
    	$("#inspection-id").attr('value',$(event.target).attr('data-id'));
    	$("#fk_region").attr('disabled','disabled');
    	$("#fk_tower").attr('disabled','disabled');
        $.ajax('/inspection/getinfo', {
            method: 'POST',
            data: {
                'id': $(event.target).attr('data-id')
            },
            success: function(data) {
            	console.log(data[0].fk_supervisor);
            	console.log(data[0].fk_technician);
            	$('#fk_supervisor').val(data[0].fk_supervisor);
                $('#fk_technician').val(data[0].fk_technician);
                $('#fk_region').val(data[0].fk_technician);
                $('#fk_tower').val(data[0].fk_technician);
                $('#status').val(data[0].status);
            },
            error: function(data) {
                console.log(data);
            }
        })
    });


    $('.form-submit').on('click', function(event) {

        $.ajax('/inspection/save', {
            method: 'POST',
            data: {
                'form-data': $('#edit-form').serialize()
            },
            success: function(data) {
            	$('#myModal').modal('hide');
            	$('.success-box').modal('show');            	
            },
            error: function(data) {
                console.log(data);
            }
        })
    });

    $('.add-inspection').on('click', function(event) {
    	$("#inspection-id").attr('value','');
    	$("#fk_region").removeAttr('disabled').prop('selectedIndex', 0);
    	$("#fk_tower").removeAttr('disabled').prop('selectedIndex', 0);
    	$("#fk_supervisor").prop('selectedIndex', 0);
    	$("#fk_technician").prop('selectedIndex', 0);
    	$("#status").prop('selectedIndex', 0);
    });

});

function deleteInspection(link)
{
	var currentNode = $(link).attr('data-id');
	var tr = $(link).closest('tr');
	
	$.ajax('/inspection/delete', {
        method: 'POST',
        data: {
            'insid': currentNode
        },
        success: function(data) {
        	$(tr).animate({"opacity":"0"},1000,function(){ $(tr).remove(); });
        },
        error: function(data) {
            console.log(data);
        }
    })

}