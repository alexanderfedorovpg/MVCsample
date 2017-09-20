jQuery(document).ready(function ($) {
    jQuery.noConflict();

    // Сортировка таблиц
    var grid = document.getElementById('grid');
    if (grid != null) {
        grid.onclick = function (e) {
            if (e.target.tagName != 'TH') return;

            sortGrid(e.target.cellIndex, e.target.getAttribute('data-type'), e.target.getAttribute('class'));
            if (e.target.getAttribute('class') == "up") {
                e.target.setAttribute('class', 'down');
            }
            else
                e.target.setAttribute('class', 'up');
        };

        function sortGrid(colNum, type, status) {
            var tbody = grid.getElementsByTagName('tbody')[0];

            var rowsArray = [].slice.call(tbody.rows);

            var compare;

            switch (type) {
                case 'number':
                    compare = function (rowA, rowB) {
                        return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;
                    };
                    break;

                case 'string':
                    compare = function (rowA, rowB) {
                        return rowA.cells[colNum].innerHTML.localeCompare(rowB.cells[colNum].innerHTML);
                    };
                    break;

                case 'date':
                    compare = function (rowA, rowB) {
                        return Date.parse(rowA.cells[colNum].innerHTML) > Date.parse(rowB.cells[colNum].innerHTML) ? 1 : -1;
                    };
                    break;
            }


            rowsArray.sort(compare);

            if (status == 'down') {
                rowsArray.reverse();
            }

            grid.removeChild(tbody);

            for (var i = 0; i < rowsArray.length; i++) {
                tbody.appendChild(rowsArray[i]);
            }

            grid.appendChild(tbody);

        }


    }

});