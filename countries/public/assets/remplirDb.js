console.log("ok");
import { Db } from "./Db.js";
import { Pays } from "./Pays.js";

const urlJson = "https://github.com/ARFP/arfp.github.io/blob/projets/machine-a-voter/docs/tp/web/backend/api-countries/countries.json";

const app = {
    data() {
        return {
            toto: "totototo"

        }
    },
    async mounted() {
        let json = await Db.fetchJson(urlJson);
        for (let item of json) {
            this.listeCandidats.push(new Candidat(item));
        }
        this.listeRand = this.listeCandidats.sort((a, b) => 0.5 - Math.random());


        console.log(this.listeCandidats);
    },
    computed: {

    },
    methods: {

    }
}

Vue.createApp(app).mount('#app');