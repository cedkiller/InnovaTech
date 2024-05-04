const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

let users = [];

function signup() {
    const name = document.getElementById('signup-name').value;
    const email = document.getElementById('signup-email').value;
    const password = document.getElementById('signup-password').value;
    
    const userExists = users.some(user => user.email === email);
    if (userExists) {
        alert('User already exists with this email!');
        return;
    }

    users.push({ name, email, password });
    alert('Registration successful!');
    // Optionally clear the form or redirect to the sign-in section
}

function signin() {
    const email = document.getElementById('signin-email').value;
    const password = document.getElementById('signin-password').value;
    
    const user = users.find(user => user.email === email && user.password === password);
    if (user) {
        window.location.href = "./App/29_FinishingGame/TickTickFinal/TickTick.html";
    } else {
        alert('Invalid email or password!');
    }
}
