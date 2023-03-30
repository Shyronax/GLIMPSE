import { useNavigate } from "react-router-dom";
import { Button } from "./buttons/Button";
import { useState, useEffect } from "react";

export const UserDetails = ({ dataGET, goBack }) => {
    const navigate = useNavigate();

    // Déclaration des variables d'état
    const [nom, setNom] = useState("");
    const [prenom, setPrenom] = useState("");
    const [email, setEmail] = useState("");
    const [mdp, setMdp] = useState("");
    const [mdpConfirm, setMdpConfirm] = useState("");
    const [status, setStatus] = useState({});

    const isMdpTheSame = mdp === mdpConfirm;

    // Afficher les données de l'utilisateur
    useEffect(() => {
        setNom(dataGET.nom_utilisateur || "");
        setPrenom(dataGET.prenom_utilisateur || "");
        setEmail(dataGET.email_utilisateur || "");
    }, [
        dataGET.nom_utilisateur,
        dataGET.prenom_utilisateur,
        dataGET.email_utilisateur,
    ]);

    // Fonction de soumission du formulaire
    const handleSubmit = async (e) => {
        e.preventDefault();
        if (isMdpTheSame) {
            const body = {
                nom,
                prenom,
                email,
            };

            if (dataGET.id_utilisateur == 1 && mdp) {
                body.mdp = mdp;
            }

            fetch("/back/api/utilisateur/" + dataGET.id_utilisateur, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(body),
            })
                .then((response) => response.json())
                .then((data) => {
                    setStatus({
                        nb: data.status,
                        message: data.status_message,
                    });
                });
        }
    };

    return (
        <form onSubmit={handleSubmit} className="form">
            {status.nb ? (
                <div>
                    <p className={status.nb == 1 ? "success" : "error"}>
                        {status.message}
                    </p>
                </div>
            ) : (
                <div style={{ height: "1rem" }}></div>
            )}
            <div className="form__champs">
                <label className="form__label">Nom</label>
                <input
                    className="form__input"
                    type="text"
                    value={nom ? nom : dataGET.nom_utilisateur}
                    onChange={(event) => setNom(event.target.value)}
                />
            </div>
            <div className="form__champs">
                <label className="form__label">Prénom</label>
                <input
                    className="form__input"
                    type="text"
                    value={prenom ? prenom : dataGET.prenom_utilisateur}
                    onChange={(event) => setPrenom(event.target.value)}
                />
            </div>

            <div className="form__champs">
                <label className="form__label">Adresse e-mail</label>
                <input
                    className="form__input"
                    type="email"
                    value={email}
                    onChange={(event) => setEmail(event.target.value)}
                />
            </div>

            {dataGET.id_utilisateur == 1 && (
                <div className="form">
                    <div className="form__champs">
                        <label className="form__label">Mot de passe</label>
                        <input
                            className="form__input"
                            type="password"
                            value={mdp}
                            onChange={(event) => setMdp(event.target.value)}
                        />
                    </div>
                    <div className="form__champs">
                        <label className="form__label">
                            Confirmation du mot de passe
                        </label>
                        <input
                            className="form__input"
                            {...(!isMdpTheSame && { className: "error" })}
                            type="password"
                            value={mdpConfirm}
                            onChange={(event) =>
                                setMdpConfirm(event.target.value)
                            }
                        />
                    </div>
                    <div>
                        {!isMdpTheSame && (
                            <p className="error">
                                Les mots de passe ne sont pas identiques.
                            </p>
                        )}
                    </div>
                </div>
            )}
            <div className="form__links">
                {goBack && (
                    <a onClick={() => navigate(-1)} className="goback-link">
                        Retour
                    </a>
                )}
                <Button type="submit">Modifier</Button>
            </div>
        </form>
    );
};
