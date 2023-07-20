<!doctype html>
<html>
<body>
<div class="sob">
<div><h2>Get Suggestions</h2></div>
<input id="worth"><br><br>
<button onclick="money()">How much money do you have right now </button>
<h2 id="message"> </h2>
</div>


<style>
h2
{
position:relative;
top:100px;
left:90px;
font-size:20px;
color:#5672ef;
font-style:Verdana
}
.sob
{
position:absolute;
height:870px;
width:500px;
top:0px;
left:410px;
background-color:#554A4C;
}
input
{
position:relative;
top:100px;
left:160px;
color:#4C1130;
font-style:Verdana;
}
button
{
position:relative;
top:100px;
left:120px;
font-style:Verdana;
}
h1
{
font-size:50px;
position:relative;
top:100px;
left:200px;
color:#4C1130;
height:50px;
width:30px;
font-style:Verdana;
}
body
{
            background-image: url('suggestions.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-size: 100% 100%;
            height: 850px;
}
</style>

<script>
function money()
{
let worth=document.querySelector("#worth");
let message=document.querySelector("#message");
if (!isNaN(worth))
            console.log("The value=" + parseInt(worth));
        else
            console.log("Please enter the integer value..");

if (worth.value <= 500)
 {
    message.innerHTML = "Pizza wth any extra topping";
}
else if (worth.value >= 1000 && worth.value <= 1999)
{
    message.innerHTML = "You can enjoy Pizza at Domino's and Coffee at Starbucks.";
}
else if (worth.value >= 2000 && worth.value <= 2999)
{
    message.innerHTML = "You can go to Movies with a friend or two and bless your taste buds by going to a food court";
}
else if (worth.value >= 3000 && worth.value <= 3999)
{
    message.innerHTML = "You can scroll through the alleys of Sarojini and get yourselves nice clothes.";
}
else if (worth.value >= 4000 && worth.value <= 4999)
{
    message.innerHTML = "With this amount of money you can pay your taxes and bills or any debts that you might have";
}
else if (worth.value >= 5000)
{
    message.innerHTML= "With this money you can open a PPF account and put in 1500 rupees in that PPF account. Besides doing this, invest 2000 in Growth and Debt Mutual Funds and build your wealth over time and put the rest of your money in your savings account.";
}
else
{
    message.innerHTML = "Re-enter the amount";
}
}
</script>
</body></html>
