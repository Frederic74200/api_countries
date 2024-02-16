class Pays {

    constructor(_json) {

        this.conuntryCode = _json.country_code;
        this.conuntryName = _json.country_name;
    }

    nouveauPays() {

        return {
            codePays: this.conuntryCode,
            nomPays: this.conuntryName
        }

    }
}
export { Pays };