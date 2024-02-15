class Pays {

    constructor(_json) {

        this.conuntryCode = _json.country_code;
        this.conuntryName = _json.country_name;
    }

    nouveauPays() {

        return {
            countryCode: this.conuntryCode,
            countryName: this.conuntryName
        }

    }
}
export { Pays };