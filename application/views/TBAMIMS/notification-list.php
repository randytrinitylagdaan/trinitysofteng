<div class="level1">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/thirdparty/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/thirdparty/easyui/themes/icon.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/thirdparty/easyui/jquery.easyui.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/triune.css" />
    <script type="text/javascript">
        function doSearch(){
            $('#tt').datagrid('load',{
                ID: $('#ID').val(),
                requestNumber: $('#requestNumber').val(),
                userNamae: $('#userNamae').val(),
            });
        }
    </script>   

<table id="tt" class="easyui-datagrid" style="width:100%;max-width:100%;padding:5px 5px;font-size: 5px;"
        url="getAllNotificationsTBAMIMS" toolbar="#tb"
        title="Request Notifications" iconCls="icon-save"
        rownumbers="true" pagination="true" data-options="singleSelect: true,
        rowStyler: function(){
                        return 'padding:5px;';
                }         
        ">

    <thead>
        <tr >
            <th field="ID" align="right" >ID</th>
            <th field="requestNumber" >Request #</th>
            <th field="requestStatus" >Status</th>
            <th field="notification" >Notification</th>
            <th field="userName" >User Name</th>
            
        </tr>
    </thead>
</table>
<div id="tb" style="padding:2px">
    <span>ID:</span>
    <input id="ID" style="line-height:15px;border:1px solid #ccc">
    <span>Request Number:</span>
    <input id="requestNumber" style="line-height:15px;border:1px solid #ccc">
    <span>User Name:</span>
    <input id="userNamae" style="line-height:15px;border:1px solid #ccc">
    <a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>

</div>




<script type="text/javascript">
$(document).ready(function(){

	$('#tt').datagrid({
		rowStyler:function(index,row){
			if (row.completedFlag == 'Y'){
				return 'background-color:darkgreen;color:gold;font-weight:bold;';
			}
		}
	});


    $('#tt').datagrid({

        onClickRow: function() {

            var row = $('#tt').datagrid('getSelected');
           // $('#tt').datagrid('unselectAll');
           row.styler = function(){
	        return 'background-color:yellow';
            };

           // $('#tt').datagrid('enableCellEditing');
            //$('#tt').datagrid('options').onBeforeSelect = function(){return true;};
           
            jQuery.ajax({
            url: 'TBAMIMS/showNotifications',
            data: { 
				'requestNumber' : row.requestNumber,
				'ID' : row.ID,
				'requestStatus' : row.requestStatus
				
			},
            type: "POST",
            success: function(response) {
                $('div.level2').remove();

                $('.leveltwocontent').append(response);
        
                console.log("the request is successful for content1!");
            },
                        
            error: function(error) {
                console.log('the page was NOT loaded', error);
                $('.leveltwocontent').html(error);
            },
                        
            complete: function(xhr, status) {
                console.log("The request is complete!");
            }
        }); //jQuery.ajax({

        }

    });
    return false;
	
	

    
});
</script> 

</div>