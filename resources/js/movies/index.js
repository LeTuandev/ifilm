$(document).ready(function () {
  $('.btn-delete-film').on('click', function () {
    const title = $(this).attr('data-title')
    const content = $(this).attr('data-content')
    const action = $(this).attr('data-action')
    $('#deleteModal').find('.modal-title').html('');
    $('#deleteModal').find('.modal-body').html('');
    $('#deleteModal').find('.form-delete').prop('action', '');
    $('#deleteModal').find('.modal-title').append(title);
    $('#deleteModal').find('.modal-body').append(content);
    $('#deleteModal').find('.form-delete').prop('action', action);
  })
});
