$(document).ready(function(){

    let homeForm        = $("#homelinksForm");
    let title        = $("input[name='title']");
    let route        = $("input[name='route']");
    let divId        = $("input[name='div_id']");

    $(homeForm).submit(function(e){


        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Nav  Title is required");
            return false ;
        }
        if($(route).val() == "" && $(divId).val() == "" ){
            e.preventDefault();
            toastr['error']("Please Provide a div id or Route name for nav link");
            return false ;
        }




    });

    if(action == "edit"){
    title.val(homelinks.title);
    route.val(homelinks.route);
    divId.val(homelinks.div_id);

    }

    // // Adding New Div
    // let addDiv = $("#addButton") ;
    // $(addDiv).on('click' , function(e){
    //     e.preventDefault();
    //     let tableData = `
    //     <div class="divs row col-md-12">
    //             <div class="float-end col-md-12  mt-3" style="display: flex ; justify-content:end"><button class="btn btn-danger removeBtn"><div class="bx bx-x"></div></button></div>
    //            <div class="col-md-12 mb-3">
    //             <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Nav Title </label>
    //             <input name="title[]" type="text" class="form-control" placeholder="Enter Nav link Title" aria-describedby="defaultFormControlHelp"/>
    //           </div>
    //          <div class="col-md-6">
    //             <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Route </label>
    //             <input name="route[]" type="text" class="form-control" placeholder="Enter Route name" aria-describedby="defaultFormControlHelp"/>
    //          </div>
    //          <div class="col-md-6">
    //             <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Div Id </label>
    //             <input name="div_id[]" type="text" class="form-control" placeholder="Enter Div Id " aria-describedby="defaultFormControlHelp"/>
    //          </div>
    //         </div>
    //     ` ;
    //     $("#homeContainer").append(tableData);
    // })
    // $(document).on('click' , '.removeBtn' , function(e){
    //     e.preventDefault();
    //     $(this).closest('.divs').remove();
    // })
    });
