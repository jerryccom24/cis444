var min = 1;    //minimum value of "left"
var max = 1200; //maximum value of "left"
var current= 0; //Current value of left is initalized to ZEROpx within css
var message;    //Our message DOM
var moveRight = true;   //moving message to the right if true
var isRed = true;       //message is the color red if true



//This function will set the min and max values when user presses submit
function update()
{
    min = document.getElementById("start").value;
    max = document.getElementById("end").value;
}


//Starts looping move()
function start()
{
    message = document.getElementById("message"); //get the message dom
    setInterval(function(){move();},1); //call move() on 1 ms interval

}

//Function that controls the movement of the  
function move()
{
    current = message.style.left;
    current = current.match(/\d+/); //extract only the number


    //MOVE RIGHT
    if(moveRight == true)
    {
        current++;
        if(current > max)
            moveRight = false;
    }
    //MOVE LEFT
    else
    {
        current--;
        if(current < min)
            moveRight = true;
    }

    //ALSO, Check if it is a fifth step
    if(current%5 ==0)
        {   
            //if red -- then make blue
            if(isRed)
            {
                message.style.color = "blue";
                isRed = false;
            }
            //else it is blue -- then make red
            else
            {
                message.style.color = "red";
                isRed = true;
            }
        }

    
    message.style.left = current +'px'; //Update "left" value in px
}

