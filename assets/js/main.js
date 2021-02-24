let delPatientBtn = document.querySelectorAll('.delPatientBtn');
delPatientBtn.forEach(element => {
    element.addEventListener('click', delPatientConfirm);
});

function delPatientConfirm() {

    let id = this.getAttribute('data-id');
    if ( confirm( "Confirmez la suppression du patient !?" ) ) {
        window.location.href='index.php?ctrl=2&del_idP='+ id;
    }
}

let delAppointmentBtn = document.querySelectorAll('.delAppointmentBtn');
delAppointmentBtn.forEach(element => {
    element.addEventListener('click', delAppointmentConfirm);
});
 
function delAppointmentConfirm() {

    let id = this.getAttribute('data-id');
    if ( confirm( "Confirmez la suppression du rendez-vous !?" ) ) {
        window.location.href='index.php?ctrl=6&del_idA='+ id;
    }
}


// let delAppointmentBtn = document.querySelectorAll('.delAppointmentBtn');
// delAppointmentBtn.forEach(element => {
//     element.addEventListener('click', delAppointmentConfirm);
// });

// let delConfirm = document.querySelector('#delConfirm')
 
// function delAppointmentConfirm() {

//     let id = this.getAttribute('data-id');
//     window.location.href='index.php?ctrl=6&del_idA='+ id;
// }


