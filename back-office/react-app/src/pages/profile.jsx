import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";
import { UserDetails } from "../components/UserDetails";

export const Profile = () => {
    const { id } = useParams();

    let [data, setData] = useState([]);

    useEffect(() => {
        fetch("/github/glimpse/back-office/back/api/utilisateur/" + id)
            .then((response) => response.json())
            .then((data) => setData(data));
    }, []);

    return (
        <div className="contenu">
            <div>
                <h1 className="title__element">Profil</h1>
                <p className="title__subtitle">
                    Modifier les données d'un
                    <strong>compte utilisateur</strong>.
                </p>
            </div>
            <UserDetails dataGET={data} goBack />
        </div>
    );
};
