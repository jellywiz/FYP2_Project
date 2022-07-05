const getRaodomEmp = document.getElementById('getRandomEmp');

getRaodomEmp.addEventListener('click', async()=>{
    const response = await fetch('getRandomEmp');
    const data = await response.json();
    document.getElementById('email').value = data.email
    document.getElementById('password').value = "password"
       
})