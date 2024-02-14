class Pays {

    constructor(_json) {
        this.conuntryCode = _json.country_code;
        this.conuntryName = _json.country_name;
    }

    static async postPays() {

        let newPays = {
            conuntryCode: this.conuntryCode,
            conuntryName: this.country_name
        }

        let newPaysJson = JSON.stringify(newPays);

        let options = {
            method: 'POST',
            headers: {
                accept: 'application/json',
                'Content-Type': 'application/json'
            },
            body: newPaysJson
        }

        let response = await fetch("http://localhost:3000/api", options);

        return response == 201 ? true : false;

    }


}
export { Pays };