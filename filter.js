let selectMenu = document.querySelector('#select_format'); //accessing the dropdown menu by targetting the elements id 
let container = document.querySelector(".cours-bx");

if (selectMenu !== null) {
    console.log("null");
}

//product-wrapper = cours-bx
selectMenu.addEventListener("change", function(){ //a function everytime a user clicks on it. note the 'selectMenu.addE...'
 let formatName = this.value; // getting the selected option value

 let http = new XMLHttpRequest(); //AJAX request

 http.onload = function(){ //if the server loaded successfully, it'll check the function
     if(this.readyState == 4 && this.status == 200){
        let response = JSON.parse(this.responseText); //next is to transform json string into javascript object
        let out = "";
        for(let item of response){
                        
            out += `						
            <div class="cours-bx">
            <div class="action-box">
                <img src="" alt="">
                <a href="courses-details.php?course_id=${item.content_id}" class="btn">Read More</a>
            </div>
            <div class="info-bx text-center">
                <h5><a href="#">${item.title}</a></h5>
                <span>${item.class_code}</span>
            </div>
            <div class="cours-more-info">
                <div class="review">
                    <span>Validity: ${item.validity} days</span>
                    <br>
                    <span>Due: ${item.due} days</span>
                    <!-- Include your star rating here if it's part of the response -->
                </div>
                <div class="price">
                    <h7 style="font-size: 12px;">Class ID</h7>
                    <h5 style="font-size: 15px;">${item.class_id}</h5>
                </div>
            </div>
        </div>`;
        }
        container.innerHTML = out;
     }
 }
 http.open('POST', "script.php"); //to prepare the request
 http.setRequestHeader("content-type","application/x-www-form-urlencoded");
 http.send("format="+formatName); // sending data to the php file, acts like a FORM of html where 'category' is what is sent to the php.

});