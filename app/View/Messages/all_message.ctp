<div class="w-8/12 mx-auto rounded-lg bg-white shadow p-5 mt-8">
	<h1 class="text-center text-2xl font-semibold">All Messages</h1>
	<div class="message-list">
		
	</div>
</div>
<script>
$(document).ready(function() {
    count = "<?php echo $count; ?>";
    getAllMsg(count);   
});
function getAllMsg(){
	let url = "<?php echo $this->Html->url(array('controller' => 'relations','action' => 'list')); ?>";
    url = url+'/'+count;
    $.ajax({
        'type': "get",
        'url': url,
        evalScripts: true,
        success: function (data, status) { 
            // $('.loading').fadeOut('fast', function() {                
                $('.message-list').html(data);
            // })
        }
    });
}
function deleteMessage(id) {
    let url = "<?php echo $this->Html->url(array('controller' => 'messages','action' => 'delete')); ?>";
    if (!confirm('Are you sure that you want to delete this message?')) {
        e.preventDefault();
    } else {
        $.ajax({
            'type': "post",
            'url': url,
            evalScripts: true,
            data:{"id": id},
            success: function (data, status) { 
            	console.log(data);
                $('#msg'+id).closest('div').fadeOut();          
            }
        });
    }     
}
function paginate(count) {
    $('.message-list').html('');
    // $('.loading').fadeIn();
    getAllMsg(count)
}
</script>