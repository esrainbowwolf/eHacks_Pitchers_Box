// resources/app.js

require("./bootstrap");

import { createApp } from "vue";
import Welcome from "./components/Welcome.vue";

createApp({
    components: {
        Welcome,
    },
}).mount("#app");
