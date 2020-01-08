//Jerry Compton
//File Name: script.js
// HW 3
//Javascript file for hw3.html
//----------------------------


//Function will calculate n factorial (n!)
function factorial(n)
{
    var answer = n;
    //in case user enters 1 or 0
    if(n==1 || n==0)
        return 1;
    else
    {   
        //calculate facorial
        for(var i = 1; i<n;i++)
        {
            answer *= i
        }

        return answer;//return factorial answer
    }
}

document.write("<table><caption>Factorial Table</caption><tr><th scope=\"col\">N Value</th><th scope=\"col\">N Factorial</th></tr>");//output table head and caption

var x = prompt("Enter number of factorial numbers to display:"); //get number entered by user as 'x'

//output a table row with i for column 1 and factorial of i for column 2
for(var i = 1; i <= x; i++)
{           
    document.write("<tr><td>", i,"</td><td>", factorial(i),"</td></tr>");
}

document.write("</table>");//close table


