$(document).ready(function() {
    let replyContainer = $("#replyContainer");
    let addButtton = $('#plus');

    $(addButtton).on('click', function(e) {
        e.preventDefault();
        let newRow = `<div class="main-div">
                        <div class="d-flex justify-content-between">
                            <label for="defaultFormControlInput" class="form-label mt-3"><div class="bx bx-chat"></div> Reply Message</label>
                            <button class="btn btn-danger remove mt-2 mb-3"><i class="bx bx-x"></i></button>
                        </div>
                        <textarea name="message[]" placeholder="Enter Message" cols="30" rows="10" class="form-control message"></textarea>
                    </div>`;
        $(replyContainer).append(newRow);
    });

    $(document).on('click', '.remove', function(e) {
        e.preventDefault();
        $(this).closest('.main-div').remove();
    });

    // Validation for Reply Message
    let replyForm = $('#replyMessage');
    $(replyForm).submit(function(e) {
        let allFieldsFilled = true;

        $(replyContainer).find('.message').each(function(index, value) {
            if ($(this).val() === "") {
                allFieldsFilled = false;
                return false;  // Exit the loop early if any field is empty
            }
        });

        if (!allFieldsFilled) {
            e.preventDefault();
            toastr['error']("Reply Message is Required..!");
        }
    });
});
