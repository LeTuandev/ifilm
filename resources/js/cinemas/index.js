$(document).ready(function () {
  $('.btn-open-modal').on('click', function () {
    $('#cinemasModal').find('input[name="name"]').val('');
    $('#cinemasModal').find('input[name="address"]').val('');
    $('#cinemasModal').find('.update-or-create').prop('action', '');
    const isEdit = $(this).attr('data-edit')
    const title = $(this).attr('data-title')
    const action = $(this).attr('data-action');
    $('#cinemasModal').find('.modal-title').html('')
    $('#cinemasModal').find('.btn-add').addClass('d-none')
    $('#cinemasModal').find('.btn-save').addClass('d-none')
    if (isEdit !== 'true') {
      $('#cinemasModal').find('.update-or-create').prop('action', action);
      $('#cinemasModal').find('.modal-title').append(title)
      $('#cinemasModal').find('.btn-add').removeClass('d-none')
    }

    if (isEdit === 'true') {
      const cinema = JSON.parse($(this).attr('data-detail'));
      $('#cinemasModal').find('input[name="name"]').val(cinema?.name ?? '');
      $('#cinemasModal').find('.update-or-create').prop('action', action);
      $('#cinemasModal').find('input[name="address"]').val(cinema?.address ?? '');
      $('#cinemasModal').find('.modal-title').append(title);
      $('#cinemasModal').find('.btn-save').removeClass('d-none');
    }
  })

  $('.btn-delete-cinema').on('click', function () {
    $('#deleteModal').find('.modal-title').html('');
    $('#deleteModal').find('.modal-body').html('');
    $('#deleteModal').find('.form-delete').prop('action', '');
    const title = $(this).attr('data-title');
    const content = $(this).attr('data-content');
    const action = $(this).attr('data-action');
    $('#deleteModal').find('.modal-title').append(title);
    $('#deleteModal').find('.modal-body').append(content);
    $('#deleteModal').find('.form-delete').prop('action', action);
  })
});