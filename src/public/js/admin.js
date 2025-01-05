$('.form-btn').click(function() {

    const name     = $('input[name="name"]').val();
    const email    = $('input[name="email"]').val();
    const tel      = $('input[name="tel"]').val();
    const gender   = $('input[name="gender"]:checked').val();
    const contents = $('textarea[name="contents"]').val();
    const inputContents = contents.replace( /\r?\n/g, '<br />' );

    $('.modal-name').text(name).val(name);
    $('.modal-email').text(email).val(email);
    $('.modal-tel').text(tel).val(tel);
    $('.modal-gender').text(gender).val(gender);
    $('.modal-contents').html(inputContents).val(contents);

    const checkbox = [];
    $('input[name="checkbox"]:checked').each(function() {
        checkbox.push($(this).val());
        $('.modal-checkbox').text(checkbox).val(checkbox);
    });

});