require('./bootstrap');

new Vue({

    el: '#app',

    data: {
        resturants: []
    },

    mounted() {

        const api = 'http://127.0.0.1:8000/api';

        axios.get(api).then(response => this.resturants = response.data)
            .catch(error => console.log(error));

    },

    created() {

        const checkboxes = document.querySelectorAll('.checkboxes');
        const btnRandomLunch = document.querySelector('.random-lunch');
        const reloadAlts = document.querySelector('.reloadAlts-lunch');
        const result = document.querySelector('.showResult');
        let alt = ['test', 'jer'];

        console.log(checkboxes);
        checkboxes.forEach((element) => {
            // add and removes elements from array
            element.addEventListener('change', () => {
                // if (element.checked) {
                //     alt.push(element.value);
                //     console.log(alt);
                // } else {
                //     let index = alt.indexOf(element.value);
                //     if (index >= 0) {
                //         alt.splice(index, 1);
                //     }
                //     console.log(alt);
                // }
                console.log(element.checked);
            });
        });

        // function to randomize lunch
        function getLunch(alt, addToDom) {
            const lenght = alt.length;
            let result = Math.floor(Math.random() * (lenght - 0)) + 0;
            btnRandomLunch.remove();
            reloadAlts.classList.remove("display-none");
            reloadAlts.className += " display";
            return addToDom.innerHTML = alt[result];
        }

        // starts getLunch function
        btnRandomLunch.addEventListener('click', event => {
            getLunch(alt, result);
        });

        // starts getLunch function
        reloadAlts.addEventListener('click', event => {
            getLunch(alt, result);
        });

    }
});