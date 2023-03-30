import { UserDetails } from "../components/UserDetails";
import { useEffect, useState } from "react";

export const Settings = () => {
    let [data, setData] = useState([]);

    useEffect(() => {
        fetch("/github/glimpse/back-office/back/api/utilisateur/1")
            .then((response) => response.json())
            .then((data) => setData(data));
    }, []);

    return (
        <div className="contenu">
            <div className="title">
                <h1 className="title__element">Paramètres</h1>
                <p className="title__subtitle">
                    Modifier les données du{" "}
                    <strong>compte administrateur</strong>.
                </p>
            </div>
            <UserDetails dataGET={data} />
        </div>
    );
};
