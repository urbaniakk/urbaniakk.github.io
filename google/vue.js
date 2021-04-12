var myBody = document.getElementsByTagName('body')[0];

const input = document.querySelector('.wpis');
input.addEventListener('change', updateValue);

function updateValue(e) 
{
    if(e.target.value != '')
    {
        myBody.classList.toggle('results');
    }
    else
    {
        myBody.classList.remove('results');
    }
}