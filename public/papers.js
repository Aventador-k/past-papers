// function search() {

//     //
//     let input, filter, table, tr, td, txtvalue;
//     input = document.getElementById('myinput');
//     filter = input.value.toUpperCase();
//     table = document.getElementById('mytable');
//     tr = table.getElementsByTagName('tr');

//     for (let i = 0; i < tr.length; i++) {
//         td = tr[i].getElementsByTagName('td')[2];
//         if (td) {
//             txtvalue = td.textContent || td.innerText;
//             if (txtvalue.toUpperCase().indexOf(filter) > -1) {
//                 tr[i].style.diplay = '';
//             } else {
//                 tr[i].style.display = 'none found ';
//             }
//         }
//     }

// }

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.search-input').forEach(inputfield => {
        const tablerow = inputfield.closest('table').querySelectorAll('tbody > tr');
        const headcell = inputfield.closest('th');
        const othercell = inputfield.closest('tr').querySelectorAll('th');
        const columnindex = Array.from(othercell).indexOf(headcell);
        const searchcell = Array.from(tablerow)
            .map(row => row.querySelectorAll('td')[columnindex]);

        inputfield.addEventListener('input', () => {
            const searchquery = inputfield.value.toLocaleLowerCase();
            for (const tablecell of searchcell) {
                const row = tablecell.closest('tr');
                const value = tablecell.textContent.toLocaleLowerCase().replace(',', '');
                row.style.visibility = null;
                if (value.search(searchquery) === -1) {
                    row.style.visibility = 'collapse';
                }
            }
        });


    });
});