const btn = document.getElementById('btn-submit');
const inputUser = document.getElementById('input-username');
const inputPass = document.getElementById('input-password');

inputUser.addEventListener('input', () => {
    if (inputUser.value.length > 0 && inputPass.value.length > 0) {
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
});

inputPass.addEventListener('input', () => {
    if (inputUser.value.length > 0 && inputPass.value.length > 0) {
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
});