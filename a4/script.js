//Function will make sure values are within range
function check()
{
    if(this.value < 0 || this.value > 99)
    {
        alert("You have entered an invalid number of "+this.id+"s");
    }
    return false;
}

//Function will generate total and Alert User
function calculateTotal()
{
    //Get Numbers of Fruit from document
    var numApples= document.getElementById("Apple").value;
    var numOranges= document.getElementById("Orange").value;
    var numBananas= document.getElementById("Banana").value;

    if(numApples <0 || numOranges <0 || numBananas <0)
        return false;
    
    //Calcualte Total Price
    var total = (numApples * 0.69) + (numOranges * 0.59) + (numBananas * 0.49);

    //Get Tax and Add
    var taxAmnt = total*0.0775;
    total += taxAmnt;
    
    //Alert Formatted Number
    alert("Your total cost is $"+parseFloat(total).toFixed(2));
    return false; //avoid submission of form data
}


//Assign handlers
//Doing 'onchange' because on click will not show error if user manually enters 
document.getElementById("Apple").onchange = check;
document.getElementById("Orange").onchange = check;
document.getElementById("Banana").onchange = check;
document.getElementById("process").onclick = calculateTotal;









