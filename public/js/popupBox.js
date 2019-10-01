function showCreateAnAccountDialog() {
    document.getElementById("createAnAccountDialog").style.display = "block";
    document.getElementById("createLoginDialog").style.display = "none";
    document.getElementById("adminCreateAnAccount").classList.add("disabled");
    document.getElementById("adminLogin").classList.add("disabled");
}

function hideCreateAnAccountDialog() {
    document.getElementById("createAnAccountDialog").style.display = "none";
    document
        .getElementById("adminCreateAnAccount")
        .classList.remove("disabled");
    document.getElementById("adminLogin").classList.remove("disabled");

    document.getElementById("create-username").value = "";
    document.getElementById("create-email").value = "";
    document.getElementById("create-confirm-email").value = "";
    document.getElementById("create-password").value = "";
    document.getElementById("create-confirm-password").value = "";

    let cr_un_er = document.getElementById("create-username-error");
    let cr_em_er = document.getElementById("create-email-error");
    let cr_cn_em_er = document.getElementById("create-confirm-email-error");
    let cr_pw_er = document.getElementById("create-password-error");
    let cr_cn_pw_er = document.getElementById("create-confirm-password-error");

    if (cr_un_er) cr_un_er.remove();
    if (cr_em_er) cr_em_er.remove();
    if (cr_cn_em_er) cr_cn_em_er.remove();
    if (cr_pw_er) cr_pw_er.remove();
    if (cr_cn_pw_er) cr_cn_pw_er.remove();
}

function showLoginDialog() {
    document.getElementById("createLoginDialog").style.display = "block";
    document.getElementById("createAnAccountDialog").style.display = "none";
    document.getElementById("adminCreateAnAccount").classList.add("disabled");
    document.getElementById("adminLogin").classList.add("disabled");
}

function hideLoginDialog() {
    document.getElementById("createLoginDialog").style.display = "none";
    document
        .getElementById("adminCreateAnAccount")
        .classList.remove("disabled");
    document.getElementById("adminLogin").classList.remove("disabled");

    document.getElementById("loginEmail").value = "";
    document.getElementById("loginPassword").value = "";

    let ln_em_er = document.getElementById("loginEmail-error");
    let ln_pw_er = document.getElementById("loginPassword-error");

    if (ln_em_er) ln_em_er.remove();
    if (ln_pw_er) ln_pw_er.remove();
}
