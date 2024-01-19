$(document).ready(function(){

    let faqFrom        = $("#faqFrom");
    let title          = $(".title");
    let category       = $("select[name='category']");
    let answer         = $("textarea[name='answer[]']");
    let addMore        = $("#addMore");
    let faqContainer   = $(".faqQuestions");
    $(addMore).on('click' , function(e){
        e.preventDefault();
        let containerData = `
        <div class="faq-container row">
        <div class="button d-flex justify-content-end mt-3"><button  class="btn btn-sm btn-danger removeButton"><i class="bx bx-x"></i></button></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="defaultFormControlInput" class="form-label mb-3 text-start">Question <div class="bx bx-question-mark"></div> </label>
                        <input name="title[]" type="text" class="form-control title" placeholder="Enter Question" aria-describedby="defaultFormControlHelp"/>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Answer (<small class="text-danger">must be less then 250</small>)</label>
                        <textarea name="answer[]" type="text" class="form-control answer"  aria-describedby="defaultFormControlHelp"></textarea>
                    </div>
                </div>
              </div>`;
        $(faqContainer).append(containerData);
    })
    $(document).on("click" , '.removeButton' , function(e){
        $(this).closest('.faq-container').remove();
    })
    $(faqFrom).submit(function(e){
        var  titleEmpty  = false;
        if($(category).val() == ""){
            e.preventDefault();
            toastr['error']("Faq's  Category is required");
            return false ;
        }

        $('.faq-container').find('.title').each(function () {
            if ($(this).val() === "") {
                titleEmpty = true;
                return false;
            }
        });

        if (titleEmpty) {
            e.preventDefault();
            toastr.error("Faq's Question is required");
            return false;
        }

        var isValid = true;

        $('.faq-container').each(function () {
            var $answer = $(this).find('.answer');
            var answerValue = $answer.val();
            if (answerValue === "") {
                isValid = false;
                e.preventDefault();
                toastr.error("Faq's Answer is required");
                return false;
            }

            if (answerValue.length > 250) {
                isValid = false;
                e.preventDefault();
                toastr.error("Faqs' Answer must be less than 250");
                return false;
            }
        });

        if (!isValid) {
            return false;
        }




    });

    if(action == "edit"){
    title.val(faqs.title);
    category.val(faqs.category);
    answer.val(faqs.answer);

    }


    });
