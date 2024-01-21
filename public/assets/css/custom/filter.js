$(document).ready(function(){

    // Ajax for getting Min and Max Price Products
    let min_price       = $('#slider-range-value1');
    let max_price       = $('#slider-range-value2');
    let productContainer= $("#productContainer");
    let ApplyFilterRange = $("#ApplyFilterRange");
    $(ApplyFilterRange).on('click' , function(e){
        e.preventDefault();
        let product = '';
        $('.loader-ajax').fadeIn();

        $.ajax({
            url : rangeRoute ,
            type:'Get',
            data:{min_price:min_price.text() , max_price:max_price.text()},
            success:function(response){
                $('.loader-ajax').fadeOut();
                if(response != null && response != ""){
                    $(response).each(function(index, value){
                        let batch = '';

                        let price = `
                        <p class="price">PKR, ${value.price }</p>`;
                        if(value.sale_status == 1){
                            batch =`
                            <div class="batch">
                                <span>- ${value.discount_percentage}  %</span>
                                </div>`;
                            price = `

                        <p class="price">PKR , ${ value.discounted_price } <del>PKR, ${value.price }</del></p>
                       `;
                        }
                        let feedback     = value.feedbacks;
                        let subimage     = baseUrl + 'ProductSubImages/' +value.subimage.image;
                        let viewProduct  = accordion +'/'+ value.id;
                        let imageProduct = baseUrl +'ProductImages/'+value.image;
                        console.log(imageProduct);
                        product +=`<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 item">
                        <div class="product-card style-3 hover-btn">
                        <div class="product-card-img double-img">
                        <a href="${viewProduct}">
                        <img src="${imageProduct}" alt style="height:280px!important;object-fit:cover"  class="img1">
                        <img src="${subimage}" style="height:280px!important;object-fit:cover" alt class="img2">
                        ${batch}
                        </a>
                        <div class="overlay">
                        <div class="cart-area">
                        <a href="${viewProduct}" class="hover-btn3 add-cart-btn" >*Quick View*</a>
                        </div>
                        </div>
                        <div class="view-and-favorite-area">
                        <ul>
                        <li>
                        <a href="whistlist.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <g clip-path="url(#clip0_168_378)">
                        <path d="M16.528 2.20919C16.0674 1.71411 15.5099 1.31906 14.8902 1.04859C14.2704 0.778112 13.6017 0.637996 12.9255 0.636946C12.2487 0.637725 11.5794 0.777639 10.959 1.048C10.3386 1.31835 9.78042 1.71338 9.31911 2.20854L9.00132 2.54436L8.68352 2.20854C6.83326 0.217151 3.71893 0.102789 1.72758 1.95306C1.63932 2.03507 1.5541 2.12029 1.47209 2.20854C-0.490696 4.32565 -0.490696 7.59753 1.47209 9.71463L8.5343 17.1622C8.77862 17.4201 9.18579 17.4312 9.44373 17.1868C9.45217 17.1788 9.46039 17.1706 9.46838 17.1622L16.528 9.71463C18.4907 7.59776 18.4907 4.32606 16.528 2.20919ZM15.5971 8.82879H15.5965L9.00132 15.7849L2.40553 8.82879C0.90608 7.21113 0.90608 4.7114 2.40553 3.09374C3.76722 1.61789 6.06755 1.52535 7.5434 2.88703C7.61505 2.95314 7.68401 3.0221 7.75012 3.09374L8.5343 3.92104C8.79272 4.17781 9.20995 4.17781 9.46838 3.92104L10.2526 3.09438C11.6142 1.61853 13.9146 1.52599 15.3904 2.88767C15.4621 2.95378 15.531 3.02274 15.5971 3.09438C17.1096 4.71461 17.1207 7.2189 15.5971 8.82879Z" />
                        </g>
                        </svg>
                        </a>
                        </li>
                        <li>
                        <a href="${viewProduct}" title="View Product">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12" fill="none">
                        <g clip-path="url(#clip0_1624_9279)">
                        <path d="M9.34308 12H2.65737C1.24308 12 0.0859375 10.8429 0.0859375 9.42857V9.34286L0.34308 2.48571C0.385937 1.07143 1.54308 0 2.91451 0H9.08594C10.4574 0 11.6145 1.07143 11.6574 2.48571L11.9145 9.34286C11.9574 10.0286 11.7002 10.6714 11.2288 11.1857C10.7574 11.7 10.1145 12 9.42879 12H9.34308ZM2.91451 0.857143C1.97165 0.857143 1.24308 1.58571 1.20022 2.48571L0.94308 9.42857C0.94308 10.3714 1.71451 11.1429 2.65737 11.1429H9.42879C9.90022 11.1429 10.3288 10.9286 10.6288 10.5857C10.9288 10.2429 11.1002 9.81429 11.1002 9.34286L10.8431 2.48571C10.8002 1.54286 10.0717 0.857143 9.12879 0.857143H2.91451Z" />
                        <path d="M6.00018 5.14244C4.32875 5.14244 3.00018 3.81387 3.00018 2.14244C3.00018 1.8853 3.17161 1.71387 3.42875 1.71387C3.6859 1.71387 3.85733 1.8853 3.85733 2.14244C3.85733 3.34244 4.80018 4.2853 6.00018 4.2853C7.20018 4.2853 8.14304 3.34244 8.14304 2.14244C8.14304 1.8853 8.31447 1.71387 8.57161 1.71387C8.82875 1.71387 9.00018 1.8853 9.00018 2.14244C9.00018 3.81387 7.67161 5.14244 6.00018 5.14244Z" />
                        </g>
                        </svg>
                        </a>
                        </li>
                        </ul>
                        </div>
                        </div>


                        <div class="product-card-content">
                        <h6><a href="${viewProduct}" class="hover-underline">${value.name}</a></h6>
                        <p><a href="${viewProduct}">${value.brand.name}</a></p>
                        ${price}
                        <div class="rating">
                        <ul>` ;
                        let totalRating  = 0;
                        let totalRecords = feedback.length;
                        // Calculating All Feedbacks
                        $.each(feedback, function(index , feedbacks){
                            totalRating+=feedbacks.rating;
                        });
                        // Calculating Average Ratings
                        let averageRating  = (totalRecords > 0) ? (totalRating / totalRecords) : 0;
                        // Max Stars;
                        let maxStars = 5;
                        // Calculating The number of full start
                        let fullStars = Math.floor(averageRating / maxStars);
                        let halfStars = averageRating % maxStars >= (maxStars / 2);
                        // Displaying Full Stars
                        for(let i = 0 ;  i < fullStars ; i ++){
                            product += `<li><i class="bi bi-star-fill"></i></li>`;
                        }
                        //Half Stars Loop
                        if(halfStars){
                            product += `<li><i class="bi bi-star-half"></i></li>`;
                            fullStars ++;
                        }
                        let emptyStars  = maxStars - fullStars;
                        for(let i = 0 ; i < emptyStars ; i++){
                            product += `<li><i class="bi bi-star"></i></li>`;
                        }
                        product+=`
                        </ul>
                        <span>(${ totalRecords})</span>
                        </div>

                        </div>
                        <span class="for-border"></span>
                        </div>
                        </div>
                        </div>
                        </div>`;
                    });
                }
                else{
                    product  = `<center><b class="text-danger">No Products Available</b></center>`;
                }
                $(productContainer).html(product);
            }
        })
    });
    // Ajax For Categories Search and Brands Search ;
    let CategoryButton = $('.category-filter');
    $(CategoryButton).on('click' , function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let product = '';
        $('.loader-ajax').fadeIn();
        $.ajax({
            url : categoryRoute ,
            type:'Get',
            data:{category_id:id},
            success:function(response){
                $('.loader-ajax').fadeOut();
                if(response != null && response != ""){
                    $(response).each(function(index, value){
                        let batch = '';

                        let price = `
                        <p class="price">PKR, ${value.price }</p>`;
                        if(value.sale_status == 1){
                            batch =`
                            <div class="batch">
                                <span>- ${value.discount_percentage}  %</span>
                                </div>`;
                            price = `

                        <p class="price">PKR , ${ value.discounted_price } <del>PKR, ${value.price }</del></p>
                       `;
                        }
                        let feedback     = value.feedbacks;
                        let subimage     = baseUrl + 'ProductSubImages/' +value.subimage.image;
                        let viewProduct  = accordion +'/'+ value.id;
                        let imageProduct = baseUrl +'ProductImages/'+value.image;
                        console.log(imageProduct);
                        product +=`<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 item">
                        <div class="product-card style-3 hover-btn">
                        <div class="product-card-img double-img">
                        <a href="${viewProduct}">
                        <img src="${imageProduct}" alt style="height:280px!important;object-fit:cover"  class="img1">
                        <img src="${subimage}" style="height:280px!important;object-fit:cover" alt class="img2">
                        ${batch}
                        </a>
                        <div class="overlay">
                        <div class="cart-area">
                        <a href="${viewProduct}" class="hover-btn3 add-cart-btn" >*Quick View*</a>
                        </div>
                        </div>
                        <div class="view-and-favorite-area">
                        <ul>
                        <li>
                        <a href="whistlist.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <g clip-path="url(#clip0_168_378)">
                        <path d="M16.528 2.20919C16.0674 1.71411 15.5099 1.31906 14.8902 1.04859C14.2704 0.778112 13.6017 0.637996 12.9255 0.636946C12.2487 0.637725 11.5794 0.777639 10.959 1.048C10.3386 1.31835 9.78042 1.71338 9.31911 2.20854L9.00132 2.54436L8.68352 2.20854C6.83326 0.217151 3.71893 0.102789 1.72758 1.95306C1.63932 2.03507 1.5541 2.12029 1.47209 2.20854C-0.490696 4.32565 -0.490696 7.59753 1.47209 9.71463L8.5343 17.1622C8.77862 17.4201 9.18579 17.4312 9.44373 17.1868C9.45217 17.1788 9.46039 17.1706 9.46838 17.1622L16.528 9.71463C18.4907 7.59776 18.4907 4.32606 16.528 2.20919ZM15.5971 8.82879H15.5965L9.00132 15.7849L2.40553 8.82879C0.90608 7.21113 0.90608 4.7114 2.40553 3.09374C3.76722 1.61789 6.06755 1.52535 7.5434 2.88703C7.61505 2.95314 7.68401 3.0221 7.75012 3.09374L8.5343 3.92104C8.79272 4.17781 9.20995 4.17781 9.46838 3.92104L10.2526 3.09438C11.6142 1.61853 13.9146 1.52599 15.3904 2.88767C15.4621 2.95378 15.531 3.02274 15.5971 3.09438C17.1096 4.71461 17.1207 7.2189 15.5971 8.82879Z" />
                        </g>
                        </svg>
                        </a>
                        </li>
                        <li>
                        <a href="${viewProduct}" title="View Product">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12" fill="none">
                        <g clip-path="url(#clip0_1624_9279)">
                        <path d="M9.34308 12H2.65737C1.24308 12 0.0859375 10.8429 0.0859375 9.42857V9.34286L0.34308 2.48571C0.385937 1.07143 1.54308 0 2.91451 0H9.08594C10.4574 0 11.6145 1.07143 11.6574 2.48571L11.9145 9.34286C11.9574 10.0286 11.7002 10.6714 11.2288 11.1857C10.7574 11.7 10.1145 12 9.42879 12H9.34308ZM2.91451 0.857143C1.97165 0.857143 1.24308 1.58571 1.20022 2.48571L0.94308 9.42857C0.94308 10.3714 1.71451 11.1429 2.65737 11.1429H9.42879C9.90022 11.1429 10.3288 10.9286 10.6288 10.5857C10.9288 10.2429 11.1002 9.81429 11.1002 9.34286L10.8431 2.48571C10.8002 1.54286 10.0717 0.857143 9.12879 0.857143H2.91451Z" />
                        <path d="M6.00018 5.14244C4.32875 5.14244 3.00018 3.81387 3.00018 2.14244C3.00018 1.8853 3.17161 1.71387 3.42875 1.71387C3.6859 1.71387 3.85733 1.8853 3.85733 2.14244C3.85733 3.34244 4.80018 4.2853 6.00018 4.2853C7.20018 4.2853 8.14304 3.34244 8.14304 2.14244C8.14304 1.8853 8.31447 1.71387 8.57161 1.71387C8.82875 1.71387 9.00018 1.8853 9.00018 2.14244C9.00018 3.81387 7.67161 5.14244 6.00018 5.14244Z" />
                        </g>
                        </svg>
                        </a>
                        </li>
                        </ul>
                        </div>
                        </div>


                        <div class="product-card-content">
                        <h6><a href="${viewProduct}" class="hover-underline">${value.name}</a></h6>
                        <p><a href="${viewProduct}">${value.brand.name}</a></p>
                        ${price}
                        <div class="rating">
                        <ul>` ;
                        let totalRating  = 0;
                        let totalRecords = feedback.length;
                        // Calculating All Feedbacks
                        $.each(feedback, function(index , feedbacks){
                            totalRating+=feedbacks.rating;
                        });
                        // Calculating Average Ratings
                        let averageRating  = (totalRecords > 0) ? (totalRating / totalRecords) : 0;
                        // Max Stars;
                        let maxStars = 5;
                        // Calculating The number of full start
                        let fullStars = Math.floor(averageRating / maxStars);
                        let halfStars = averageRating % maxStars >= (maxStars / 2);
                        // Displaying Full Stars
                        for(let i = 0 ;  i < fullStars ; i ++){
                            product += `<li><i class="bi bi-star-fill"></i></li>`;
                        }
                        //Half Stars Loop
                        if(halfStars){
                            product += `<li><i class="bi bi-star-half"></i></li>`;
                            fullStars ++;
                        }
                        let emptyStars  = maxStars - fullStars;
                        for(let i = 0 ; i < emptyStars ; i++){
                            product += `<li><i class="bi bi-star"></i></li>`;
                        }
                        product+=`
                        </ul>
                        <span>(${ totalRecords})</span>
                        </div>

                        </div>
                        <span class="for-border"></span>
                        </div>
                        </div>
                        </div>
                        </div>`;
                    });
                }
                else{
                    product  = `<center><b class="text-danger">No Products Available</b></center>`;
                }
                $(productContainer).html(product);
            }
        })
    });
    // Ajax For Brands Filter
    let BrandsFilter  = $(".brand-filter");
    $(BrandsFilter).on('click' , function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let product = '';
        $('.loader-ajax').fadeIn();
        $.ajax({
            url : brandRoute ,
            type:'Get',
            data:{brand_id:id},
            success:function(response){
                $('.loader-ajax').fadeOut();
                if(response != null && response != ""){
                    $(response).each(function(index, value){
                        let batch = '';

                        let price = `
                        <p class="price">PKR, ${value.price }</p>`;
                        if(value.sale_status == 1){
                            batch =`
                            <div class="batch">
                                <span>- ${value.discount_percentage}  %</span>
                                </div>`;
                            price = `

                        <p class="price">PKR , ${ value.discounted_price } <del>PKR, ${value.price }</del></p>
                       `;
                        }
                        let feedback     = value.feedbacks;
                        let subimage     = baseUrl + 'ProductSubImages/' +value.subimage.image;
                        let viewProduct  = accordion +'/'+ value.id;
                        let imageProduct = baseUrl +'ProductImages/'+value.image;
                        console.log(imageProduct);
                        product +=`<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 item">
                        <div class="product-card style-3 hover-btn">
                        <div class="product-card-img double-img">
                        <a href="${viewProduct}">
                        <img src="${imageProduct}" alt style="height:280px!important;object-fit:cover"  class="img1">
                        <img src="${subimage}" style="height:280px!important;object-fit:cover" alt class="img2">
                        ${batch}
                        </a>
                        <div class="overlay">
                        <div class="cart-area">
                        <a href="${viewProduct}" class="hover-btn3 add-cart-btn" >*Quick View*</a>
                        </div>
                        </div>
                        <div class="view-and-favorite-area">
                        <ul>
                        <li>
                        <a href="whistlist.html">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <g clip-path="url(#clip0_168_378)">
                        <path d="M16.528 2.20919C16.0674 1.71411 15.5099 1.31906 14.8902 1.04859C14.2704 0.778112 13.6017 0.637996 12.9255 0.636946C12.2487 0.637725 11.5794 0.777639 10.959 1.048C10.3386 1.31835 9.78042 1.71338 9.31911 2.20854L9.00132 2.54436L8.68352 2.20854C6.83326 0.217151 3.71893 0.102789 1.72758 1.95306C1.63932 2.03507 1.5541 2.12029 1.47209 2.20854C-0.490696 4.32565 -0.490696 7.59753 1.47209 9.71463L8.5343 17.1622C8.77862 17.4201 9.18579 17.4312 9.44373 17.1868C9.45217 17.1788 9.46039 17.1706 9.46838 17.1622L16.528 9.71463C18.4907 7.59776 18.4907 4.32606 16.528 2.20919ZM15.5971 8.82879H15.5965L9.00132 15.7849L2.40553 8.82879C0.90608 7.21113 0.90608 4.7114 2.40553 3.09374C3.76722 1.61789 6.06755 1.52535 7.5434 2.88703C7.61505 2.95314 7.68401 3.0221 7.75012 3.09374L8.5343 3.92104C8.79272 4.17781 9.20995 4.17781 9.46838 3.92104L10.2526 3.09438C11.6142 1.61853 13.9146 1.52599 15.3904 2.88767C15.4621 2.95378 15.531 3.02274 15.5971 3.09438C17.1096 4.71461 17.1207 7.2189 15.5971 8.82879Z" />
                        </g>
                        </svg>
                        </a>
                        </li>
                        <li>
                        <a href="${viewProduct}" title="View Product">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12" fill="none">
                        <g clip-path="url(#clip0_1624_9279)">
                        <path d="M9.34308 12H2.65737C1.24308 12 0.0859375 10.8429 0.0859375 9.42857V9.34286L0.34308 2.48571C0.385937 1.07143 1.54308 0 2.91451 0H9.08594C10.4574 0 11.6145 1.07143 11.6574 2.48571L11.9145 9.34286C11.9574 10.0286 11.7002 10.6714 11.2288 11.1857C10.7574 11.7 10.1145 12 9.42879 12H9.34308ZM2.91451 0.857143C1.97165 0.857143 1.24308 1.58571 1.20022 2.48571L0.94308 9.42857C0.94308 10.3714 1.71451 11.1429 2.65737 11.1429H9.42879C9.90022 11.1429 10.3288 10.9286 10.6288 10.5857C10.9288 10.2429 11.1002 9.81429 11.1002 9.34286L10.8431 2.48571C10.8002 1.54286 10.0717 0.857143 9.12879 0.857143H2.91451Z" />
                        <path d="M6.00018 5.14244C4.32875 5.14244 3.00018 3.81387 3.00018 2.14244C3.00018 1.8853 3.17161 1.71387 3.42875 1.71387C3.6859 1.71387 3.85733 1.8853 3.85733 2.14244C3.85733 3.34244 4.80018 4.2853 6.00018 4.2853C7.20018 4.2853 8.14304 3.34244 8.14304 2.14244C8.14304 1.8853 8.31447 1.71387 8.57161 1.71387C8.82875 1.71387 9.00018 1.8853 9.00018 2.14244C9.00018 3.81387 7.67161 5.14244 6.00018 5.14244Z" />
                        </g>
                        </svg>
                        </a>
                        </li>
                        </ul>
                        </div>
                        </div>


                        <div class="product-card-content">
                        <h6><a href="${viewProduct}" class="hover-underline">${value.name}</a></h6>
                        <p><a href="${viewProduct}">${value.brand.name}</a></p>
                        ${price}
                        <div class="rating">
                        <ul>` ;
                        let totalRating  = 0;
                        let totalRecords = feedback.length;
                        // Calculating All Feedbacks
                        $.each(feedback, function(index , feedbacks){
                            totalRating+=feedbacks.rating;
                        });
                        // Calculating Average Ratings
                        let averageRating  = (totalRecords > 0) ? (totalRating / totalRecords) : 0;
                        // Max Stars;
                        let maxStars = 5;
                        // Calculating The number of full start
                        let fullStars = Math.floor(averageRating / maxStars);
                        let halfStars = averageRating % maxStars >= (maxStars / 2);
                        // Displaying Full Stars
                        for(let i = 0 ;  i < fullStars ; i ++){
                            product += `<li><i class="bi bi-star-fill"></i></li>`;
                        }
                        //Half Stars Loop
                        if(halfStars){
                            product += `<li><i class="bi bi-star-half"></i></li>`;
                            fullStars ++;
                        }
                        let emptyStars  = maxStars - fullStars;
                        for(let i = 0 ; i < emptyStars ; i++){
                            product += `<li><i class="bi bi-star"></i></li>`;
                        }
                        product+=`
                        </ul>
                        <span>(${ totalRecords})</span>
                        </div>

                        </div>
                        <span class="for-border"></span>
                        </div>
                        </div>
                        </div>
                        </div>`;
                    });
                }
                else{
                    product  = `<center><b class="text-danger">No Products Available</b></center>`;
                }
                $(productContainer).html(product);
            }
        })
    });
    // Ajax For Price Sorting
    let sortingFilter = $('.sortByPrice');
    $(sortingFilter).on('change' , function(e){
        e.preventDefault();
        let sortValue = $(this).val();
        if(sortValue != ""){
            let product = '';
            $('.loader-ajax').fadeIn();
            $.ajax({
                url : sortRoute ,
                type:'Get',
                data:{order:sortValue},
                success:function(response){
                    $('.loader-ajax').fadeOut();
                    if(response != null && response != ""){
                        $(response).each(function(index, value){
                            let batch = '';

                            let price = `
                            <p class="price">PKR, ${value.price }</p>`;
                            if(value.sale_status == 1){
                                batch =`
                                <div class="batch">
                                    <span>- ${value.discount_percentage}  %</span>
                                    </div>`;
                                price = `

                            <p class="price">PKR , ${ value.discounted_price } <del>PKR, ${value.price }</del></p>
                           `;
                            }
                            let feedback     = value.feedbacks;
                            let subimage     = baseUrl + 'ProductSubImages/' +value.subimage.image;
                            let viewProduct  = accordion +'/'+ value.id;
                            let imageProduct = baseUrl +'ProductImages/'+value.image;
                            console.log(imageProduct);
                            product +=`<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 item">
                            <div class="product-card style-3 hover-btn">
                            <div class="product-card-img double-img">
                            <a href="${viewProduct}">
                            <img src="${imageProduct}" alt style="height:280px!important;object-fit:cover"  class="img1">
                            <img src="${subimage}" style="height:280px!important;object-fit:cover" alt class="img2">
                            ${batch}
                            </a>
                            <div class="overlay">
                            <div class="cart-area">
                            <a href="${viewProduct}" class="hover-btn3 add-cart-btn" >*Quick View*</a>
                            </div>
                            </div>
                            <div class="view-and-favorite-area">
                            <ul>
                            <li>
                            <a href="whistlist.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <g clip-path="url(#clip0_168_378)">
                            <path d="M16.528 2.20919C16.0674 1.71411 15.5099 1.31906 14.8902 1.04859C14.2704 0.778112 13.6017 0.637996 12.9255 0.636946C12.2487 0.637725 11.5794 0.777639 10.959 1.048C10.3386 1.31835 9.78042 1.71338 9.31911 2.20854L9.00132 2.54436L8.68352 2.20854C6.83326 0.217151 3.71893 0.102789 1.72758 1.95306C1.63932 2.03507 1.5541 2.12029 1.47209 2.20854C-0.490696 4.32565 -0.490696 7.59753 1.47209 9.71463L8.5343 17.1622C8.77862 17.4201 9.18579 17.4312 9.44373 17.1868C9.45217 17.1788 9.46039 17.1706 9.46838 17.1622L16.528 9.71463C18.4907 7.59776 18.4907 4.32606 16.528 2.20919ZM15.5971 8.82879H15.5965L9.00132 15.7849L2.40553 8.82879C0.90608 7.21113 0.90608 4.7114 2.40553 3.09374C3.76722 1.61789 6.06755 1.52535 7.5434 2.88703C7.61505 2.95314 7.68401 3.0221 7.75012 3.09374L8.5343 3.92104C8.79272 4.17781 9.20995 4.17781 9.46838 3.92104L10.2526 3.09438C11.6142 1.61853 13.9146 1.52599 15.3904 2.88767C15.4621 2.95378 15.531 3.02274 15.5971 3.09438C17.1096 4.71461 17.1207 7.2189 15.5971 8.82879Z" />
                            </g>
                            </svg>
                            </a>
                            </li>
                            <li>
                            <a href="${viewProduct}" title="View Product">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12" fill="none">
                            <g clip-path="url(#clip0_1624_9279)">
                            <path d="M9.34308 12H2.65737C1.24308 12 0.0859375 10.8429 0.0859375 9.42857V9.34286L0.34308 2.48571C0.385937 1.07143 1.54308 0 2.91451 0H9.08594C10.4574 0 11.6145 1.07143 11.6574 2.48571L11.9145 9.34286C11.9574 10.0286 11.7002 10.6714 11.2288 11.1857C10.7574 11.7 10.1145 12 9.42879 12H9.34308ZM2.91451 0.857143C1.97165 0.857143 1.24308 1.58571 1.20022 2.48571L0.94308 9.42857C0.94308 10.3714 1.71451 11.1429 2.65737 11.1429H9.42879C9.90022 11.1429 10.3288 10.9286 10.6288 10.5857C10.9288 10.2429 11.1002 9.81429 11.1002 9.34286L10.8431 2.48571C10.8002 1.54286 10.0717 0.857143 9.12879 0.857143H2.91451Z" />
                            <path d="M6.00018 5.14244C4.32875 5.14244 3.00018 3.81387 3.00018 2.14244C3.00018 1.8853 3.17161 1.71387 3.42875 1.71387C3.6859 1.71387 3.85733 1.8853 3.85733 2.14244C3.85733 3.34244 4.80018 4.2853 6.00018 4.2853C7.20018 4.2853 8.14304 3.34244 8.14304 2.14244C8.14304 1.8853 8.31447 1.71387 8.57161 1.71387C8.82875 1.71387 9.00018 1.8853 9.00018 2.14244C9.00018 3.81387 7.67161 5.14244 6.00018 5.14244Z" />
                            </g>
                            </svg>
                            </a>
                            </li>
                            </ul>
                            </div>
                            </div>


                            <div class="product-card-content">
                            <h6><a href="${viewProduct}" class="hover-underline">${value.name}</a></h6>
                            <p><a href="${viewProduct}">${value.brand.name}</a></p>
                            ${price}
                            <div class="rating">
                            <ul>` ;
                            let totalRating  = 0;
                            let totalRecords = feedback.length;
                            // Calculating All Feedbacks
                            $.each(feedback, function(index , feedbacks){
                                totalRating+=feedbacks.rating;
                            });
                            // Calculating Average Ratings
                            let averageRating  = (totalRecords > 0) ? (totalRating / totalRecords) : 0;
                            // Max Stars;
                            let maxStars = 5;
                            // Calculating The number of full start
                            let fullStars = Math.floor(averageRating / maxStars);
                            let halfStars = averageRating % maxStars >= (maxStars / 2);
                            // Displaying Full Stars
                            for(let i = 0 ;  i < fullStars ; i ++){
                                product += `<li><i class="bi bi-star-fill"></i></li>`;
                            }
                            //Half Stars Loop
                            if(halfStars){
                                product += `<li><i class="bi bi-star-half"></i></li>`;
                                fullStars ++;
                            }
                            let emptyStars  = maxStars - fullStars;
                            for(let i = 0 ; i < emptyStars ; i++){
                                product += `<li><i class="bi bi-star"></i></li>`;
                            }
                            product+=`
                            </ul>
                            <span>(${ totalRecords})</span>
                            </div>

                            </div>
                            <span class="for-border"></span>
                            </div>
                            </div>
                            </div>
                            </div>`;
                        });
                    }
                    else{
                        product  = `<center><b class="text-danger">No Products Available</b></center>`;
                    }
                    $(productContainer).html(product);
                }
            })
        }
    });
})
