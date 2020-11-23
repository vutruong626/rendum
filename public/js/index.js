

function random(max, min) {
    return Math.floor(Math.random() * (max - min)) + min;
}

function getTime() {
    time = document.getElementById('check_time').value;
    time = moment(time).format('YYYY-MM-DD HH:mm');
}



// axios.get('/get-user-prize-first').then(function (response) {
//     let data = response.data;
//     for (let i = 0; i < data.length; i++) {
//         let tr = "";

//         tr += `
//             <tr>
//                 <td>${user_lucky.length}</td>
//                 <td>${data.code}</td>
//                 <td>${data.username}</td>
//                 <td>mes</td>
//             </tr>
//         `
//         $('#user_lucky').html(tr)

//     }
// }).catch(function (error) {
//     console.log(error);
// });
            // $('#user_lucky').html(`
            //     <tr>
            //         <td>${user_lucky.length}</td>
            //         <td>${data.code}</td>
            //         <td>${data.username}</td>
            //         <td>mes</td>
            //     </tr>`
            // );
