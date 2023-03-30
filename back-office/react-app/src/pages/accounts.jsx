import { useEffect, useState } from "react";
import { UsersList } from "../components/UsersList";
import { Button } from "../components/buttons/Button";
import { Info } from "../components/info/Info";
import { useNavigate } from "react-router-dom";

export const Accounts = () => {
    const navigate = useNavigate();

    let [data, setData] = useState([]);

    useEffect(() => {
        fetch("/back/api/utilisateurs")
            .then((response) => response.json())
            .then((data) => setData(data));
    }, []);

    const handleDelete = (id, email) => {
        const confirmed = window.confirm(
            `Êtes-vous sûr de vouloir supprimer cet utilisateur (${email}) ? Cette action est irréversible.`
        );
        if (confirmed) {
            fetch("/back/api/utilisateur/" + id, {
                method: "DELETE",
            })
                .then((response) => response.json())
                .then((data) => {
                    setData((prevData) =>
                        prevData.filter((data) => data.id_utilisateur !== id)
                    );
                    alert(data.status_message);
                });
        }
    };
    return (
        <div className="contenu">
            <div className="title">
                <h1 className="title__element">Gestion des comptes</h1>
                <p className="title__subtitle">
                    Gérez les <strong>comptes utilisateurs</strong> du site de
                    l'exposition.
                </p>
            </div>
            <div className="contenu__bloc">
                <UsersList dataGET={data} handleDelete={handleDelete} />
                <div className="infos">
                    <Info number={data.length} text={"Comptes utilisateurs"} />
                    <Button
                        type={"button"}
                        variant={"action"}
                        onClick={() => navigate(`/comptes/ajouter`)}
                    >
                        Ajouter
                    </Button>
                </div>
            </div>
        </div>
    );
};
