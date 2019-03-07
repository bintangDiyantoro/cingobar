$(function(){
    $('.showAddModal').on('click', function(){
        $('#modalTitle').html('Add scholars data');
        $('button[type=submit]').html('Insert');
        $('#id').val(null);
        $('#name').val(null);
        $('#nis').val(null);
        $('#email').val(null);
        $('#department').val('Technique of Informatique');
    });
    $('.editModal').on('click', function(){
        $('#modalTitle').html('Edit scholars data');
        $('button[type=submit]').html('Update');
        $('.modal-body form').attr('action', 'http://localhost/scholar/update');

        const id = $(this).data('id');

        $.ajax({
            url     : 'http://localhost/scholar/getupdate',
            data    : {id: id},
            method  : 'post',
            dataType: 'json',
            success : function(data){
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#nis').val(data.nis);
                $('#email').val(data.email);
                $('#department').val(data.department);
            }
        });
    });
});