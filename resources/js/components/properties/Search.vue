<template>
    <div class="container container light-background pb-4 pt-1 primary-border rounded shadow">
        <h4 class="primary-color"></h4>

        <div class="form-row">
        </div>
    </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";

import Pickr from "vue-flatpickr-component";
import Guests from "./Guests.vue";
import DateRange from "./Date.vue";

export default {
    props: ["reload"],
    data() {
        return {
            guests: 0,
            form: {
                room_quantity: [],
                selectedRooms: [],
                children: 1,
                adults: 1,
                rooms: 1,
                check_in_checkout: null,
                checkin: null,
                checkout: null

            },
        };
    },
    components: {
        Pickr,
        Guests,
        DateRange,
    },
    computed: {
        ...mapGetters({
            locationSearch: "locationSearch",
        }),
    },
    mounted() {
        //this.build();
        // this.form.checkin = typeof this.checkForDate().checkin !== 'undefined' ? this.checkForDate().checkin : 'Check-in';
        // this.form.checkout = typeof this.checkForDate().checkout !== 'undefined' ? this.checkForDate().checkout : 'Check-out';
        // if (this.isCheckinEqualsToCheckout(this.form.checkin, this.form.checkout)) {
        //     localStorage.clear()
        // }
        // localStorage.clear()
    },
    methods: {
        ...mapActions({
            getProperties: "getProperties",
        }),
        dateSelected(value) {
            //this.form.check_in_checkout = value;
        },
        checkIn(value) {
            this.form.checkin = value;
        },
        checkOut(value) {
            this.form.checkout = value;
        },
        build(obj) {

            window.history.pushState("", "Title", "/apartments");

            let url = window.history.pushState(
                {},
                "",
                "?" + this.objectToQueryString(obj)
            );

            //this.$store.commit("setLocationSearch", locationSearch);
        },
        checkForDate(e) {
            const retrievedJsonString = localStorage.getItem('searchParams');
            // Check if the retrieved JSON string is not null
            if (retrievedJsonString !== null) {
                // Convert the JSON string back to an object
                const retrievedObject = JSON.parse(retrievedJsonString);

                return retrievedObject
            } else {
                return null
            }
        },
        objectToQueryString(obj) {
            return Object.keys(obj)
                .filter(key => obj[key] !== null && obj[key] !== undefined && obj[key] !== '') // Filter out null, undefined, and empty values
                .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(obj[key])}`)
                .join('&');
        },
        isCheckinGreaterThanCheckout(checkinDate, checkoutDate) {
            checkinDate = new Date(checkinDate);
            checkoutDate = new Date(checkoutDate);

            return checkinDate > checkoutDate;
        },
        isValidDate(dateString) {
            // Attempt to create a Date object from the dateString
            const dateObject = new Date(dateString);

            // Check if the dateObject is a valid Date and the dateString remains the same after conversion
            return !isNaN(dateObject) && dateString === dateObject.toISOString().split('T')[0];
        },

        search: function () {

            this.form.check_in_checkout = this.form.checkin + ' to ' + this.form.checkout;

            this.form.persons = document.querySelector("#persons").value;
            this.form.rooms = document.querySelector("#rooms").value;

            if (
                !this.form.checkin && !this.form.checkout
            ) {
                alert("Please select your check-in and check-out dates")
                return;
            }

            if (
                !this.isValidDate(this.form.checkin)
            ) {
                alert("Please select your check-in and check-out dates")
                return;
            }

            if (
                !this.isValidDate(this.form.checkout)
            ) {
                alert("Please select your check-in and check-out dates")
                return;
            }

            if (this.isCheckinGreaterThanCheckout(this.form.checkin, this.form.checkout)) {
                alert("Set your check-in and check-out dates correctly")
                return;
            }

            var now = new Date().getTime(); // Current timestamp


            // Sample object to be saved
            const myObject = {
                rooms: this.form.rooms,
                check_in_checkout: this.form.check_in_checkout,
                checkin: this.form.checkin,
                checkout: this.form.checkout,
                children: this.form.children,
                persons: this.form.persons,
                expiry: now + 3600000
            };

            // Convert the object to a JSON string
            const jsonString = JSON.stringify(myObject);

            // Save the JSON string in localStorage with a specific key
            const storageKey = 'searchParams';

            localStorage.setItem(storageKey, jsonString);

            // Retrieve the object from localStorage
            const retrievedJsonString = localStorage.getItem(storageKey);

            // Convert the JSON string back to an object
            const retrievedObject = JSON.parse(retrievedJsonString);

            // Now 'retrievedObject' contains the object retrieved from localStorage

            this.build(myObject);

            //  console.log(this.build())
            window.location.reload()

        },
    },
};
</script>
  