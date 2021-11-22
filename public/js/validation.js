function validateFormUpdateUser() {
    let email = document.forms['update_user']['email'].value;
    if (!validateEmail(email)) {
        alert('Incorrect value email!');
        return false;
    }
    return;
}
function validateFormAddUser() {
    let email = document.forms['add_user']['email'].value;
    if (!validateEmail(email)) {
        alert('Incorrect value email!');
        return false;
    }
    return;
}

function validateFormAddProduct() {
    let numberProduct = parseInt(document.forms['add_product']['number'].value);
    let price = parseInt(document.forms['add_product']['price'].value);
    let discount = parseInt(document.forms['add_product']['discount'].value);
    let image = document.forms['add_product']['productImage'].value;
    if (!numberProduct || numberProduct <= 0) {
        alert('Incorrect value number product!');
        return false;
    }
    if (!price || price <= 0) {
        alert('Incorrect value price!');
        return false;
    }
    if (!discount || discount < 0 || discount > 80) {
        alert('Incorrect value discount!');
        return false;
    }
    if (!image) {
        alert('Image not given!');
        return false;
    }
    return;
}
function validateFormUpdateProduct() {
    let numberProduct = parseInt(
        document.forms['update_product']['number'].value
    );
    let price = parseInt(document.forms['update_product']['price'].value);
    let discount = parseInt(document.forms['update_product']['discount'].value);
    if (!numberProduct || numberProduct <= 0) {
        alert('Incorrect value number product!');
        return false;
    }
    if (!price || price <= 0) {
        alert('Incorrect value price!');
        return false;
    }
    if (!discount || discount < 0 || discount > 80) {
        alert('Incorrect value discount!');
        return false;
    }
    return;
}

function validateFormRegister() {
    let email = document.forms['register_form']['email'].value;
    if (!validateEmail(email)) {
        alert('Incorrect value email!');
        return false;
    }
    return;
}
function validateEmail(email) {
    const regex = /[A-Za-z0-9\.]+@[A-Za-z0-9]+\.[A-Za-z]{2,10}/gm;
    let m;
    while ((m = regex.exec(email)) !== null) {
        if (m.index === regex.lastIndex) {
            regex.lastIndex++;
        }
        if (m) return true;
    }
    return false;
}
